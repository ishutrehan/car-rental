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
 use \Firebase\JWT\JWT;
 use Symfony\Component\HttpFoundation\Session\Session;
 use Symfony\Component\HttpFoundation\Cookie;
 use Doctrine\ORM\Query;
 
 

 class AuthController extends ApiController
 {
    
  public function register(Request $request, UserPasswordEncoderInterface $encoder)
  {
    if($request->isMethod('post')){
        $em = $this->getDoctrine()->getManager();
        $request = $this->transformJsonBody($request);
        $firstName = $request->get('firstName');
        $lastName = $request->get('lastName');
        $password = $request->get('password');
        $email = $request->get('email');

        if (empty($password) || empty($email)  || empty($firstName)  || empty($lastName)){
            $validation = [
                "type" => "Validation",
                "message" => "Invalid data format.",
                "errors" => "firstName, lastName, email or password is required!"
            ];
            return $this->respondValidationError((object)$validation);
        }
        

        $user = new User($email);
        $record = $this->getDoctrine()->getRepository(User::class)->findOneBy(array('email' => $email));
        
        if(empty($record)){
            //$user->setPassword($encoder->encodePassword($user, $password));
            $user->setPassword(md5($password));
            $user->setEmail($email);
            $user->setFirstname($firstName);
            $user->setLastname($lastName);
            $user->setCreatedAt(new \DateTime(date('y-m-d H:i:s')));
            $user->setUpdatedAt(new \DateTime(date('y-m-d H:i:s')));
            $em->persist($user);
            $em->flush();
            $response = [
                "id" => $user->getId(),
                "firstName" => $user->getFirstname(),
                "lastName" => $user->getLastname(),
                "email" => $user->getEmail(),
                "createdAt" => $user->getCreatedat(),
                "updatedAt" => $user->getUpdatedAt()
            ];
            return $this->respondWithSuccess((object)$response);
        }else{
            $response = [
                "type" => "E_CONFLICT_USER",
                "message" => "Entity conflict."
            ];
            return $this->respondValidationError((object)$response);
        }
    }elseif($request->isMethod('get')){
        $users = $this->getDoctrine()->getRepository(User::class)->createQueryBuilder('c')
                ->getQuery();
        $result = $users->getResult(Query::HYDRATE_ARRAY);

        return $this->respondWithCarSuccess($result);
    }else{
        $validation = [
            "type" => "not allowed",
            "message" => "Method not allowed"
        ];
        return $this->respondValidationError((object)$validation);
    }
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
    $now_seconds = time();
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
   
    $user = $this->getDoctrine()->getRepository(User::class)->findOneBy(array('email' => $email, 'password' => md5($password)));
    $payload = [
        "user" => $user->getEmail(),
        "iat" => $now_seconds,
        "exp" => $now_seconds+(60*60),  // Maximum expiration time is one hour
    ];

    $jwt = JWT::encode($payload,  getenv("JWT_SECRET_KEY"), 'HS256');
    //$decoded = JWT::decode($jwt, $publicKey, array('HS256'));
    $res = [
        "accessToken" => $jwt,
        "id" => $user->getId(),
        "firstName" => $user->getFirstname(),
        "lastName" => $user->getLastname(),
        "email" => $user->getEmail(),
        "createdAt" => $user->getCreatedAt(),
        "updatedAt" => $user->getUpdatedAt()
    ];
    //$session = new Session();
    //$session->set('user', (object)$response);
    $useHttps = false;
    $response = new Response();
   // setcookie("jwt", $jwt, $payload['exp'], "/", "", $useHttps, true);
    $cookie = new Cookie("jwt", $jwt, $payload['exp'], "/", "", $useHttps, true);
    $response->headers->setCookie($cookie);
    $response->sendHeaders();
    return $this->respondWithSuccess($res);
  }

 }