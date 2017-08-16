<?php

namespace AppBundle\Controller;

use AppBundle\Entity\CompanyInfo;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class PagesController extends Controller
{
    /**
     * @Route("/kompanya", name="kompanya")
     */
    public function kompanyaAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $companyInfoAllRecords = $em->getRepository(CompanyInfo::class)->findBy([], [
            'addedAt' => 'DESC'
        ]);
        return $this->render('AppBundle:Pages:kompanya.html.twig', [
            'companyInfoAllRecords' => $companyInfoAllRecords
        ]);
    }

    /**
     * @Route("/contacts", name="contacts")
     */
    public function contactsAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('AppBundle:Pages:contacts.html.twig');
    }
}

