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
            <h2><i class="icon-search icon-large"></i> Search Results</h2>
        </div>

        <hr>

        <div class="pull-right">  
            <br>
            <a class="btn btn-primary btn-large" href="student_profiles.php"><i class="icon-arrow-left icon-large"></i>&nbsp;Back to Student List</a>
        </div>

        <br>
         
        <div class="card shadow">
            <div class="card-body">
                <table class="display" id="search-results-table">
                    <thead>
                        <tr>
                            <th>Student No</th>
                            <th>FirstName</th>
                            <th>LastName</th>
                            <th>MiddleName</th>
                            <th>Grade Level</th>
                            <th>Section</th>
                            <th>Photo</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            if (isset($_POST['search'])){
                                $search=$_POST['search'];
                                $student_query=mysqli_query($conn,"select * from student where FirstName LIKE '%$search%' OR LastName LIKE '%$search%' OR Student_No LIKE '%$search%'")or die(mysqli_error());
                                while($row=mysqli_fetch_array($student_query)){ $id=$row['studentID']; ?>
                                <tr class="del<?php echo $id ?>">
                                    <td><?php echo $row['Student_No']; ?></td>
                                    <td><?php echo $row['FirstName']; ?></td>
                                    <td><?php echo $row['LastName']; ?></td>
                                    <td><?php echo $row['MiddleName']; ?></td>
                                    <td><?php echo $row['Grade_Level']; ?></td>
                                    <td><?php echo $row['Section']; ?></td>
                                    <td align="center">
                                        <?php if(!empty($row['location']) && file_exists($row['location'])): ?>
                                            <img width="40" height="40" src="<?php echo $row['location'];?>" border="0" onmouseover="showtrail('<?php echo $row['location'];?>','<?php echo $row['FirstName']." ".$row['LastName'];?> ',200,5)" onmouseout="hidetrail()" class="rounded">
                                        <?php else: ?>
                                            <img width="40" height="40" src="img/default-avatar.png" border="0" class="rounded">
                                        <?php endif; ?>
                                    </td>
                                    <td align="center" width="320">      
                                        <script type="text/javascript">
                                            jQuery(document).ready(function() {
                                                $('#p<?php echo $id; ?>').popover('show')
                                                $('#p<?php echo $id; ?>').popover('hide')
                                            });
                                        </script>
                                        <a class="btn btn-success"  id="p<?php echo $id; ?>" data-content="Click here to Edit Student" rel="popover" data-original-title="Edit?"  href="student_edit.php<?php echo '?id='.$id; ?>"><i class="icon-edit icon-large"></i>&nbsp;Edit</a>&nbsp;
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
                                <?php 
                                }
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>

        <?php include('footer.php');?>
    </div>
</body>
<div class="modal hide fade" id="myModal">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">×</button>
        <h3>Confirm Logout</h3>
    </div>
    <div class="modal-body">
        <p><font color="gray">Are You Sure you Want to LogOut?</font></p>
    </div>
    <div class="modal-footer">
        <a href="#" class="btn" data-dismiss="modal">No</a>
        <a href="logout.php" class="btn btn-primary">Yes</a>
    </div>
</div>