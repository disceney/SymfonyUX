<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class ExampleController extends AbstractController
{
	#[Route(path : "/", name : "app_example")]
	public function form () : Response
	{
		return $this->render("example.html.twig");
	}
}
