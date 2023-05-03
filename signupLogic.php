<?php
include ('database.php');

if(isset($_POST["signUP"]))
{
    $email = $_POST["email"];
    $pass = $_POST["pass"];
    $cpass = $_POST["cpass"];
    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $CNIC = $_POST["CNIC"];
    $role = $_POST["role"];
    $gen = $_POST["gen"];

    
    
    if(empty($email) || empty($pass) || empty($cpass) || empty($fname) || empty($lname) || empty($CNIC) || empty($role) || empty($gen))
    {
        echo "<script>location='signup.php?status=4'</script>";
    }
    $query2 = "Select * from Person where Email='$email'";
    $res1 = db::getRecord($query2);

    $query2 = "Select * from Person where BFormNo='$CNIC'";
    $res2 = db::getRecord($query2);

    if($pass != $cpass)
    {
        echo "<script>location='signup.php?status=1'</script>";
    }
    elseif($res2 != null || $res1 != null)
    {
        echo "<script>location='signup.php?status=2'</script>";
    }
    //cheack whether email is in correct foremat or not
    elseif(!filter_var($email, FILTER_VALIDATE_EMAIL))
    {
        echo "<script>location='signup.php?status=3'</script>";
    }
    elseif(!preg_match("/^[a-zA-Z0-9_\-\.]+$/", $pass))
    {
        echo "<script>location='signup.php?status=7'</script>";
    }
    else
    {
        session_start();
        $_SESSION['user'] = $CNIC;

        $pass = password_hash($pass,PASSWORD_DEFAULT);
        $query3 = "INSERT INTO Person(BFormNo,UserRole,Contact, Password, Email, FirstName, LastName, Status, Gender) VALUES ('$CNIC','$role','0000', '$pass','$email','$fname','$lname',9,'$gen')";
        $res3 = db::insertRecord($query3);

        // if verification officer is signing up
        if($role == 5)
        {
            echo "<script>location='officerSignup.php'</script>";
        }

        if($res3!=null)
        {
            echo "<script>location='index1.php?status=5'</script>";
        }
        else
        {
            echo "<script>location='index1.php?status=6'</script>";
        }
    }
}

?>