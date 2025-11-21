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
                        <i class="fas fa-user-plus text-blue-500 mr-3"></i> Add User
                    </h1>
                    <p class="text-gray-600 mt-1">Create a new user account</p>
                </div>
                
                <div class="mt-4 md:mt-0">
                    <a href="user_account.php" class="flex items-center px-4 py-2 bg-gray-200 text-gray-800 rounded-lg hover:bg-gray-300 transition-colors duration-200">
                        <i class="fas fa-arrow-left mr-2"></i> Back
                    </a>
                </div>
            </div>

            <div class="max-w-2xl mx-auto">
                <form method="post" class="space-y-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Username</label>
                            <input 
                                type="text" 
                                name="username" 
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                placeholder="Enter username"
                                required
                            >
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Password</label>
                            <input 
                                type="text" 
                                name="password" 
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                placeholder="Enter password"
                                required
                            >
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">First Name</label>
                            <input 
                                type="text" 
                                name="firstname" 
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                placeholder="Enter first name"
                                required
                            >
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Last Name</label>
                            <input 
                                type="text" 
                                name="lastname" 
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                placeholder="Enter last name"
                                required
                            >
                        </div>

                        <div class="md:col-span-2">
                            <label class="block text-sm font-medium text-gray-700 mb-2">User Type</label>
                            <select 
                                name="type" 
                                class="w-full md:w-1/3 px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                required
                            >
                                <option value="">Select User Type</option>
                                <option value="Admin">Admin</option>
                                <option value="User">User</option>
                            </select>
                        </div>
                    </div>

                    <div class="pt-4">
                        <button 
                            type="submit" 
                            name="save" 
                            class="px-6 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors duration-200 flex items-center"
                        >
                            <i class="fas fa-save mr-2"></i> Save User
                        </button>
                    </div>
                </form>
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

<?php
if (isset($_POST['save'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $type = $_POST['type'];

    mysqli_query($conn,"insert into user (UserName,Password,FirstName,LastName,User_Type)
        values ('$username','$password','$firstname','$lastname','$type')
        ") or die(mysqli_error()); 
    header('location:user_account.php');
}
?>