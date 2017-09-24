<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Review;
use AppBundle\Form\ReviewType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class ReviewController extends Controller
{
    /**
    * @Route("/reviews")
    */
    public function ReviewsAction()
    {
        $em = $this->getDoctrine()->getManager();
        $reviews = $em->getRepository(Review::class)->findBy([], [
            'addedAt' => 'DESC'
        ]);

        return $this->render('AppBundle:Review:reviews.html.twig', [
            'reviews' => $reviews
        ]);
    }

    /**
     * @Route("/review/add")
     */
    public function AddReviewAction(Request $request)
    {
        $review = new Review();
        $form = $this->createForm(ReviewType::class, $review);
        $form->handleRequest($request);

        if ($form->isValid() && $form->isSubmitted()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($review);
            $em->flush();
            return $this->redirectToRoute('app_review_reviews');
        }

        return $this->render('AppBundle:Review:form.html.twig', [
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/review/{id}", requirements={"id": "\d+"})
     */
    public function ReviewAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();
        $review = $em->getRepository(Review::class)->find($id);
        return $this->render('@App/Review/review.html.twig', [
            'review' => $review
        ]);
    }
}