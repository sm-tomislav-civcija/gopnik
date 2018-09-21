<?php

namespace App\Controller;

use App\Entity\GopnikProduct;
use App\Form\GopnikProductType;
use App\Model\GopnikProductModel;
use App\Repository\GopnikProductRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

//REST API
/**
 * @Route("/gopnik/product")
 */
class GopnikProductController extends AbstractController
{
	/**
	 * @Route("/all", name="gopnik_product_all", methods="GET")
	 * @param GopnikProductModel $model
	 * @return Response
	 */
    public function list(GopnikProductModel $model): Response
    {
        $gopnik_products = $model->getAllProducts();
        return new JsonResponse($gopnik_products);
    }


    /**
     * @Route("/", name="gopnik_product_index", methods="GET")
     */
    public function index(GopnikProductRepository $gopnikProductRepository): Response
    {
        return $this->render('gopnik_product/index.html.twig', ['gopnik_products' => $gopnikProductRepository->findAll()]);
    }

    /**
     * @Route("/new", name="gopnik_product_new", methods="GET|POST")
     */
    public function new(Request $request): Response
    {
        $gopnikProduct = new GopnikProduct();
        $form = $this->createForm(GopnikProductType::class, $gopnikProduct);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($gopnikProduct);
            $em->flush();

            return $this->redirectToRoute('gopnik_product_index');
        }

        return $this->render('gopnik_product/new.html.twig', [
            'gopnik_product' => $gopnikProduct,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="gopnik_product_show", methods="GET")
     */
    public function show(GopnikProduct $gopnikProduct): Response
    {
        return $this->render('gopnik_product/show.html.twig', ['gopnik_product' => $gopnikProduct]);
    }

    /**
     * @Route("/{id}/edit", name="gopnik_product_edit", methods="GET|POST")
     */
    public function edit(Request $request, GopnikProduct $gopnikProduct): Response
    {
        $form = $this->createForm(GopnikProductType::class, $gopnikProduct);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('gopnik_product_edit', ['id' => $gopnikProduct->getId()]);
        }

        return $this->render('gopnik_product/edit.html.twig', [
            'gopnik_product' => $gopnikProduct,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="gopnik_product_delete", methods="DELETE")
     */
    public function delete(Request $request, GopnikProduct $gopnikProduct): Response
    {
        if ($this->isCsrfTokenValid('delete'.$gopnikProduct->getId(), $request->request->get('_token'))) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($gopnikProduct);
            $em->flush();
        }

        return $this->redirectToRoute('gopnik_product_index');
    }
}
