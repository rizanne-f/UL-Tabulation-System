<?php
session_start();
$_SESSION['user'] = isset($_SESSION['user']) ? $_SESSION['user']:"";
if ($_SESSION['user']=="" || $_SESSION['user']['userid']==1) {
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
    <!-- jQuery Custom Scroller CDN -->
    <script src="js/jquery.mCustomScrollbar.min.js"></script>
    

    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="assets/styles/style.css">
    <!-- jQuery External File -->
    <script src="assets/scripts/display-scores.js"></script>

    <title>UL Pageant</title>
</head>

<body>

    <div class="container-fluid px-0">

        <!-- Header -->
        <div class="header text-center py-3">
            <i class="fa-solid fa-crown fa-2x"></i>
            <h1>Mr. University of Luzon <?php echo date("Y")?></h1>
        </div>

        <!-- Main Content -->
        <div class="main pt-2 px-3">
            <div class="row">

                <div class="col-9">
                    <div class="pt-2 rounded shadow scores-view">

                        <!-- Search Bar -->
                        <div class="container-fluid" id="searchbar">
                            <div class="right-inner-addon">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class='fas fa-search'></i></span>
                                    </div>
                                    <input class="mr-2 form-control" type="text" placeholder="Search Candidate Name" id="text-content" size="40">
                                </div>
                            </div>
                        </div>

                        <!-- Display Scores Table -->
                        <div id="list-display" class="container-fluid text-left mt-3"></div>

                    </div>
                </div>

                <div class="col pl-0">
                    <!-- Display Contestant Image -->
                    <div id="preview-container">
                        <div id="preview" class="shadow">
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>
    <!-- Current User -->
    <div id="judge-info">
        <?php echo "Judge: " . $_SESSION['user']['username'] ?>
    </div>
</body>

</html>