<?php
class User extends Person {
  function __construct($BFormNo,$FirstName,$LastName,$Password,$Contact,$Email,$UserRole,$Status,$Gender){
    parent::__construct($BFormNo,$FirstName,$LastName,$Password,$Contact,$Email,$UserRole,$Status,$Gender);
  }
  function uploadDocument($doc) {
    // Code to upload the document to the document management system
    return "Document uploaded successfully";
  }
  
  function freezeDocument($docID) {
    // Code to freeze the document in the document management system
  }
  
  function submitDoc($sb, $doc) {
    // Code to submit the document and the submission details to the document management system
  }
}
?>
