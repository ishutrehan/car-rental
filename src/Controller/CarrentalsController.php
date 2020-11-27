<?php
 namespace App\Controller;

 use App\Entity\Rental;
 use App\Entity\Cars;
 use Lexik\Bundle\JWTAuthenticationBundle\Services\JWTTokenManagerInterface;
 use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
 use Symfony\Component\HttpFoundation\JsonResponse;
 use Symfony\Component\HttpFoundation\Request;
 use Symfony\Component\HttpFoundation\Response;
 use Symfony\Component\Routing\Annotation\Route;
 use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
 use Symfony\Component\Security\Core\User\UserInterface;
 use Doctrine\ORM\Query;
 

class CarrentalsController extends ApiController
{

  public function createRental(Request $request)
  {
    if($request->isMethod('post')){
        $all = apache_request_headers();
        if (isset($all['Authorization'])){
            if($all['Authorization'] == $_COOKIE['jwt']){
                $request = $this->transformJsonBody($request);
                $em = $this->getDoctrine()->getManager();
                $subjectID = $request->get('subjectID');
                $rentalFrom = $request->get('rentalFrom');
                $rentalTo = $request->get('rentalTo');
                if (empty($subjectID) || empty($rentalFrom) || empty($rentalTo)){
                    $validation = [
                        "type" => "Unauthorized",
                        "message" => "Not authorized."
                    ];
                    return $this->respondValidationError((object)$validation);
                }
                $rental = new Rental();
                $rental->setSubjectid($subjectID);
                $rentalFrom = strtotime($rentalFrom);
                $rentalFrom = date("Y-m-d H:i:s", $rentalFrom);
                $rental->setRentalfrom(date($rentalFrom));
                $rentalTo = strtotime($rentalTo);
                $rentalTo = date("Y-m-d H:i:s", $rentalTo);
                $rental->setRentalfrom(date($rentalTo));
                $rental->setRentalto($rentalTo);
                $rental->setCreatedAt(date('y-m-d H:i:s'));
                $rental->setUpdatedAt(date('y-m-d H:i:s'));
                $em->persist($rental);
                $em->flush();

                $record = $this->getDoctrine()->getRepository(Rental::class)->findOneBy(array('id' => $rental->getId()));
                
                $response = [
                    "from" => $record->getRentalfrom(),
                    "to" => $record->getRentalfrom(),
                    "subjectID" => $record->getSubjectid()
                ];
                return $this->respondWithCarSuccess((object)$response);
            }else{
                
                $validation = [
                    "type" => "Expired",
                    "error" => "Token Expired",
                ];
                return $this->respondValidationError((object)$validation);
            }
        }else{
            $validation = [
                "type" => "Unauthorized"
            ];
            return $this->respondValidationError((object)$validation);
        }
    }
    if($request->isMethod('get')){
        $all = apache_request_headers();
       
        if (isset($all['Authorization'])){
            if($all['Authorization'] == $_COOKIE['jwt']){

                $rentals = $this->getDoctrine()->getRepository(Rental::class)->createQueryBuilder('c')
                ->getQuery();
                $result = $rentals->getResult(Query::HYDRATE_ARRAY);
        
                return $this->respondWithCarSuccess($result);
            }else{
                
                $validation = [
                    "type" => "Expired",
                    "error" => "Token Expired",
                ];
                return $this->respondValidationError((object)$validation);
            }
        }else{
            $validation = [
                "type" => "Unauthorized"
            ];
            return $this->respondValidationError((object)$validation);
        }
    }
    
  }
  public function cars(Request $request)
  {
    if($request->isMethod('post')){
        $request = $this->transformJsonBody($request);
        $em = $this->getDoctrine()->getManager();
        $brand = $request->get('brand');
        $model = $request->get('model');
        $imageURL = $request->get('imageURL');
        $fuel = $request->get('fuel');
        $pricePerDay = $request->get('pricePerDay');
        $currency = $request->get('currency');
        $year = $request->get('year');
        $type = $request->get('type');
        $status = $request->get('status');
        $groupId = $request->get('groupId');
        $registrationPlate = $request->get('registrationPlate');
        $subjectTypeId = $request->get('subjectTypeId');
        $latitude = $request->get('latitude');
        $longitude = $request->get('latitude');
        $location = json_encode([
            "latitude" => $latitude,
            "longitude" => $longitude
        ]);

        $cars = new Cars();
        $cars->setBrand($brand);
        $cars->setModel($model);
        $cars->setImageurl($imageURL);
        $cars->setFuel($fuel);
        $cars->setpricePerDay($pricePerDay);
        $cars->setCurrency($currency);
        $cars->setYear($year);
        $cars->setType($type);
        $cars->setStatus($status);
        $cars->setgroupId($groupId);
        $cars->setregistrationPlate($registrationPlate);
        $cars->setsubjectTypeId($subjectTypeId);
        $cars->setLocation($location);
        $cars->setCreatedAt(date('y-m-d H:i:s'));
        $cars->setUpdatedAt(date('y-m-d H:i:s'));
        $em->persist($cars);
        $em->flush();

        $record = $this->getDoctrine()->getRepository(Cars::class)->findOneBy(array('id' => $cars->getId()));
       
        $response = [
            "brand" => $record->getBrand(),
            "model" => $record->getModel(),
            "imageURL" =>  $record->getImageurl(),
            "fuel" => $record->getFuel(),
            "pricePerDay" => $record->getpricePerDay(),
            "currency" => $record->getCurrency(),
            "year" => $record->getYear(),
            "type" => $record->getType(),
            "status" => $record->getStatus(),
            "groupId" => $record->getgroupId(),
            "registrationPlate" => $record->getregistrationPlate(),
            "createdAt" => $record->getCreatedat(),
            "updatedAt" => $record->getUpdatedAt(),
            "subjectTypeId" => $record->getsubjectTypeId(),
            "location" => $record->getLocation()
        ];
        
        return $this->respondWithCarSuccess((object)$response);
    }
    if($request->isMethod('get')){
        $rentals = $this->getDoctrine()->getRepository(Cars::class)->createQueryBuilder('c')
        ->getQuery();
        $result = $rentals->getResult(Query::HYDRATE_ARRAY);
        
        return $this->respondWithCarSuccess($result);
    }
    
  }

}