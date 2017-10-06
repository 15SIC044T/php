
<?php
//TODO: 
//1. still need to insert in subscription plan
//2. take into consideration trainer sign up
require_once('conn.php');
session_start();
include('sendmail.php');

function email_content($code, $email, $username) {
    $message = "     
      Hello $username,
      <br /><br />
      Welcome to Fitness Gym<br/>
      To complete your registration  please , just click following link<br/>
      <br /><br />
      <a href='http://localhost/ICT3104/Shared/verifyRegisterPage.php?email=$email&code=$code'>Click HERE to confirm your email</a>
      <br /><br />
      Thanks with regards
      <br /><br />
      Fitness Gym Adminstrator";

    $subject = "Fitness Gym - Confirm Registration";
    send_mail($email, $message, $subject);
}

try {
    $stmt = $conn->prepare("INSERT INTO user (name, email, password, dateOfBirth, gender, medicalHistory, phoneNumber, cancelLimit, accountTypeID,accountStatus,token) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssssiiiss", $name, $email, $passwordSHA, $dob, $gender, $description, $phoneNumber, $cancelLimit, $accountType, $accountStatus,$code);

    // set parameters and execute
    $name = trim($_POST['usernamesignup']);
    $email = trim($_POST['emailsignup']);
    //https://www.sitepoint.com/hashing-passwords-php-5-5-password-hashing-api/
    //$password = password_hash(trim($_POST['passwordsignup']), PASSWORD_DEFAULT);
    $password = trim($_POST['pass1']);
    $repassword = trim($_POST['pass2']);
    $passwordSHA = SHA1($password);
    
    $description = trim($_POST['description_Signup']);
    $phoneNumber = trim($_POST['phoneNumber_signup']);

    $dob = $_POST['date'];
    $gender = $_POST['genderSignup'];
    $plan = $_POST['subscriptionPlan_signup'];
    $code = md5(uniqid(rand()));
    
    $cancelLimit = 2;
    if(isset($_POST['role_signup'])){
        //$accountType = $_POST['role_signup'];
    }else{
        $accountType = 3;    
    }
    
    $accountStatus = "inactive";//accountStatus
    
    //after confirming then it becomes active
    $sql = "Select * from user where email='$email'";
    $result = $conn->query($sql);
    $num_rows = $result->fetch_assoc();

    if ($password != $repassword){
        $_SESSION['err'] = 'passnotsame';
        echo "<script>location='index.php#toregister'</script>";
        exit();
    } elseif ($num_rows) { //email exist
        $_SESSION['err'] = 'registerunsuccessful';
        echo "<script>location='index.php#toregister'</script>";
        exit();
    } else {
        $stmt->execute();
       //send email to confirm registration
        email_content($code, $email, $name);
        $_SESSION['success'] = 'register';
        echo "<script>location='index.php#tologin'</script>";
        exit();
    }
    $conn->close();
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
//return to login page
?>

