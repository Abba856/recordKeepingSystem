<?php
session_start();
include('dbcon.php');
include('tailwind_header.php');
?>

<body class="bg-gradient-to-br from-blue-50 to-indigo-100 min-h-screen flex items-center">
    <div class="container mx-auto px-4">
        <div class="max-w-md mx-auto">
            
            <div class="mt-12">
                <div class="bg-white rounded-2xl shadow-xl p-8 border border-gray-100">
                    <div class="text-center mb-8">
                        <img src="img/logo.png" alt="RKMS Logo" class="mx-auto h-20 w-auto mb-4">
                        <h1 class="text-3xl font-bold text-gray-800">RKMS Login</h1>
                        <p class="text-gray-600 mt-2">Access your account to continue</p>
                    </div>

                    <form method="POST" class="space-y-6">
                        <div>
                            <label for="UserName" class="block text-sm font-medium text-gray-700 mb-1">Username</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <i class="fas fa-user text-gray-400"></i>
                                </div>
                                <input 
                                    type="text" 
                                    id="UserName" 
                                    name="UserName" 
                                    class="w-full pl-10 pr-3 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200"
                                    placeholder="Enter your username"
                                    required
                                >
                            </div>
                        </div>

                        <div>
                            <label for="Password" class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <i class="fas fa-lock text-gray-400"></i>
                                </div>
                                <input 
                                    type="Password" 
                                    id="Password" 
                                    name="Password" 
                                    class="w-full pl-10 pr-3 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200"
                                    placeholder="Enter your password"
                                    required
                                >
                            </div>
                        </div>

                        <button 
                            type="submit" 
                            name="Login"
                            class="w-full bg-gradient-to-r from-blue-600 to-indigo-700 text-white py-3 px-4 rounded-lg shadow-md hover:from-blue-700 hover:to-indigo-800 transition-all duration-200 transform hover:scale-[1.02] flex items-center justify-center"
                        >
                            <i class="fas fa-sign-in-alt mr-2"></i> Login
                        </button>
                    </form>

                    <?php
                    if (isset($_POST['Login'])){
                        $UserName = $_POST['UserName'];
                        $Password = $_POST['Password'];

                        $login_query = mysqli_query($conn,"select * from user where UserName='$UserName' and Password='$Password' and User_Type='Admin'");
                        $count = mysqli_num_rows($login_query);

                        $login_query1 = mysqli_query($conn,"select * from user where UserName='$UserName' and Password='$Password' and User_Type='User'");
                        $count1 = mysqli_num_rows($login_query1);

                        $row1 = mysqli_fetch_array($login_query1);
                        if(mysqli_num_rows($login_query1) > 0){
                            $f = $row1['FirstName'];
                            $l = $row1['LastName'];
                        }
                        
                        $row = mysqli_fetch_array($login_query);
                        if(mysqli_num_rows($login_query) > 0){
                            $f = $row['FirstName'];
                            $l = $row['LastName'];
                        }

                        if ($count1 == 1){
                            $_SESSION['id'] = $row1['User_id'];
                            $_SESSION['User_Type'] = $row1['User_Type'];
                            $type = $row1['User_Type'];

                            mysqli_query($conn,"INSERT INTO history (data,action,date,user)VALUES('$f $l', 'Login', NOW(),'$type')") or die(mysqli_error());

                            echo('<script>location.href = "tailwind_home.php";</script>');
                        }

                        if ($count > 0){
                            $_SESSION['id'] = $row['User_id'];
                            $_SESSION['User_Type'] = $row['User_Type'];
                            $type = $row['User_Type'];

                            mysqli_query($conn,"INSERT INTO history (data,action,date,user)VALUES('$f $l', 'Login', NOW(),'$type')") or die(mysqli_error());

                            echo('<script>location.href = "tailwind_home.php";</script>');
                        } else {
                    ?>
                            <div class="mt-6 bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-lg flex items-center">
                                <i class="fas fa-exclamation-circle mr-2"></i>
                                <span>Please check your Username and Password</span>
                            </div>
                    <?php 
                        }
                    }
                    ?>

                    <div class="mt-8 text-center">
                        <p class="text-gray-600 text-sm">
                            <i class="fas fa-lock text-xs mr-1"></i>
                            Secure access to Record Keeping Management System
                        </p>
                    </div>
                </div>

                <div class="mt-8 text-center text-gray-600 text-sm">
                    <p>© <?php echo date('Y'); ?> Department of Computer Science - Kanopoly. All rights reserved.</p>
                </div>
            </div>
        </div>
    </div>
</body>
</html>