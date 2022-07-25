<?php

namespace App\Controller\Api;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class PersonalAssistanceServiceController extends AbstractController
{
    /**
     * @Route("/api/personal/assistance/service", name="app_api_personal_assistance_service")
     */
    public function index(): JsonResponse
    {
        return $this->json([
            'message' => 'Welcome to your new controller!',
            'path' => 'src/Controller/Api/PersonalAssistanceServiceController.php',
        ]);
    }
}
