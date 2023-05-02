<?php
class OrganizationRepresentative extends Person {
  private $RepID;
  private $OrganizationId;
  function __construct($BFormNo, $RepID, $OrganizationId, $FirstName, $LastName, $Password, $Contact, $Email, $UserRole,$Status, $Gender) {
    parent::__construct($BFormNo, $FirstName, $LastName, $Password, $Contact, $Email, $UserRole, $Status, $Gender);
    $this->RepID = $RepID;
    $this->OrganizationId = $OrganizationId;
  }
  function getRepID() {
    return $this->RepID;
  }
  
  function getOrganizationId() {
    return $this->OrganizationId;
  }
  
  function extendDeadline($subID, $extDate) {
    // implement logic to extend deadline for the specified submission ID
    // to the specified extension date
  }
}
?>