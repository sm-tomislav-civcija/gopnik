<?php

namespace App\Controller;

use App\Entity\GopnikVideo;
use App\Form\GopnikVideoType;
use App\Model\GopnikVideoModel;
use App\Repository\GopnikVideoRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/gopnik/video")
 */
class GopnikVideoController extends AbstractController
{
	/**
	 * @Route("/all", name="gopnik_product_all", methods="GET")
	 * @param GopnikVideoModel $model
	 * @return Response
	 */
	public function list(GopnikVideoModel $model): Response
	{
		$gopnik_videos = $model->getAllVideos();
		return new JsonResponse($gopnik_videos);
	}


	/**
	 * @Route("/last", name="gopnik_product_last", methods="GET")
	 * @param GopnikVideoModel $model
	 * @return Response
	 */
	public function last(GopnikVideoModel $model): Response
	{
		$gopnik_videos = $model->getLastVideo();
		return new JsonResponse($gopnik_videos);
	}
    /**
	 * @Route("/first", name="gopnik_product_first", methods="GET")
	 * @param GopnikVideoModel $model
	 * @return Response
	 */
	public function first(GopnikVideoModel $model): Response
	{
		$gopnik_videos = $model->getFirstVideo();
		return new JsonResponse($gopnik_videos);
	}

    /**
     * @Route("/{id}", name="gopnik_video_show", methods="GET")
     * @param GopnikVideoModel $model
     * @return Response
     */
    public function show(GopnikVideoModel $model, $id): Response
    {
        $gopnik_videos = $model->getNthVideo($id);
        return new JsonResponse($gopnik_videos);
    }


    /**
     * @Route("/{col}/{val}", name="gopnik_video_filter", methods="GET")
     * @param GopnikVideoModel $model
     * @return Response
     */
    public function filter(GopnikVideoModel $model, $col, $val): Response
    {
        $gopnik_videos = $model->getFilteredVideo($col, $val);
        return new JsonResponse($gopnik_videos);
    }






    /**
     * @Route("/", name="gopnik_video_index", methods="GET")
     */
    public function index(GopnikVideoRepository $gopnikVideoRepository): Response
    {
        return $this->render('gopnik_video/index.html.twig', ['gopnik_videos' => $gopnikVideoRepository->findAll()]);
    }

    /**
     * @Route("/new", name="gopnik_video_new", methods="GET|POST")
     */
    public function new(Request $request): Response
    {
        $gopnikVideo = new GopnikVideo();
        $form = $this->createForm(GopnikVideoType::class, $gopnikVideo);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($gopnikVideo);
            $em->flush();

            return $this->redirectToRoute('gopnik_video_index');
        }

        return $this->render('gopnik_video/new.html.twig', [
            'gopnik_video' => $gopnikVideo,
            'form' => $form->createView(),
        ]);
    }


    /**
     * @Route("/{id}/edit", name="gopnik_video_edit", methods="GET|POST")
     */
    public function edit(Request $request, GopnikVideo $gopnikVideo): Response
    {
        $form = $this->createForm(GopnikVideoType::class, $gopnikVideo);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('gopnik_video_edit', ['id' => $gopnikVideo->getId()]);
        }

        return $this->render('gopnik_video/edit.html.twig', [
            'gopnik_video' => $gopnikVideo,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="gopnik_video_delete", methods="DELETE")
     */
    public function delete(Request $request, GopnikVideo $gopnikVideo): Response
    {
        if ($this->isCsrfTokenValid('delete'.$gopnikVideo->getId(), $request->request->get('_token'))) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($gopnikVideo);
            $em->flush();
        }

        return $this->redirectToRoute('gopnik_video_index');
    }
}
