<?php
include ('database.php');
include ('BL/VerificationOfficer.php');

if(isset($_POST["officerSignUP"]))
{
    $area = $_POST["area"];
    $city = $_POST["city"];
    $province = $_POST["province"];
    $category = $_POST["OC"];

    $query1 = "SELECT MAX(officerId) AS Id FROM VerificationOfficer";
    $officerId = db::getRecord($query1);
    $officerId = $officerId["Id"] + 1;


    

    
    
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