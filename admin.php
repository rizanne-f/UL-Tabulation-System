<?php
session_start();
$_SESSION['user'] = isset($_SESSION['user']) ? $_SESSION['user']:"";
if ($_SESSION['user']=="" || $_SESSION['user']['userid']!=1) {
    header('Location: login.php');
}
// header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
// header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
// header("Cache-Control: no-store, no-cache, must-revalidate");
// header("Cache-Control: post-check=0, pre-check=0", false);
// header("Pragma: no-cache");
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
    <!-- jQuery Custom Scroller CDN -->
    <script src="js/jquery.mCustomScrollbar.min.js"></script>


    <!-- Custom CSS -->
    <link rel="stylesheet" href="assets/styles/style.css">
    <!-- jQuery External File -->
    <script src="assets/scripts/admin-scoreProgress.js"></script>

    <title>UL Pageant</title>
</head>

<body>
    <div class="container-fluid px-0">
        <div class="header text-center py-4">
            <i class="fa-solid fa-crown fa-2x"></i>
            <h1>Mr. University of Luzon <?php echo date("Y"); ?></h1>
        </div>
        <div class="main p-4">
            <!-- <div id="progress">
                <img src="img/under-construction.gif">
            </div> -->
            <div id="list-scored" class="p-3 shadow"></div>
        </div>
    </div>
</body>

</html>