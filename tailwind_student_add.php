<?php 
include('dbcon.php'); 
include('session.php');
include('tailwind_header.php'); 
?>
<body class="bg-gray-100 m-0 p-0">
    <?php include('tailwind_nav.php'); ?>
    
    <div class="container mx-auto px-4 py-1">
        <div class="bg-white rounded-xl shadow-lg p-6 mb-8">
            <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-6">
                <div>
                    <h1 class="text-2xl font-bold text-gray-800 flex items-center">
                        <i class="fas fa-user-plus text-blue-500 mr-3"></i> Add New Student
                    </h1>
                    <p class="text-gray-600 mt-1">Create a new student record</p>
                </div>
                
                <div class="mt-4 md:mt-0">
                    <a href="student_profiles.php" class="flex items-center px-4 py-2 bg-gray-200 text-gray-800 rounded-lg hover:bg-gray-300 transition-colors duration-200">
                        <i class="fas fa-arrow-left mr-2"></i> Back to Students
                    </a>
                </div>
            </div>

            <!-- Tabs Navigation -->
            <div class="border-b border-gray-200 mb-6">
                <ul class="flex flex-wrap -mb-px text-sm font-medium text-center" id="myTab">
                    <li class="mr-2">
                        <a href="#home" class="inline-flex items-center justify-center p-4 border-b-2 border-blue-500 rounded-t-lg text-blue-600 active">
                            <i class="fas fa-user mr-2"></i> Personal Information
                        </a>
                    </li>
                </ul>
            </div>

            <!-- Form -->
            <form method="post" enctype="multipart/form-data" class="space-y-6">
                <div class="tab-content">
                    <div class="tab-pane active" id="home">
                        <div class="bg-gray-50 p-6 rounded-lg">
                            <?php include('student_add_info.php'); ?>
                        </div>
                    </div>
                </div>

                <div class="flex flex-wrap gap-4 pt-6">
                    <button 
                        type="submit" 
                        name="save" 
                        class="px-6 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors duration-200 flex items-center"
                    >
                        <i class="fas fa-save mr-2"></i> Save Student Record
                    </button>
                    <button 
                        type="reset" 
                        class="px-6 py-3 bg-yellow-500 text-white rounded-lg hover:bg-yellow-600 transition-colors duration-200 flex items-center"
                    >
                        <i class="fas fa-refresh mr-2"></i> Reset Form
                    </button>
                </div>
            </form>
        </div>
    </div>

    <?php include('footer.php');?>

    <!-- Bootstrap Logout Modal -->
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
</body>
</html>

<?php
if (isset($_POST['save'])){
    $student_no = $_POST['student_no'];
    $surname = $_POST['surname'];
    $firstname = $_POST['firstname'];
    $middlename = $_POST['middlename'];
    $sex = $_POST['sex'];
    $Date_of_Birth = $_POST['Birth_date'];
    $birth_place = $_POST['birth_place'];
    $civil_status = $_POST['civil_status'];
    $citizenship = $_POST['citizenship'];
    $height = $_POST['height'];
    $weight = $_POST['weight'];
    $blood_type = $_POST['blood_type'];
    $Residential_Address = $_POST['Residential_Address'];
    $ZIP_CODE = $_POST['ZIP_CODE'];
    $Telephone_NO = $_POST['Telephone_NO'];
    $Email_Address = $_POST['Email_Address'];
    $Cellphone_NO = $_POST['Cellphone_NO'];
    $Grade_Level = $_POST['Grade_Level'];
    $Section = $_POST['Section'];
    $School_Year = $_POST['School_Year'];
    $Admission_Date = $_POST['Admission_Date'];
    $Guardian_Name = $_POST['Guardian_Name'];
    $Guardian_Relationship = $_POST['Guardian_Relationship'];
    $Guardian_Address = $_POST['Guardian_Address'];
    $Guardian_Contact = $_POST['Guardian_Contact'];
    
    $image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
    $image_name = addslashes($_FILES['image']['name']);
    $image_size = getimagesize($_FILES['image']['tmp_name']);

    move_uploaded_file($_FILES["image"]["tmp_name"],"upload/" . $_FILES["image"]["name"]);            
    $location = "upload/" . $_FILES["image"]["name"];
    
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