<?php
include("header.php");
?>
<main>
    <div class="container-fluid site-width">
        <!-- START: Breadcrumbs-->
        <div class="row ">
            <div class="col-12  align-self-center">
                <div class="sub-header mt-3 py-3 align-self-center d-sm-flex w-100 rounded">

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
            <div class="col-12 col-md-12 mt-4">
                <div class="card">
                    <div class="card-header  justify-content-between align-items-center">
                        <h4 class="card-title">Enter Document Code</h4>
                    </div>
                    <div class="card-body">
                        <form action="docViewer.php" method="post">
                            <div class="form-group">
                                <input type="text" value="" name="docCode" class="form-control" placeholder="Doc Code">
                            </div>
                            <?php
                                if(isset($_GET["status"]))
                                {
                                    if($_GET["status"] == 0)
                                    {
                                        ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>Error!</strong> Dacument Not Found.
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
        </div>
        <!-- END: Card DATA-->
    </div>
</main>
<!-- END: Content-->


<?php
include("footer.php");
?>