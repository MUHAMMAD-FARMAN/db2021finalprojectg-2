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
                                    <a class="nav-link  py-2 px-3 px-lg-4  active" data-toggle="tab" href="chpass.php"> Change Password</a>
                                </li>
                                <li class="nav-item ml-0">
                                    <a class="nav-link  py-2 px-4 px-lg-4 " data-toggle="tab" href="#about"> About</a>
                                </li>
                                <li class="nav-item ml-0">
                                    <a class="nav-link py-2 px-4 px-lg-4" data-toggle="tab" href="#activities">Activities </a>
                                </li>
                                <li class="nav-item ml-0 mb-2 mb-sm-0">
                                    <a class="nav-link py-2 px-4 px-lg-4" data-toggle="tab" href="#message"> Message</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 mt-3">
                        <div class="card">
                            <div class="card-header">                               
                                <h4 class="card-title">Change Password</h4>                                
                            </div>
                            <div class="card-content">
                                <div class="card-body">
                                    <div class="row">                                           
                                        <div class="col-12 ">
                                            <form>
                                                <div class="form-row" >
                                                    <div class="col-md-6 mb-3 " >
                                                        <label for="validationTooltip03">Old Password</label>
                                                        <input type="text" class="form-control" id="validationTooltip03" minlength="8" placeholder="Old Password" required>
                                                        <div class="invalid-tooltip">
                                                            Please enter correct password.
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="col-md-6 mb-3">
                                                        <label for="validationTooltip03">New Password</label>
                                                        <input type="password" class="form-control" id="validationTooltip03" minlength="8" placeholder="New Password" required>
                                                        <div class="invalid-tooltip">
                                                            This field is required.
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-row ">
                                                    <div class="col-md-6 mb-3">
                                                        <label for="validationTooltip03">Confirm Password</label>
                                                        <input type="password" class="form-control" id="validationTooltip03" placeholder="Confirm Password" minlength="8" required>
                                                        <div class="invalid-tooltip">
                                                            This field is required.
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="form-check ">
                                                        <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
                                                        <label class="form-check-label" for="invalidCheck">
                                                        You are sure to Change Password?
                                                        </label>
                                                        <div class="invalid-feedback">
                                                            You must agree before submitting.
                                                        </div>
                                                    </div>
                                                </div>
                                                <button class="btn btn-primary" type="submit">Submit form</button>
                                            </form>
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