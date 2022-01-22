<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class WizardNumber extends AbstractController
{
    /**
     * @Route("/number")
     */
    public function getNumber(): \Symfony\Component\HttpFoundation\JsonResponse
    {
        return $this->json([
            'number' => rand(0,10),
        ]);
    }
}