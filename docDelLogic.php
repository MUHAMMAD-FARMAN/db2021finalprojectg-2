<?php
include ('database.php');
$id = $_GET['status'];

//get docCode from Documents table
$docCode = db::getRecord("SELECT DocumentCode FROM Documents WHERE DocId = '$id'");
$docCode = $docCode['DocumentCode'];
$chkData = db::getRecord("SELECT * FROM SubmittedDocument WHERE docCode = '$docCode'");
if($chkData != null){
    $query = "DELETE FROM SubmittedDocument WHERE docCode = $docCode";
    $result = db::deleteRecord($query);
}

$query = "DELETE FROM metadata WHERE DocId = $id";
$result = db::deleteRecord($query);

$query = "DELETE FROM ApprovalApplications WHERE DocId = $id";
$result = db::deleteRecord($query);
$query = "DELETE FROM DocOldPassword WHERE DocId = $id";
$result = db::deleteRecord($query);
$query = "DELETE FROM DocPassword WHERE DocId = $id";
$result = db::deleteRecord($query);
$query = "DELETE FROM Documents WHERE DocId = $id";
$result = db::deleteRecord($query);

if($result){
    header("Location: viewAllDocs.php?status=1");
}
else{
    header("Location: viewAllDocs.php?status=0");
}
