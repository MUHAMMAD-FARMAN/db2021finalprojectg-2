<?php
session_start();
include 'database.php';

$id = $_GET["status"];
$Docmnt = db::getRecord("SELECT * FROM Documents WHERE DocId = '$id'");
if($Docmnt == null){
    header("Location: viewAllDocs.php");
}
$DocTitle = $Docmnt["DocTitle"];
$metadata = db::getRecord("SELECT * FROM metadata WHERE DocId = '$id'");

function formatSizeUnits($bytes)
{
    $units = array('B', 'KB', 'MB', 'GB', 'TB');

    $i = 0;
    while ($bytes >= 1024 && $i < count($units) - 1) {
        $bytes /= 1024;
        $i++;
    }

    return round($bytes, 2) . ' ' . $units[$i];
}
$fileSizeInBytes = $metadata["FileSize"];
$formattedSize = formatSizeUnits($fileSizeInBytes);
$dt = $Docmnt["Type"];
$res = db::getRecord("SELECT * FROM Lookup WHERE Id = '$dt'");

?>

<head>
    <!-- START: Template CSS-->
    <link rel="stylesheet" href="dist/vendors/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="dist/vendors/jquery-ui/jquery-ui.min.css">
    <link rel="stylesheet" href="dist/vendors/jquery-ui/jquery-ui.theme.min.css">
    <link rel="stylesheet" href="dist/vendors/simple-line-icons/css/simple-line-icons.css">
    <link rel="stylesheet" href="dist/vendors/flags-icon/css/flag-icon.min.css">
    <!-- END Template CSS-->

    <!-- START: Custom CSS-->
    <!-- <link rel="stylesheet" href="dist/css/main.css"> -->
    <!-- END: Custom CSS-->
</head>
<main>
    <div class="container-fluid">
        <div style="margin-top:20px">
        </div>
        <!-- START: Card Data-->
        <div class="row">
            <div class="col-12">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h4 class="card-title"><?php echo $DocTitle; ?></h4>
                                <button class="btn btn-primary float-right" style = "background-color:transparent; color:#4C75F2; border:none;">X</button>
                            </div>
                            <div class="card-body d-flex" style="margin-bottom: auto">
                            <div class="col-md-3 ml-2" style="width: 200px; display: inline-block;">
                            <div class="row">
                                <h5 class="mb-0" style="margin-top:15px ;margin-left: 10px; margin-right: 50px; color:#4C75F2"><?php echo 'Document Code: '; ?></h5>
                                </div>
                                <div class="row">
                                <p class="mb-0" style="margin-top:10px ;margin-left: 80px; margin-right: 30px; color:#1E3D73"><?php echo $Docmnt["DocumentCode"]; ?></p>
                                </div>
                                <div class="row">
                                <h5 class="mb-0" style="margin-top:15px ;margin-left: 10px; margin-right: 50px; color:#4C75F2"><?php echo 'File Type: '; ?></h5>
                                </div>
                                <div class="row">
                                <p class="mb-0" style="margin-top:10px ;margin-left: 80px; margin-right: 30px; color:#1E3D73"><?php echo $metadata["FileType"]; ?></p>
                                </div>
                                <div class="row">
                                <h5 class="mb-0" style="margin-top:15px ;margin-left: 10px; margin-right: 50px; color: #4C75F2"><?php echo 'File Size: ' ?></h5>
                                </div>
                                <div class="row">
                                <p class="mb-0" style="margin-top:10px ;margin-left: 80px; margin-right: 30px; color:#1E3D73"><?php echo $formattedSize; ?></p>
                                </div>
                                <div class="row">
                                <h5 class="mb-0" style="margin-top:15px ;margin-left: 10px; margin-right: 50px; color: #4C75F2;"><?php echo 'Expiry Date: ' ?></h5>
                                </div>
                                <div class="row">
                                <p class="mb-0" style="margin-top:10px ;margin-left: 80px; margin-right: 30px; color:#1E3D73"><?php 
                                $edate = $Docmnt["expiryDate"];
                                $newDate = date("d-m-Y", strtotime($edate));
                                echo  $newDate; ?></p>
                                </div>
                                <div class="row">
                                <h5 class="mb-0" style="margin-top:15px ;margin-left: 10px; margin-right: 50px; color: #4C75F2;"><?php echo 'Status: ' ?></h5>
                                </div>
                                <div class="row">
                                <p class="mb-0" style="margin-top:10px ;margin-left: 80px; margin-right: 30px; color:#1E3D73"><?php 
                                $s = $Docmnt["Status"];
                                $query = "SELECT l.Value FROM Lookup as l inner join Documents as d on d.[Status] = l.id where l.id = $s";
                                $status = db::getRecord($query);
                                echo $status['Value']; ?></p>
                                </div>
                                <div class="row">
                                <h5 class="mb-0" style="margin-top:15px ;margin-left: 10px; margin-right: 50px; color: #4C75F2;"><?php echo 'Type: ' ?></h5>
                                </div>
                                <div class="row">
                                <p class="mb-0" style="margin-top:10px ;margin-left: 80px; margin-right: 30px; color:#1E3D73"><?php echo $res["Value"]; ?></p>
                                </div>
                            </div>
                            <div class="column">
                                <div class="col-md-12 ">
                                    <div class="container" style="border:1px solid #CCC; border-radius: 5px; padding: 10px;">
                                    <?php
                                        if (strpos($metadata["FileType"], "image") !== false) {
                                            echo '<img src="data:image/jpeg;base64,'.$Docmnt["Content"].'" />';
                                        }
                                        elseif (strpos($metadata["FileType"], "text") !== false) {
                                            echo '<pre>'.base64_decode($Docmnt["Content"]).'</pre>';
                                        }
                                        else {
                                            $_SESSION['pdf'] = $Docmnt["Content"];
                                            echo '<a href="pdf.php" target="_blank">Open PDF</a>';
                                        }

                                    ?>
                                    </div>
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</main>
