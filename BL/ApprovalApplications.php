<?php
class ApprovalApplications {
  private $UserID;
  private $Status;
  private $DocID;
  private $OfficerID;
  function __construct($UserID, $Status, $DocID, $OfficerID) {
    $this->UserID = $UserID;
    $this->Status = $Status;
    $this->DocID = $DocID;
    $this->OfficerID = $OfficerID;
  }

  function getUserID() {
    return $this->UserID;
  }

  function getStatus() {
    return $this->Status;
  }
  
  function setStatus($Status) {
    $this->Status = $Status;
  }
  
  function getDocID() {
    return $this->DocID;
  }
  
  function getOfficerID() {
    return $this->OfficerID;
  }
}
?>
