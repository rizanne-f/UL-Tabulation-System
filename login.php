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

    <link rel="stylesheet" href="assets/styles/login-style.css">

    <script src="assets/scripts/login.js"></script>

    <title>Log In</title>

</head>

<body>
    <!-- <div id="bg-image"></div> -->
    <div class="wrapper">
        <div class="card">
            <div class="card-header">
                <h2><i class="fa-solid fa-right-to-bracket"></i> USER LOGIN</h2>
            </div>
            <div class="card-body">
                <form>
                    <?php
                    include("assets/scripts/conn.php");
                    $sql = "SELECT id, judge_id, username FROM users";
                    $result = $conn->query($sql);
                    // Creates Select Menu with updated ID and Name from Users table in the DB
                    echo '<div class="input-group mb-3">';
                    echo '<div class="input-group-prepend">';
                    echo '<label class="input-group-text" for="judge-select"><i class="fas fa-user"></i></label>';
                    echo '</div>';
                    echo '<select class="custom-select" id="judge-select">';
                    echo '<option value="" selected>Select Judge</option>';
                    while ($row = $result->fetch_assoc()) {
                        echo '<option data-userId="'.$row['id'].'" data-judgeId="'.$row['judge_id'].'" value="'.$row['username'].'">'.$row['username'].'</option>';
                    }
                    echo '</select>';
                    echo '</div>';
                    $conn->close();
                    ?>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <label class="input-group-text border-right-0" for="password"><i class="fa-solid fa-lock"></i></label>
                        </div>
                        <input type="password" class="form-control" id="password" placeholder="Enter Password" autocomplete="off">
                    </div>
                    <input type="submit" class="btn btn-danger" id="login-btn" value="Log In" autocomplete="off">
                </form>
            </div>
        </div>
    </div>
</body>

</html>