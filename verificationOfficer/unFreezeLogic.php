<?php
include ('database.php');
$id = $_GET['status'];

//get docCode from Documents table
// $docCode = db::getRecord("SELECT * FROM Documents WHERE DocId = '$id'");

$query = "UPDATE Documents SET Status=11 WHERE DocId='$id'";
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