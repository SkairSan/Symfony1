<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class MovieController extends AbstractController
{
    private $movies = [
            ['id' => 0, 'title' => 'Inception', 'year' => 2010, 'desc' => 'A thief steals secrets by entering dreams.'],
            ['id' => 1, 'title' => 'Breaking bad', 'year' => 2008, 'desc' => 'A chemistry teacher turns to making meth.'],
            ['id' => 2, 'title' => 'Green book', 'year' => 2018, 'desc' => 'A racist driver chauffeuring a Black pianist across the South.'],
        ];

    #[Route('/movie', name: 'app_movie', methods:['GET'])]
    public function index(): Response
    {
        
        return $this->render('movie/index.html.twig', [
            'movies' => $this->movies,
        ]);
    }

    #[Route('/movie/random', name: 'random_movie', methods: ['GET'])]
    public function random(): Response
    {
        $id = (int)array_rand($this->movies); 
        return $this->redirectToRoute('show_movie', ['id' => $id]);
    }

    #[Route('/movie/{id}', name: 'show_movie', methods:['GET'])]
    public function show(int $id): Response
    {
        $movie = $this->movies[$id];

        return $this->render('movie/show.html.twig', [
            'movie' => $movie,
        ]);
    }

    
}
