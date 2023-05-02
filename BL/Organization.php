<?php
class Organization {
  private $RegNo;
  private $Type;
  private $OrgID;
  private $Name;
  private $Address;
  function __construct($RegNo, $Type, $OrgID, $Name, $Address) {
    $this->RegNo = $RegNo;
    $this->Type = $Type;
    $this->OrgID = $OrgID;
    $this->Name = $Name;
    $this->Address = $Address;
  }
  function getRegNo() {
    return $this->RegNo;
  }
  
  function setRegNo($RegNo) {
    $this->RegNo = $RegNo;
  }
  
  function getType() {
    return $this->Type;
  }
  
  function setType($Type) {
    $this->Type = $Type;
  }
  
  function getOrgID() {
    return $this->OrgID;
  }
  
  function getName() {
    return $this->Name;
  }
  
  function setName($Name) {
    $this->Name = $Name;
  }
  
  function getAddress() {
    return $this->Address;
  }
  
  function setAddress($Address) {
    $this->Address = $Address;
  }
}
?>