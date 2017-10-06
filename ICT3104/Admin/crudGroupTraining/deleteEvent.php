<?php
// Require DB Connection
include '../../connCalendar.php';
// Delete Event
$sth = $conn->prepare("DELETE FROM trainingclass WHERE classid = ?");
$sth->execute(array($_GET['id']));
?>