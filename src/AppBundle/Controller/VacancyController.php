<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class VacancyController extends Controller
{
    /**
     * @Route("/vakansii")
     */
    public function vakansiiAction()
    {
        return $this->render('AppBundle:Vacancy:vakansii.html.twig');
    }
}