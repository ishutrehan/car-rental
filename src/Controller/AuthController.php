<?php
 namespace App\Controller;

 use App\Entity\User;
 use Lexik\Bundle\JWTAuthenticationBundle\Services\JWTTokenManagerInterface;
 use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
 use Symfony\Component\HttpFoundation\JsonResponse;
 use Symfony\Component\HttpFoundation\Request;
 use Symfony\Component\HttpFoundation\Response;
 use Symfony\Component\Routing\Annotation\Route;
 use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
 use Symfony\Component\Security\Core\User\UserInterface;
 

 class AuthController extends ApiController
 {

  public function register(Request $request, UserPasswordEncoderInterface $encoder)
  {
   $em = $this->getDoctrine()->getManager();
   $request = $this->transformJsonBody($request);
   $firstName = $request->get('firstName');
   $lastName = $request->get('lastName');
   $password = $request->get('password');
   $email = $request->get('email');

   /*if (empty($username) || empty($password) || empty($email)){
    return $this->respondValidationError("Invalid Username or Password or Email");
   }*/

   $user = new User($email);
   //$user->setPassword($encoder->encodePassword($user, $password));
   $user->setPassword($password);
   $user->setEmail($email);
   $user->setFirstname($firstName);
   $user->setLastname($lastName);
   $em->persist($user);
   $em->flush();
   $response = [
    "id" => $user->getId(),
    "firstName" => $user->getFirstname(),
    "lastName" => $user->getLastname(),
    "email" => $user->getEmail(),
    "createdAt" => date("y-m-d H:i:s"),
    "updatedAt" => date("y-m-d H:i:s")
   ];
   return $this->respondWithSuccess((object)$response);
  }

  /**
   * @param UserInterface $user
   * @param JWTTokenManagerInterface $JWTManager
   * @return JsonResponse
   */
  public function getTokenUser(UserInterface $user, JWTTokenManagerInterface $JWTManager)
  {
   return new JsonResponse(['token' => $JWTManager->create($user)]);
  }
  
  public function login(Request $request)
  {
    $password = $request->get('password');
    $email = $request->get('email');
    if (empty($password) || empty($email)){
        $validation = [
            "type" => "Validation",
            "message" => "Invalid data format.",
            "errors" => "email or password is required"
        ];
        return $this->respondValidationError((object)$validation);
    }
    $em = $this->getDoctrine()->getRepository(User::class)->findOneBy(array('email' => $email, 'password' => $password));
    
    $response = [
        "id" => $em->getId(),
        "firstName" => $em->getFirstname(),
        "lastName" => $em->getLastname(),
        "email" => $em->getEmail(),
        "createdAt" => $em->getCreatedAt(),
        "updatedAt" => $em->getUpdatedAt()
    ];
    return $this->respondWithSuccess((object)$response);
  }

 }