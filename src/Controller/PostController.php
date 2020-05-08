<?php

namespace App\Controller;

use App\Entity\Posts;
use App\Form\PostsType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class PostController extends AbstractController
{
  /**
  * @Route("/registrar-posts", name="RegistrarPosts")
  */
  public function index(Request $request)
  {
    $post = new Posts();
    $form = $this->createForm(PostsType::class, $post);
    $form->handleRequest($request);
    if($form->isSubmitted() && $form->isValid())
    {
      $user = $this->getUser();
      $em = $this->getDoctrine()->getManager();
      $em->persist($post);
      $em->flush();
      return $this->redirectToRoute('dashboard');
    }
    return $this->render('post/index.html.twig', [
      'form' => $form->createView(),
    ]);
  }
}
