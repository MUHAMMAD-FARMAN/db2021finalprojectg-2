<?php
include ('database.php');
$id = $_GET['status'];

//get docCode from Documents table
$doc = db::getRecord("SELECT UserId, DocTitle FROM Documents WHERE DocId = '$id'");
$userId = $doc['UserId'];
$docTitle = $doc['DocTitle'];

<<<<<<< Updated upstream
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
=======
db::deleteDoc($userId, $docTitle);
header("Location: viewAllDocs.php?status=1");
?>
>>>>>>> Stashed changes
