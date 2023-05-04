<?php
include("header.php");
include("database.php");
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
}
$id = $_SESSION['user'];
$sql = "SELECT DocTitle, DocumentCode FROM Documents d inner join lookup l on d.Status = l.id WHERE UserId = '$id' and l.Value!='FROZEN'";
$results = db::getRecords($sql);
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
                                    <a class="nav-link  py-2 px-3 px-lg-4  " href="uploadDoc.php"> Upload Document</a>
                                </li>
                                <li class="nav-item ml-0">
                                    <a class="nav-link  py-2 px-3 px-lg-4 " href="verifyDoc.php">Verify
                                        Document</a>
                                </li>
                                <li class="nav-item ml-0">
                                    <a class="nav-link  py-2 px-4 px-lg-4 " href="freezeDoc.php">Freeze Doc</a>
                                </li>
                                <li class="nav-item ml-0">
                                    <a class="nav-link  py-2 px-4 px-lg-4 " href="searchOrgz.php">Search
                                        Organization</a>
                                </li>
                                <li class="nav-item ml-0">
                                    <a class="nav-link py-2 px-4 px-lg-4 " href="searchDoc.php">Search </a>
                                </li>
                                <li class="nav-item ml-0 mb-2 mb-sm-0">
                                    <a class="nav-link py-2 px-4 px-lg-4 active" href="shareDoc.php">Share</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-md-12 mt-12">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h4 class="card-title">Share document</h4>
                            </div>

                            <div class="card-body">
                                <form>
                                    <div class="form-row ">
                                        <div class="form-group col-md-6">
                                            <label for="inputState">Select Document</label>
                                            <select id="inputState" class="form-control">
                                                <option value="" selected>Choose...</option>
                                                <?php
                                                    foreach($results as $row)
                                                    {
                                                        ?>
                                                        <option value= <?php echo $row['DocumentCode'];?> > <?php echo $row['DocTitle'];?></option>;
                                                        <?php
                                                    }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-row ">
                                        <div class="col-md-6 mb-3">
                                            <label for="validationDefault01">Readonly</label>
                                            <input type="text" class="form-control" id="validationDefault01"
                                                placeholder="Readonly" value="" readonly>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</main>
<script>
    document.getElementById('inputState').addEventListener('change', function() {
        document.getElementById('validationDefault01').value = this.value;
    });
</script>
<?php
include("footer.php");
?>