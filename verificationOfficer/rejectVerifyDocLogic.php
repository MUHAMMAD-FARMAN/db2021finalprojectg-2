<?php
session_start();
include('database.php');

$id = $_GET["status"];
// Update the status of the document to approved in ApproveAplication
$query = "UPDATE ApprovalApplications SET status = 31 WHERE DocId = '$id'";
db::updateRecord($query);

// location = "viewAllDocVerify.php";
echo "<script type='text/javascript'>alert('Document Rejected!'); window.location.href='viewAllDocVerify.php';</script>"

?>