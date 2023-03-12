<?php
session_start();
$_SESSION['user'] = isset($_SESSION['user']) ? $_SESSION['user']:"";
if ($_SESSION['user']=="" || $_SESSION['user']['userid']!=1) {
    header('Location: login.php');
}
header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-store, no-cache, must-revalidate");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <!-- Font Awesome JS -->
    <script defer src="js/solid.js"></script>
    <script defer src="js/fontawesome.js"></script>
    <!-- jQuery CDN - Slim version (=without AJAX) -->
    <script src="js/jquery3.4.min.js"></script>
    <!-- Popper.JS -->
    <script src="js/popper.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Custom CSS -->
    <link rel="stylesheet" href="assets/styles/style.css">
    <!-- jQuery External File -->
    <script src="assets/scripts/admin-scoreProgress.js"></script>

    <title>Admin Page</title>
</head>

<body>
    <div class="container-fluid px-0">
        <div class="header text-center py-4">
            <i class="fa-solid fa-crown fa-2x"></i>
            <h2>Mr. & Ms. University of Luzon <?php echo date("Y"); ?></h2>
        </div>
        <div class="main p-4">
            
            <!-- Tallies the Number of Scored Candidates -->
            <div class="table-bg mb-3">
            <h4 class="p-3 m-0 heading">Number of Scored Candidates</h4>
                <div class="row">
                    <div class="col">
                        <div id="list-scored" class="p-2"></div>
                    </div>
                </div>
            </div>

            <!-- Top 5 Mr. UL Candidates -->
            <div class="table-bg mb-3">
                <h4 class="p-3 m-0 heading">Mr. UL Top 5 Candidates</h4>
                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4 justify-content-between">
                    <div class="col">
                        <div id="mrul-interview-top5" class="p-2"></div>
                    </div>
                    <div class="col">
                        <div id="mrul-swimwear-top5" class="p-2"></div>
                    </div>
                    <div class="col">
                        <div id="mrul-formal-top5" class="p-2"></div>
                    </div>
                    <div class="col">
                        <div id="mrul-overall-top5" class="p-2"></div>
                    </div>
                </div>
            </div>

            <!-- Top 5 Ms. UL Candidates -->
            <div class="table-bg">
                <h4 class="p-3 m-0 heading">Ms. UL Top 5 Candidates</h4>
                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4 justify-content-between">
                    <div class="col">
                        <div id="msul-interview-top5" class="p-2"></div>
                    </div>
                    <div class="col">
                        <div id="msul-swimwear-top5" class="p-2"></div>
                    </div>
                    <div class="col">
                        <div id="msul-formal-top5" class="p-2"></div>
                    </div>
                    <div class="col">
                        <div id="msul-overall-top5" class="p-2"></div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</body>

</html>