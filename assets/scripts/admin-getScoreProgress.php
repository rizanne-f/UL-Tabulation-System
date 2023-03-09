<?php
include("conn.php");

$SQL = $conn->prepare("SELECT * FROM vu_scored_cnddts");
$SQL->execute();
$results1 = $SQL->get_result();
$rs = array();
while ($rs[] = $results1->fetch_assoc()) { }

echo json_encode($rs);

$conn->close();
?>