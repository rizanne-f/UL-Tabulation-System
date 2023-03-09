<?php
session_start();
include("conn.php");

$flter = $_REQUEST['content'];
$judgeid = $_SESSION['user']['judgeid'];

if ($flter) {
    $flter2 = "%" . $flter . "%";
    // A workaround to pivot scores table and display the cand no, name, and pic where judge = current userid
    $SQL = $conn->prepare("SELECT candidates.no, candidates.name,
        MAX(CASE WHEN ctgry_id = 1 THEN score ELSE NULL END) AS 'Interview',
        MAX(CASE WHEN ctgry_id = 2 THEN score ELSE NULL END) AS 'SwimWear',
        MAX(CASE WHEN ctgry_id = 3 THEN score ELSE NULL END) AS 'FormalWear',
        format(avg(score), 2) as 'AveScore'
        FROM scores
        INNER JOIN candidates ON candidates.id = cnddt_id
        WHERE candidates.name LIKE ? AND judge_id = ?
        GROUP BY cnddt_id
        ORDER BY candidates.name");
    $SQL->bind_param("si", $flter2, $judgeid);
} else {
    $SQL = $conn->prepare("SELECT candidates.id, candidates.no, candidates.name,
        MAX(CASE WHEN ctgry_id = 1 THEN score ELSE NULL END) AS 'Interview',
        MAX(CASE WHEN ctgry_id = 2 THEN score ELSE NULL END) AS 'SwimWear',
        MAX(CASE WHEN ctgry_id = 3 THEN score ELSE NULL END) AS 'FormalWear',
        format(avg(score), 2) as 'AveScore'
        FROM scores
        INNER JOIN candidates ON candidates.id = cnddt_id
        WHERE judge_id = ?
        GROUP BY cnddt_id");
    $SQL->bind_param("i",$judgeid);
}

$SQL->execute();
$results = $SQL->get_result();

$rs = array();
while ($rs[] = $results->fetch_assoc()) { }

echo json_encode($rs);

$conn->close();
?>