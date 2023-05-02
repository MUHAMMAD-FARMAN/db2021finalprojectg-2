<?php

class Feedback {
  private $FeedbackID;
  private $UserID;
  private $Description;
  private $Date;
  function __construct($FeedbackID, $UserID, $Description, $Date) {
    $this->FeedbackID = $FeedbackID;
    $this->UserID = $UserID;
    $this->Description = $Description;
    $this->Date = $Date;
  }
  function getFeedbackID() {
    return $this->FeedbackID;
  }
  function getUserID() {
    return $this->UserID;
  }

  function getDescription() {
    return $this->Description;
  }
  
  function setDescription($Description) {
    $this->Description = $Description;
  }
  
  function getDate() {
    return $this->Date;
  }
  
  function setDate($Date) {
    $this->Date = $Date;
  }
}
?>