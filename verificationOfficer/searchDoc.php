<?php
include("header.php");

session_start();
$id = $_SESSION['user'];
?>
<main>


    <div class="container-fluid site-width">
        <!-- START: Breadcrumbs-->
        <div class="row ">
            <div class="col-12  align-self-center">
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
                                    <a class="nav-link  py-2 px-4 px-lg-4 " href="searchOrgz.php">Search
                                        Organization</a>
                                </li>
                                <li class="nav-item ml-0">
                                    <a class="nav-link py-2 px-4 px-lg-4 active" href="searchDoc.php">Search </a>
                                </li>
                                <li class="nav-item ml-0 mb-2 mb-sm-0">
                                    <a class="nav-link py-2 px-4 px-lg-4" href="shareDoc.php">Share</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                                        </div>
                                    </div>
        <!-- END: Breadcrumbs-->
        <!-- START: Card Data-->
        <div class="row">
                                <div class="col-12 mt-3">
                                    <div class="card">
                                        <div class="card-header  justify-content-between align-items-center">
                        <h4 class="card-title">Seach Document</h4>
                                        </div>
                                        <div class="card-body">
                                            <div class="table-responsive">
                            <table id="example" class="display table dataTable table-striped table-bordered">
                                                    <thead>
                                                        <tr>
                                        <th>DocCode</th>
                                                            <th>User Id</th>
                                        <th>IssueDate</th>
                                                            <th>Status</th>
                                                            <th>Type</th>
                                        <th>ExpiryDate</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        include('database.php');

                                        $sql = "SELECT * FROM Documents WHERE UserId = '$id'";
                                                        $documents = db::getRecords($sql);

                                                        foreach ($documents as $document) 
                                                        {
                                                            echo "<tr>";
                                                            echo "<td>" . $document['DocumentCode'] . "</td>";
                                                            echo "<td>" . $document['UserId'] . "</td>";
                                            $temp = $document['IssueDate'] ;
                                            $newDate = date("d-m-Y", strtotime($temp));
                                            echo "<td>" . $newDate . "</td>";
                                                            echo "<td>" . $document['Status'] . "</td>";
                                                            echo "<td>" . $document['Type'] . "</td>";
                                            $temp2 = $document['expiryDate'];
                                            $newDate = date("d-m-Y", strtotime($temp2));
                                            echo "<td>" . $newDate . "</td>";
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
</main>
<!-- END: Content-->

<!-- START: Template JS-->
<script src="dist/vendors/jquery/jquery-3.3.1.min.js"></script>
<script src="dist/vendors/jquery-ui/jquery-ui.min.js"></script>
<script src="dist/vendors/moment/moment.js"></script>
<script src="dist/vendors/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="dist/vendors/slimscroll/jquery.slimscroll.min.js"></script>

<!-- END: Template JS-->

<!-- START: APP JS-->
<script src="dist/js/app.js"></script>
<!-- END: APP JS-->

<!-- START: Page Vendor JS-->
<script src="dist/vendors/datatable/js/jquery.dataTables.min.js"></script>
<script src="dist/vendors/datatable/js/dataTables.bootstrap4.min.js"></script>
<script src="dist/vendors/datatable/jszip/jszip.min.js"></script>
<script src="dist/vendors/datatable/buttons/js/buttons.bootstrap4.min.js"></script>
<script src="dist/vendors/datatable/buttons/js/buttons.colVis.min.js"></script>
<script src="dist/vendors/datatable/buttons/js/buttons.flash.min.js"></script>
<script src="dist/vendors/datatable/buttons/js/buttons.html5.min.js"></script>
<script src="dist/vendors/datatable/buttons/js/buttons.print.min.js"></script>
<!-- END: Page Vendor JS-->

<!-- START: Page Script JS-->
<script src="dist/js/datatable.script.js"></script>


<?php
include("footer.php");
?>