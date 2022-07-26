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
    
    #placeOrder: int
    #imageFile: null
    #image:
      #name: string
      #originalName: string
      #mimeType: string
      #size: int
      #dimensions: [string]
    #updatedAt: datetime
}
