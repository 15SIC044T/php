<div class="sidebar" data-background-color="white" data-active-color="danger">
    <!--
                Tip 1: you can change the color of the sidebar's background using: data-background-color="white | black"
                Tip 2: you can change the color of the active button using the data-active-color="primary | info | success | warning | danger"
    -->
    <div class="sidebar-wrapper">
        <div class="logo">
            <h1 class="brand">Fitness Gym</h1>
            <a href="" class="simple-text">
                Nadia Shariff
            </a>
            <h2 class="role">Trainer</h2>
        </div>
        <ul class="nav">
            <li <?php
            if ($currentPage == 'dashboard') {
                echo 'class="active"';
            }
            ?> >
                <a href="dashboard.php">
                    <i class="ti-panel"></i>
                    <p>Dashboard</p>
                </a>
            </li>
            <li <?php
            if ($currentPage == 'grouptraining') {
                echo 'class="active"';
            }
            ?>>
                <a href="groupTraining.php">
                    <i class="ti-view-list-alt"></i>
                    <p>Group Training</p>
                </a>
            </li>
            <li <?php
            if ($currentPage == 'trainer') {
                echo 'class="active"';
            }
            ?>>
                <a href="trainer.php">
                    <i class="ti-view-list-alt"></i>
                    <p>Trainer</p>
                </a>
            </li>
            <li <?php
            if ($currentPage == 'userprofile') {
                echo 'class="active"';
            }
            ?>>
                <a href="userProfile.php">
                    <i class="ti-user"></i>
                    <p>User Profile</p>
                </a>
            </li>
            <li>
                <a href="notifications.html">
                    <i class="ti-bell"></i>
                    <p>Notifications</p>
                </a>
            </li>
        </ul>
    </div>
</div>