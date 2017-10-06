<!DOCTYPE html>
<html>
<!--    <head>
        <meta charset='utf-8' />
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
        <link href="//cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.2/css/bootstrapValidator.min.css" rel="stylesheet" />
        <link href="css/index.css" rel="stylesheet" />
        <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
        <script src='//cdnjs.cloudflare.com/ajax/libs/moment.js/2.8.3/moment.min.js'></script>
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.2/js/bootstrapValidator.min.js"></script>

        <style>
            .modal-footer {   border-top: 0px; }
        </style>
    </head>-->
    <body>
        <div class="container">
            <h1>Fitness Gym</h1>
            <form id="rform" action="registerprocess.php" method="POST">                            
                <h1> Sign up </h1> 
                <p> 
                    <label for="usernamesignup" class="uname" >Your username</label>
                    <input id="usernamesignup" name="usernamesignup" required="required" type="text" placeholder="eg. Enter your Name here" value="mysuperusername690" />
                </p>
                <p> 
                    <label for="emailsignup" class="youmail"  > Your email</label>
                    <input id="emailsignup" name="emailsignup" required="required" type="email" placeholder="eg. Enter your DOB here" value="mysupermail@mail.com"/> 
                </p>
                <p class="col-sm-12 col-md-12 col-lg-12 col-xs-12"  data-toggle="collapse" data-target="#passPolicy" style="font-weight: bold;font-size: 10pt;padding-left: 0px;color: black;cursor: pointer;text-decoration: underline;">Check Password Policy<span class="caret"></span></p>  
                <div id="passPolicy" class="col-sm-12 col-md-12 col-lg-12 col-xs-12 collapse">
                    <ul type="disc">
                        <li>Your Password must have minimum 6 characters.</li>
                        <li>Your Password must contain at least one number, one uppercase, lowercase & special character.</li>
                        <li>Your Password must not contain your Username.</li>
                        <li>Your Password must not contain Character or Number repetition.</li>
                    </ul> 
                </div>
                <p> 
                    <label for="passwordsignup" class="youpasswd" >Your password </label>
                    <input id="passwordsignup" name="passwordsignup" required="required" type="password" 
                           placeholder="eg. Enter your Password here" value="Asdqwe123" 
                           pattern="(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" 
                           if(this.checkValidity()) form.password_two.pattern = this.value;"/>
                </p>
                <p> 
                    <label for="dob_Label" class="youpasswd" >Your Date of Birth </label>
                    <input class="form-control" id="date" name="date" placeholder="eg. Enter your DOB here" type="text" required="required" />
                </p>

                <p> 
                    <label for="gender_Label" class="youpasswd" >Your Gender </label>                                
                    <select name="genderSignup" >
                        <option value="Male" selected="selected">Male</option>
                        <option value="Female">Female</option>
                    </select>
                </p>

                <p> 
                    <label for="description_Label" class="youpasswd" >Medical Description </label>
                    <input id="description_Signup" name="description_Signup" type="text" placeholder="eg. Enter your Medical History here" value="nil"/>
                </p>                            

                <p> 
                    <label for="phoneNumber_Label" class="youpasswd" >Your Phone Number </label>
                    <input id="phoneNumber_signup" name="phoneNumber_signup" type="text" placeholder="eg. Enter your phone number here" value="999"/>
                </p>

                <p> 
                    <label for="preferredLocation_Label" class="youpasswd" >Your Preferred Location </label>
                    <select name="preferredLocation_signup" id="preferredLocation_signup">
                        <option value="North" selected="selected">North</option>
                        <option value="South">South</option>
                        <option value="East">East</option>
                        <option value="West">West</option>
                    </select> 
                </p>                            

                <p> 
                    <label for="role_Label" class="youpasswd" >The Role of this account</label>
                    <select name="role_signup" id="role_signup">
                        <option value="Trainee" selected="selected">Trainee</option>
                        <option value="Trainer">Trainer</option>
                        <option value="Admin">Admin</option>
                    </select> 
                </p>         

                <p class="signup button"> 
                    <input type="submit" value="Sign up"/> 
                </p>
            </form>

        </div>
        <?php
        include 'footer.inc.php';
        ?>
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
            format: 'mm/dd/yyyy',
            container: container,
            todayHighlight: true,
            autoclose: true,
        };
        date_input.datepicker(options);
    })
</script>
