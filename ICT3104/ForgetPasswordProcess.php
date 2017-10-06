<?php

require_once('conn.php');
include('sendmail.php');
session_start();

function email_content($code, $email, $username) {
    $message = "     
      Hello $username,
      <br /><br />
      Welcome to Fitness Gym<br/>
      To reset your password please , just click following link<br/>
      <br /><br />
      <a href='http://localhost/ICT3104/Shared/confirmPasswordResetPage.php?email=$email&code=$code'>Click HERE to confirm your email</a>
      <br /><br />
      Thanks with regards
      <br /><br />
      Fitness Gym Adminstrator";

    $subject = "Fitness Gym - Reset Password";
    send_mail($email, $message, $subject);
}

if (isset($_POST['emailFp']) & !empty($_POST['emailFp'])) {
    $email = trim($_POST['emailFp']);
    echo $email;
    $sql = "Select * from user where email='$email'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    if ($row) { //email exist
        echo $code;
        $code = $row['token'];
        $email = $row['email'];
        $username = $row['name'];
        email_content($code, $email, $username);
        $_SESSION['success'] = 'emailresetpassword';
        echo "<script>location = 'index.php#tologin'</script>";
        exit();
    } else {
        $_SESSION['err'] = 'emailresetpassword';
        echo "<script>location = 'index.php#tologin'</script>";
        exit();
    }
}
?>