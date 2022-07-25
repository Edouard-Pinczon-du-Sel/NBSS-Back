<?php

namespace App\Controller\Api;

use App\Repository\PictureRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/api/picture", name="app_api_picture")
 */
class PictureController extends ApiController
{
    /**
     * @Route("/", name="browse", methods={"GET"})
     */
    public function browse(PictureRepository $pictureRepository): JsonResponse
    {
        $pictures = $pictureRepository->findAll();

        return $this->json(
            $pictures,
            Response::HTTP_OK,
            [],
            ["groups" =>[
                "app_api_picture_browse"
            ]]
        );
    }
    
    #id: 2
    #placeOrder: 1
    #imageFile: null
    #image: Vich\UploaderBundle\Entity\File {#961 ▼
      #name: "picture-62de8af05b49d651698190.jpg"
      #originalName: "picture.jpg"
      #mimeType: "image/jpeg"
      #size: 501883
      #dimensions: array:2 [▶]
    #updatedAt: DateTime @1658751728 {#955 ▼
      #date: 2022-07-25 14:22:08.0 Europe/Berlin (+02:00)      
}
