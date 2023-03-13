<?php
include("conn.php");

$SQL = $conn->prepare("select name, no, format(ave,2) as ave from vu_cat1_average limit 5");
$SQL->execute();
$results = $SQL->get_result();

$rs = array();
while ($rs[] = $results->fetch_assoc()) { }

echo json_encode($rs);

$conn->close();
?>