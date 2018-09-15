<?php

namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class LandingController extends AbstractController
{
	/**
	 * @Route("/lucky/{max}", name="app_lucky_number")
	 * @param $max
	 * @return Response
	 * @throws \Exception
	 */
	public function number($max)
	{
		$number = random_int(0, $max);

		return new Response(
			'<html><body>Lucky number: '.$number.'</body></html>'
		);
	}
}
