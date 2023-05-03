<?php
session_start();

$pdfData = base64_decode($_SESSION['pdf']);

header('Content-type: application/pdf');

?>
<main>
    <div class="container-fluid">
        <div class="container">
            <div class="row vh-100 justify-content-between align-items-center">
                <div class="col-12">
                    <embed src="data:application/pdf;base64,<?php echo $pdfData; ?>" type="application/pdf" width="100%" height="600px" />
                </div>
            </div>
        </div>
    </div>
</main>
