<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use App\Entity\YugiLP;

class YugiLPController extends AbstractController
{
    /**
     * @Route("/yugilp", name="yugi_lp")
     */
    public function index(): Response
    {
        return $this->json([
            'message' => 'Welcome to your new controller!',
            'path' => 'src/Controller/YugiLPController.php',
        ]);
    }

    /**
     * @Route("/yugilp/{ref}/{playera}/{playerb}", name="yugi_lp_ref")
     */
    public function show(string $ref, string $playera = 'A', string $playerb = 'B'): Response
    {
        $lp = $this->getDoctrine()
	         ->getRepository(YugiLP::class)
		 ->findOneByRef($ref);

        if (!$lp) {
	   $lp = new YugiLP();
	   $lp->setRef($ref);

	   $em = $this->getDoctrine()->getManager();
	   $em->persist($lp);
	   $em->flush();
	}

        return $this->render('lp.html.twig', [
	       'lp' => $lp,
	       "pa" => $playera,
	       "pb" => $playerb
	]);
    }
}
