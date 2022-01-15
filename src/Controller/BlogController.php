<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Post;
use App\Repository\PostRepository;
use DateTimeImmutable;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;

class BlogController extends AbstractController
{
    /**
     * @Route("/newPost")
     */
    public function newPost(){
        return $this->render('/blog/newPost.html.twig');
    }

    /**
     * @Route("/api/post/create", name = "createPost", methods = {"POST"})
     */
    public function createPost(ManagerRegistry $doctrine, Request $request){
        $entityManager = $doctrine->getManager();
        $post = new Post();
        $post->setTitle($request->request->get('title'));
        $post->setContent($request->request->get('content'));
        $post->setCreatedAt(new DateTimeImmutable('now'));
        $entityManager->persist($post);
        $entityManager->flush();
        return $this->redirectToRoute("blog");
        
    }


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