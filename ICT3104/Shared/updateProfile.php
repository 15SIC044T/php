<?php
 
require_once('../conn.php');
session_start();
//
//Update Profile
if (isset($_POST['updateProfile'])) { 
     
    $userID = $_SESSION['userID'];
    $name = $_POST["txtName"];
    $gender = $_POST["ddlGender"];
    $phone = $_POST["txtPhone"]; 
    $dob = $_POST['txtDOB']; 
    
    $subscriptionPlan = $_POST["ddlSubscriptionPlan"];
    $subscriptionDate = $_POST["txtSubscriptionDate"];
    $medicalHistory = $_POST["txtMedicalHistory"];
     
    if ($dob == "")
        $formatDOB = "";
    else
        $formatDOB = date("Y-m-d", strtotime($dob));   
         
    if ($subscriptionDate == "")
        $formatSubscriptionDate = "";
    else
        $formatSubscriptionDate = date("Y-m-d", strtotime($subscriptionDate));  
    
    $stmt = $conn->prepare("UPDATE user SET name=?, gender=?, phoneNumber=?, dateOfBirth=?, subscriptionID=?, subscriptionDate=?, medicalHistory=? WHERE userID = ?");
    $stmt->bind_param('ssisissi',$name,$gender, $phone, $formatDOB, $subscriptionPlan, $formatSubscriptionDate, $medicalHistory, $userID);
    $stmt->execute(); 
    
     $_SESSION['success_msg'] = "Profile has been updated successfully!"; 
      
    header('Location: ' . $_SERVER['HTTP_REFERER']);
}

//Change Password
if (isset($_POST['changePassword'])) {
    
    $userID = $_SESSION['userID'];
    $oldPassword = $_POST["oldPassword"];
    $password = $_POST["newPassword"];
    $password2 = $_POST["retypePassword"];
 
    $qry = "SELECT password FROM user WHERE userID = $userID";
    $result = mysqli_query($conn, $qry);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_array($result);
        if (strcmp($password, $password2) == 0) {   //password and retype password matches
            if (strcmp($row["password"], SHA1($oldPassword)) == 0) {
                $stmt = $conn->prepare("UPDATE user SET password=? WHERE userID = ?");
                $stmt->bind_param('si',SHA1($password),$userID);
                $stmt->execute(); 

                $_SESSION['success_msg'] = "Password has been changed successfully!";
                echo "okay";
            } else {
                $_SESSION['error_msg'] = "Password is invalid!";
                echo "invalid";
            }
        } else {
            $_SESSION['error_msg'] = "Password is not matched!";
            echo "nosame";
        }
    }
    header('Location: ' . $_SERVER['HTTP_REFERER']);
}
?>