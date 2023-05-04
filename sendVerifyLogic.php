<?php
include('database.php');
session_start();

if(isset($_POST['send']))
{
    $id = $_POST['idDoc'];
    if(empty($id))
    {
        echo "<script>location='verifyDoc.php?status=2'</script>";
    }
    $uid = $_SESSION['user'];
    $query = "SELECT * FROM Documents WHERE DocId = $id";
    $doc = db::getRecord($query);

    $query2 = "SELECT TOP 1 v.officerId, COUNT(*) AS occurrence
    FROM VerificationOfficer v
    LEFT JOIN ApprovalApplications a ON v.officerId = a.verificationOfficerId WHERE a.DocId IS NULL
    GROUP BY v.officerId
    ORDER BY occurrence ASC;";
    $records = db::getRecord($query2);
    $vid = $records['officerId'];

    $query3 = "SELECT id FROM Lookup L Where L.Value = 'INPROGRESS'";
    $status = db::getRecord($query3);
    $sid = $status['id'];
    $sid = (int)$sid;
    $id = (int)$id;

    $query4 = "Insert into ApprovalApplications (personId, verificationOfficerId, DocId, status) values('$uid','$vid','$id','$sid')";
    $res= db::insertRecord($query4);
    if($res==NULL)
    {
        echo "<script>location='verifyDoc.php?status=0'</script>";
        
    }
    else
    {
        echo "<script>location='verifyDoc.php?status=1'</script>";

    }





}
?>