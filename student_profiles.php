<?php include('dbcon.php'); include('session.php');include('header.php'); ?>
<body>
    <?php include('nav-top.php'); ?>
    <div class="navbar navbar-fixed-top1">
        <div class="navbar-inner">
            <div class="container">
                <div class="marg">
                    <ul class="nav">
                        <li>
                            <a href="home.php"><i class="icon-home icon-large"></i>Home</a>
                        </li>
                        <li><a href="emp_profiles.php"><i class="icon-group icon-large"></i>Staff</a></li>
                        <li class="active"><a href="student_profiles.php"><i class="icon-group icon-large"></i>Students</a></li>
                        <li><a href="leave_record.php"><i class="icon-list icon-large"></i>Service Credits</a></li>
                        <li><a href="entry.php"><i class="icon-list icon-large"></i>Entry</a></li>
                        <li><a href="history_log.php"><i class="icon-table icon-large"></i>History Log</a></li>
                        <li><a id="logout" data-toggle="modal" href="#myModal"><i class="icon-signout icon-large"></i>Logout</a></li>
                        <form  method="POST" action="search_student.php" class="navbar-search pull-right">
                            <input type="text" name="search" class="search-query" placeholder="Search Students">
                        </form>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="wrapper">

    <div id="element" class="hero-body-emp">
        <div class="alert alert-info">
            <h2><i class="icon-group icon-large"></i> Student Management</h2>
        </div>

        <div class="card">
            <div class="card-header">
                <h4><i class="icon-list icon-large"></i> Student Records</h4>
            </div>
            <div class="card-body">
                <div class="pull-right mb-20">  
                    <a class="btn btn-primary btn-large" id="add"  data-content="Click here to Add Student" rel="popover" data-original-title="Add Student?" href="student_add.php">  <i class="icon-plus-sign icon-large"></i>&nbsp;Add New Student</a>
                    <script type="text/javascript">
                        jQuery(document).ready(function() {
                            $('#add').popover('show')
                            $('#add').popover('hide')
                        });
                    </script>
                </div>

                <form method="post" action="sort_student.php" class="mt-20">
                    <div class="form-group">
                        <label class="control-label">Sort Students by Grade Level:</label>
                        <div class="controls">
                            <select name="grade_level" class="span4">
                                <option value="">All Grade Levels</option>
                                <option>Grade 1</option>
                                <option>Grade 2</option>
                                <option>Grade 3</option>
                                <option>Grade 4</option>
                                <option>Grade 5</option>
                                <option>Grade 6</option>
                                <option>Grade 7</option>
                                <option>Grade 8</option>
                                <option>Grade 9</option>
                                <option>Grade 10</option>
                                <option>Grade 11</option>
                                <option>Grade 12</option>
                            </select>          
                            <button name="filter" class="btn btn-success"><i class="icon-filter icon-large"></i>&nbsp;Filter Students</button>
                        </div>
                    </div>
                </form>

                <div class="table-responsive">
                    <table class="display" id="student-table">
                        <thead>
                            <tr>
                                <th>Student No</th>
                                <th>Full Name</th>
                                <th>Grade Level</th>
                                <th>Section</th>
                                <th>Photo</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $student_query=mysqli_query($conn,"select * from student");
                                while($row=mysqli_fetch_array($student_query)){ $id=$row['studentID']; ?>
                                <tr class="del<?php echo $id ?>">
                                    <td><?php echo $row['Student_No']; ?></td>
                                    <td><?php echo $row['LastName'].", ".$row['FirstName']." ".$row['MiddleName']; ?></td>
                                    <td><?php echo $row['Grade_Level']; ?></td>
                                    <td><?php echo $row['Section']; ?></td>
                                    <td align="center">
                                        <?php if(!empty($row['location']) && file_exists($row['location'])): ?>
                                            <img width="45" height="45" src="<?php echo $row['location'];?>" border="0" class="rounded">
                                        <?php else: ?>
                                            <img width="45" height="45" src="img/default-avatar.png" border="0" class="rounded">
                                        <?php endif; ?>
                                    </td>
                                    <td align="center">      
                                        <script type="text/javascript">
                                            jQuery(document).ready(function() {
                                                $('#p<?php echo $id; ?>').popover('show')
                                                $('#p<?php echo $id; ?>').popover('hide')
                                            });
                                        </script>
                                        <a class="btn btn-success"  id="p<?php echo $id; ?>" data-content="Click here to Edit Student" rel="popover" data-original-title="Edit Student"  href="student_edit.php<?php echo '?id='.$id; ?>"><i class="icon-edit icon-large"></i>&nbsp;Edit</a>
                                        <a class="btn btn-danger" data-toggle="modal" href="#d<?php echo $id; ?>">  <i class="icon-trash icon-large"></i>&nbsp;Delete</a>
                                        <?php
                                            include('student_button_delete.php');
                                        ?>
                                        <a class="btn btn-warning"  data-toggle="modal" href="#<?php echo $id; ?>" ><i class="icon-list icon-large"></i>&nbsp;View</a>
                                        <?php
                                            include('student_button_view.php');
                                        ?>
                                    </td>
                                </tr>
                                <?php }?>
                        </tbody>
                    </table>
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