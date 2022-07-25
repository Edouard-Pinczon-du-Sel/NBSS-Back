<?php

namespace App\Controller\Api;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class HousekeepingController extends AbstractController
{
    /**
     * @Route("/api/housekeeping", name="app_api_housekeeping")
     */
    public function index(): JsonResponse
    {
        return $this->json([
            'message' => 'Welcome to your new controller!',
            'path' => 'src/Controller/Api/HousekeepingController.php',
        ]);
    }
}
