<?php
include ('database.php');
$id = $_GET['status'];

//get docCode from Documents table
$doc = db::getRecord("SELECT UserId, DocTitle FROM Documents WHERE DocId = '$id'");
$userId = $doc['UserId'];
$docTitle = $doc['DocTitle'];

db::deleteDoc($userId, $docTitle);
header("Location: viewAllDocs.php?status=1");
?>