<?php
class DocumentSubmission {
  private $UserID;
  private $SubmissionID;
  private $Deadline;
  private $DocumentType;
  private $SubmissionPurpose;
  private $RepID;
  private $Title;
  private $IsSubmitted;
  function __construct($UserID, $SubmissionID, $Deadline, $DocumentType, $SubmissionPurpose, $RepID, $Title, $IsSubmitted) {
    $this->UserID = $UserID;
    $this->SubmissionID = $SubmissionID;
    $this->Deadline = $Deadline;
    $this->DocumentType = $DocumentType;
    $this->SubmissionPurpose = $SubmissionPurpose;
    $this->RepID = $RepID;
    $this->Title = $Title;
    $this->IsSubmitted = $IsSubmitted;
  }
  
  function getUserID() {
    return $this->UserID;
  }
  
  function getSubmissionID() {
    return $this->SubmissionID;
  }
  
  function getDeadline() {
    return $this->Deadline;
  }
  
  function getDocumentType() {
    return $this->DocumentType;
  }
  
  function setDocumentType($DocumentType) {
    $this->DocumentType = $DocumentType;
  }
  
  function getSubmissionPurpose() {
    return $this->SubmissionPurpose;
  }
  
  function setSubmissionPurpose($SubmissionPurpose) {
    $this->SubmissionPurpose = $SubmissionPurpose;
  }

  function getTitle() {
    return $this->Title;
  }

  function isSubmitted() {
    return $this->IsSubmitted;
  }

  function setSubmitted() {
    $this->IsSubmitted = true;
  }

  function getRepID() {
    return $this->RepID;
  }

  function setTitle($Title) {
    $this->Title = $Title;
  }
  
}
?>