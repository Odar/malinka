<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class ReviewController extends Controller
{
    /**
     * @Route("/otzivi")
     */
    public function otziviAction()
    {
        return $this->render('AppBundle:Otzivi:otzivi.html.twig');
    }
}