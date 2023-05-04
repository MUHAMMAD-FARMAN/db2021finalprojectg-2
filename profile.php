<?php
    include 'header.php';
    include 'database.php';
    session_start();
    $userId = $_SESSION["user"];
    //get user info
    $user = db::getRecord("SELECT * FROM Person WHERE BFormNo = '$userId'");
    $firstName = $user['FirstName'];
    $lastName = $user['LastName'];
    $email = $user['Email'];
    $contact = $user['Contact'];

?>

<!-- START: Main Content-->
<main>
    <div class="container-fluid site-width">
        <!-- START: Breadcrumbs-->
        <div class="row ">
            <div class="col-12  align-self-center">
                <div class="sub-header mt-3 py-3 align-self-center d-sm-flex w-100 rounded">
                    <div class="w-sm-100 mr-auto">
                        <h4 class="mb-0">Profile</h4>
                    </div>

                    <ol class="breadcrumb bg-transparent align-self-center m-0 p-0">
                        <li class="breadcrumb-item">Home</li>
                        <li class="breadcrumb-item">Page</li>
                        <li class="breadcrumb-item active"><a href="#">Profile</a></li>
                    </ol>
                </div>
            </div>
        </div>
        <!-- END: Breadcrumbs-->

        <!-- START: Card Data-->
        <div class="row">
            <div class="col-12 col-md-6 mt-4">
                <div class="card">
                    <div class="card-header  justify-content-between align-items-center">
                        <h4 class="card-title">User Information</h4>
                    </div>
                    <div class="card-body">
                        <form action="updateUserLogic.php" method="post">
                            <div class="form-group">
                                <input type="text" value="<?php echo $firstName?>" name="fname" class="form-control" placeholder="First Name:">
                            </div>
                            <div class="form-group">
                                <input type="text" value="<?php echo $lastName?>" name="lname" class="form-control" placeholder="Last Name:">
                            </div>
                            <div class="form-group">
                                <input type="email" value="<?php echo $email?>" name="email" class="form-control" placeholder="Email:">
                            </div>
                            <div class="form-group">
                            <input type="phone" name="contact" class="form-control" id="phone" pattern="[0-9]{4}-[0-9]{7}" maxlength="12" oninput="formatPhone(this)" required value="<?php echo $contact;?>" onchange="this.setAttribute('value', this.value);">
                            </div>
                            <?php
                                if(isset($_GET["status"]))
                                {
                                    if($_GET["status"] == 0)
                                    {
                                        ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>Error!</strong> Data Not updated
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <?php
                                    }
                                    else if($_GET["status"] == 1)
                                    {
                                        ?>
                                    <div class="alert alert alert-dismissible fade show" role="alert">
                            <strong>Good!</strong> Data updated
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <?php
                                    }
                                    else if($_GET["status"] == 2)
                                    {
                                        ?>
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>Error!</strong> Submitted same data
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div><?php
                                    }
                                    else if($_GET["status"] == 3)
                                    {

                                        ?>
                                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>Error!</strong> Fill all of the fields
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                                        </div>
                            <?php
                                    }
                                }
                            ?>
                            <input type="submit" name="update" class="btn btn-primary btn-default">
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-6 mt-4">
                <div class="card">
                    <div class="card-header  justify-content-between align-items-center">
                        <h4 class="card-title">Feedback</h4>
                    </div>
                    <div class="card-body">
                        <form action="feedback.php" method="post">
                            <div class="form-group">
                                <textarea name="Description" class="form-control" placeholder="Message:"></textarea>
                            </div>
                            <?php
                            if(isset($_GET["status"]))
                            {
                                    if($_GET["status"] == 4)
                                    {
                                        ?>
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>Error!</strong> Feedback is not updated
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div><?php
                                    }
                                    else if($_GET["status"] == 5)
                                    {

                                        ?>
                                        <div class="alert alert alert-dismissible fade show" role="alert">
                            <strong>Congrats!</strong> Feedback recorded
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                                        </div>
                            <?php
                                    }
                                }
                            ?>
                            <input type="submit" name="Feedback" class="btn btn-primary btn-default">
                        </form>
                    </div>
                </div>
            </div>
            <!-- <div class="col-12 col-md-6 mt-4">
                <div class="card">
                    <div class="card-header  justify-content-between align-items-center">
                        <h4 class="card-title">Contact us</h4>
                    </div>
                    <div class="card-body">
                        <address>
                            <strong>Loop, Inc.</strong><br>
                            795 Park Ave, Suite 120<br>
                            San Francisco, CA 94107<br>
                            <abbr title="Phone">P: </abbr> (234) 145-1810
                        </address>
                        <address>
                            <strong>Email</strong><br>
                            <a href="mailto:#" class="redial-primary redial-font-weight-600">first.last@email.com </a>
                        </address>
                        <div class="text-left">

                            <a href="#" class="btn btn-social btn-dropbox text-white mb-2">
                                <i class="ion ion-social-dropbox"></i>
                            </a>
                            <a href="#" class="btn btn-social btn-facebook text-white mb-2">
                                <i class="ion ion-social-facebook"></i>
                            </a>
                            <a href="#" class="btn btn-social btn-github text-white mb-2">
                                <i class="ion ion-social-github"></i>
                            </a>
                            <a href="#" class="btn btn-social btn-google text-white mb-2">
                                <i class="ion ion-social-google"></i>
                            </a>
                            <a href="#" class="btn btn-social btn-instagram text-white mb-2">
                                <i class="ion ion-social-instagram"></i>
                            </a>
                            <a href="#" class="btn btn-social btn-linkedin text-white mb-2">
                                <i class="ion ion-social-linkedin"></i>
                            </a>
                            <a href="#" class="btn btn-social btn-pinterest text-white mb-2">
                                <i class="ion ion-social-pinterest"></i>
                            </a>
                            <a href="#" class="btn btn-social btn-tumblr text-white mb-2">
                                <i class="ion ion-social-tumblr"></i>
                            </a>
                            <a href="#" class="btn btn-social btn-twitter text-white mb-2">
                                <i class="ion ion-social-twitter"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div> -->

        </div>
        <!-- END: Card DATA-->
    </div>
</main>
<!-- END: Content-->
<script src="dist/vendors/jquery/jquery-3.3.1.min.js"></script>
    <script src="dist/vendors/jquery-ui/jquery-ui.min.js"></script>
    <script src="dist/vendors/moment/moment.js"></script>
    <script src="dist/vendors/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="dist/vendors/slimscroll/jquery.slimscroll.min.js"></script>
    <script>
        function formatPhone(input) {
            var cnic = input.value.replace(/\D/g, '');
            if (cnic.length > 4) {
                cnic = cnic.substring(0, 4) + '-' + cnic.substring(4);
            }
            if (cnic.length > 12) {
                cnic = cnic.substring(0, 12) + '-' + cnic.substring(12);
            }

            input.value = cnic;
        }
    </script>




<?php
    include 'footer.php';
?>