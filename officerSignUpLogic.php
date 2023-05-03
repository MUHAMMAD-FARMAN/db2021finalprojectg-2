<?php
include ('database.php');
include ('BL/VerificationOfficer.php');
session_start();

if(isset($_POST["officerSignUP"]))
{
    $area = $_POST["area"];
    $city = $_POST["city"];
    $province = $_POST["province"];
    $category = $_POST["OC"];
    $officerId = $_SESSION['user'];

    


    

    
    
    if(empty($area) || empty($city) || empty($province) || empty($category))
    {
        echo "<script>location='officerSignup.php?status=4'</script>";
    }
    else
    {
        session_start();
        $_SESSION['verOfficerId'] = $officerId;
        $_SESSION['verOfficerCategory'] = $category;


        $query2 = "INSERT INTO VerificationOfficer(officerId, Area, City, Province, officerCategory) VALUES ('$officerId','$area', '$city', '$province', '$category')";
        $res3 = db::insertRecord($query2);
        echo "<script>location='verificationOfficer/index.php?status=5'</script>";
        
    }
}

?>