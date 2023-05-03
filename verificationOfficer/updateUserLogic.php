<?php
include('database.php');
session_start();
if (isset($_POST['update'])) {
    // Assign values to variables
    $firstName = $_POST['fname'];
    $lastName = $_POST['lname'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];
    $id = $_SESSION['user']; // ID of the Person record to update

    //cheack if all fields are filled
    if (empty($firstName) || empty($lastName) || empty($email) || empty($contact)) {
        echo "<script>location.href='profile.php?status=3'</script>";
    }
    // Retrieve the current values from the database
    $sql = "SELECT FirstName, LastName, Email, Contact FROM Person WHERE BFormNo = '$id'";
    $row = db::getRecord($sql);
    $currentFirstName = $row["FirstName"];
    $currentLastName = $row["LastName"];
    $currentEmail = $row["Email"];
    $currentContact = $row["Contact"];

    // Construct the SQL query
    $sql = "UPDATE Person SET ";
    $updateFields = array();

    // Check if the FirstName column has changed
    if (!empty($firstName) && $firstName != $currentFirstName) {
        $updateFields[] = "FirstName = '$firstName'";
    }

    // Check if the LastName column has changed
    if (!empty($lastName) && $lastName != $currentLastName) {
        $updateFields[] = "LastName = '$lastName'";
    }

    // Check if the Email column has changed
    if (!empty($email) && $email != $currentEmail) {
        $updateFields[] = "Email = '$email'";
    }

    // Check if the Contact column has changed
    if (!empty($contact) && $contact != $currentContact) {
        $updateFields[] = "Contact = '$contact'";
    }

    // If any of the columns have changed, update the record
    if (count($updateFields) > 0) {
        $updateFields = implode(", ", $updateFields);
        $sql .= $updateFields . " WHERE BFormNo = '$id'";

        // Execute the SQL query
        $result = db::updateRecord($sql);

        if ($result == NULL) {
            echo "<script>location.href='profile.php?status=0'</script>";
        } else {
            echo "<script>location.href='profile.php?status=1'</script>";
        }
    } else {
        echo "<script>location.href='profile.php?status=2'</script>";
    }
}
