<?php
include('database.php');


$query = "SELECT * FROM Lookup WHERE Category = 'VEROFFTYPE'";
$officerCategory = db::getRecords($query);




?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Pick Admin</title>
    <link rel="shortcut icon" href="dist/images/favicon.ico" />
    <meta name="viewport" content="width=device-width,initial-scale=1">

    <!-- START: Template CSS-->
    <link rel="stylesheet" href="dist/vendors/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="dist/vendors/jquery-ui/jquery-ui.min.css">
    <link rel="stylesheet" href="dist/vendors/jquery-ui/jquery-ui.theme.min.css">
    <link rel="stylesheet" href="dist/vendors/simple-line-icons/css/simple-line-icons.css">
    <link rel="stylesheet" href="dist/vendors/flags-icon/css/flag-icon.min.css">

    <!-- END Template CSS-->

    <!-- START: Page CSS-->
    <link rel="stylesheet" href="dist/vendors/social-button/bootstrap-social.css" />
    <!-- END: Page CSS-->

    <!-- START: Custom CSS-->
    <link rel="stylesheet" href="dist/css/main.css">
    <!-- END: Custom CSS-->
</head>
<!-- END Head-->

<!-- START: Body-->

<body id="main-container" class="default">
    <!-- START: Main Content-->
    <div class="container">
        <div class="row vh-100 justify-content-between align-items-center">
            <div class="col-12">
                <form action="officerSignupLogic.php" method="post" class="row row-eq-height lockscreen  mt-5 mb-5">
                    <div class="lock-image col-12 col-sm-5"></div>
                    <div class="login-form col-12 col-sm-7" style="padding-top: 30px;">
                    
                        <!-- <div class="form-group mb-3">
                            <label for="emailaddress">CNIC</label>
                            <input class="form-control" name="CNIC" id="emailaddress" type="text" autocomplete="off" name="cnic" pattern="[0-9]{5}-[0-9]{7}-[0-9]{1}" maxlength="15" placeholder="xxxxx-xxxxxxx-x" oninput="formatCNIC(this)" required>
                        </div> -->
                        <div class="form-group mb-3" style="padding-bottom: 1rem;">
                            <input type="text" name="area" class="form-control" id="area" value="" onchange="this.setAttribute('value', this.value);">
                            <label class="form-control-placeholder" for="area">Area</label>
                        </div>
                        <div class="form-group mb-3" style="padding-bottom: 1rem;">
                            <input type="text" name="city" class="form-control" id="city" value="" onchange="this.setAttribute('value', this.value);">
                            <label class="form-control-placeholder" for="city">City</label>
                        </div>
                        <div class="form-group mb-3" style="padding-bottom: 1rem;">
                            <input type="text" name="province" class="form-control" id="province" value="" onchange="this.setAttribute('value', this.value);">
                            <label class="form-control-placeholder" for="province">Province</label>
                        </div>
                        
        
                        <div class="form-row ">
                            <div class="form-group col-md-12">
                                <label for="OC">Select Officer Category</label>
                                <select id="OC" name="OC" class="form-control">
                                    <?php
                                    foreach ($officerCategory as $OC) {
                                        echo "<option value='" . $OC['id'] . "'>" . $OC['Value'] . "</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                    
                        <div class="form-group mb-0">
                            <button class="btn btn-primary" name="officerSignUP" type="submit"> Register </button>
                        </div>
                        <?php
                        if (isset($_GET["status"]) && $_GET["status"] == 1) {
                            ?>
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <strong>Error!</strong> Password and Confirm Password does not match
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                            <?php
                        }
                        
                        if (isset($_GET["status"]) && $_GET["status"] == 2) {
                           ?>
                           <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <strong>Error!</strong> CNIC or Email already exists
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                           <?php
                        }
                        if (isset($_GET["status"]) && $_GET["status"] == 3) {
                            ?>
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <strong>Error!</strong> Email is not valid
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                            <?php
                        }
                        if (isset($_GET["status"]) && $_GET["status"] == 4) {
                            ?>
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <strong>Error!</strong> Fill all of the fields
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                            <?php
                        }
                        if (isset($_GET["status"]) && $_GET["status"] == 6) {
                            ?>
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <strong>Error!</strong> Data did not insert into database
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                            <?php
                        }
                        if (isset($_GET["status"]) && $_GET["status"] == 7) {
                            ?>
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <strong>Error!</strong> Password not acceptable, Please change password.
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                            <?php
                        }
                        ?>
                        <div class="mt-2">Already have an account? <a href="index1.php">Sign In</a></div>
                    </div>
                </form>
            </div>

        </div>
    </div>
    <!-- END: Content-->

    <!-- START: Template JS-->
    <script src="dist/vendors/jquery/jquery-3.3.1.min.js"></script>
    <script src="dist/vendors/jquery-ui/jquery-ui.min.js"></script>
    <script src="dist/vendors/moment/moment.js"></script>
    <script src="dist/vendors/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="dist/vendors/slimscroll/jquery.slimscroll.min.js"></script>
    <script>
        function formatCNIC(input) {
            // Remove all non-numeric characters from the input
            var cnic = input.value.replace(/\D/g, '');

            // Add a dash after the first 5 digits and the next 7 digits
            if (cnic.length > 5) {
                cnic = cnic.substring(0, 5) + '-' + cnic.substring(5);
            }
            if (cnic.length > 13) {
                cnic = cnic.substring(0, 13) + '-' + cnic.substring(13);
            }

            // Set the formatted value back to the input
            input.value = cnic;
        }
    </script>
    <!-- END: Template JS-->
</body>
<!-- END: Body-->

</html>