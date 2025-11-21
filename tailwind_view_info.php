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
            <?php
                $get_query = mysqli_query($conn,"select * from employee where employeeID='$get_id'") or die(mysqli_error());
                $row = mysqli_fetch_array($get_query);
                $id = $row['employeeID'];
            ?>
            <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-6">
                <div>
                    <h1 class="text-2xl font-bold text-gray-800 flex items-center">
                        <i class="fas fa-user-circle text-blue-500 mr-3"></i> Personal Information of <?php echo $row['FirstName']." ".$row['LastName']; ?>
                    </h1>
                    <p class="text-gray-600 mt-1">Employee details overview</p>
                </div>
                
                <div class="mt-4 md:mt-0 flex flex-wrap gap-2">
                    <a href="emp_profiles.php" class="flex items-center px-4 py-2 bg-gray-200 text-gray-800 rounded-lg hover:bg-gray-300 transition-colors duration-200">
                        <i class="fas fa-arrow-left mr-2"></i> Back
                    </a>
                    <a href="edit_emp_view.php?id=<?php echo $id; ?>" class="flex items-center px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors duration-200">
                        <i class="fas fa-edit mr-2"></i> Edit
                    </a>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                <!-- Photo Section -->
                <div class="lg:col-span-1">
                    <div class="bg-gray-50 rounded-lg p-4 text-center">
                        <img 
                            src="<?php echo $row['location']; ?>" 
                            alt="Employee Photo" 
                            class="w-48 h-48 object-cover rounded-lg mx-auto border-4 border-gray-200"
                            onerror="this.onerror=null; this.src='img/default-avatar.png';"
                        >
                    </div>
                </div>

                <!-- Personal Info Section -->
                <div class="lg:col-span-2">
                    <div class="space-y-4">
                        <!-- Basic Info Row -->
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                            <div class="bg-gray-50 p-3 rounded-lg">
                                <p class="text-sm text-gray-600">Item No</p>
                                <p class="font-medium text-gray-800"><?php echo $row['Item_Number'] ?: 'N/A'; ?></p>
                            </div>
                            <div class="bg-gray-50 p-3 rounded-lg">
                                <p class="text-sm text-gray-600">Sex</p>
                                <p class="font-medium text-gray-800"><?php echo $row['Sex'] ?: 'N/A'; ?></p>
                            </div>
                            <div class="bg-gray-50 p-3 rounded-lg">
                                <p class="text-sm text-gray-600">Employee No</p>
                                <p class="font-medium text-gray-800"><?php echo $row['Employee_No'] ?: 'N/A'; ?></p>
                            </div>
                        </div>

                        <!-- Date and Place of Birth Row -->
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                            <div class="bg-gray-50 p-3 rounded-lg">
                                <p class="text-sm text-gray-600">Date of Birth</p>
                                <p class="font-medium text-gray-800"><?php echo $row['Date_of_Birth'] ?: 'N/A'; ?></p>
                            </div>
                            <div class="bg-gray-50 p-3 rounded-lg">
                                <p class="text-sm text-gray-600">Place of Birth</p>
                                <p class="font-medium text-gray-800"><?php echo $row['birth_place'] ?: 'N/A'; ?></p>
                            </div>
                            <div class="bg-gray-50 p-3 rounded-lg">
                                <p class="text-sm text-gray-600">Civil Status</p>
                                <p class="font-medium text-gray-800"><?php echo $row['civil_status'] ?: 'N/A'; ?></p>
                            </div>
                        </div>

                        <!-- Physical Info Row -->
                        <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                            <div class="bg-gray-50 p-3 rounded-lg">
                                <p class="text-sm text-gray-600">Citizenship</p>
                                <p class="font-medium text-gray-800"><?php echo $row['citizenship'] ?: 'N/A'; ?></p>
                            </div>
                            <div class="bg-gray-50 p-3 rounded-lg">
                                <p class="text-sm text-gray-600">Height (m)</p>
                                <p class="font-medium text-gray-800"><?php echo $row['height'] ?: 'N/A'; ?></p>
                            </div>
                            <div class="bg-gray-50 p-3 rounded-lg">
                                <p class="text-sm text-gray-600">Weight (kg)</p>
                                <p class="font-medium text-gray-800"><?php echo $row['weight'] ?: 'N/A'; ?></p>
                            </div>
                            <div class="bg-gray-50 p-3 rounded-lg">
                                <p class="text-sm text-gray-600">Blood Type</p>
                                <p class="font-medium text-gray-800"><?php echo $row['blood_type'] ?: 'N/A'; ?></p>
                            </div>
                        </div>

                        <!-- ID Numbers Row -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div class="bg-gray-50 p-3 rounded-lg">
                                <p class="text-sm text-gray-600">GSIS ID NO</p>
                                <p class="font-medium text-gray-800"><?php echo $row['gsis'] ?: 'N/A'; ?></p>
                            </div>
                            <div class="bg-gray-50 p-3 rounded-lg">
                                <p class="text-sm text-gray-600">PAG-IBIG ID NO</p>
                                <p class="font-medium text-gray-800"><?php echo $row['pag_ibig'] ?: 'N/A'; ?></p>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div class="bg-gray-50 p-3 rounded-lg">
                                <p class="text-sm text-gray-600">PHILHEALTH NO</p>
                                <p class="font-medium text-gray-800"><?php echo $row['PHILHEALTH'] ?: 'N/A'; ?></p>
                            </div>
                            <div class="bg-gray-50 p-3 rounded-lg">
                                <p class="text-sm text-gray-600">SSS NO</p>
                                <p class="font-medium text-gray-800"><?php echo $row['SSS'] ?: 'N/A'; ?></p>
                            </div>
                        </div>

                        <!-- Salary Info Row -->
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                            <div class="bg-gray-50 p-3 rounded-lg">
                                <p class="text-sm text-gray-600">Authorized Salary</p>
                                <p class="font-medium text-gray-800"><?php echo $row['Authorized_Salary'] ?: 'N/A'; ?></p>
                            </div>
                            <div class="bg-gray-50 p-3 rounded-lg">
                                <p class="text-sm text-gray-600">Actual Salary</p>
                                <p class="font-medium text-gray-800"><?php echo $row['Actual_Salary'] ?: 'N/A'; ?></p>
                            </div>
                            <div class="bg-gray-50 p-3 rounded-lg">
                                <p class="text-sm text-gray-600">Step</p>
                                <p class="font-medium text-gray-800"><?php echo $row['step'] ?: 'N/A'; ?></p>
                            </div>
                        </div>

                        <!-- Status and Eligibility Row -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div class="bg-gray-50 p-3 rounded-lg">
                                <p class="text-sm text-gray-600">Status</p>
                                <p class="font-medium text-gray-800"><?php echo $row['Status'] ?: 'N/A'; ?></p>
                            </div>
                            <div class="bg-gray-50 p-3 rounded-lg">
                                <p class="text-sm text-gray-600">Civil Service Eligibility</p>
                                <p class="font-medium text-gray-800"><?php echo $row['Civil_Service_Eligibility'] ?: 'N/A'; ?></p>
                            </div>
                        </div>

                        <!-- Address Info Row -->
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                            <div class="bg-gray-50 p-3 rounded-lg">
                                <p class="text-sm text-gray-600">Residential Address</p>
                                <p class="font-medium text-gray-800"><?php echo $row['Residential_Address'] ?: 'N/A'; ?></p>
                            </div>
                            <div class="bg-gray-50 p-3 rounded-lg">
                                <p class="text-sm text-gray-600">ZIP CODE</p>
                                <p class="font-medium text-gray-800"><?php echo $row['ZIP_CODE1'] ?: 'N/A'; ?></p>
                            </div>
                            <div class="bg-gray-50 p-3 rounded-lg">
                                <p class="text-sm text-gray-600">Telephone NO</p>
                                <p class="font-medium text-gray-800"><?php echo $row['Telephone_NO'] ?: 'N/A'; ?></p>
                            </div>
                        </div>

                        <!-- Contact Info Row -->
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                            <div class="bg-gray-50 p-3 rounded-lg">
                                <p class="text-sm text-gray-600">Email Address</p>
                                <p class="font-medium text-gray-800"><?php echo $row['Email_Address'] ?: 'N/A'; ?></p>
                            </div>
                            <div class="bg-gray-50 p-3 rounded-lg">
                                <p class="text-sm text-gray-600">Agency Employee NO</p>
                                <p class="font-medium text-gray-800"><?php echo $row['ZIP_CODE2'] ?: 'N/A'; ?></p>
                            </div>
                            <div class="bg-gray-50 p-3 rounded-lg">
                                <p class="text-sm text-gray-600">Tin</p>
                                <p class="font-medium text-gray-800"><?php echo $row['Cellphone_NO'] ?: 'N/A'; ?></p>
                            </div>
                        </div>

                        <!-- Job Info Row -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div class="bg-gray-50 p-3 rounded-lg">
                                <p class="text-sm text-gray-600">Item Number</p>
                                <p class="font-medium text-gray-800"><?php echo $row['Item_Number'] ?: 'N/A'; ?></p>
                            </div>
                            <div class="bg-gray-50 p-3 rounded-lg">
                                <p class="text-sm text-gray-600">Position</p>
                                <p class="font-medium text-gray-800"><?php echo $row['Position'] ?: 'N/A'; ?></p>
                            </div>
                        </div>

                        <!-- Area Info Row -->
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                            <div class="bg-gray-50 p-3 rounded-lg">
                                <p class="text-sm text-gray-600">Area Code</p>
                                <p class="font-medium text-gray-800"><?php echo $row['Area_Code'] ?: 'N/A'; ?></p>
                            </div>
                            <div class="bg-gray-50 p-3 rounded-lg">
                                <p class="text-sm text-gray-600">Area Type</p>
                                <p class="font-medium text-gray-800"><?php echo $row['Area_Type'] ?: 'N/A'; ?></p>
                            </div>
                            <div class="bg-gray-50 p-3 rounded-lg">
                                <p class="text-sm text-gray-600">P/P/A ATTRIBUTION</p>
                                <p class="font-medium text-gray-800"><?php echo $row['ATTRIBUTION'] ?: 'N/A'; ?></p>
                            </div>
                        </div>

                        <!-- Remarks -->
                        <div class="bg-gray-50 p-3 rounded-lg">
                            <p class="text-sm text-gray-600">Remarks</p>
                            <p class="font-medium text-gray-800"><?php echo $row['Remarks'] ?: 'N/A'; ?></p>
                        </div>
                    </div>
                </div>
            </div>
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
</body>
</html>