<?php

// Require DB Connection
include '../../connCalendar.php';
// Update Event
$sth = $conn->prepare("UPDATE trainingclass SET title = ?, trainingclass.date = ?,duration = ?,description = ?,locationID = ?, userID = ?, capacity = ?, cost = ? WHERE classid = ?");
$sth->execute(array($_POST['title'], $_POST['date'], $_POST['duration'], $_POST['description'], $_POST['locationid'], $_POST['userid'], $_POST['capacity'], $_POST['cost'], $_POST['id']));

?>