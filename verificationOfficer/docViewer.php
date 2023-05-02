<?php
// include 'database.php';
// include 'header.php';
$DocTitle = 'DOCUMENT1'; ?>

<head>
    <!-- START: Template CSS-->
    <link rel="stylesheet" href="dist/vendors/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="dist/vendors/jquery-ui/jquery-ui.min.css">
    <link rel="stylesheet" href="dist/vendors/jquery-ui/jquery-ui.theme.min.css">
    <link rel="stylesheet" href="dist/vendors/simple-line-icons/css/simple-line-icons.css">
    <link rel="stylesheet" href="dist/vendors/flags-icon/css/flag-icon.min.css">
    <!-- END Template CSS-->

    <!-- START: Custom CSS-->
    <!-- <link rel="stylesheet" href="dist/css/main.css"> -->
    <!-- END: Custom CSS-->
</head>
<main>
    <div class="container-fluid" style="margin-right: 500px">
        <div style="margin-top:80px">
        </div>
        <!-- START: Card Data-->
        <div class="row">
            <div class="col-12 mt-3">
                <div class="row">
                    <div class="col-12 col-md-12 mt-12">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h4 class="card-title"><?php echo $DocTitle; ?></h4>
                            </div>
                            <div class="card-body d-flex" style="margin-bottom: auto">
  <div class="column" style="width: 200px; display: inline-block;">
    <div class="row">
      <h4 class="mb-0" style="margin-left: 20px; margin-right: 50px"><?php echo $DocTitle; ?></h4>
    </div>
    <div class="row">
      <h4 class="mb-0" style="margin-left: 20px; margin-right: 50px"><?php echo $DocTitle; ?></h4>
    </div>
    <div class="row">
      <h4 class="mb-0" style="margin-left: 20px; margin-right: 50px"><?php echo $DocTitle; ?></h4>
    </div>
  </div>
  <div class="column">
    <div class="col-md-6 ml-6">
      <textarea class="form-control" id="validationDefault01" name="" id="" cols="10" rows="10" placeholder="Write here.."></textarea>
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
// include 'database.php';
// include 'footer.php';
?>
<!-- <head>
    <link rel="stylesheet" href="dist/css/docViewer.css">
</head>
<main>
<div class="container-fluid">
   <div class="dashhead">
      <div class="dashhead-titles">
        <h6 class="dashhead-subtitle">Results</h6>
        <h3 class="dashhead-title">Patient List</h3>
      </div>

      <div class="btn btn-primary">
         <div class="dashhead-toolbar-item">
               <a id="btnShow" 
                  class="btn btn-primary"
                  role="button" 
                  aria-disabled="true">Open DocViewer</a>
         </div>
      </div>
   </div>
  <div class="">&nbsp;</div>
  
<div class="modal modal-wide" id="docViewer">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4> Selected Documents</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body modal-body-scroller">



  <div class="well">
    <div class="row">
       <div class="col-md-3">
          <div class="panel panel-info">
             <div class="panel-heading"></div>
                <div id="docLinksList" class="list-group">
                   <a class="list-group-item" href="#" id="12134">
                     <h4 class="list-group-item-heading">
                     <span class="glyphicon glyphicon-file" aria-hidden="true"></span>
                      Document 1</h4>
                      <p class="list-group-item-text">2015-01-04 12:35:44</p>
                   </a>
             
                   <a class="list-group-item" href="#" id="22134">
                      <h4 class="list-group-item-heading">
                        <span class="glyphicon glyphicon-file" aria-hidden="true"></span>
                        Document 2</h4>
                      <p class="list-group-item-text">2014-03-04 12:35:44</p>
                   </a>
 <a class="list-group-item" href="#" id="22134">
                      <h4 class="list-group-item-heading">
                        <span class="glyphicon glyphicon-file" aria-hidden="true"></span>
                        Document 2</h4>
                      <p class="list-group-item-text">2014-03-04 12:35:44</p>
                   </a>
                   <a class="list-group-item" href="#" id="22134">
                      <h4 class="list-group-item-heading">
                        <span class="glyphicon glyphicon-file" aria-hidden="true"></span>
                        Document 2</h4>
                      <p class="list-group-item-text">2014-03-04 12:35:44</p>
                   </a>
                   <a class="list-group-item" href="#" id="22134">
                      <h4 class="list-group-item-heading">
                        <span class="glyphicon glyphicon-file" aria-hidden="true"></span>
                        Document 2</h4>
                      <p class="list-group-item-text">2014-03-04 12:35:44</p>
                   </a>
                   <a class="list-group-item" href="#" id="22134">
                      <h4 class="list-group-item-heading">
                        <span class="glyphicon glyphicon-file" aria-hidden="true"></span>
                        Document 2</h4>
                      <p class="list-group-item-text">2014-03-04 12:35:44</p>
                   </a>
                   <a class="list-group-item" href="#" id="22134">
                      <h4 class="list-group-item-heading">
                        <span class="glyphicon glyphicon-file" aria-hidden="true"></span>
                        Document 2</h4>
                      <p class="list-group-item-text">2014-03-04 12:35:44</p>
                   </a>
                </div> <!-- docLinksList -->

<!-- <div class="panel-footer" style="padding: 8px 10px 4px; font-weight: bold; font-size: .75em">Click on a document above -->
<!-- to view.</div> panel-footer -->
<!-- </div> navPanel -->
<!-- </div> left column -->
<!-- <div class="col-md-8">
    <div class="panel panel-info"> -->
<!-- <div id="docName" class="panel-heading"><b>NAME</b></div>
        <div id="docContents" class="panel-body">
            <iframe id="docPdf" width="100%" height="100%" seamless></iframe>
        </div> -->
<!-- </div> contentViewer -->
<!-- </div> rightCol -->
<!-- </div> row -->
<!-- </div> container -->



<!-- </div> modal-body -->
<!-- </div> modal-content -->
<!-- </div> row -->
<!-- </div> container -->
<!-- </main>
<script>
$('#btnShow').click(function() {
    $('#docViewer').show();
});

$(".modal-wide").on("show.bs.modal", function() {
    var height = $(window).height() - 200;
    $(this).find(".modal-body").css("max-height", height);
});
</script> -->