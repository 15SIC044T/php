<?php
// Require DB Connection
include '../../connCalendar.php';
$color = '#08aaf0';

// Add Event
$sth = $conn->prepare("INSERT INTO trainingclass (title,trainingclass.date,duration,locationID,userID,description,cost,capacity,color,classStatus,isGroup) VALUES (?,?,?,?,?,?,?,?,?,?,?)");
$sth->execute(array($_POST['title'], $_POST['date'],$_POST['duration'],$_POST['locationid'],$_POST['userid'],$_POST['description'],$_POST['cost'],$_POST['capacity'], $color,1,1));
?>
