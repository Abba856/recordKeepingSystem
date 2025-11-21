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
                        <i class="fas fa-graduation-cap text-blue-500 mr-3"></i> Student Management
                    </h1>
                    <p class="text-gray-600 mt-1">Manage and view all student records</p>
                </div>
                
                <div class="mt-4 md:mt-0">
                    <a href="student_add.php" class="flex items-center px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors duration-200 shadow-md">
                        <i class="fas fa-plus-circle mr-2"></i> Add New Student
                    </a>
                </div>
            </div>

            <!-- Filter Section -->
            <div class="bg-gray-50 p-4 rounded-lg mb-6">
                <form method="post" action="sort_student.php">
                    <div class="flex flex-col md:flex-row md:items-center gap-4">
                        <div class="flex-1">
                            <label class="block text-sm font-medium text-gray-700 mb-2">Sort Students by Grade Level</label>
                            <div class="flex gap-2">
                                <select name="grade_level" class="flex-1 px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
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
                                <button name="filter" class="px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 transition-colors duration-200 flex items-center">
                                    <i class="fas fa-filter mr-1"></i> Filter
                                </button>
                            </div>
                        </div>
                        <div>
                            <form method="POST" action="search_student.php" class="mt-6 md:mt-0">
                                <div class="relative">
                                    <input 
                                        type="text" 
                                        name="search" 
                                        placeholder="Search Students..." 
                                        class="w-full px-4 py-2 pl-10 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                    >
                                    <div class="absolute left-3 top-2.5 text-gray-400">
                                        <i class="fas fa-search"></i>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </form>
            </div>

            <!-- Students Table -->
            <div class="overflow-x-auto">
                <table class="min-w-full bg-white rounded-lg overflow-hidden" id="student-table">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="py-3 px-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Student No</th>
                            <th class="py-3 px-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Full Name</th>
                            <th class="py-3 px-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Grade Level</th>
                            <th class="py-3 px-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Section</th>
                            <th class="py-3 px-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Photo</th>
                            <th class="py-3 px-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        <?php 
                        $student_query = mysqli_query($conn,"select * from student");
                        while($row = mysqli_fetch_array($student_query)){
                            $id = $row['studentID']; 
                        ?>
                        <tr class="hover:bg-gray-50 del<?php echo $id ?>">
                            <td class="py-3 px-4 text-sm text-gray-800"><?php echo $row['Student_No']; ?></td>
                            <td class="py-3 px-4 text-sm text-gray-800"><?php echo $row['LastName'].", ".$row['FirstName']." ".$row['MiddleName']; ?></td>
                            <td class="py-3 px-4 text-sm text-gray-800"><?php echo $row['Grade_Level']; ?></td>
                            <td class="py-3 px-4 text-sm text-gray-800"><?php echo $row['Section']; ?></td>
                            <td class="py-3 px-4">
                                <?php if(!empty($row['location']) && file_exists($row['location'] )): ?>
                                    <img class="w-12 h-12 object-cover rounded-full border-2 border-gray-200" 
                                         src="<?php echo $row['location'];?>" 
                                         alt="<?php echo $row['FirstName']. ' ' .$row['LastName'];?>" 
                                         onerror="this.onerror=null; this.src='img/default-avatar.png';">
                                <?php else: ?>
                                    <img class="w-12 h-12 object-cover rounded-full border-2 border-gray-200" 
                                         src="img/default-avatar.png" 
                                         alt="Default Avatar">
                                <?php endif; ?>
                            </td>
                            <td class="py-3 px-4 text-sm space-x-2">
                                <a href="student_edit.php?id=<?php echo $id; ?>" class="inline-flex items-center px-3 py-1 bg-blue-100 text-blue-700 rounded-lg hover:bg-blue-200 transition-colors duration-200">
                                    <i class="fas fa-edit mr-1"></i> Edit
                                </a>
                                <button data-toggle="modal" href="#d<?php echo $id; ?>" class="inline-flex items-center px-3 py-1 bg-red-100 text-red-700 rounded-lg hover:bg-red-200 transition-colors duration-200">
                                    <i class="fas fa-trash mr-1"></i> Delete
                                </button>
                                <?php include('student_button_delete.php'); ?>
                                <button data-toggle="modal" href="#<?php echo $id; ?>" class="inline-flex items-center px-3 py-1 bg-yellow-100 text-yellow-700 rounded-lg hover:bg-yellow-200 transition-colors duration-200">
                                    <i class="fas fa-eye mr-1"></i> View
                                </button>
                                <?php include('student_button_view.php'); ?>
                            </td>
                        </tr>
                        <?php }?>
                    </tbody>
                </table>
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