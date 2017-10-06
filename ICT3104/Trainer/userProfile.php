<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
        <link rel="icon" type="image/png" sizes="96x96" href="assets/img/favicon.png">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

        <title>Fitness Gym</title>

        <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
        <meta name="viewport" content="width=device-width" />

        <!-- Bootstrap core CSS     -->
        <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />

        <!-- Animation library for notifications   -->
        <link href="../assets/css/animate.min.css" rel="stylesheet"/>

        <!--  Paper Dashboard core CSS    -->
        <link href="../assets/css/paper-dashboard.css" rel="stylesheet"/>


        <link href='//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.1.1/fullcalendar.min.css' rel='stylesheet' />
        <link href='//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.1.1/fullcalendar.print.css' rel='stylesheet' media='print' />
        <link href="//cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.2/css/bootstrapValidator.min.css" rel="stylesheet" />
        <link href="../css/bootstrap-colorpicker.min.css" rel="stylesheet" />
        <link href="../css/bootstrap-timepicker.min.css" rel="stylesheet" />
        <link href="../css/calendar.css" rel="stylesheet" />
        <link href="../css/style.css" rel="stylesheet" />
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
        <script src='//cdnjs.cloudflare.com/ajax/libs/moment.js/2.8.3/moment.min.js'></script>
        <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.2/js/bootstrapValidator.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.1.1/fullcalendar.min.js"></script>
        <script src='../js/bootstrap-colorpicker.min.js'></script>
        <script src='../js/bootstrap-timepicker.min.js'></script>
        <script src='../js/adminGroupTrainingCalendar.js'></script>

        <!--  Fonts and icons     -->
        <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
        <link href='https://fonts.googleapis.com/css?family=Muli:400,300' rel='stylesheet' type='text/css'>
        <link href="../assets/css/themify-icons.css" rel="stylesheet">

    </head>
    <?php
    
    //1. Session on all pages
    require_once('../conn.php');
    session_start();

    $currentPage = 'userprofile';
    ?>
    <body>
        <div class="wrapper">
            <?php include 'trainerSideNavbar.php' ?>

            <div class="main-panel">
                <?php include 'trainerNavbar.php' ?>

                <?php
                try {
                    $userID = $_SESSION['userID'];
                    $sql = "Select * from user where userID='" .$userID . "'";
                    $result = mysqli_query($conn, $sql);
                    // if record is found, store userID, name, email and accountType into session
                    if (mysqli_num_rows($result) == 1) {
                        $row = mysqli_fetch_array($result);

                        //Store all the values to the variables
                        $email = $row["email"];
                        $name = $row["name"];
                        $gender = $row["gender"];

                        $password = $row["password"];
                        $accountStatus = $row["accountStatus"];
                        $dateOfBirth = $row["dateOfBirth"];
                        $phoneNumber = $row["phoneNumber"];

                        $medicalHistory = $row["medicalHistory"]; 
                        $cancelLimit = $row["cancelLimit"];

                        $subscriptionID = $row["subscriptionID"];
                        $subscriptionDate = $row["subscriptionDate"];
                        $accountTypeID = $row["accountTypeID"];
                    }
                    $conn->close();
                } catch (PDOException $e) {
                    echo "Error: " . $e->getMessage();
                }
                ?>
                <div class="content">
                    <div class="container-fluid">
                        <div class="row"> 
                            <div id="message_container">
                                <?php  
                                    include '../shared/displayAlertMessage.php';  
                                ?>
                            </div>
                            <div class="col-lg-4 col-md-5">
                                <div class="card card-user">
                                    <div class="image">
                                        <img src="assets/img/background.jpg" alt="..."/>
                                    </div>
                                    <div class="content">
                                        <div class="author">
                                            <img class="avatar border-white" src="assets/img/faces/face-2.jpg" alt="..."/>
                                            <h4 class="title">Chet Faker<br />
                                                <a href="#"><small>@chetfaker</small></a>
                                            </h4>
                                        </div>
                                        <p class="description text-center">
                                            Type in some text here
                                        </p>
                                    </div>
                                    <hr>
                                    <div class="text-center">
                                        <div class="row">
                                            <div class="col-md-3 col-md-offset-1">
                                                <h5><?php echo $accountStatus; ?><br /><small>Status</small></h5>
                                            </div>
                                            <div class="col-md-4">
                                                <h5><?php echo $cancelLimit; ?><br /><small>Cancel Limit</small></h5>
                                            </div>
                                            <div class="col-md-3">
                                                <h5>4<br /><small>Trainees</small></h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="header">
                                        <h4 class="title">Team Members</h4>
                                    </div>
                                    <div class="content">
                                        <ul class="list-unstyled team-members">
                                            <li>
                                                <div class="row">
                                                    <div class="col-xs-3">
                                                        <div class="avatar">
                                                            <img src="assets/img/faces/face-0.jpg" alt="Circle Image" class="img-circle img-no-padding img-responsive">
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-6">
                                                        DJ Khaled
                                                        <br />
                                                        <span class="text-muted"><small>Offline</small></span>
                                                    </div>

                                                    <div class="col-xs-3 text-right">
                                                        <btn class="btn btn-sm btn-success btn-icon"><i class="fa fa-envelope"></i></btn>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="row">
                                                    <div class="col-xs-3">
                                                        <div class="avatar">
                                                            <img src="assets/img/faces/face-1.jpg" alt="Circle Image" class="img-circle img-no-padding img-responsive">
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-6">
                                                        Creative Tim
                                                        <br />
                                                        <span class="text-success"><small>Available</small></span>
                                                    </div>

                                                    <div class="col-xs-3 text-right">
                                                        <btn class="btn btn-sm btn-success btn-icon"><i class="fa fa-envelope"></i></btn>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="row">
                                                    <div class="col-xs-3">
                                                        <div class="avatar">
                                                            <img src="assets/img/faces/face-3.jpg" alt="Circle Image" class="img-circle img-no-padding img-responsive">
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-6">
                                                        Flume
                                                        <br />
                                                        <span class="text-danger"><small>Busy</small></span>
                                                    </div>

                                                    <div class="col-xs-3 text-right">
                                                        <btn class="btn btn-sm btn-success btn-icon"><i class="fa fa-envelope"></i></btn>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div> 
                            </div>
                            <div class="col-lg-8 col-md-7">
                                <div class="card">
                                    <div class="header">
                                        <h4 class="title">Edit Profile</h4>
                                    </div>
                                    <div class="content"> 
                                        <form data-toggle="validator" method="post" action="../shared/updateProfile.php" role="form" >
                                            <div class="row">
                                                <div class="col-md-5">
                                                    <div class="form-group">
                                                        <label>Email</label>
                                                        <input name="txtEmail" type="text" class="form-control border-input" disabled placeholder="Email" value="<?php echo $email; ?>">
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label>Name</label>
                                                        <input name="txtName" type="text" class="form-control border-input" placeholder="Name" value="<?php echo $name; ?>">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="gender">Gender</label>
                                                        <select name="ddlGender" id="ddlGender" class="form-control border-input">
                                                            <option value="Male" <?php echo (($gender == "Male") ? "selected" : "");?>>Male</option>
                                                            <option value="Female" <?php echo (($gender == "Female") ? " selected" : "");?>>Female</option> 
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Phone Number</label>
                                                        <input name="txtPhone" type="number" class="form-control border-input" placeholder="Phone Number" value="<?php echo $phoneNumber; ?>">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Date of Birth</label>
                                                        <input class="form-control" id="txtDOB" name="txtDOB" placeholder="Date of Birth" type="text" required="required" value="<?php echo $dateOfBirth; ?>"/>
                                                    </div>
                                                </div>
                                            </div> 

                                            <div class="row">
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label>Cancel Limit</label>
                                                        <input type="number" class="form-control border-input" placeholder="Cancel Limit" value="<?php echo $cancelLimit; ?>" disabled>
                                                    </div>
                                                </div>
                                                <div class="col-md-5">
                                                    <div class="form-group"> 
                                                        <label>Subscription Plan</label>
                                                        <select name="ddlSubscriptionPlan" id="ddlSubscriptionPlan" class="form-control border-input" disabled>
                                                            <option value="0" <?php echo (($subscriptionID == "0" || $subscriptionID == NULL) ? " selected" : ""); ?>>Please Select</option>
                                                            <option value="1" <?php echo (($subscriptionID == "1") ? " selected" : ""); ?>>1-Year Plan ($180)</option>
                                                            <option value="2" <?php echo (($subscriptionID == "2") ? " selected" : ""); ?>>2-Year Plan ($280)</option>
                                                            <option value="3" <?php echo (($subscriptionID == "3") ? " selected" : ""); ?>>3-Year Plan ($380)</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-5">
                                                    <div class="form-group">
                                                        <label>Subscription Date</label>
                                                        <input class="form-control" id="txtsubscriptionDate" name="txtSubscriptionDate" disabled placeholder="Subscription Date" type="text" value="<?php echo $subscriptionDate; ?>"/>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label>Medical History</label>
                                                        <textarea rows="5" name="txtMedicalHistory" class="form-control border-input" placeholder="Medical History"><?php echo $medicalHistory; ?></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="text-center">
                                                <button type="submit" class="btn btn-info btn-fill btn-wd" name="updateProfile">Update Profile</button>
                                            </div>
                                            <div class="clearfix"></div>
                                        </form>
                                    </div>
                                </div>
                                
                                <div class="card">
                                    <div class="header">
                                        <h4 class="title">Change Password</h4>
                                    </div>
                                    <div class="content"> 
                                        <form data-toggle="validator" method="post" action="../shared/updateProfile.php" role="form">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Current Password</label>
                                                        <input name="oldPassword" type="password" class="form-control border-input" placeholder="Old Password" value="" required="required" >
                                                    </div>
                                                </div> 
                                            </div>

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>New Password</label>
                                                        <input name="newPassword" type="password" class="form-control border-input" placeholder="New Password" value="" required="required" >
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Retype New Password</label>
                                                        <input name="retypePassword" type="password" class="form-control border-input" placeholder="Retype new Password" value="" required="required" >
                                                    </div>
                                                </div>
                                            </div>  
 
                                            <div class="text-center">
                                                <button type="submit" class="btn btn-info btn-fill btn-wd" name="changePassword">Change Password</button>
                                            </div>
                                            <div class="clearfix"></div>
                                        </form>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
                <?php include 'trainerFooter.php' ?>
            </div>
        </div>


    </body>
    <!--  Checkbox, Radio & Switch Plugins -->
    <script src="../assets/js/bootstrap-checkbox-radio.js"></script>

    <!--  Charts Plugin -->
    <script src="../assets/js/chartist.min.js"></script>

    <!--  Notifications Plugin    -->
    <script src="../assets/js/bootstrap-notify.js"></script>

    <!--  Google Maps Plugin    -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js"></script>

    <!-- Paper Dashboard Core javascript and methods for Demo purpose -->
    <script src="../assets/js/paper-dashboard.js"></script>

    <!-- Isolated Version of Bootstrap, not needed if your site already uses Bootstrap -->
<link rel="stylesheet" href="https://formden.com/static/cdn/bootstrap-iso.css" />
    
    <!-- Bootstrap Date-Picker Plugin -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>
    <script>
        $(document).ready(function () {
            var date_input = $('input[name="txtDOB"]'); //our date input has the name "date"
            var container = $('.bootstrap-iso form').length > 0 ? $('.bootstrap-iso form').parent() : "body";
            var options = {
                format: 'mm/dd/yyyy',
                container: container,
                todayHighlight: true,
                autoclose: true,
            };
            date_input.datepicker(options);
        })
        
        $(document).ready(function () {
            var date_input = $('input[name="txtSubscriptionDate"]'); //our date input has the name "date"
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
</html>
