<?php
include('database.php');

if(isset($_POST["signIN"]))
{
    $CNIC = $_POST["CNIC"];
    $pass = $_POST["pass"];

    //check if any variable is empty
    if(empty($CNIC) || empty($pass))
    {
        echo "<script>location='index1.php?status=4'</script>";
    }
    //  Allow only alphanumeric character and _, -, . and space in password field.
    elseif(!preg_match("/^[a-zA-Z0-9_\-\.]+$/", $pass))
    {
        echo "<script>location='index1.php?status=2'</script>";
    }
    
    // check whether if the CNIC is in correct format or not
    elseif(!preg_match("/^[0-9]{5}-[0-9]{7}-[0-9]{1}$/", $CNIC))
    {
        echo "<script>location='index1.php?status=3'</script>";
    }
    else
    {
        $query = "SELECT * from Person where BFormNo='$CNIC'";
        $res = db::getRecord($query);
        if($res != null && password_verify("$pass",$res['Password']))
        {
            session_start();
            $_SESSION["user"] = $CNIC;

            if($res["UserRole"]==5) //if user is a verification officer
            {
                $query1 = "SELECT verificationOfficerId, officerCategory from ApprovalApplications A JOIN VerificationOfficer V ON A.verificationOfficerId = V.officerId where A.personId='$CNIC'";
                $res1 = db::getRecord($query1);

                if($res1 != null)
                {

                    $_SESSION["verOfficerId"] = $res1['verificationOfficerId'];
                    $_SESSION["verOfficerCategory"] = $res1['officerCategory'];
                    echo "<script>location='verificationOfficer/viewAllDocs.php?status=1'</script>";
                }
                else
                {
                    echo "alert('Empty database')</script>";
                }
            }
            elseif ($res["UserRole"]==8) //if user is Organization Representative
            {
                $query1 = "SELECT RepId OrganizationRepresentative O WHERE O.personId='$CNIC'";
                $res1 = db::getRecord($query1);
                
                if($res != null)
                {
                    
                    $_SESSION["orgRepId"] = $res1['RepId'];
                    echo "<script>location='orgRep/viewAllDocs.php?status=1'</script>";
                }
                else
                {
                    echo "alert('Empty database')</script>";
                }
            }
            echo "<script>location='viewAllDocs.php?status=1'</script>";
            
        }
        else
        {
            echo "<script>location='index1.php?status=2'</script>";
        }
        
    }
}
?>