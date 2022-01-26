<?php

namespace App\Controller;

use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class WizardNumber extends AbstractController
{
    /**
     * @Route("/number")
     */
    public function getNumber(LoggerInterface $logger): \Symfony\Component\HttpFoundation\JsonResponse
    {
        $logger->warning('returning random number!');
        return $this->json([
            'number' => rand(0,10),
        ]);
    }
}