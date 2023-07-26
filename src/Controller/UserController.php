<?php

namespace App\Controller;

use App\Entity\User;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Exception\ExceptionInterface;

class UserController extends AbstractController
{
  #[Route('/user', name: 'app_user', methods: "POST")]
  public function index(Request $request, EntityManagerInterface $em): JsonResponse
  {
    $jsonRecu = json_decode($request->getContent());
    $username = $jsonRecu->username;
    $password = $jsonRecu->password;
    $user = new User();
    $user->setEmail($username);
    $user->setPassword(password_hash($password, PASSWORD_BCRYPT));
    //        $em->persist($user);
    //        $em->flush();
    dd($user);
    return $this->json([
      'message' => 'Welcome to your new controller!',
      'path' => 'src/Controller/UserController.php',
    ]);
  }

  /**
   * @throws ExceptionInterface
   */
  #[Route("/all_users")]
  public function getAllUsers(UserRepository $userRepository)
  {
    return $this->json($userRepository->findAll(), 200, [], ['groups' => 'user:read']);
  }
}
