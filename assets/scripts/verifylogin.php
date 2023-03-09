<?php
session_start();
error_reporting(0);

include("conn.php");  

$username = $_GET['username'];
$password = $_GET['password'];
$userid = $_GET['userId'];
$judgeid = $_GET['judgeId'];

$userArray = array(
  "username" => $username,
  "userid" => $userid,
  "judgeid" => $judgeid
);

$query = "SELECT id FROM users WHERE username = ? AND password = ?";
$SQL = $conn->prepare($query);
$SQL->bind_param("ss",$username, $password);
$SQL->execute();

$results = $SQL->get_result();
$rowcount = mysqli_num_rows($results);

if ($rowcount > 0) {
    // If username and password matches a record, set $_SESSION superglobal var
    $_SESSION['user'] = $userArray;
    $response = array("status" => "success");
    echo json_encode($response);
  } else {
    // If username and password did not match a record, unset $_SESSION
    unset($_SESSION['user']);
    $response = array("status" => "failure");
    echo json_encode($response);
  }
?>