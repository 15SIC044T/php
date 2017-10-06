<!DOCTYPE html>
<html>
    <head>
        <meta charset='utf-8' />
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
        <link href="//cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.2/css/bootstrapValidator.min.css" rel="stylesheet" />
        <link href="css/index.css" rel="stylesheet" />
        <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
        <script src='//cdnjs.cloudflare.com/ajax/libs/moment.js/2.8.3/moment.min.js'></script>
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.2/js/bootstrapValidator.min.js"></script>
        <!-- check same password-->
        <script type="text/javascript" src="js/samePasswordCheck.js"></script>

        <script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
        <style>
            .modal-footer {   border-top: 0px; }
        </style>
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
                        include 'shared/messages.php';
                    }
                    ?>
                </div>
                <div id="wrapper">
                    <div id="login" class="animate form">
                        <form  action="loginprocess.php" method="POST" autocomplete="on"> 
                            <h1>Log In</h1> 
                            <p> 
                                <label for="username" class="uname" > Email</label>
                                <input id="email" name="email" required="required" type="text" placeholder="myusername or mymail@mail.com"/>
                            </p>
                            <p> 
                                <label for="password" class="youpasswd"> Password </label>
                                <input id="password" name="password" required="required" type="password" placeholder="eg. X8df!90EO" /> 
                            </p>
                            <p>
                                <a href="#" data-target="#pwdModal" data-toggle="modal">Forget Password ?</a>
                            </p>

                            <p class="signup button"> 
                                <input type="submit" value="Login"/> 
                            </p>

                            <p class="change_link">
                                Not a member yet ?
                                <a href="#toregister" class="to_register">Join us</a>
                            </p>
                        </form>
                    </div>

                    <div id="register" class="animate form">
                        <!--                        <form  action="mysuperscript.php" autocomplete="on"> -->
                        <form id="rform" action="registerprocess.php" method="POST">                            
                            <h1> Sign up </h1> 
                            <p class="pull-right" style="color: red;"> 
                                * is required
                            </p>
                            <p> 
                                <label for="usernamesignup" class="uname" >* Your username</label>
                                <input id="usernamesignup" name="usernamesignup" required="required" type="text" placeholder="eg. Enter your Name here" />
                            </p>
                            <p> 
                                <label for="emailsignup" class="youmail"  >* Your email</label>
                                <input id="emailsignup" name="emailsignup" required="required" type="email" placeholder="eg. Enter your email here"/> 
                            </p>
                            <p class="col-sm-12 col-md-12 col-lg-12 col-xs-12"  data-toggle="collapse" data-target="#passPolicy" style="font-weight: bold;font-size: 10pt;padding-left: 0px;color: black;cursor: pointer;text-decoration: underline;">Check Password Policy<span class="caret"></span></p>  
                            <div id="passPolicy" class="col-sm-12 col-md-12 col-lg-12 col-xs-12 collapse">
                                <ul type="disc">
                                    <li>Your Password must have minimum 8 characters.</li>
                                    <li>Your Password must contain at least one number, one uppercase, lowercase & special character.</li>
                                </ul> 
                            </div>

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
                            <p> 
                                <label for="dob_Label" class="youpasswd" >* Your Date of Birth</label>
                                <input class="form-control" id="date" name="date" placeholder="eg. Enter your DOB here" type="text" required="required" />
                            </p>

                            <p> 
                                <label for="gender_Label" class="youpasswd" >* Your Gender</label>                                
                                <select name="genderSignup" required="required" style="margin-left: 10px;">
                                    <option value="" selected="selected">Please Select</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                            </p>

                            <p> 
                                <label for="description_Label" class="youpasswd" >Medical Description </label>
                                <input id="description_Signup" name="description_Signup" type="text" placeholder="eg. Enter your Medical History here"/>
                            </p>                            

                            <p> 
                                <label for="phoneNumber_Label" class="youpasswd" >* Your Phone Number</label>
                                <input id="phoneNumber_signup" name="phoneNumber_signup" type="number" placeholder="eg. Enter your phone number here" min="8" required="required" />
                            </p>
                            <p> 
                                <label for=subscriptionPlan_Label" class="youpasswd" >* Your Subscription Plan</label>
                                <select name="subscriptionPlan_signup" id="preferredLocation_signup" style="margin-left: 10px;" required="required" >
                                    <option value="" selected="selected">Please Select</option>
                                    <option value="1">1-Year Plan ($180)</option>
                                    <option value="2">2-Year Plan ($280)</option>
                                    <option value="3">3-Year Plan ($380)</option>
                                </select> 
                            </p>  

                            <p class="signup button"> 
                                <input type="submit" value="Sign up"/> 
                            </p>
                            <p class="change_link">  
                                Already a member ?
                                <a href="#tologin" class="to_register"> Go and log in </a>
                            </p>

                        </form>
                    </div>

                </div>
            </div>  
        </div>
        <?php include 'forgetPasswordModal.php' ?>
    </body>
</html>


<!--  Code for the calendar -->
<!--  jQuery -->
<script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>

<!-- Isolated Version of Bootstrap, not needed if your site already uses Bootstrap -->
<link rel="stylesheet" href="https://formden.com/static/cdn/bootstrap-iso.css" />

<!-- Bootstrap Date-Picker Plugin -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>
<script>
                                           $(document).ready(function () {
                                               var date_input = $('input[name="date"]'); //our date input has the name "date"
                                               var container = $('.bootstrap-iso form').length > 0 ? $('.bootstrap-iso form').parent() : "body";
                                               var options = {
                                                   format: 'yyyy/mm/dd',
                                                   container: container,
                                                   todayHighlight: true,
                                                   autoclose: true,
                                               };
                                               date_input.datepicker(options);
                                           })
</script>
