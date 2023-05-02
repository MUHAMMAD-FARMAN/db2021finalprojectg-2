<?php
include("header.php");
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
                                    <a class="nav-link  py-2 px-3 px-lg-4  " href="uploadDoc.php"> Upload Document</a>
                                </li>
                                <li class="nav-item ml-0">
                                    <a class="nav-link  py-2 px-3 px-lg-4 " href="verifyDoc.php">Verify
                                        Document</a>
                                </li>
                                <li class="nav-item ml-0">
                                    <a class="nav-link  py-2 px-4 px-lg-4 " href="freezeDoc.php">Freeze Doc</a>
                                </li>
                                <li class="nav-item ml-0">
                                    <a class="nav-link py-2 px-4 px-lg-4 active" href="searchDoc.php">Search </a>
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
                                    <a class="nav-link py-2 px-4 px-lg-4" href="shareDoc.php">Share</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-md-12 mt-12">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h4 class="card-title">Search the document</h4>
                            </div>

                            <div class="card-body">
                                <form>
                                    <div class="form-row ">
                                        <div class="col-md-6 mb-3">
                                            <label for="searchDocument">File name</label>
                                            <input type="text" class="form-control" id="searchDocument"
                                                placeholder="File name" value="" onkeyup="searchDocumentInTable()" required>
                                        </div>
                                    </div>

                                    <button class="btn btn-primary" type="submit">Search</button>
                                </form>
                                <div class="col-12 mt-3">
                                    <div class="card">
                                        <div class="card-header  justify-content-between align-items-center">
                                            <h4 class="card-title">Datatable Edit</h4>
                                        </div>
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table id="documentTable"
                                                    class="display table dataTable table-striped table-bordered editable-table">
                                                    <thead>
                                                        <tr>
                                                            <th>Document Code</th>
                                                            <th>User Id</th>
                                                            <th>Issue Date</th>
                                                            <th>Status</th>
                                                            <th>Type</th>
                                                            <th>Expiry Date</th>
                            
 
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        include('database.php');

                                                        $sql = "SELECT * FROM Documents";
                                                        $documents = db::getRecords($sql);

                                                        foreach ($documents as $document) 
                                                        {
                                                            echo "<tr>";
                                                            echo "<td>" . $document['DocumentCode'] . "</td>";
                                                            echo "<td>" . $document['UserId'] . "</td>";
                                                            echo "<td>" . $document['IssueDate'] . "</td>";
                                                            echo "<td>" . $document['Status'] . "</td>";
                                                            echo "<td>" . $document['Type'] . "</td>";
                                                            echo "<td>" . $document['expiryDate'] . "</td>";
                                                            echo "</tr>";
                                                        }

                                        
                                                        ?>
                                                        
                                                    </tbody>
                                                </table>
                                            </div>
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
<?php
include("footer.php");
?>