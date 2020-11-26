<?php
namespace App\Entity;
use Doctrine\ORM\Mapping as ORM;
//use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Table(name="cars")
 * @ORM\Entity
 */
class Cars
{
 /**
  * @ORM\Column(type="integer")
  * @ORM\Id
  * @ORM\GeneratedValue(strategy="AUTO")
  */
 private $id;
 /**
  * @ORM\Column(type="string")
  */
 private $brand;
 /**
  * @ORM\Column(type="string")
  */
  private $model;
 /**
  * @ORM\Column(name="imageURL", type="string")
  */
 private $imageURL;

  /**
  * @ORM\Column(type="string")
  */
  private $fuel;
  
  /**
  * @ORM\Column(name="pricePerDay", type="string")
  */
  private $pricePerDay;

  
  /**
  * @ORM\Column(type="string")
  */
  private $currency;
  
  /**
  * @ORM\Column(type="string")
  */
  private $year;
  
  /**
  * @ORM\Column(type="string")
  */
  private $type;
  
  /**
  * @ORM\Column(type="string")
  */
  private $status;
    /**
  * @ORM\Column(name="groupId", type="string")
  */
  private $groupId;
      /**
  * @ORM\Column(name="registrationPlate", type="string")
  */
  private $registrationPlate;

 
 /**
    * @ORM\Column(name="createdAt", type="datetime")
    */
    private $createdAt;
    
 /**
    * @ORM\Column(name="updatedAt", type="datetime")
    */
    private $updatedAt;
        
 /**
    * @ORM\Column(name="subjectTypeId")
    */
    private $subjectTypeId;

     /**
    * @ORM\Column(name="location")
    */
    private $location;

 /**
   * @return mixed
   */
  public function getId()
  {
   return $this->id;
  }
  
/**
  * @return string
  */
  public function getBrand()
  {
   return $this->brand;
  }
 
  /**
   * @param mixed $brand
   */
  public function setBrand($brand): void
  {
   $this->brand = $brand;
  }
 /**
  * @return string
  */
 public function getModel()
 {
  return $this->model;
 }

 /**
  * @param mixed $model
  */
 public function setModel($model): void
 {
  $this->model = $model;
 }
 /**
  * @return string
  */
  public function getImageurl()
  {
   return $this->imageURL;
  }
 
  /**
   * @param mixed $imageURL
   */
  public function setImageurl($imageURL): void
  {
   $this->imageURL = $imageURL;
  }

  
 /**
  * @return string
  */
  public function getFuel()
  {
   return $this->fuel;
  }
 
  /**
   * @param mixed $fuel
   */
  public function setFuel($fuel): void
  {
   $this->fuel = $fuel;
  }
  
 /**
  * @return string
  */
  public function getpricePerDay()
  {
   return $this->pricePerDay;
  }
 
  /**
   * @param mixed $pricePerDay
   */
  public function setpricePerDay($pricePerDay): void
  {
   $this->pricePerDay = $pricePerDay;
  }
  
 /**
  * @return string
  */
  public function getCurrency()
  {
   return $this->currency;
  }
 
  /**
   * @param mixed $currency
   */
  public function setCurrency($currency): void
  {
   $this->currency = $currency;
  }
  
 /**
  * @return string
  */
  public function getYear()
  {
   return $this->year;
  }
 
  /**
   * @param mixed $year
   */
  public function setYear($year): void
  {
   $this->year = $year;
  }
  
 /**
  * @return string
  */
  public function getType()
  {
   return $this->type;
  }
 
  /**
   * @param mixed $type
   */
  public function setType($type): void
  {
   $this->type = $type;
  }
  
 /**
  * @return string
  */
  public function getStatus()
  {
   return $this->status;
  }
 
  /**
   * @param mixed $status
   */
  public function setStatus($status): void
  {
   $this->status = $status;
  }
  
 /**
  * @return string
  */
  public function getgroupId()
  {
   return $this->groupId;
  }
 
  /**
   * @param mixed $groupId
   */
  public function setgroupId($groupId): void
  {
   $this->groupId = $groupId;
  }
  
 /**
  * @return string
  */
  public function getregistrationPlate()
  {
   return $this->registrationPlate;
  }
 
  /**
   * @param mixed $registrationPlate
   */
  public function setregistrationPlate($registrationPlate): void
  {
   $this->registrationPlate = $registrationPlate;
  }

  
 /**
  * @return string
  */
  public function getsubjectTypeId()
  {
   return $this->subjectTypeId;
  }
 
  /**
   * @param mixed $subjectTypeId
   */
  public function setsubjectTypeId($subjectTypeId): void
  {
   $this->subjectTypeId = $subjectTypeId;
  }
  
 /**
  * @return string
  */
  public function getLocation()
  {
   return $this->location;
  }
 
  /**
   * @param mixed $location
   */
  public function setLocation($location): void
  {
   $this->location = $location;
  }

 /**
  * @return mixed
  */
  public function getCreatedat(): ?\DateTime
  {
   return $this->createdAt;
  }
 
  /**
   * @param mixed $createdAt
   */
  public function setCreatedAt($createdAt): void
  {
   $this->createdAt = $createdAt;
  }
  /**
  * @return mixed
  */
  public function getUpdatedAt(): ?\DateTime
  {
   return $this->updatedAt;
  }
 
  /**
   * @param mixed $updatedAt
   */
  public function setUpdatedAt($updatedAt): void
  {
   $this->updatedAt = $updatedAt;
  }

}