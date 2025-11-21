<header class="bg-gradient-to-r from-blue-900 to-blue-700 text-white shadow-lg sticky top-0 z-50">
    <div class="container mx-auto px-4">
        <div class="flex flex-col md:flex-row justify-between items-center py-3">
            <div class="flex items-center space-x-4 mb-3 md:mb-0">
                <img src="img/logo.png" alt="Logo" class="h-14 w-auto">
                <div>
                    <h1 class="text-lg md:text-xl font-bold">RKMS - Record Keeping Management System</h1>
                    <p class="text-xs md:text-sm text-blue-200">Department of Computer Science - Kanopoly</p>
                </div>
            </div>
            
            <div class="w-full md:w-1/4 mb-3 md:mb-0 order-last md:order-none">
                <form method="POST" action="search.php" class="relative">
                    <input 
                        type="text" 
                        name="search" 
                        placeholder="Search..." 
                        class="w-full px-3 py-1.5 rounded-full bg-blue-800 text-white placeholder-blue-300 focus:outline-none focus:ring-2 focus:ring-blue-500 text-sm"
                    >
                    <button type="submit" class="absolute right-2.5 top-1.5 text-blue-300 text-sm">
                        <i class="fas fa-search text-blue-300"></i>
                    </button>
                </form>
            </div>
            
            <div class="text-right order-first md:order-last mb-2 md:mb-0">
                <div class="text-xs md:text-sm">
                    <?php
                        $Today=date('y:m:d');
                        $new=date('l, F d, Y',strtotime($Today));
                        echo '<p class="font-medium">' . $new . '</p>';
                    ?>
                    <?php
                        if(isset($_SESSION['id'])) {
                            $id_session = $_SESSION['id'];
                            $user_query=mysqli_query($conn,"select * from user where User_id='$id_session'")or die(mysqli_error($conn));
                            $row=mysqli_fetch_array($user_query);
                            echo '<p class="text-blue-200">Welcome: '. $row['User_Type'] . ' - ' . $row['FirstName'] . ' ' . $row['LastName'] . '</p>';
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>
</header>

<!-- Secondary Navigation -->
<nav class="bg-white shadow-md sticky top-14 z-40">
    <div class="container mx-auto px-4">
        <ul class="flex flex-wrap justify-center md:justify-start space-x-1 md:space-x-1 py-1 overflow-x-auto">
            <li class="mb-1 md:mb-0">
                <a href="home.php" class="flex items-center px-3 py-2 rounded-lg text-gray-700 hover:bg-blue-100 hover:text-blue-700 transition-colors duration-200 whitespace-nowrap">
                    <i class="fas fa-home text-blue-600 mr-2"></i> Home
                </a>
            </li>
            <li class="mb-1 md:mb-0">
                <a href="emp_profiles.php" class="flex items-center px-3 py-2 rounded-lg text-gray-700 hover:bg-blue-100 hover:text-blue-700 transition-colors duration-200 whitespace-nowrap">
                    <i class="fas fa-users text-blue-600 mr-2"></i> Staff
                </a>
            </li>
            <li class="mb-1 md:mb-0">
                <a href="student_profiles.php" class="flex items-center px-3 py-2 rounded-lg text-gray-700 hover:bg-blue-100 hover:text-blue-700 transition-colors duration-200 whitespace-nowrap">
                    <i class="fas fa-graduation-cap text-blue-600 mr-2"></i> Students
                </a>
            </li>
            <li class="mb-1 md:mb-0">
                <a href="leave_record.php" class="flex items-center px-3 py-2 rounded-lg text-gray-700 hover:bg-blue-100 hover:text-blue-700 transition-colors duration-200 whitespace-nowrap">
                    <i class="fas fa-list text-blue-600 mr-2"></i> Service Credits
                </a>
            </li>
            <li class="mb-1 md:mb-0">
                <a href="entry.php" class="flex items-center px-3 py-2 rounded-lg text-gray-700 hover:bg-blue-100 hover:text-blue-700 transition-colors duration-200 whitespace-nowrap">
                    <i class="fas fa-file-alt text-blue-600 mr-2"></i> Entry
                </a>
            </li>
            <li class="mb-1 md:mb-0">
                <a href="history_log.php" class="flex items-center px-3 py-2 rounded-lg text-gray-700 hover:bg-blue-100 hover:text-blue-700 transition-colors duration-200 whitespace-nowrap">
                    <i class="fas fa-history text-blue-600 mr-2"></i> History Log
                </a>
            </li>
            <li class="mb-1 md:mb-0">
                <a id="logout" data-toggle="modal" href="#myModal" class="flex items-center px-3 py-2 rounded-lg text-gray-700 hover:bg-blue-100 hover:text-blue-700 transition-colors duration-200 whitespace-nowrap">
                    <i class="fas fa-sign-out-alt text-red-600 mr-2"></i> Logout
                </a>
            </li>
        </ul>
    </div>
</nav>

<!-- Bootstrap Logout Modal -->
<div class="modal hide fade" id="myModal">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">×</button>
        <h3><i class="fas fa-sign-out-alt mr-2"></i> Confirm Logout</h3>
    </div>
    <div class="modal-body">
        <p>Are you sure you want to logout from the system?</p>
    </div>
    <div class="modal-footer">
        <a href="#" class="btn" data-dismiss="modal"><i class="fas fa-times mr-1"></i> Cancel</a>
        <a href="logout.php" class="btn btn-primary"><i class="fas fa-check mr-1"></i> Yes, Logout</a>
    </div>
</div>