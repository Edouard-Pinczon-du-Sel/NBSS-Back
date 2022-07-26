<?php

namespace App\Controller\Api;

use App\Entity\AdministrativeDepartment;
use App\Repository\AdministrativeDepartmentRepository;
use Doctrine\Persistence\ManagerRegistry;
use Exception;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;

/**
 * @Route("/api/administrative/department", name="app_api_administrative_department")
 */
class AdministrativeDepartmentController extends ApiController
{
    /**
     * @Route("/", name="browse", methods={"GET"})
     */
    public function browse(AdministrativeDepartmentRepository $administrativeDepartmentRepository): JsonResponse
    {
        $servicesAdministrativeDepartment = $administrativeDepartmentRepository->findAll();

        return $this->json(
            $servicesAdministrativeDepartment,
            Response::HTTP_OK,
            [],
            ["groups" =>[
                "app_api_serviceAdministrativeDepartment"
            ]]
        );
    }

    /**
     * @Route("/{id}", name="read", methods={"GET"})
     */
    public function read(AdministrativeDepartment $administrativeDepartment = null): JsonResponse
    {
        if($administrativeDepartment === null)
        {
            return $this->json404("le service n'a pas été trouvé");
        }
        return $this->json(
            $administrativeDepartment,
            Response::HTTP_OK,
            [],
            ["groups" =>[
                "app_api_serviceAdministrativeDepartment"
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

        try
        {
            $newAdministrativeDepartment = $serializerInterface->deserialize($jsonContent, Movie::class, 'json');    
        }
        catch(Exception $e)
        {
            return $this->json("Le JSON est mal formé", Response::HTTP_BAD_REQUEST);
        }

        $errors = $validator->validate($newAdministrativeDepartment);
        
        if (count($errors)> 0)
        {
            return $this->json422($errors, Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        $em = $manager->getManager();
        $em->persist($newAdministrativeDepartment);
        $em->flush();

        return $this->json(
            $newAdministrativeDepartment,
            Response::HTTP_CREATED,
            [
                'Location' => $this->generateUrl('app_api_administrative_department_read', ['id' => $newAdministrativeDepartment->getId()])
            ],
            [
                "groups" => "app_api_serviceAdministrativeDepartment"
            ]
        );
    }

  #id
  #firstname_of_deceased:
  #lastname_of_deceased:
  #maiden_name_of_deceased:
  #adress_deceased:
  #zip_code_of_deceased:
  #city_of_deceased:
  #date_of_birth:
  #place_of_birth:
  #date_of_deceased:
  #place_of_deceased:
  #firstname:
  #lastname:
  #mail:
  #adress:
  #postal_code:
  #city:
  #content:
  #contact:
    #id:
    #firstname:
    #lastname:
    #maiden_name:
    #mail:
    #adress:
    #zip_code:
    #city:
    #phone_number:
    #content:
    #preferency:
    #created_at:
    #administrativeDepartment:
    #babysittingService: null
    #housekeeping: null
    #personalAssistanceService: null
}
