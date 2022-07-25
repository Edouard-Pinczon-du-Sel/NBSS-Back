<?php

namespace App\Controller\Api;

use App\Repository\AdministrativeDepartmentRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

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
                "app_api_serviceAdministrativeDepartment_browse"
            ]]
        );
    }
}
