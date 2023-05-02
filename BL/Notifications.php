<?php

class Notifications {
  private $UserID;
  private $Date;
  private $Description;
  private $Type;
  private $sentOnEmail;
  private $isRead;
  function __construct($UserID, $Date, $Description, $Type, $sentOnEmail, $isRead) {
    $this->UserID = $UserID;
    $this->Date = $Date;
    $this->Description = $Description;
    $this->Type = $Type;
    $this->sentOnEmail = $sentOnEmail;
    $this->isRead = $isRead;
  }
  function getUserID() {
    return $this->UserID;
  }

  function setUserID($UserID) {
    $this->UserID = $UserID;
  }
  
  function getDate() {
    return $this->Date;
  }
  function setRead() {
    $this->isRead = true;
  }
  function IsRead() {
    return $this->isRead;
  }

  function getDescription() {
    return $this->Description;
  }
  
  function setDescription($Description) {
    $this->Description = $Description;
  }
  
  function getType() {
    return $this->Type;
  }
  
  function setType($Type) {
    $this->Type = $Type;
  }
  
  function isSentOnEmail() {
    return $this->sentOnEmail;
  }
  
  function setSentOnEmail() {
    $this->sentOnEmail = true;
  }
  
  function send() {
    // Code to send the notification to the recipient(s) via email or other means
  }
}
?>
