<?php

namespace App\Controller;

use App\Entity\NewsDetails;
use App\Form\NewsDetailsType;
use App\Repository\NewsDetailsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/news/details")
 */
class NewsDetailsController extends AbstractController
{
    /**
     * @Route("/", name="app_news_details_index", methods={"GET"})
     */
    public function index(NewsDetailsRepository $newsDetailsRepository): Response
    {
        return $this->render('news_details/index.html.twig', [
            'news_details' => $newsDetailsRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="app_news_details_new", methods={"GET", "POST"})
     */
    public function new(Request $request, NewsDetailsRepository $newsDetailsRepository): Response
    {
        $newsDetail = new NewsDetails();
        $form = $this->createForm(NewsDetailsType::class, $newsDetail);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $newsDetailsRepository->add($newsDetail, true);

            return $this->redirectToRoute('app_news_details_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('news_details/new.html.twig', [
            'news_detail' => $newsDetail,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_news_details_show", methods={"GET"})
     */
    public function show(NewsDetails $newsDetail): Response
    {
        return $this->render('news_details/show.html.twig', [
            'news_detail' => $newsDetail,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="app_news_details_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, NewsDetails $newsDetail, NewsDetailsRepository $newsDetailsRepository): Response
    {
        $form = $this->createForm(NewsDetailsType::class, $newsDetail);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $newsDetailsRepository->add($newsDetail, true);

            return $this->redirectToRoute('app_news_details_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('news_details/edit.html.twig', [
            'news_detail' => $newsDetail,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_news_details_delete", methods={"POST"})
     */
    public function delete(Request $request, NewsDetails $newsDetail, NewsDetailsRepository $newsDetailsRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$newsDetail->getId(), $request->request->get('_token'))) {
            $newsDetailsRepository->remove($newsDetail, true);
        }

        return $this->redirectToRoute('app_news_details_index', [], Response::HTTP_SEE_OTHER);
    }
}
