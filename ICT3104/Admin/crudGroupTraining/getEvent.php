<?php

// Require DB Connection
include '../../connCalendar.php';
// Get Event By Id
$sth = $conn->prepare("SELECT * FROM trainingclass WHERE classID = ?");
$sth->execute(array($_GET['id']));
$result = $sth->fetch(PDO::FETCH_ASSOC);
echo json_encode($result);
?>