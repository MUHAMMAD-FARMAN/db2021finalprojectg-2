<?php
include("database.php");
include ("BL/Document.php");
session_start();
function checkFileType($fileType) {
    $allowed = array('application/pdf', 'image/jpeg', 'image/png', 'text/plain');
    if (in_array($fileType, $allowed)) {
        return true;
    } else {
        return false;
    }
}
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
        //return true if file is pdf , image, txt else return false input $fileType
        $chk = checkFileType($fileType);
        if ($chk == false) {
            echo "<script>alert('Invalid file type')</script>";
            echo "<script>location='uploadDoc.php'</script>";
        }
        $expiryDate = date('Y-m-d H:i:s', strtotime($_POST["ExpiryDate"]));
        $issueDate = date('Y-m-d H:i:s', strtotime($_POST["IssueDate"]));
        //cheack expiry date is greater than issue date and issue date is smaller than current date and expiry date is greater than current date
        if ($expiryDate < $issueDate || $issueDate > date('Y-m-d H:i:s') || $expiryDate < date('Y-m-d H:i:s')) {
            echo "<script>alert('Invalid date')</script>";
            echo "<script>location='uploadDoc.php'</script>";
            return;
        }
        // echo "<script>alert('$expiryDate'.'$issueDate')</script>";
        // Retrieve the file contents as a string
        $file_contents = file_get_contents($_FILES['file']['tmp_name']);

        // Encode the file contents in binary format
        $binary_data = base64_encode($file_contents);
        
        $doc = new Document($filename, $_SESSION["user"], null, null, $_POST["docType"], $issueDate, $expiryDate, 9, 0);
        $qry = "SELECT DocumentCode FROM Documents";
        $res = db::getRecords($qry);
        $doc->generateDocCode($res);
        $stmt = "INSERT INTO Documents(DocTitle,DocumentCode,[Type],IssueDate,ExpiryDate,[Content],UserId,[Status],IsDeleted) VALUES ('$doc->DocTitle', '$doc->DocumentCode', '$doctype','$doc->IssueDate', '$doc->ExpiryDate', '$binary_data', '$doc->UserID',11,0)";
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