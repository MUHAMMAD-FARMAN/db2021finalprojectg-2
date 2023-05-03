<?php
include("header.php");
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
}
$id = $_SESSION['user'];
?>

<!-- START: Main Content-->
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
                                    <a class="nav-link  py-2 px-3 px-lg-4 " href="uploadDoc.php">Upload Document</a>
                                </li>
                                <li class="nav-item ml-0">
                                    <a class="nav-link  py-2 px-3 px-lg-4 " href="verifyDoc.php">Verify
                                        Document</a>
                                </li>
                                <li class="nav-item ml-0">
                                    <a class="nav-link  py-2 px-4 px-lg-4 " href="freezeDoc.php">Freeze Doc</a>
                                </li>
                                <li class="nav-item ml-0">
                                    <a class="nav-link  py-2 px-4 px-lg-4 active" href="searchOrgz.php">Search
                                        Organization</a>
                                </li>
                                <li class="nav-item ml-0">
                                    <a class="nav-link py-2 px-4 px-lg-4 " href="searchDoc.php">Search </a>
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
                        <h4 class="card-title">Seach Organization</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class="display table dataTable table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Type</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        include('database.php');

                                        $sql = "SELECT * FROM Organization";
                                        $organization = db::getRecords($sql);

                                        foreach ($organization as $orgz) 
                                        {
                                            echo "<tr>";
                                            echo "<td>" . $orgz['Name'] . "</td>";
                                            echo "<td>" . $orgz['Type'] . "</td>";
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
        <!-- END: Card DATA-->
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