<ul class="nav navbar-nav navbar-right">
    <?php
    if (isset($_SESSION['email'])) {
        //Admin role
        if ($_SESSION['accountType'] == 'admin') {
            ?><p></p>
            <li class="user"><?php
                if (isset($_SESSION['email'])) {
                    echo "  Welcome, " . $_SESSION['name'];
                }
                ?>
            </li>
            <br>

            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Manage<span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <li><a href="xxxx.php">xxxx</a></li>


                </ul>
            </li>
            <li><a href="changePassword.php">Change Password</a></li>
            <li><a href="updateProfile.php">Update Profile</a></li>
            <li><a href="logout.php">Logout</a></li>
        <?php } 
        //trainee
        elseif ($_SESSION['accountType'] == 'trainee') {
            ?><p></p>
            <li class="user"><?php
                if (isset($_SESSION['email'])) {
                    echo "  Welcome, " . $_SESSION['name'];
                }
                ?>
            </li>
            <br>
            <li><a href="changePassword.php">Change Password</a></li>
            <li><a href="updateProfile.php">Update Profile</a></li>
            <li><a href="logout.php">Logout</a></li>
            
            <?php } 
        //trainer
        elseif ($_SESSION['accountType'] == 'trainer') {
            ?><p></p>
            <li class="user"><?php
                if (isset($_SESSION['email'])) {
                    echo "  Welcome, " . $_SESSION['name'];
                }
                ?>
            </li>
            <br>
            <li><a href="changePassword.php">Change Password</a></li>
            <li><a href="updateProfile.php">Update Profile</a></li>
            <li><a href="logout.php">Logout</a></li>
            <?php
        }
    } else {
        ?>
        
    <?php } ?>
</ul>