<?php
include ('database.php');

// Get the id from Lookup of FROZEN
$query = "SELECT id FROM Lookup WHERE Category = 'DOCSTATUS' and Value = 'FROZEN'";
$res = db::getRecord($query);
$st = $res['id'];
// convert id in int
$st = (int)$st;

if(isset($_POST["freezeDoc"]))
{
    $docId = $_POST["DocTitle"];
    if($docId == -1)
    {
        echo "<script>location='freezeDoc.php?status=3'</script>";
    }
    // change status of document to 12
    $query = "UPDATE Documents SET Status= $st WHERE DocId='$docId'";
    $result = db::updateRecord($query);
    if($result!=null)
    {
        echo "<script>location='freezeDoc.php?status=1'</script>";
    }
    
    echo "<script>location='freezeDoc.php?status=2'</script>";
    

}
?>