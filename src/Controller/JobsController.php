<?php

namespace App\Controller;

use App\Entity\Jobs;
use App\Repository\JobsRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class JobsController extends AbstractController
{
    #[Route('/jobs', name: 'app_jobs_index')]
    public function index(): Response
    {
        return $this->render('jobs/index.html.twig', [
            'controller_name' => 'JobsController',

        ]);
        
    }

    #[Route('/jobs', name: 'app_jobs_index')]
    public function select(JobsRepository $jobsRepository): Response
    {
        $jobs=$jobsRepository->findAll();

        return $this->render('jobs/index.html.twig', [
            'jobs'=>$jobs
           
        ]); 
    }


    #[Route('/show', name: 'app_jobs_show')]
    public function show(): Response
    {
        return $this->render('jobs/show.html.twig', [
            'controller_name' => 'JobsController',
        ]);
    }


    #[Route('/show', name: 'app_jobs_show')]
    public function selectshow(JobsRepository $jobsRepository): Response
    {
        $jobs=$jobsRepository->findAll();

        return $this->render('jobs/show.html.twig', [
            'jobs'=>$jobs
           
        ]); 
    }
    

}
