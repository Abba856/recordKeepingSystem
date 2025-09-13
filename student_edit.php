<?php include('dbcon.php'); include('session.php');include('header.php');  $get_id=$_GET['id'];?>
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

        <div id="element" class="hero-body-add">
            <div class="alert alert-info">
                <h2><i class="icon-edit icon-large"></i> Edit 
                    <?php
                        $name_query=mysqli_query($conn,"select * from student where studentID='$get_id'")or die(mysqli_error());
                        $name_row=mysqli_fetch_array($name_query);
                        echo $name_row['FirstName']." ".$name_row['LastName'];
                    ?>
                    Information
                </h2>  

                <div class="pull-right">
                    <a class="btn btn-success btn-large"  data-original-title="Back to Student List" href="student_profiles.php">  <i class="icon-arrow-left icon-large"></i>&nbsp;Back</a>
                    <script type="text/javascript">
                        jQuery(document).ready(function() {
                            $('#add').popover('show')
                            $('#add').popover('hide')
                        });
                    </script>
                </div> 
            </div>

            <div class="card">
                <div class="card-header">
                    <h3>Student Information</h3>
                </div>
                <div class="card-body">
                    <ul class="nav nav-tabs" id="myTab">
                        <li class="active"><a href="#home"><font color="#5bc0de">Personal Info</font></a></li>
                    </ul>
                    <form method="post" enctype="multipart/form-data">
                        <div class="tab-content">
                            <div class="tab-pane active" id="home">
                                <div class="hero-unit">
                                    <?php
                                        include('student_edit_info.php');  
                                    ?>
                                </div>
                            </div>
                            <center>
                                <button class="btn btn-primary btn-large" name="save"><i class="icon-save icon-large"></i>&nbsp;Update Student</button>
                            </center>   
                        </div>   
                    </form>
                </div>
            </div>

            <script>
                jQuery(document).ready(function() {
                    $('#myTab a').click(function (e) {
                        e.preventDefault();
                        $(this).tab('show');
                    })
                    $(function () {
                        $('#myTab a:first').tab('show');
                    })
                })
            </script>
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

<?php
    if (isset($_POST['save'])){
        $student_no=$_POST['student_no'];
        $surname=$_POST['surname'];
        $firstname=$_POST['firstname'];
        $middlename=$_POST['middlename'];
        $sex=$_POST['sex'];
        $Date_of_Birth=$_POST['Birth_date'];
        $birth_place=$_POST['birth_place'];
        $civil_status=$_POST['civil_status'];
        $citizenship=$_POST['citizenship'];
        $height=$_POST['height'];
        $weight=$_POST['weight'];
        $blood_type=$_POST['blood_type'];
        $Residential_Address=$_POST['Residential_Address'];
        $ZIP_CODE=$_POST['ZIP_CODE'];
        $Telephone_NO=$_POST['Telephone_NO'];
        $Email_Address=$_POST['Email_Address'];
        $Cellphone_NO=$_POST['Cellphone_NO'];
        $Grade_Level=$_POST['Grade_Level'];
        $Section=$_POST['Section'];
        $School_Year=$_POST['School_Year'];
        $Admission_Date=$_POST['Admission_Date'];
        $Guardian_Name=$_POST['Guardian_Name'];
        $Guardian_Relationship=$_POST['Guardian_Relationship'];
        $Guardian_Address=$_POST['Guardian_Address'];
        $Guardian_Contact=$_POST['Guardian_Contact'];
        
        $image= addslashes(file_get_contents($_FILES['image']['tmp_name']));
        $image_name= addslashes($_FILES['image']['name']);
        $image_size= getimagesize($_FILES['image']['tmp_name']);

        move_uploaded_file($_FILES["image"]["tmp_name"],"upload/" . $_FILES["image"]["name"]);            
        $location="upload/" . $_FILES["image"]["name"];

        mysqli_query($conn,"update student set Student_No='$student_no', LastName='$surname', FirstName='$firstname', MiddleName='$middlename',
            Residential_Address='$Residential_Address', ZIP_CODE='$ZIP_CODE', Telephone_NO='$Telephone_NO', Email_Address='$Email_Address',
            Cellphone_NO='$Cellphone_NO', Grade_Level='$Grade_Level', Section='$Section', School_Year='$School_Year', 
            Admission_Date='$Admission_Date', Guardian_Name='$Guardian_Name', Guardian_Relationship='$Guardian_Relationship', 
            Guardian_Address='$Guardian_Address', Guardian_Contact='$Guardian_Contact', Date_of_Birth='$Date_of_Birth', 
            birth_place='$birth_place', Sex='$sex', civil_status='$civil_status', citizenship='$citizenship', height='$height', 
            weight='$weight', blood_type='$blood_type', location='$location'
            where studentID='$get_id'")or die(mysqli_error());

        header('location:student_profiles.php');
    }
?>