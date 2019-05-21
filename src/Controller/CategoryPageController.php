<?php

namespace App\Controller;



use App\Service\PostsList\PostsListInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

class CategoryPageController extends AbstractController
{
    /**
     * @Route("/category/page", name="category_page")
     */
    public function index(string $slug, PostsListInterface $postLists): Response
    {
//        dd('1');
        $posts = $postLists->getByCategory($slug);
        return $this->render('category_page/index.html.twig', [
            'posts' => $posts,
        ]);
    }
}
