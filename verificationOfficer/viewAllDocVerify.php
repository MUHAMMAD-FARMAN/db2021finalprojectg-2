<?php
include("database.php");
    session_start();

    // Get all documents from database
    // $query = "SELECT DocTitle
    // FROM ApprovalApplications A 
    // INNER JOIN VerificationOfficer V on V.officerId = A.verificationOfficerId 
    // INNER JOIN Documents D on A.DocId = D.DocId
    // INNER JOIN Lookup L ON A.status = L.id
    // INNER JOIN Lookup L1 ON D.Type = L1.id
    // INNER JOIN Lookup L2 ON V.officerCategory = L2.id
    // WHERE L.Value = 'INPROGRESS' AND L1.Value = L2.Value ";

    $query2 = "SELECT * FROM Documents";
    $res = db::getRecords($query2);
    // get all documents in $res into a documents variable
    if($res != NULL)
    $documents = $res[0]["Doc Title"];
    else
    $documents = null;
    // print_r($documents);
    echo "<script> console.log('Documents: ' +." .$res[1]['Doc Title']."); </script>";
    $counter = 0;
    $counter2 = -1;

    
?>

<!DOCTYPE html>
<html lang="en">
<!-- START: Head-->

<!-- Mirrored from html.designstream.co.in/pick/html/app-filemanager.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 08 Apr 2023 06:11:25 GMT -->

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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- END Template CSS-->

    <!-- START: Custom CSS-->
    <link rel="stylesheet" href="dist/css/main.css">
    <!-- END: Custom CSS-->
</head>
<!-- END Head-->

<!-- START: Body-->

<body id="main-container" class="default">
    <!-- START: Pre Loader-->
    <!-- <div class="se-pre-con">
        <div class="loader"></div>
    </div> -->
    


    <!-- START: Header-->
    <div id="header-fix" class="header fixed-top">
        <div class="site-width">
            <nav class="navbar navbar-expand-lg  p-0">
                <div class="navbar-header  h-100 h4 mb-0 align-self-center logo-bar text-left">
                    <a href="index.html" class="horizontal-logo text-left">
                        <svg height="20pt" preserveAspectRatio="xMidYMid meet" viewBox="0 0 512 512" width="20pt"
                            xmlns="http://www.w3.org/2000/svg">
                            <g transform="matrix(.1 0 0 -.1 0 512)" fill="#1e3d73">
                                <path
                                    d="m1450 4481-1105-638v-1283-1283l1106-638c1033-597 1139-654 1139-619 0 4-385 674-855 1489-470 814-855 1484-855 1488 0 8 1303 763 1418 822 175 89 413 166 585 190 114 16 299 13 408-5 100-17 231-60 314-102 310-156 569-509 651-887 23-105 23-331 0-432-53-240-177-460-366-651-174-175-277-247-738-512-177-102-322-189-322-193s104-188 231-407l231-400 46 28c26 15 360 207 742 428l695 402v1282 1282l-1105 639c-608 351-1107 638-1110 638s-502-287-1110-638z" />
                                <path
                                    d="m2833 3300c-82-12-190-48-282-95-73-36-637-358-648-369-3-3 580-1022 592-1034 5-5 596 338 673 391 100 69 220 197 260 280 82 167 76 324-19 507-95 184-233 291-411 320-70 11-89 11-165 0z" />
                            </g>
                        </svg> <span class="h4 font-weight-bold align-self-center mb-0 ml-auto">PICK</span>
                    </a>
                </div>
                <div class="navbar-header h4 mb-0 text-center h-100 collapse-menu-bar">
                    <a href="#" class="sidebarCollapse" id="collapse"><i class="icon-menu"></i></a>
                </div>

                <form class="float-left d-none d-lg-block search-form">
                    <div class="form-group mb-0 position-relative">
                        <input type="text" class="form-control border-0 rounded bg-search pl-5"
                            placeholder="Search anything...">
                        <div class="btn-search position-absolute top-0">
                            <a href="#"><i class="h6 icon-magnifier"></i></a>
                        </div>
                        <a href="#" class="position-absolute close-button mobilesearch d-lg-none" data-toggle="dropdown"
                            aria-expanded="false"><i class="icon-close h5"></i>
                        </a>

                    </div>
                </form>
                <div class="navbar-right ml-auto h-100">
                    <ul class="ml-auto p-0 m-0 list-unstyled d-flex top-icon h-100">
                        <li class="d-inline-block align-self-center  d-block d-lg-none">
                            <a href="#" class="nav-link mobilesearch" data-toggle="dropdown" aria-expanded="false"><i
                                    class="icon-magnifier h4"></i>
                            </a>
                        </li>

                        <li class="dropdown align-self-center">
                            <a href="#" class="nav-link" data-toggle="dropdown" aria-expanded="false"><i
                                    class="icon-reload h4"></i>
                                <span class="badge badge-default"> <span class="ring">
                                    </span><span class="ring-point">
                                    </span> </span>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-right border  py-0">
                                <li>
                                    <a class="dropdown-item px-2 py-2 border border-top-0 border-left-0 border-right-0"
                                        href="#">
                                        <div class="media">
                                            <img src="dist/images/author.jpg" alt=""
                                                class="d-flex mr-3 img-fluid rounded-circle">
                                            <div class="media-body">
                                                <p class="mb-0">john</p>
                                                <span class="text-success">New user registered.</span>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item px-2 py-2 border border-top-0 border-left-0 border-right-0"
                                        href="#">
                                        <div class="media">
                                            <img src="dist/images/author2.jpg" alt=""
                                                class="d-flex mr-3 img-fluid rounded-circle">
                                            <div class="media-body">
                                                <p class="mb-0">Peter</p>
                                                <span class="text-success">Server #12 overloaded.</span>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item px-2 py-2 border border-top-0 border-left-0 border-right-0"
                                        href="#">
                                        <div class="media">
                                            <img src="dist/images/author3.jpg" alt=""
                                                class="d-flex mr-3 img-fluid rounded-circle">
                                            <div class="media-body">
                                                <p class="mb-0">Bill</p>
                                                <span class="text-danger">Application error.</span>
                                            </div>
                                        </div>
                                    </a>
                                </li>

                                <li><a class="dropdown-item text-center py-2" href="#"> See All Tasks <i
                                            class="icon-arrow-right pl-2 small"></i></a></li>
                            </ul>

                        </li>
                        <li class="dropdown align-self-center d-inline-block">
                            <a href="#" class="nav-link" data-toggle="dropdown" aria-expanded="false"><i
                                    class="icon-bell h4"></i>
                                <span class="badge badge-default"> <span class="ring">
                                    </span><span class="ring-point">
                                    </span> </span>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-right border   py-0">
                                <li>
                                    <a class="dropdown-item px-2 py-2 border border-top-0 border-left-0 border-right-0"
                                        href="#">
                                        <div class="media">
                                            <img src="dist/images/author.jpg" alt=""
                                                class="d-flex mr-3 img-fluid rounded-circle w-50">
                                            <div class="media-body">
                                                <p class="mb-0 text-success">john send a message</p>
                                                12 min ago
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item px-2 py-2 border border-top-0 border-left-0 border-right-0"
                                        href="#">
                                        <div class="media">
                                            <img src="dist/images/author2.jpg" alt=""
                                                class="d-flex mr-3 img-fluid rounded-circle">
                                            <div class="media-body">
                                                <p class="mb-0 text-danger">Peter send a message</p>
                                                15 min ago
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item px-2 py-2 border border-top-0 border-left-0 border-right-0"
                                        href="#">
                                        <div class="media">
                                            <img src="dist/images/author3.jpg" alt=""
                                                class="d-flex mr-3 img-fluid rounded-circle">
                                            <div class="media-body">
                                                <p class="mb-0 text-warning">Bill send a message</p>
                                                5 min ago
                                            </div>
                                        </div>
                                    </a>
                                </li>

                                <li><a class="dropdown-item text-center py-2" href="#"> Read All Message <i
                                            class="icon-arrow-right pl-2 small"></i></a></li>
                            </ul>
                        </li>
                        <li class="dropdown user-profile align-self-center d-inline-block">
                            <a href="#" class="nav-link py-0" data-toggle="dropdown" aria-expanded="false">
                                <div class="media">
                                    <img src="dist/images/author.jpg" alt="" class="d-flex img-fluid rounded-circle"
                                        width="29">
                                </div>
                            </a>

                            <div class="dropdown-menu border dropdown-menu-right p-0">
                                <a href="#" class="dropdown-item px-2 align-self-center d-flex">
                                    <span class="icon-pencil mr-2 h6 mb-0"></span> Edit Profile</a>
                                <a href="#" class="dropdown-item px-2 align-self-center d-flex">
                                    <span class="icon-user mr-2 h6 mb-0"></span> View Profile</a>
                                <div class="dropdown-divider"></div>
                                <a href="#" class="dropdown-item px-2 align-self-center d-flex">
                                    <span class="icon-support mr-2 h6  mb-0"></span> Help Center</a>
                                <a href="#" class="dropdown-item px-2 align-self-center d-flex">
                                    <span class="icon-globe mr-2 h6 mb-0"></span> Forum</a>
                                <a href="#" class="dropdown-item px-2 align-self-center d-flex">
                                    <span class="icon-settings mr-2 h6 mb-0"></span> Account Settings</a>
                                <div class="dropdown-divider"></div>
                                <a href="#" class="dropdown-item px-2 text-danger align-self-center d-flex">
                                    <span class="icon-logout mr-2 h6  mb-0"></span> Sign Out</a>
                            </div>

                        </li>

                    </ul>
                </div>
            </nav>
        </div>
    </div>
    <!-- END: Header-->



    <!-- START: Main Content-->
    <main>
        <div class="container-fluid site-width">
            <!-- START: Breadcrumbs-->
            <div class="row ">
                <div class="col-12  align-self-center">
                    <div class="sub-header mt-3 py-3 align-self-center d-sm-flex w-100 rounded">
                        <div class="w-sm-100 mr-auto">
                            <h4 class="mb-0">Verify Documents</h4>
                        </div>

                        <ol class="breadcrumb bg-transparent align-self-center m-0 p-0">
                            <li class="breadcrumb-item">Home</li>
                            <li class="breadcrumb-item active"><a href="#">Documents</a></li>
                        </ol>
                    </div>
                </div>
            </div>
            <!-- END: Breadcrumbs-->

            <!-- START: Card Data-->
            <div class="row row-eq-height">
                <div class="col-12 col-lg-2 mt-3 todo-menu-bar flip-menu pr-lg-0">
                    <a href="#" class="d-inline-block d-lg-none mt-1 flip-menu-close"><i class="icon-close"></i></a>
                    <div class="card border h-100 document-menu-section">
                        <div class="card-header d-flex justify-content-between align-items-center">

                            <!-- <a href="#" class="bg-primary py-2 px-2 rounded ml-auto text-white w-100 text-center"
                                data-toggle="modal" data-target="#newcontact">
                                <i class="icon-plus align-middle text-white"></i> <span
                                    class="d-none d-xl-inline-block">Add New File</span>
                            </a> -->

                        </div>

                        <ul class="nav flex-column document-menu">
                            <li class="nav-item">
                                <a class="nav-link active" href="#" data-documenttype="document">
                                    <i class="icon-list"></i> All
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#" data-documenttype="image-documents">
                                    <i class="icon-picture"></i> Images
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#" data-documenttype="video-documents">
                                    <i class="icon-camrecorder"></i> PDf
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#" data-documenttype="folder-documents">
                                    <i class="icon-folder"></i> Other
                                </a>
                            </li>

                        </ul>

                    </div>
                </div>
                <div class="col-12 col-lg-10 mt-3 pl-lg-0">
                    <div class="card border h-100 document-list-section">
                        <div class="card-header border-bottom p-1 d-flex">
                            <a href="#" class="d-inline-block d-lg-none flip-menu-toggle"><i class="icon-menu"></i></a>
                            <input type="text" class="form-control border-0 p-2 w-100 h-100 document-search"
                                placeholder="Search ...">
                            <a href="#" class="list-style search-bar-menu border-0 active"><i class="icon-list"></i></a>
                            <a href="#" class="grid-style search-bar-menu"><i class="icon-grid"></i></a>
                        </div>
                        <div class="card-body p-0">

                            <div class="documents list">
                            <?php
                            foreach ($documents as $document) {

                            ?>
                                <div class="document image-documents">
                                    <div class="document-content">
                                        <div class="document-profile">
                                            <img src="dist/images/portfolio1.jpg" alt="avatar"
                                                class="user-image img-fluid">
                                            <div class="document-info">
                                                <p class="document-name mb-0">portfolio1.jpg</p>
                                            </div>
                                        </div>
                                        <div class="document-email">
                                            <p class="mb-0 small">Name: </p>
                                            <p class="user-email"><?php echo $document; ?></p>
                                        </div>

                                        
                                        <div class="line-h-1 h5">
                                            <a class="text-success edit-document" href="#" data-toggle="modal"
                                                data-target="#" id=<?php $counter ?> ><i class="fa fa-check-circle"
                                                    style="font-size:24px;color:green" title="Approve"></i></a>
                                            <a class="text-danger delete-document" href="#" id=<?php $counter2 ?> ><i class="fa fa-times"
                                                    style="font-size:24px;color:red" title="Reject"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <?php
                            $counter++;
                            $counter2--;
                                }
                                ?>
                                <div class="document folder-documents">
                                    <div class="document-content">
                                        <div class="document-profile">
                                            <i class="icon-folder"></i>
                                            <div class="document-info">
                                                <p class="document-name mt-3">Product Images</p>
                                            </div>
                                        </div>
                                        <div class="document-email">
                                            <p class="mb-0 small">Size: </p>
                                            <p class="user-email">59.5kb</p>
                                        </div>

                                        <div class="document-phone">
                                            <p class="mb-0 small">Date Added: </p>
                                            <p class="user-phone">29 June 2020</p>
                                        </div>
                                        <div class="line-h-1 h5">
                                            <a class="text-success edit-document" href="#" data-toggle="modal"
                                                data-target="#"><i class="fa fa-check-circle"
                                                    style="font-size:24px;color:green" title="Approve"></i></a>
                                            <a class="text-danger delete-document" href="#"><i class="fa fa-times"
                                                    style="font-size:24px;color:red" title="Reject"></i></a>
                                        </div>
                                    </div>
                                </div>

                                <div class="document video-documents">
                                    <div class="document-content">
                                        <div class="document-profile">
                                            <i class="icon-camrecorder"></i>
                                            <div class="document-info">
                                                <p class="document-name mt-3">Introduction Video</p>
                                            </div>
                                        </div>
                                        <div class="document-email">
                                            <p class="mb-0 small">Size: </p>
                                            <p class="user-email">59.5kb</p>
                                        </div>

                                        <div class="document-phone">
                                            <p class="mb-0 small">Date Added: </p>
                                            <p class="user-phone">29 June 2020</p>
                                        </div>
                                        <div class="line-h-1 h5">
                                            <a class="text-success edit-document" href="#" data-toggle="modal"
                                                data-target="#"><i class="fa fa-check-circle"
                                                    style="font-size:24px;color:green" title="Approve"></i></a>
                                            <a class="text-danger delete-document" href="#"><i class="fa fa-times"
                                                    style="font-size:24px;color:red" title="Reject"></i></a>
                                        </div>
                                    </div>
                                </div>

                                <div class="document file-documents">
                                    <div class="document-content">
                                        <div class="document-profile">
                                            <i class="icon-doc"></i>
                                            <div class="document-info">
                                                <p class="document-name mt-3">Documentation</p>
                                            </div>
                                        </div>
                                        <div class="document-email">
                                            <p class="mb-0 small">Size: </p>
                                            <p class="user-email">59.5kb</p>
                                        </div>

                                        <div class="document-phone">
                                            <p class="mb-0 small">Date Added: </p>
                                            <p class="user-phone">29 June 2020</p>
                                        </div>
                                        <div class="line-h-1 h5">
                                            <a class="text-success edit-document" href="#" data-toggle="modal"
                                                data-target="#"><i class="fa fa-check-circle"
                                                    style="font-size:24px;color:green" title="Approve"></i></a>
                                            <a class="text-danger delete-document" href="#"><i class="fa fa-times"
                                                    style="font-size:24px;color:red" title="Reject"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="document image-documents">
                                    <div class="document-content">
                                        <div class="document-profile">
                                            <img src="dist/images/portfolio2.jpg" alt="avatar"
                                                class="user-image img-fluid">
                                            <div class="document-info">
                                                <p class="document-name mb-0">portfolio2.jpg</p>
                                            </div>
                                        </div>
                                        <div class="document-email">
                                            <p class="mb-0 small">Size: </p>
                                            <p class="user-email">59.5kb</p>
                                        </div>

                                        <div class="document-phone">
                                            <p class="mb-0 small">Date Added: </p>
                                            <p class="user-phone">29 June 2020</p>
                                        </div>
                                        <div class="line-h-1 h5">
                                            <a class="text-success edit-document" href="#" data-toggle="modal"
                                                data-target="#"><i class="fa fa-check-circle"
                                                    style="font-size:24px;color:green" title="Approve"></i></a>
                                            <a class="text-danger delete-document" href="#"><i class="fa fa-times"
                                                    style="font-size:24px;color:red" title="Reject"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="document image-documents">
                                    <div class="document-content">
                                        <div class="document-profile">
                                            <img src="dist/images/portfolio3.jpg" alt="avatar"
                                                class="user-image img-fluid">
                                            <div class="document-info">
                                                <p class="document-name mb-0">portfolio3.jpg</p>
                                            </div>
                                        </div>
                                        <div class="document-email">
                                            <p class="mb-0 small">Size: </p>
                                            <p class="user-email">59.5kb</p>
                                        </div>

                                        <div class="document-phone">
                                            <p class="mb-0 small">Date Added: </p>
                                            <p class="user-phone">29 June 2020</p>
                                        </div>
                                        <div class="line-h-1 h5">
                                            <a class="text-success edit-document" href="#" data-toggle="modal"
                                                data-target="#"><i class="fa fa-check-circle"
                                                    style="font-size:24px;color:green" title="Approve"></i></a>
                                            <a class="text-danger delete-document" href="#"><i class="fa fa-times"
                                                    style="font-size:24px;color:red" title="Reject"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="document image-documents">
                                    <div class="document-content">
                                        <div class="document-profile">
                                            <img src="dist/images/portfolio4.jpg" alt="avatar"
                                                class="user-image img-fluid">
                                            <div class="document-info">
                                                <p class="document-name mb-0">portfolio4.jpg</p>
                                            </div>
                                        </div>
                                        <div class="document-email">
                                            <p class="mb-0 small">Size: </p>
                                            <p class="user-email">59.5kb</p>
                                        </div>

                                        <div class="document-phone">
                                            <p class="mb-0 small">Date Added: </p>
                                            <p class="user-phone">29 June 2020</p>
                                        </div>
                                        <div class="line-h-1 h5">
                                            <a class="text-success edit-document" href="#" data-toggle="modal"
                                                data-target="#"><i class="fa fa-check-circle"
                                                    style="font-size:24px;color:green" title="Approve"></i></a>
                                            <a class="text-danger delete-document" href="#"><i class="fa fa-times"
                                                    style="font-size:24px;color:red" title="Reject"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="document image-documents">
                                    <div class="document-content">
                                        <div class="document-profile">
                                            <img src="dist/images/portfolio5.jpg" alt="avatar"
                                                class="user-image img-fluid">
                                            <div class="document-info">
                                                <p class="document-name mb-0">portfolio5.jpg</p>
                                            </div>
                                        </div>
                                        <div class="document-email">
                                            <p class="mb-0 small">Size: </p>
                                            <p class="user-email">59.5kb</p>
                                        </div>

                                        <div class="document-phone">
                                            <p class="mb-0 small">Date Added: </p>
                                            <p class="user-phone">29 June 2020</p>
                                        </div>
                                        <div class="line-h-1 h5">
                                            <a class="text-success edit-document" href="#" data-toggle="modal"
                                                data-target="#"><i class="fa fa-check-circle"
                                                    style="font-size:24px;color:green" title="Approve"></i></a>
                                            <a class="text-danger delete-document" href="#"><i class="fa fa-times"
                                                    style="font-size:24px;color:red" title="Reject"></i></a>
                                        </div>
                                    </div>
                                </div>



                            </div>


                        </div>
                    </div>
                </div>
            </div>
            <!-- END: Card DATA-->
        </div>
    </main>
    <!-- END: Content-->

    <?php
    // function to delete document from Documents table
    if (isset($_GET['delete'])) {
        $delete_id = $_GET['delete'];
        $delete_query = "DELETE FROM documents WHERE id = '$delete_id'";
        $delete_result = mysqli_query($connection, $delete_query);
        if ($delete_result) {
            header("Location: documents.php");
        } else {
            die("Delete failed" . mysqli_error($connection));
        }
    }

    ?>



    <!-- START: Footer-->
    <footer class="site-footer">
        2020 © PICK
    </footer>
    <!-- END: Footer-->


    <!-- START: Back to top-->
    <a href="#" class="scrollup text-center">
        <i class="icon-arrow-up"></i>
    </a>
    <!-- END: Back to top-->

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

    <!-- START: Page JS-->
    <script src="dist/js/app.filemanager.js"></script>
    <!-- END: Page JS-->
</body>
<!-- END: Body-->

<!-- Mirrored from html.designstream.co.in/pick/html/app-filemanager.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 08 Apr 2023 06:11:59 GMT -->

</html>