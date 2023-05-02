<?php
include("database.php");
include ("BL/Document.php");
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check if a file was uploaded
    if (isset($_FILES['file']) && $_FILES['file']['error'] === UPLOAD_ERR_OK) {
        //get file type and size
        $filename = $_FILES['file']['name'];
        if($_POST["DocTitle"] != null)
        {
            $filename = $_POST["DocTitle"];
        }
        $fileType = $_FILES['file']['type'];
        $fileSize = $_FILES['file']['size'];
        $doctype = $_POST["docType"];
        $expiryDate = date('Y-m-d H:i:s', strtotime($_POST["ExpiryDate"]));
        $issueDate = date('Y-m-d H:i:s', strtotime($_POST["IssueDate"]));
        echo "<script>alert('$expiryDate'.'$issueDate')</script>";
        // Retrieve the file contents as a string
        $file_contents = file_get_contents($_FILES['file']['tmp_name']);

        // Encode the file contents in binary format
        $binary_data = base64_encode($file_contents);
        
        $doc = new Document($filename, $_SESSION["user"], null, null, $_POST["docType"], $issueDate, $expiryDate, 9, 0);
        $qry = "SELECT DocumentCode FROM Documents";
        $res = db::getRecords($qry);
        $doc->generateDocCode($res);
        $stmt = "INSERT INTO Documents(DocTitle,DocumentCode,[Type],IssueDate,ExpiryDate,[Content],UserId) VALUES ('$doc->DocTitle', '$doc->DocumentCode', '$doctype','$doc->IssueDate', '$doc->ExpiryDate', '$binary_data', '$doc->UserID')";
        $query = "INSERT INTO metadata(DocId,FileType,FileSize) VALUES ((SELECT MAX(DocId) FROM Documents), '$fileType', '$fileSize')";
        $res = db::insertRecord($stmt);
        db::insertRecord($query);
        echo "<script>alert('$res')</script>";
    } else {
        // Send an error response back to the client
        echo "<script>alert('Error uploading file: '" . $_FILES['file']['error'].")</script>";
    }
}
?>
