<?php
session_start();
include('database.php');
// Get the id from Lookup 
$query = "SELECT id FROM Lookup WHERE Category = 'APPLSTATUS' and Value = 'REJECTED'";
$res = db::getRecord($query);
$st = $res['id'];
// convert id in int
$st = (int)$st;

$id = $_GET["status"];
// Update the status of the document to approved in ApproveAplication
$query = "UPDATE ApprovalApplications SET status = $st WHERE DocId = '$id'";
db::updateRecord($query);

// location = "viewAllDocVerify.php";
echo "<script type='text/javascript'>alert('Document Rejected!'); window.location.href='viewAllDocVerify.php';</script>"

?>