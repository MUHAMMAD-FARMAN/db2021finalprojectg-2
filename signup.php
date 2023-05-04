<?php
include('database.php');

$query = "SELECT * FROM Lookup WHERE Category = 'USERROLE'";
$roles = db::getRecords($query);

$query = "SELECT * FROM Lookup WHERE Category = 'GENDER'";
$genders = db::getRecords($query);



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Pick Admin</title>
    <link rel="shortcut icon" href="dist/images/logo.png" />
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
                <form action="signupLogic.php" method="post" class="row row-eq-height lockscreen  mt-5 mb-5">
                    <div class="lock-image col-12 col-sm-5"></div>
                    <div class="login-form col-12 col-sm-7">
                        <div class="form-group mb-3" style="padding-bottom: 1rem; margin-top: 1rem;">
                            <input type="text" class="form-control" name="CNIC" id="emailaddress" type="text" autocomplete="off" name="cnic" pattern="[0-9]{5}-[0-9]{7}-[0-9]{1}" maxlength="15" oninput="formatCNIC(this)" required value="" onchange="this.setAttribute('value', this.value);">
                            <label class="form-control-placeholder" for="username">CNIC</label>
                        </div>
                        <!-- <div class="form-group mb-3">
                            <label for="emailaddress">CNIC</label>
                            <input class="form-control" name="CNIC" id="emailaddress" type="text" autocomplete="off" name="cnic" pattern="[0-9]{5}-[0-9]{7}-[0-9]{1}" maxlength="15" placeholder="xxxxx-xxxxxxx-x" oninput="formatCNIC(this)" required>
                        </div> -->
                        <div class="form-group mb-3" style="padding-bottom: 1rem;">
                            <input type="text" name="fname" class="form-control" id="fname" value="" onchange="this.setAttribute('value', this.value);">
                            <label class="form-control-placeholder" for="fname">First Name</label>
                        </div>
                        <div class="form-group mb-3" style="padding-bottom: 1rem;">
                            <input type="text" name="lname" class="form-control" id="lname" value="" onchange="this.setAttribute('value', this.value);">
                            <label class="form-control-placeholder" for="lname">Last Name</label>
                        </div>
                        <div class="form-group mb-3" style="padding-bottom: 1rem;">
                            <input type="email" name="email" class="form-control" id="email" value="" onchange="this.setAttribute('value', this.value);">
                            <label class="form-control-placeholder" for="email">Email</label>
                        </div>
                        <div class="form-group mb-3" style="padding-bottom: 1rem;">
                            <input type="phone" name="phone" class="form-control" id="phone" pattern="[0-9]{4}-[0-9]{7}" maxlength="11" oninput="formatPhone(this)" required value="" onchange="this.setAttribute('value', this.value);">
                            <label class="form-control-placeholder" for="email">Contact</label>
                        </div>
                        <div class="form-group mb-3" style="padding-bottom: 1rem;">
                            <input type="password" name="pass" class="form-control" id="temp" value="" onchange="this.setAttribute('value', this.value);">
                            <label class="form-control-placeholder" for="temp">Password</label>
                        </div>
                        <div class="form-group mb-3">
                            <input type="password" name="cpass" class="form-control" id="temp1" value="" onchange="this.setAttribute('value', this.value);">
                            <label class="form-control-placeholder" for="temp1">Confirm Password</label>
                        </div>
                        <div class="form-row ">
                            <div class="form-group col-md-12">
                                <label for="inputState">Select Role</label>
                                <select id="inputState" name="role" class="form-control">
                                    <?php
                                    foreach ($roles as $role) {
                                        echo "<option value='" . $role['id'] . "'>" . $role['Value'] . "</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-row ">
                            <div class="form-group col-md-12">
                                <label for="inputState">Select Gender</label>
                                <select id="inputState" name="gen" class="form-control">
                                    <?php
                                    foreach ($genders as $role) {
                                        echo "<option value='" . $role['id'] . "'>" . $role['Value'] . "</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group mb-0">
                            <button class="btn btn-primary" name="signUP" type="submit"> Register </button>
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
                        if (isset($_GET["status"]) && $_GET["status"] == 8) {
                            ?>
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <strong>Error!</strong> Phone number must be in form xxxx-xxxxxxx
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
    <script>
        function formatPhone(input) {
            var cnic = input.value.replace(/\D/g, '');
            if (cnic.length > 5) {
                cnic = cnic.substring(0, 4) + '-' + cnic.substring(7);
            }

            input.value = cnic;
        }
    </script>
    <!-- END: Template JS-->
</body>
<!-- END: Body-->

</html>