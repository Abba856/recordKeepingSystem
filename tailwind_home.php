<?php 
include('dbcon.php'); 
include('session.php');
include('tailwind_header.php'); 
?>
<body class="bg-gray-100 m-0 p-0">
    <?php include('tailwind_nav.php'); ?>
    
    <div class="container mx-auto px-4 py-1">
        <!-- Welcome Section -->
        <div class="bg-white rounded-xl shadow-lg p-6 mb-8">
            <div class="text-center mb-8">
                <h1 class="text-3xl font-bold text-gray-800 mb-2">Welcome to RKMS</h1>
                <p class="text-gray-600">Record Keeping Management System</p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
                <div class="bg-gradient-to-r from-blue-500 to-blue-600 rounded-lg p-6 text-white shadow-md transform hover:scale-105 transition-transform duration-300">
                    <div class="flex items-center">
                        <div class="bg-white bg-opacity-20 p-3 rounded-full mr-4">
                            <i class="fas fa-users text-2xl"></i>
                        </div>
                        <div>
                            <p class="text-sm opacity-80">Total Staff</p>
                            <p class="text-2xl font-bold">
                                <?php
                                    $count_query = mysqli_query($conn,"select COUNT(*) as total from employee");
                                    $count_row = mysqli_fetch_array($count_query);
                                    echo $count_row['total'];
                                ?>
                            </p>
                        </div>
                    </div>
                </div>
                
                <div class="bg-gradient-to-r from-green-500 to-green-600 rounded-lg p-6 text-white shadow-md transform hover:scale-105 transition-transform duration-300">
                    <div class="flex items-center">
                        <div class="bg-white bg-opacity-20 p-3 rounded-full mr-4">
                            <i class="fas fa-graduation-cap text-2xl"></i>
                        </div>
                        <div>
                            <p class="text-sm opacity-80">Total Students</p>
                            <p class="text-2xl font-bold">
                                <?php
                                    $count_query = mysqli_query($conn,"select COUNT(*) as total from student");
                                    $count_row = mysqli_fetch_array($count_query);
                                    echo $count_row['total'];
                                ?>
                            </p>
                        </div>
                    </div>
                </div>
                
                <div class="bg-gradient-to-r from-yellow-500 to-yellow-600 rounded-lg p-6 text-white shadow-md transform hover:scale-105 transition-transform duration-300">
                    <div class="flex items-center">
                        <div class="bg-white bg-opacity-20 p-3 rounded-full mr-4">
                            <i class="fas fa-file-alt text-2xl"></i>
                        </div>
                        <div>
                            <p class="text-sm opacity-80">Total Records</p>
                            <p class="text-2xl font-bold">
                                <?php
                                    $count_query = mysqli_query($conn,"select COUNT(*) as total from employee");
                                    $count_row = mysqli_fetch_array($count_query);
                                    echo $count_row['total'];
                                ?>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="flex justify-center mb-6">
                <img src="img/logo.png" alt="Kanopoly Logo" class="max-w-full h-auto shadow-lg rounded-lg">
            </div>
        </div>

        <!-- Mission and Vision Cards -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-8">
            <div class="bg-white rounded-xl shadow-lg p-6 border-l-4 border-blue-500">
                <div class="flex items-center mb-4">
                    <i class="fas fa-info-circle text-blue-500 text-2xl mr-3"></i>
                    <h2 class="text-xl font-bold text-gray-800">System Mission</h2>
                </div>
                <p class="text-gray-700 text-lg leading-relaxed">
                    To provide efficient record management that is accessible to all users and maintains comprehensive, accurate, and secure data for organizational excellence.
                </p>
            </div>

            <div class="bg-white rounded-xl shadow-lg p-6 border-l-4 border-green-500">
                <div class="flex items-center mb-4">
                    <i class="fas fa-eye text-green-500 text-2xl mr-3"></i>
                    <h2 class="text-xl font-bold text-gray-800">System Vision</h2>
                </div>
                <p class="text-gray-700 text-lg leading-relaxed">
                    A globally recognized system for efficient, secure, and comprehensive record management and data governance.
                </p>
            </div>
        </div>

        <!-- Quick Actions -->
        <div class="bg-white rounded-xl shadow-lg p-6 mb-8">
            <h2 class="text-2xl font-bold text-gray-800 mb-6 text-center">Quick Actions</h2>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                <a href="emp_profiles.php" class="flex flex-col items-center p-4 bg-blue-50 hover:bg-blue-100 rounded-lg transition-colors duration-200 border border-blue-200">
                    <i class="fas fa-users text-blue-500 text-2xl mb-2"></i>
                    <span class="text-gray-700 font-medium">Staff Records</span>
                </a>
                <a href="student_profiles.php" class="flex flex-col items-center p-4 bg-green-50 hover:bg-green-100 rounded-lg transition-colors duration-200 border border-green-200">
                    <i class="fas fa-graduation-cap text-green-500 text-2xl mb-2"></i>
                    <span class="text-gray-700 font-medium">Student Records</span>
                </a>
                <a href="leave_record.php" class="flex flex-col items-center p-4 bg-yellow-50 hover:bg-yellow-100 rounded-lg transition-colors duration-200 border border-yellow-200">
                    <i class="fas fa-list text-yellow-500 text-2xl mb-2"></i>
                    <span class="text-gray-700 font-medium">Service Credits</span>
                </a>
                <a href="entry.php" class="flex flex-col items-center p-4 bg-purple-50 hover:bg-purple-100 rounded-lg transition-colors duration-200 border border-purple-200">
                    <i class="fas fa-file-alt text-purple-500 text-2xl mb-2"></i>
                    <span class="text-gray-700 font-medium">New Entry</span>
                </a>
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