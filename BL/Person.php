<?php
class Person {
  protected $BFormNo;
  protected $FirstName;
  protected $LastName;
  protected $Password;
  protected $Contact;
  protected $Email;
  protected $UserRole;
  protected $Status;
  protected $Gender;

  function __construct($BFormNo,$FirstName,$LastName,$Password,$Contact,$Email,$UserRole,$Status,$Gender){
    $this->BFormNo = $BFormNo;
    $this->FirstName = $FirstName;
    $this->LastName = $LastName;
    $this->Password = $Password;
    $this->Contact = $Contact;
    $this->Email = $Email;
    $this->UserRole = $UserRole;
    $this->Status = $Status;
    $this->Gender = $Gender;
  }

  function getBFormNo() {
    return $this->BFormNo;
  }
  
  function getFirstName() {
    return $this->FirstName;
  }
  
  function setFirstName($FirstName) {
    $this->FirstName = $FirstName;
  }
  
  function getLastName() {
    return $this->LastName;
  }
  
  function setLastName($LastName) {
    $this->LastName = $LastName;
  }
  
  function getPassword() {
    return $this->Password;
  }
  
  function setPassword($Password) {
    $this->Password = $Password;
  }
  
  function getContact() {
    return $this->Contact;
  }
  
  function setContact($Contact) {
    $this->Contact = $Contact;
  }
  
  function getEmail() {
    return $this->Email;
  }
  
  function setEmail($Email) {
    $this->Email = $Email;
  }
  
  function getUserRole() {
    return $this->UserRole;
  }
  
  function setUserRole($UserRole) {
    $this->UserRole = $UserRole;
  }

  function getStatus(){
    return $this->Status;
  }
  function setStatus($Status){
    $this->Status = $Status;
  }
  function getGender(){
    return $this->Gender;
  }
  //function set Gender
  function setGender($Gender){
    $this->Gender = $Gender;
  }
  
  function writeFeedback($fd) {
    // Code to write the feedback to the document management system
  }
}
?>