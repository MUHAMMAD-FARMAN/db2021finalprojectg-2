<?php
include ('database.php');
$id = $_GET['status'];

// get id from lookup
$query = "SELECT id FROM Lookup WHERE Category = 'DOCSTATUS' and Value = 'USEABLE'";
$res = db::getRecord($query);
$st = $res['id'];
// convert id in int
$st = (int)$st;

//get docCode from Documents table
// $docCode = db::getRecord("SELECT * FROM Documents WHERE DocId = '$id'");

$query = "UPDATE Documents SET Status=$st WHERE DocId='$id'";
$result = db::updateRecord($query);
if($result!=null)
{
    echo "<script>location='viewAllDocs.php?status=1'</script>";
    return;
}

echo "<script>location='viewAllDocs.php?status=2'</script>";

// $query = "DELETE FROM metadata WHERE DocId = $id";
// $result = db::deleteRecord($query);

// $query = "DELETE FROM ApprovalApplications WHERE DocId = $id";
// $result = db::deleteRecord($query);
// $query = "DELETE FROM DocOldPassword WHERE DocId = $id";
// $result = db::deleteRecord($query);
// $query = "DELETE FROM DocPassword WHERE DocId = $id";
// $result = db::deleteRecord($query);
// $query = "DELETE FROM Documents WHERE DocId = $id";
// $result = db::deleteRecord($query);