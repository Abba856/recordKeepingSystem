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

        <div id="element" class="hero-body-add">
            <div class="alert alert-info">
                <h2><i class="icon-plus-sign icon-large"></i> Add New Student</h2>
            </div>
            
            <div class="card">
                <div class="card-header">
                    <h4><i class="icon-user icon-large"></i> Student Information Form</h4>
                </div>
                <div class="card-body">
                    <div class="pull-right mb-20">
                        <a class="btn btn-success btn-large" href="student_profiles.php">  <i class="icon-arrow-left icon-large"></i>&nbsp;Back to Students</a>
                    </div>

                    <ul class="nav nav-tabs" id="myTab">
                        <li class="active"><a href="#home"><i class="icon-user icon-large"></i> Personal Information</a></li>
                    </ul>
                    
                    <form method="post" enctype="multipart/form-data" class="form-horizontal">
                        <div class="tab-content">
                            <div class="tab-pane active" id="home">
                                <?php
                                    include('student_add_info.php');  
                                ?>
                            </div>
                        </div>
                        <div class="form-actions text-center mt-20">
                            <button class="btn btn-primary btn-large" name="save"><i class="icon-save icon-large"></i>&nbsp;Save Student Record</button>
                            <button class="btn btn-warning btn-large" type="reset"><i class="icon-refresh icon-large"></i>&nbsp;Reset Form</button>
                        </div>
                    </form>
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
        
        mysqli_query($conn,"insert into student (Student_No, LastName, FirstName, MiddleName, location, sex, Date_of_Birth, birth_place,
          civil_status, citizenship, height, weight, blood_type, Residential_Address, ZIP_CODE, Telephone_NO, Email_Address, Cellphone_NO,
          Grade_Level, Section, School_Year, Admission_Date, Guardian_Name, Guardian_Relationship, Guardian_Address, Guardian_Contact)
            values ('$student_no', '$surname', '$firstname', '$middlename', '$location', '$sex', '$Date_of_Birth', '$birth_place',
            '$civil_status', '$citizenship', '$height', '$weight', '$blood_type', '$Residential_Address', '$ZIP_CODE', '$Telephone_NO', '$Email_Address', '$Cellphone_NO',
            '$Grade_Level', '$Section', '$School_Year', '$Admission_Date', '$Guardian_Name', '$Guardian_Relationship', '$Guardian_Address', '$Guardian_Contact')")
            or die(mysqli_error());
         
        echo('<script>location.href = "student_profiles.php";</script>');
    }
?>

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