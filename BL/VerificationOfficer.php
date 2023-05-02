<?php
include ('Person.php');
class VerificationOfficer extends Person{
  private $OfficerID;
  private $OfficeAddress;
  private $OfficerCategory;
  
  //parameterized constructor with parent constructor override
  function __construct($BFormNo, $OfficerID, $OfficeAddress, $OfficerCategory, $FirstName, $LastName, $Password, $Contact, $Email, $UserRole,$Status, $Gender) {
    parent::__construct($BFormNo, $FirstName, $LastName, $Password, $Contact, $Email, $UserRole, $Status, $Gender);
    $this->OfficerID = $OfficerID;
    $this->OfficeAddress = $OfficeAddress;
    $this->OfficerCategory = $OfficerCategory;
  }
  
  function getOfficerID() {
    return $this->OfficerID;
  }
  
  function setOfficerID($OfficerID) {
    $this->OfficerID = $OfficerID;
  }
  
  function getOfficeAddress() {
    return $this->OfficeAddress;
  }
  
  function setOfficeAddress($OfficeAddress) {
    $this->OfficeAddress = $OfficeAddress;
  }
  
  function getOfficerCategory() {
    return $this->OfficerCategory;
  }
  
  function setOfficerCategory($OfficerCategory) {
    $this->OfficerCategory = $OfficerCategory;
  }
  
  function validateApplication($applID, $result) {
    // Code to validate the application with the given ID and set the result
  }
}
?>