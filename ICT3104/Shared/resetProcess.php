<?php
/** This file does verification for the user for the email and change the user status */
require_once('../conn.php');
session_start();

if (isset($_POST['pass1'])) {
    $password = trim($_POST['pass1']);
    $repassword = trim($_POST['pass2']);
    $email = trim($_POST['email']);
    $code = trim($_POST['code']);

    $stmt = $conn->prepare("SELECT * FROM user WHERE email=? AND token=?");
    $stmt->bind_param('ss', $email, $code);
    $stmt->execute();
    $stmt->store_result();

    if ($password != $repassword) {
        $_SESSION['err'] = 'passnotsame';
        echo "pass not same";
        echo "<script>location='confirmPasswordResetPage.php?email=$email&code=$code'</script>";
        exit();
    } elseif ($stmt->num_rows == 1) {
        $stmt = $conn->prepare("UPDATE user SET password=? WHERE email=? AND token=?");
        $stmt->bind_param('sss', SHA1($password), $email, $code);
        $stmt->execute();
        //store the result then excute the query
        $_SESSION['success'] = 'successreset';
        echo "<script>location='../index.php#tologin'</script>";
        exit();
    } else {
        $_SESSION['err'] = 'contactadmin';
        echo "contactadmin";
        echo "<script>location='confirmPasswordResetPage.php?email=$email&code=$code'</script>";
        exit();
    }
}
?>