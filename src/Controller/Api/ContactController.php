<?php

namespace App\Controller\Api;

use App\Entity\Contact;
use App\Repository\ContactRepository;
use Doctrine\Persistence\ManagerRegistry;
use Exception;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;

/**
 * @Route("/api/contact", name="app_api_contact")
 */
class ContactController extends ApiController
{
    /**
     * @Route("/", name="browse", methods={"GET"})
     */
    public function browse(ContactRepository $contactRepository): JsonResponse
    {
        $contacts = $contactRepository->findAll();

        return $this->json(
            $contacts,
            Response::HTTP_OK,
            [],
            ["groups" =>[
                "app_api_contact"
            ]]
        );
    }

    /**
     * @Route("/{id}", name="read", methods={"GET"})
     */
    public function read(Contact $contact = null): JsonResponse
    {
        if($contact === null)
        {
            return $this->json404("le service n'a pas été trouvé");
        }
        return $this->json(
            $contact,
            Response::HTTP_OK,
            [],
            ["groups" =>[
                "app_api_contact_serviceAdministrativeDepartment"
            ]]
        );
    }

    /**
     * @Route("",name="add", methods={"POST"})
     *
     * @param Request $request
     * @param ManagerRegistry $manager
     * @param SerializerInterface $serializerInterface
     * @param ValidatorInterface $validator
     * @return JsonResponse
     */
    public function add(Request $request, ManagerRegistry $manager, SerializerInterface $serializerInterface, ValidatorInterface $validator): JsonResponse
    {
        if (!$this->isGranted("ROLE_ADMIN"))
        {
            return $this->json(["error"=>"Authorised user only"], Response::HTTP_FORBIDDEN);
        }

        $jsonContent = $request->getContent();
        dd($jsonContent);    
        try
        {
            $newContact = $serializerInterface->deserialize($jsonContent, Contact::class, 'json');
        }
        catch(Exception $e)
        {
            return $this->json("Le JSON est mal formé", Response::HTTP_BAD_REQUEST);
        }

        $errors = $validator->validate($newContact);
        
        if (count($errors)> 0)
        {
            return $this->json422($errors, Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        //$contactRepository->add($newContact, true);
        
        $em = $manager->getManager();
        $em->persist($newContact);
        $em->flush();
        
        return $this->json(
            $newContact,
            Response::HTTP_CREATED,
            [
                'Location' => $this->generateUrl('app_api_contact_read', ['id' => $newContact->getId()])
            ],
            [
                "groups" => "app_api_contact_serviceAdministrativeDepartment"
            ]
        );
    }
}
