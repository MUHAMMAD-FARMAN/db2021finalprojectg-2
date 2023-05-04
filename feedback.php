<?php

include ('database.php');
session_start();
if(isset($_POST['Feedback'])){
    $feedback = $_POST['Description'];
    if(empty($feedback))
    {
        echo "<script>location.href='profile.php?status=4'</script>";
    }
    $id = $_SESSION['user'];
    $sql = "INSERT INTO Feedback (UserId,[Date], [Description]) VALUES ('$id',getdate(), '$feedback')";
    $result = db::insertRecord($sql);
    if($result == NULL){
        echo "<script>location.href='profile.php?status=4'</script>";
    }else{
        echo "<script>location.href='profile.php?status=5'</script>";
    }
}


?>