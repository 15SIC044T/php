<?php

function send_mail($email, $message, $subject) {
    require_once('PhpMailer/PHPMailerAutoload.php');
    $mail = new PHPMailer();
    $mail->IsSMTP();
    $mail->SMTPDebug = 0;
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = "ssl";
    $mail->Host = "smtp.gmail.com";
    $mail->Port = 465;
    $mail->AddAddress($email);
    $mail->Username = "ICT3104Team5@gmail.com";
    $mail->Password = "Asdqwe123";
    $mail->SetFrom('you@yourdomain.com', 'Password Recovery');
    $mail->AddReplyTo("you@yourdomain.com", "Reply: Password Recovery");
    $mail->Subject = $subject;
    $mail->MsgHTML($message);
    $mail->Send();
}

?>
