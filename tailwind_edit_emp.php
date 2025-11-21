<?php 
include('dbcon.php'); 
include('session.php');
include('tailwind_header.php'); 
$get_id = $_GET['id'];
?>
<body class="bg-gray-100 m-0 p-0">
    <?php include('tailwind_nav.php'); ?>
    
    <div class="container mx-auto px-4 py-1">
        <div class="bg-white rounded-xl shadow-lg p-6 mb-8">
            <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-6">
                <div>
                    <?php
                        $name_query = mysqli_query($conn,"select * from employee where employeeID='$get_id'") or die(mysqli_error());
                        $name_row = mysqli_fetch_array($name_query);
                    ?>
                    <h1 class="text-2xl font-bold text-gray-800 flex items-center">
                        <i class="fas fa-user-edit text-blue-500 mr-3"></i> Edit <?php echo $name_row['FirstName']." ".$name_row['LastName']; ?> Information
                    </h1>
                    <p class="text-gray-600 mt-1">Update employee details</p>
                </div>
                
                <div class="mt-4 md:mt-0">
                    <a href="emp_profiles.php" class="flex items-center px-4 py-2 bg-gray-200 text-gray-800 rounded-lg hover:bg-gray-300 transition-colors duration-200">
                        <i class="fas fa-arrow-left mr-2"></i> Back
                    </a>
                </div>
            </div>

            <!-- Tabs Navigation -->
            <div class="border-b border-gray-200 mb-6">
                <ul class="flex flex-wrap -mb-px text-sm font-medium text-center" id="myTab">
                    <li class="mr-2">
                        <a href="#home" class="inline-flex items-center justify-center p-4 border-b-2 border-blue-500 rounded-t-lg text-blue-600 active">
                            <i class="fas fa-user mr-2"></i> Personal Info
                        </a>
                    </li>
                </ul>
            </div>

            <!-- Form -->
            <form method="post" enctype="multipart/form-data" class="space-y-6">
                <div class="tab-content">
                    <div class="tab-pane active" id="home">
                        <div class="bg-gray-50 p-6 rounded-lg">
                            <?php include('add_edit_info.php'); ?>
                        </div>
                    </div>
                </div>

                <div class="text-center pt-6">
                    <button type="submit" name="save" class="px-6 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors duration-200 flex items-center justify-center mx-auto">
                        <i class="fas fa-save mr-2"></i> Save Changes
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
    $gsis = $_POST['gsis'];
    $pag_ibig = $_POST['pag_ibig'];
    $PHILHEALTH = $_POST['PHILHEALTH'];
    $SSS = $_POST['SSS'];
    $Authorized_Salary = $_POST['Authorized_Salary'];
    $Actual_Salary = $_POST['Actual_Salary'];
    $step = $_POST['step'];
    $Status = $_POST['Status'];
    $Civil_Service_Eligibility = $_POST['Civil_Service_Eligibility'];
    $Remarks = $_POST['Remarks'];
    $Residential_Address = $_POST['Residential_Address'];
    $ZIP_CODE1 = $_POST['ZIP_CODE1'];
    $Telephone_NO = $_POST['Telephone_NO'];
    $Permanent_Address = $_POST['Permanent_Address'];
    $ZIP_CODE2 = $_POST['ZIP_CODE2'];
    $Email_Address = $_POST['Email_Address'];
    $Cellphone_NO = $_POST['Cellphone_NO'];
    $Agency_Employee_NO = $_POST['Agency_Employee_NO'];
    $tin = $_POST['tin'];
    $Item_Number = $_POST['Item_Number'];
    $Position = $_POST['Position'];
    $Area_Code = $_POST['Area_Code'];
    $Area_Type = $_POST['Area_Type'];
    $ATTRIBUTION = $_POST['ATTRIBUTION'];
    $school = $_POST['school'];
    $Employee_No = $_POST['Employee_No'];
    $qualification = $_POST['qualification'];	
    $Classification = $_POST['Classification']; 
    $District = $_POST['District']; 
          
    $image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
    $image_name = addslashes($_FILES['image']['name']);
    $image_size = getimagesize($_FILES['image']['tmp_name']);

    move_uploaded_file($_FILES["image"]["tmp_name"],"upload/" . $_FILES["image"]["name"]);            
    $location = "upload/" . $_FILES["image"]["name"];

    mysqli_query($conn,"update employee set LastName='$surname',FirstName='$firstname',MiddleName='$middlename',
        Residential_Address='$Residential_Address',ZIP_CODE1='$ZIP_CODE1',Telephone_NO='$Telephone_NO',
        Permanent_Address='$Permanent_Address',ZIP_CODE2='$ZIP_CODE2',Email_Address='$Email_Address',
        Cellphone_NO='$Cellphone_NO',Agency_Employee_NO='$Agency_Employee_NO',tin='$tin',
        Item_Number='$Item_Number',Position='$Position',Area_Code='$Area_Code',Area_Type='$Area_Type',
        ATTRIBUTION='$ATTRIBUTION',School='$school',Date_of_Birth='$Date_of_Birth',birth_place='$birth_place',
        Sex='$sex',civil_status='$civil_status',citizenship='$citizenship',height='$height',weight='$weight',
        blood_type='$blood_type',gsis='$gsis',pag_ibig='$pag_ibig',PHILHEALTH='$PHILHEALTH',SSS='$SSS',
        Authorized_Salary='$Authorized_Salary',Actual_Salary='$Actual_Salary',step='$step',Status='$Status',
        Civil_Service_Eligibility='$Civil_Service_Eligibility',Remarks='$Remarks',location='$location',
        Employee_No='$Employee_No',Classification='$Classification',District='$District',qualification='$qualification'     

        where employeeID='$get_id'") or die(mysqli_error());

    header('location:emp_profiles.php');
}
?>