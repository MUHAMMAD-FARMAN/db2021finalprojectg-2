<?php
include("header.php");
include("database.php");

session_start();
//  echo "<script>alert('".$_SESSION["verOfficerId"]."')</script>";

// Get no. of new applications from database
$query = "SELECT COUNT(*) AS count FROM ApprovalApplications A INNER JOIN VerificationOfficer V on V.officerId = A.verificationOfficerId INNER JOIN Documents D on A.DocId = D.DocId INNER JOIN Lookup L ON A.status = L.id WHERE L.Value = 'INPROGRESS' AND L.Category = 'APPLSTATUS' GROUP BY V.officerId HAVING V.officerId =  '".$_SESSION["verOfficerId"]."'";
$res = db::getRecord($query);
if($res == null)
    $count = 0;
else
    $count = $res['count'];


// Get no. of approved applications from database
$query1 = "SELECT COUNT(*) AS count FROM ApprovalApplications INNER JOIN VerificationOfficer V on V.officerId = ApprovalApplications.verificationOfficerId GROUP BY V.OfficerId HAVING V.OfficerId = '".$_SESSION["verOfficerId"]."'";
$res1 = db::getRecord($query1);
if($res1 == null)
    $apprvApp = 0;
else
$apprvApp = $res1['count'];



?>

<main>
<div class="container-fluid site-width">
    <div class="row">
        <div class="col-12 col-sm-6 col-xl-3 mt-3">
            <div class="card bg-primary text-white h-100">
                <div class="card-body text-center p-3 d-flex">
                    <div class="align-self-center text-center w-100">
                        <span class="icon-people h1 bg-primary text-white shadow-circle p-3 rounded-circle"></span>
                        <?php
                        echo "<h2 class='card-title font-weight-bold mt-4'>$count</h2>";
                        ?>
                        <span class="h4">New Applications</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-xl-3 mt-3">
            <div class="card bg-primary text-white h-100">
                <div class="card-body text-center p-3 d-flex">
                    <div class="align-self-center text-center w-100">
                        <span class="icon-people h1 bg-primary text-white shadow-circle p-3 rounded-circle"></span>
                        <?php
                        echo "<h2 class='card-title font-weight-bold mt-4'>$apprvApp</h2>";
                        ?>
                        <span class="h4">No. of Total Applications Reviewed</span>
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