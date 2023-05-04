<?php
include ('database.php');
// Get Id of OFFICER
$query = "SELECT id FROM Lookup WHERE Category='USERROLE' and Value = 'OFFICER'";
$OfficerId = db::getRecord($query);


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
    $phone = $_POST["phone"];
    
    
    if(empty($email) || empty($pass) || empty($cpass) || empty($fname) || empty($lname) || empty($CNIC) || empty($role) || empty($gen) || empty($phone))
    {
        echo "<script>location='signup.php?status=4'</script>";
    }
    $query2 = "Select * from Person where Email='$email'";
    $res1 = db::getRecord($query2);

    $query2 = "Select * from Person where BFormNo='$CNIC'";
    $res2 = db::getRecord($query2);

    if(!preg_match("/^[0-9]{4}-[0-9]{7}$/", $phone))
    {
        echo "<script>location='signup.php?status=8'</script>";
    }
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
        $query3 = "INSERT INTO Person(BFormNo,UserRole,Contact, [Password], Email, FirstName, LastName, [Status], Gender) VALUES ('$CNIC','$role','$phone', '$pass','$email','$fname','$lname',9,'$gen')";
        $res3 = db::insertRecord($query3);

        // if verification officer is signing up
        if($role == $OfficerId['id'])
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