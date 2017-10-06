<?php
// Require DB Connection
include '../../connCalendar.php';
// Get ALl Event
$sth = $conn->prepare("SELECT * FROM trainingclass WHERE isGroup=1 AND classStatus=1 AND trainingclass.date BETWEEN ? AND ? ORDER BY trainingclass.date ASC");
$sth->execute(array($_GET['start'], $_GET['end']));
$result = $sth->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($result);
?>