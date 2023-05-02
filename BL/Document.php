<?php
class Document {
  public $DocTitle;
  public $UserID;
  private $DocID;
  public $DocumentCode;
  private $Type;
  public $IssueDate;
  public $ExpiryDate;
  private $Status;
  private $isDeleted;
  function __construct($DocTitle, $UserID, $DocID, $DocumentCode, $Type, $IssueDate, $ExpiryDate, $Status, $isDeleted) {
    $this->UserID = $UserID;
    $this->DocTitle = $DocTitle;
    $this->DocID = $DocID;
    $this->DocumentCode = $DocumentCode;
    $this->Type = $Type;
    $this->IssueDate = $IssueDate;
    $this->ExpiryDate = $ExpiryDate;
    $this->Status = $Status;
    $this->isDeleted = $isDeleted;
  }
  function getUserID() {
    return $this->UserID;
  }
  
  function getDocID() {
    return $this->DocID;
  }
  
  function getDocTitle() {
    return $this->DocTitle;
  }

  function setDocTitle($DocTitle) {
    $this->DocTitle = $DocTitle;
  }

  function getDocumentCode() {
    return $this->DocumentCode;
  }
  
  function getType() {
    return $this->Type;
  }
  
  function setType($Type) {
    $this->Type = $Type;
  }
  
  function getIssueDate() {
    return $this->IssueDate;
  }
  
  function setIssueDate($IssueDate) {
    $this->IssueDate = $IssueDate;
  }
  
  function getExpiryDate() {
    return $this->ExpiryDate;
  }
  
  function setExpiryDate($ExpiryDate) {
    $this->ExpiryDate = $ExpiryDate;
  }

  function getStatus() {
    return $this->Status;
  }
  function setStatus($Status) {
    $this->Status = $Status;
  }
  function isDeleted() {
    return $this->isDeleted;
  }
  function setDeleted()
  {
    $this->isDeleted = true;
  }
  function generateDocCode($list) {
    if($this->DocumentCode != null) {
      return $this->DocumentCode;
    }
    $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    $isUnique = false;
    while(!$isUnique) {
      for ($i = 0; $i < 15; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
      }
      if(!in_array($randomString, $list)) {
        $isUnique = true;
      }
    }
    $this->DocumentCode = $randomString;
    return $randomString;
  }
}
?>