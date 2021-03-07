<?php

namespace App\Controller;

use App\Entity\Running;
use App\Entity\User;
use App\Service\RunningService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractController
{

    /**
     * @Route("/dashboard", name="dashboard")
     */
    public function index(RunningService $runningService): Response
    {
        $nbUser = $this->getDoctrine()->getRepository(User::class)->count([]);
        $nbRunning = $this->getDoctrine()->getRepository(Running::class)->count([]);
        $distance = $runningService->getTotalDistance();
        $duration = $runningService->getTotalDuration();

        return $this->render('dashboard/index.html.twig', [
            'nbUser' => $nbUser,
            'nbRunning' => $nbRunning,
            'distance' => $distance,
            'duration' => $duration,
        ]);
    }
}
