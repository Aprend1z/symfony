<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\UserType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class RegistroController extends AbstractController
{
    /**
     * @Route("/registro", name="registro")
     */
    public function index(Request $request, UserPasswordEncoderInterface $passwordEncoder)
    {
      $user = new User();
      $form = $this->createForm(UserType::class, $user);
      $form->handleRequest($request);
      if($form->isSubmitted() && $form->isValid()){
        $em = $this->getDoctrine()->getManager();
        $user->setPassword($passwordEncoder->encodePassword($user, $form['password']->getData()));
        $em->persist($user);
        $em->flush();
        $this->addFlash('exito', User::MSG_REGISTRO_OK);
        return $this->redirectToRoute('registro');
      }
        return $this->render('registro/index.html.twig', [
          'controller_name' => 'RegistroController',
          'saludo' => 'Hola Mundo',
          'formulario' => $form->createView(),
        ]);
    }
}
