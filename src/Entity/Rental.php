<?php
namespace App\Entity;
use Doctrine\ORM\Mapping as ORM;
//use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Table(name="rentals")
 * @ORM\Entity
 */
class Rental
{
 /**
  * @ORM\Column(type="integer")
  * @ORM\Id
  * @ORM\GeneratedValue(strategy="AUTO")
  */
 private $id;
 /**
  * @ORM\Column(name="subjectID", type="string")
  */
 private $subjectID;
 /**
  * @ORM\Column(name="rentalFrom", type="string")
  */
  private $rentalFrom;
 /**
  * @ORM\Column(name="rentalTo", type="string")
  */
 private $rentalTo;

 
 /**
    * @ORM\Column(name="createdAt")
    */
    private $createdAt;
    
 /**
    * @ORM\Column(name="updatedAt")
    */
    private $updatedAt;

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
  public function getSubjectid()
  {
   return $this->subjectID;
  }
 
  /**
   * @param mixed $subjectID
   */
  public function setSubjectid($subjectID): void
  {
   $this->subjectID = $subjectID;
  }
 /**
  * @return string
  */
 public function getRentalfrom()
 {
  return $this->rentalFrom;
 }

 /**
  * @param mixed $rentalFrom
  */
 public function setRentalfrom($rentalFrom): void
 {
  $this->rentalFrom = $rentalFrom;
 }
 /**
  * @return string
  */
  public function getRentalto()
  {
   return $this->rentalTo;
  }
 
  /**
   * @param mixed $rentalTo
   */
  public function setRentalto($rentalTo): void
  {
   $this->rentalTo = $rentalTo;
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