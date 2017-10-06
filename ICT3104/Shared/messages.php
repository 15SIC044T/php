<?php
if (isset($_SESSION['err']) && !empty($_SESSION['err'])) {
    ?>
    <div class="alert alert-danger alert-dismissable">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <?php
        if ($errMsg == 'failLogin') {
            echo "Invalid Email/Password.";
        } elseif ($errMsg == 'passnotsame') {
            echo "Password not the same. Please try again.";
        } elseif ($errMsg == 'registerunsuccessful') {
            echo "Registration is Unsuccessful. Please try again.";
        } elseif ($errMsg == 'emailverification') {
            echo "Email Verification Unsuccessful. Please try again.";
        } elseif ($errMsg == 'emailresetpassword') {
            echo "Email does not exist. Please try again.";
        } elseif ($errMsg == 'contactadmin') {
            echo "Please Contant Administrator";
        } elseif ($errMsg == 'invalidPassword') {
            echo "You have entered an invalid password!";
        }
        session_unset();
        ?>

    </div>
    <?php
}
?>

<?php
if (isset($_SESSION['success']) && !empty($_SESSION['success'])) {
    ?>
    <div class="alert alert-success alert-dismissable">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <?php
        if ($successMsg == 'register') {
            echo "<strong>Account Created successfully!</strong><br>Please check your email to Confirm registration.";
        } elseif ($successMsg == 'proceedlogin') {
            echo "<strong>Email Verification successful!</strong><br>Please wait till the administrator has approved your account.";
        } elseif ($successMsg == 'logout') {
            session_destroy();
            echo "You have logged out successfully";
        } elseif ($successMsg == 'emailresetpassword') {
            echo "Email to reset password has been sent.";
        } elseif ($successMsg == 'successreset') {
            echo "<strong>Account Password has been resetted successfully!</strong>";
        } elseif ($successMsg == 'chnagePassword') {
            echo "<strong>Account Password has been changed successfully!</strong>";
        } elseif ($successMsg == 'updateProfile') {
            echo "<strong>Profile has been updated successfully!</strong>";
        }

        session_unset();
        ?>
    </div>
    <?php
}
?>