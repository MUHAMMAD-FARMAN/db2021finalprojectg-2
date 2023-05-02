<?php
include('database.php');
include("header.php");

$query = "SELECT * FROM Lookup WHERE Category = 'DOCTYPE'";
$types = db::getRecords($query);
?>
<main>
    <div class="container-fluid site-width">

        <!-- START: Card Data-->
        <div class="row">
            <div class="col-12 mt-3">

                <div class="profile-menu mt-4 theme-background border  z-index-1 p-2">
                    <div class="d-sm-flex">
                        <div class="align-self-center">
                            <ul class="nav nav-pills flex-column flex-sm-row" id="myTab" role="tablist">
                                <li class="nav-item ml-0">
                                    <a class="nav-link  py-2 px-3 px-lg-4 active " href="uploadDoc.php"> Upload
                                        Document</a>
                                </li>
                                <li class="nav-item ml-0">
                                    <a class="nav-link  py-2 px-3 px-lg-4 " href="verifyDoc.php">Verify
                                        Document</a>
                                </li>
                                <li class="nav-item ml-0">
                                    <a class="nav-link  py-2 px-4 px-lg-4 " href="freezeDoc.php">Freeze Doc</a>
                                </li>
                                <li class="nav-item ml-0">
                                    <a class="nav-link py-2 px-4 px-lg-4" href="searchDoc.php">Search </a>
                                </li>
                                <li class="nav-item ml-0">
                                    <a class="nav-link py-2 px-4 px-lg-4" href="passProtec.php">Add Password </a>
                                </li>
                                <li class="nav-item ml-0">
                                    <a class="nav-link py-2 px-4 px-lg-4" href="archive.php">Archive </a>
                                </li>
                                <li class="nav-item ml-0">
                                    <a class="nav-link py-2 px-4 px-lg-4 " href="searchOrgz.php">Search Organization
                                    </a>
                                </li>
                                <li class="nav-item ml-0">
                                    <a class="nav-link py-2 px-4 px-lg-4 " href="createSubmission.php">Create
                                        Submission
                                    </a>
                                </li>
                                <li class="nav-item ml-0 mb-2 mb-sm-0">
                                    <a class="nav-link py-2 px-4 px-lg-4" href="shareDoc.php">
                                        Share</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-md-12 mt-12">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h4 class="card-title">Choose Document to Upload</h4>
                            </div>

                            <div class="card-body">
                                <form action="uploadDocLogic.php" method="post" enctype="multipart/form-data">
                                    <div class="form-row ">
                                        <div class="col-md-6 mb-3">
                                            <label for="validationDefault01">File name</label>
                                            <input type="text" class="form-control" id="validationDefault01"
                                                placeholder="Enter file name to rename(optional)" value=""
                                                name="DocTitle">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-md-6 mb-3">
                                            <label for="validationDefault01">Choose file</label>
                                            <div class="custom-file overflow-hidden  mb-0">
                                                <input id="customFile" type="file" name="file"
                                                    onchange="updateLabel(this)" class="file"
                                                    accept="image/*,application/pdf,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document,application/vnd.ms-excel,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet,application/vnd.ms-powerpoint,application/vnd.openxmlformats-officedocument.presentationml.presentation,text/plain"
                                                    required>
                                                <label for="customFile" class="file">Choose file</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-sm-3 mb-3">
                                            <label for="dt">Issue date:</label>
                                            <input type="date" name="IssueDate" class="form-control" id="dt">
                                        </div>
                                        <div class="form-group col-sm-3 mb-3">
                                            <label for="dt">Expiry date:</label>
                                            <input type="date" name="ExpiryDate" class="form-control" id="dt">
                                        </div>
                                    </div>
                                    <div class="form-row ">
                                        <div class="form-group col-md-6">
                                            <label for="inputState">Select Document Type</label>
                                            <select id="inputState" name="docType" class="form-control">
                                                <?php
                                                foreach ($types as $t) {
                                                    echo "<option value='" . $t['id'] . "'>" . $t['Value'] . "</option>";
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group mb-0">
                                        <button class="btn btn-primary" name="upload" type="submit">Upload</button>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</main>
<script>
function updateLabel(input) {
    var label = input.nextElementSibling;
    var labelText = label.innerHTML;
    var fileName = input.files[0].name;
    if (fileName) {
        label.innerHTML = fileName;
    } else {
        label.innerHTML = labelText;
    }
}
</script>
<?php
include("footer.php");
?>