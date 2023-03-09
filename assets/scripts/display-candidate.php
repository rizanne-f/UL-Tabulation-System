<?php
include("conn.php");

$id = $_REQUEST['candidate'];

$SQL = $conn->prepare("SELECT no, name, course, pic_path FROM candidates where id = ?");
$SQL->bind_param("i", $id);
$SQL->execute();
$results = $SQL->get_result();

$rs = array();
while ($rs[] = $results->fetch_assoc()) { }

echo json_encode($rs);

$conn->close();
?>