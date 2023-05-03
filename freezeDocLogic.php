<?php
include ('database.php');

if(isset($_POST["freezeDoc"]))
{
    $docId = $_POST["DocTitle"];
    if($docId == -1)
    {
        echo "<script>location='freezeDoc.php?status=3'</script>";
    }
    // change status of document to 12
    $query = "UPDATE Documents SET Status=12 WHERE DocId='$docId'";
    $result = db::updateRecord($query);
    if($result!=null)
    {
        echo "<script>location='freezeDoc.php?status=1'</script>";
    }
    
    echo "<script>location='freezeDoc.php?status=2'</script>";
    

}
?>