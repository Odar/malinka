<?php
namespace AppBundle\Controller;

use AppBundle\Entity\CompanyInfo;
use AppBundle\Entity\Contact;
use AppBundle\Entity\Feedback;
use AppBundle\Form\FeedBackType;
use Doctrine\Common\Collections\ArrayCollection;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Form;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class ContactController extends Controller
{
    /**
     * @Route ("/contacts", name="contacts")
     */
    public function contactAction(Request $request)
    {
        $feedback = new Feedback();
        $form = $this->createForm(FeedBackType::class, $feedback);

        $form->handleRequest($request);

        if ($form->isValid() && $form->isSubmitted()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($feedback);
            $em->flush();
        }

        $em = $this->getDoctrine()->getManager();
        $cont = $em->getRepository(Contact::class)->findBy([], [
            'addedAt' => 'DESC'
        ]);
        // Проверка на наличие записей в базе
        if (empty($cont)) {
            // Если не было найдено ни одной записи -> то создаем новую
            $newContact = new Contact();
            // Устанавливаем текст по умолчанию
            $newContact->setText('Приветствуем вас');
            // С помощьюю EntityManager говорим, что будем сохранять новый объект
            $em->persist($newContact);
            // Выполнить все SQL команды
            $em->flush();
        } else {
            // Берем самую первую запись (самую свежую, где addedAt наибольший)
            $newContact = $cont[0];
        }

        return $this->render('AppBundle:Pages:contacts.html.twig', [
            'form' => $form->createView(),
            'cont' => $newContact
        ]);
    }
}