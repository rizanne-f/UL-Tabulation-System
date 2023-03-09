<?php
session_start();

include("conn.php");

$score = $_REQUEST['score_value'];
$id = $_REQUEST['cnddt_id'];
$cat = $_REQUEST['ctgry_id'];

$judgeid = $_SESSION['user']['judgeid'];

$SQL = $conn->prepare("UPDATE scores SET score = ? WHERE cnddt_id = ? and ctgry_id = ? and judge_id = ?");
$SQL->bind_param("iiii", $score, $id, $cat, $judgeid);

$SQL->execute();
$results = $SQL->get_result();

$rs = array();
while ($rs[] = $results->fetch_assoc()) { }

echo json_encode($rs);

$conn->close();
?>