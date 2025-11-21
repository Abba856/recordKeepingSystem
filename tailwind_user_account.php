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
                        <i class="fas fa-users text-blue-500 mr-3"></i> User Account List
                    </h1>
                    <p class="text-gray-600 mt-1">Manage user accounts in the system</p>
                </div>
                
                <div class="mt-4 md:mt-0 flex flex-wrap gap-2">
                    <a href="emp_profiles.php" class="flex items-center px-4 py-2 bg-gray-200 text-gray-800 rounded-lg hover:bg-gray-300 transition-colors duration-200">
                        <i class="fas fa-arrow-left mr-2"></i> Back
                    </a>
                    <a href="add_user.php" class="flex items-center px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors duration-200">
                        <i class="fas fa-plus-circle mr-2"></i> Add User
                    </a>
                </div>
            </div>

            <!-- Users Table -->
            <div class="overflow-x-auto">
                <table class="min-w-full bg-white rounded-lg overflow-hidden" id="log">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="py-3 px-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Username</th>
                            <th class="py-3 px-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Password</th>
                            <th class="py-3 px-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">First Name</th>
                            <th class="py-3 px-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Last Name</th>
                            <th class="py-3 px-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">User Type</th>
                            <th class="py-3 px-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        <?php 
                        $user_query = mysqli_query($conn,"select * from user");
                        while($row = mysqli_fetch_array($user_query)){
                            $id = $row['User_id']; 
                        ?>
                        <tr class="hover:bg-gray-50 del<?php echo $id ?>">
                            <td class="py-3 px-4 text-sm text-gray-800"><?php echo $row['UserName']; ?></td>
                            <td class="py-3 px-4 text-sm text-gray-800"><?php echo $row['Password']; ?></td>
                            <td class="py-3 px-4 text-sm text-gray-800"><?php echo $row['FirstName']; ?></td>
                            <td class="py-3 px-4 text-sm text-gray-800"><?php echo $row['LastName']; ?></td>
                            <td class="py-3 px-4 text-sm text-gray-800"><?php echo $row['User_Type']; ?></td>
                            <td class="py-3 px-4 text-sm space-x-2">
                                <a href="edit_user.php?id=<?php echo $id; ?>" class="inline-flex items-center px-3 py-1 bg-blue-100 text-blue-700 rounded-lg hover:bg-blue-200 transition-colors duration-200">
                                    <i class="fas fa-edit mr-1"></i> Edit
                                </a>
                                <button data-toggle="modal" href="#d<?php echo $id; ?>" class="inline-flex items-center px-3 py-1 bg-red-100 text-red-700 rounded-lg hover:bg-red-200 transition-colors duration-200">
                                    <i class="fas fa-trash mr-1"></i> Delete
                                </button>
                                
                                <!-- Delete Modal for each user -->
                                <div class="modal hide fade" id="d<?php echo $id; ?>">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">×</button>
                                        <h3><i class="icon-trash icon-large"></i> Confirm Delete</h3>
                                    </div>
                                    <div class="modal-body">
                                        <div class="alert alert-error">
                                            <p>Are you sure you want to delete this user?</p>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <a href="#" class="btn" data-dismiss="modal"><i class="icon-remove icon-large"></i> No</a>
                                        <a href="del_user.php?id=<?php echo $id; ?>" class="btn btn-primary"><i class="icon-ok icon-large"></i> Yes</a>
                                    </div>
                                </div>
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