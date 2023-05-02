<?php
include ('database.php');

if(isset($_POST["freezeDoc"]))
{
    $docName = $_POST["DocTitle"];
    // change status of document to 12
    $query = "UPDATE Documents SET Status=12 WHERE DocTitle='$docName'";
    $result = db::getRecord($query);
    if($result!=null)
    {
        echo "<script>location='freezeDoc.php?status=1'</script>";
    }
    
    echo "<script>location='freezeDoc.php?status=2'</script>";
    

}
?>