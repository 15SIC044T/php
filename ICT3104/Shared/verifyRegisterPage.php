<?php
/** This file does verification for the user for the email and change the user status */
require_once('../conn.php');
session_start();

if (isset($_GET['email']) && isset($_GET['code'])) {
    $email = trim($_GET['email']);
    $code = trim($_GET['code']);
    $accountStatus = "pending";

    $stmt = $conn->prepare("SELECT * FROM user WHERE email=? AND token=?");
    $stmt->bind_param('ss', $email, $code);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows == 1) {
        $stmt = $conn->prepare("UPDATE user SET accountStatus=? WHERE email=? AND token=?");
        $stmt->bind_param('sss',$accountStatus,$email, $code);
        $stmt->execute();
        //store the result then excute the query
        $_SESSION['success'] = 'proceedlogin';
        echo "<script>location='../index.php#tologin'</script>";
        exit();
    } else {
        $_SESSION['err'] = 'emailverification';
        echo "<script>location='../index.php#tologin'</script>";
        exit();
    }
}
?>


