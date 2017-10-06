<?php
//TODO:
//1. Session on all pages
require_once('conn.php');
session_start();

if (isset($_POST['email'])) {
    $email = $_POST['email'];
    $pwd = $_POST['password'];

    $query = "SELECT userID,name,email,accountTypeID FROM user WHERE email = '$email' AND password=SHA1('$pwd') AND accountStatus='active'";
    $result = mysqli_query($conn, $query);
    // if record is found, store userID, name, email and accountType into session
    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_array($result);
        $_SESSION['userID'] = $row['userID'];
        $_SESSION['name'] = $row['name'];
        $_SESSION['email'] = $row['email'];
        $_SESSION['accountTypeID'] = $row['accountTypeID'];
        $msg = "You are logged in as " . $_SESSION['name'];
        if($_SESSION['accountTypeID'] == 1){
         header('Location: Admin/dashboard.php');   
        }
        if($_SESSION['accountTypeID'] == 2){
         header('Location: Trainer/dashboard.php');   
        }
        if($_SESSION['accountTypeID'] == 3){
         header('Location: Trainee/dashboard.php');   
        }
    } else {
        $_SESSION['err'] = 'failLogin';
        echo "<script>location='index.php#tologin'</script>";
        exit();
    }
    mysqli_close($conn);
}
?>
