<?php

namespace AppBundle\Controller;

use AppBundle\Entity\CompanyInfo;
use AppBundle\Entity\Contact;
use AppBundle\Entity\Feedback;
use Doctrine\Common\Collections\ArrayCollection;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Form;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class PagesController extends Controller
{
    /**
     * @Route("/kompanya", name="kompanya")
     */
    public function kompanyaAction(Request $request)
    {
        // Вытащили EntityManager
        $em = $this->getDoctrine()->getManager();

        // Получить из базы все записи CompanyInfo с сортировкой по полю addedAt по убыванию
        $companyInfoAllRecords = $em->getRepository(CompanyInfo::class)->findBy([], [
            'addedAt' => 'DESC'
        ]);

        // Проверка на наличие записей в базе
        if (empty($companyInfoAllRecords)) {
            // Если не было найдено ни одной записи -> то создаем новую
            $newCompanyInfo = new CompanyInfo();
            // Устанавливаем текст по умолчанию
            $newCompanyInfo->setText('Приветствуем вас');
            // С помощьюю EntityManager говорим, что будем сохранять новый объект
            $em->persist($newCompanyInfo);
            // Выполнить все SQL команды
            $em->flush();
        } else {
            // Берем самую первую запись (самую свежую, где addedAt наибольший)
            $newCompanyInfo = $companyInfoAllRecords[0];
        }

        return $this->render('AppBundle:Pages:kompanya.html.twig', [
            'companyInfo' => $newCompanyInfo
        ]);
    }

    /**
     * @Route("/contacts", name="contacts")
     */
    public function contactsAction(Request $request)
    {

        $feedback = new Feedback();
        $form = $this->createFormBuilder($feedback)
            ->add('name', TextType::class)
            ->add('email',  TextType::class)
            ->add('phone', TextType::class)
            ->add('text', TextareaType::class)
            ->add('submit', SubmitType::class)
            ->getForm();

        $form->handleRequest($request);

        if ($form->isValid() && $form->isSubmitted()) {
            if (strlen($feedback->getName()) > 5) {
                throw new NotFoundHttpException('213');
            }

            $em = $this->getDoctrine()->getManager();
            $em->persist($feedback);
            $em->flush();
        }

                $em = $this->getDoctrine()->getManager();
                $cont = $em->getRepository(Contact::class)->findAll();

        return $this->render('AppBundle:Pages:contacts.html.twig', [
            'form' => $form->createView(),
            'cont' => $cont
        ]);
    }
}

