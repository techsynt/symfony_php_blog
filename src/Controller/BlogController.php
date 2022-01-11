<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Post;
use App\Repository\PostRepository;
use Doctrine\Persistence\ManagerRegistry;

class BlogController extends AbstractController
{
    /**
     * @Route("/", name="blog")
     */
    public function listPosts(ManagerRegistry $doctrine){
        $posts = $doctrine->getRepository(Post::class)->findAll();
        return $this->render('blog/index.html.twig', ['posts' => $posts]);
    }
    /**
     * @Route("/{id}", name = "onePost")
     */
    public function listPost(ManagerRegistry $doctrine, $id){
        $post = $doctrine->getRepository(Post::class)->find($id);
        return $this->render('blog/onePost.html.twig', ['post' => $post]);
    }
}