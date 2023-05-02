<?php
    include 'header.php';
    include 'database.php';
    session_start();
    $user = $_SESSION["BFormNo"];

    $query = "SELECT * from Documents as d inner join metaData as m on m.DocId = d.DocId where UserId = '$user' and IsDeleted = 0";
    $docs = db::getRecords($query);
    function formatSize($bytes)
    {
        $units = array('B', 'KB', 'MB', 'GB', 'TB');

        $i = 0;
        while ($bytes >= 1024 && $i < count($units) - 1) {
            $bytes /= 1024;
            $i++;
        }

        return round($bytes, 2) . ' ' . $units[$i];
    }
    
?>

<!-- START: Main Content-->
<main>
    <div class="container-fluid site-width">
        <!-- START: Breadcrumbs-->
        <div class="row ">
            <div class="col-12  align-self-center">
                <div class="sub-header mt-3 py-3 align-self-center d-sm-flex w-100 rounded">
                    <div class="w-sm-100 mr-auto">
                        <h4 class="mb-0">View All Docs</h4>
                    </div>

                    <ol class="breadcrumb bg-transparent align-self-center m-0 p-0">
                        <li class="breadcrumb-item">Home</li>
                        <li class="breadcrumb-item">App</li>
                        <li class="breadcrumb-item active"><a href="#">View All Docs</a></li>
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

                        <a href="#" class="bg-primary py-2 px-2 rounded ml-auto text-white w-100 text-center"
                            data-toggle="modal" data-target="#newcontact">
                            <i class="icon-plus align-middle text-white"></i> <span class="d-none d-xl-inline-block">Add
                                New File</span>
                        </a>

                    </div>

                </div>
            </div>
            <div class="col-12 col-lg-10 mt-3 pl-lg-0">
                <div class="card border h-100 document-list-section">
                    <div class="card-header border-bottom p-1 d-flex">
                        <a href="#" class="d-inline-block d-lg-none flip-menu-toggle"><i class="icon-menu"></i></a>
                        <input type="text" class="form-control border-0 p-2 w-100 h-100 document-search"
                            placeholder="Search ...">
                        <!-- <a href="#" class="list-style search-bar-menu border-0 active"><i class="icon-list"></i></a>
                        <a href="#" class="grid-style search-bar-menu"><i class="icon-grid"></i></a> -->
                    </div>
                    <div class="card-body p-0">

                        <div class="documents list">

                            <?php 
                            
                             foreach($docs as $doc){
                                $size = formatSize($doc['FileSize']);
                                $s = $doc['Status'];
                                $query = "SELECT l.Value FROM Lookup as l inner join Documents as d on d.[Status] = l.id where l.id = $s";
                                $status = db::getRecord($query);
                                
                                $edate = $doc['expiryDate'];
                            ?>
                            <div class="document folder-documents">
                                <div class="document-content">
                                    <div class="document-profile">
                                        <i class="icon-picture"></i>
                                        <div class="document-info">
                                            <p class="document-name mt-3">
                                                <?php echo "<a style= 'userselec'>" . $doc['DocTitle'] . " </a>" ?>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="document-email">
                                        <p class="mb-0 small">Size: </p>
                                        <p class="user-email">
                                            <?php 
                                            echo $size;
                                            ?>
                                        </p>
                                    </div>

                                    <div class="document-email">
                                        <p class="mb-0 small">Status: </p>
                                        <p class="user-email">
                                            <?php echo $status['Value']; ?></p>
                                    </div>
                                    <div class="document-phone">
                                        <p class="mb-0 small">Expiry Date: </p>
                                        <p class="user-phone">
                                            <?php 
                                            $newDate = date("d-m-Y", strtotime($edate));
                                            echo  $newDate;
                                            ?>

                                        </p>
                                    </div>
                                    <div class="line-h-1 h5">

                                        <a class="text-success edit-document" href="docViewer.php?status=<?php echo $doc['DocId']?>" data-toggle=" modal"
                                            data-target="#"><i class="icon-eye"></i></a>
                                        <a class="text-danger delete-document" href="docDelLogic.php?status=<?php echo $doc['DocId']?>"><i class="icon-trash"></i></a>
                                    </div>
                                </div>
                            </div>

                            <?php
                                }
                            ?>
                        </div>


                    </div>
                </div>
            </div>
        </div>
        <!-- END: Card DATA-->
    </div>
</main>
<!-- END: Content-->

<!-- <script>
  const urlParams = new URLSearchParams(window.location.search);
  const num = urlParams.get('num');
  console.log(num);
</script> -->

<?php
    include 'footer.php';
?>