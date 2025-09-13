<?php include('dbcon.php'); include('session.php');include('header.php'); ?>
<body>
       <?php include('nav-top.php'); ?>
    <div class="navbar navbar-fixed-top1">
        <div class="navbar-inner">
            <div class="container">
                <div class="marg">
                    <ul class="nav">
                        <li class="active">
                            <a href="home.php"><i class="icon-home icon-large"></i>Home</a>
                        </li>
                        <li><a href="emp_profiles.php"><i class="icon-group icon-large"></i>Staff</a></li>
                        <li><a href="student_profiles.php"><i class="icon-group icon-large"></i>Students</a></li>
                        <li><a href="leave_record.php"><i class="icon-list icon-large"></i>Service Credits</a></li>
                        <li><a href="entry.php"><i class="icon-list icon-large"></i>Entry</a></li>
                        <li><a href="history_log.php"><i class="icon-table icon-large"></i>History Log</a></li>
                        <li><a id="logout" data-toggle="modal" href="#myModal"><i class="icon-signout icon-large"></i>Logout</a></li>
                        <form  method="POST" action="search.php" class="navbar-search pull-right">
                            <input type="text" name="search" class="search-query" placeholder="Search">
                        </form>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    
    <div class="wrapper">

        <div id="element" class="hero-body">
            <div class="peace">
                <center>
                    <div id="piecemaker">
                        <img src="img/logo.png" alt="Kanopoly Logo" style="max-width: 100%; height: auto;">
                    </div>
                </center>
            </div>
            <div class="card">
                <div class="card-header">
                    <h2><i class="icon-info-sign icon-large"></i> The DepEd Mission</h2>
                </div>
                <div class="card-body">
                    <p>To provide quality basic education that is equitably accessible to all and lay the foundation for life-long learning and service for the common good.</p>
                </div>
            </div>

            <div class="card mt-20">
                <div class="card-header">
                    <h2><i class="icon-eye-open icon-large"></i> The DepEd Vision</h2>
                </div>
                <div class="card-body">
                    <p>By 2030, DepEd is globally recognized for good governance and for developing functionally-literate and God-loving Filipinos.</p>
                </div>
            </div>

        </div>    

        <?php include('footer.php');?>
    </div>
</body>
<div class="modal hide fade" id="myModal">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">×</button>
        <h3><i class="icon-signout icon-large"></i> Confirm Logout</h3>
    </div>
    <div class="modal-body">
        <p>Are you sure you want to logout from the system?</p>
    </div>
    <div class="modal-footer">
        <a href="#" class="btn" data-dismiss="modal"><i class="icon-remove icon-large"></i> Cancel</a>
        <a href="logout.php" class="btn btn-primary"><i class="icon-ok icon-large"></i> Yes, Logout</a>
    </div>
</div>