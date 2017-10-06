<?php
if (isset($_GET['email']) && isset($_GET['code'])) {
    $email = trim($_GET['email']);
    $code = trim($_GET['code']);
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset='utf-8' />
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
        <link href="//cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.2/css/bootstrapValidator.min.css" rel="stylesheet" />
        <link href="../css/index.css" rel="stylesheet" />
        <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
        <script src='//cdnjs.cloudflare.com/ajax/libs/moment.js/2.8.3/moment.min.js'></script>
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.2/js/bootstrapValidator.min.js"></script>
        <!-- check same password-->
        <script type="text/javascript" src="../js/samePasswordCheck.js"></script>

        <script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>

    </head>
    <body>
        <div class="container">
            <h1>Fitness Gym</h1>
            <div id="container_demo" >
                <!-- hidden anchor to stop jump http://www.css3create.com/Astuce-Empecher-le-scroll-avec-l-utilisation-de-target#wrap4  -->
                <a class="hiddenanchor" id="toregister"></a>
                <a class="hiddenanchor" id="tologin"></a>
                <div id="message_container">
                    <?php
                    if (!isset($_SESSION)) {
                        session_start();
                        if (isset($_SESSION['success']) && !empty($_SESSION['success'])) {
                            $successMsg = $_SESSION['success'];
                        } elseif (isset($_SESSION['err']) && !empty($_SESSION['err'])) {
                            $errMsg = $_SESSION['err'];
                        }
                        include 'messages.php';
                    }
                    ?>
                </div>
                <div id="wrapper">
                    <div id="login" class="animate form">
                        <form method="POST" autocomplete="on" action="resetProcess.php" > 
                            <h1>Reset Password</h1> 
                            <input name="email" type="hidden" value="<?php echo $email; ?>"/>
                            <input name="code" type="hidden" value="<?php echo $code; ?>"/>
                            <p> 
                                <label for="passwordsignup" class="youpasswd" >* Your password</label>
                                <input name="pass1" id="pass1" required="required" type="password" 
                                       placeholder="eg. Enter your Password here"
                                       pattern="(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" />
                            </p>
                            <p> 
                                <label for="passwordsignup" class="youpasswd" >* Confirm password</label>
                                <input name="pass2" required="required" type="password" 
                                       placeholder="eg. Enter your Password here"
                                       pattern="(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$"  id="pass2" onkeyup="checkPass();
                                               return false;"/>
                                <span id="confirmMessage" class="confirmMessage"></span>
                            </p>

                            <p class="signup button"> 
                                <input type="submit" value="Submit"/> 
                            </p>

                        </form>
                    </div>


                </div>
            </div>  
        </div>
    </body>
</html>



<!--  Code for the calendar -->
<!--  jQuery -->
<script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>


