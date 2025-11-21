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
                $leave_query = mysqli_query($conn,"select * from employee where employeeID='$get_id'") or die(mysqli_errno());
                $row = mysqli_fetch_array($leave_query);
                $member_id = $row['employeeID'];
            ?>
            <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-6">
                <div>
                    <h1 class="text-2xl font-bold text-gray-800 flex items-center">
                        <i class="fas fa-calendar-plus text-blue-500 mr-3"></i> Add Service Credit to <?php echo $row['FirstName']." ".$row['LastName']; ?>
                    </h1>
                    <p class="text-gray-600 mt-1">Record service credit information</p>
                </div>
                
                <div class="mt-4 md:mt-0">
                    <a href="emp_profiles.php" class="flex items-center px-4 py-2 bg-gray-200 text-gray-800 rounded-lg hover:bg-gray-300 transition-colors duration-200">
                        <i class="fas fa-arrow-left mr-2"></i> Back
                    </a>
                </div>
            </div>

            <div class="max-w-2xl mx-auto">
                <form method="post" class="space-y-6">
                    <input type="hidden" name="name" value="<?php echo $member_id; ?>">
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="md:col-span-2">
                            <label class="block text-sm font-medium text-gray-700 mb-2">Inclusive Dates</label>
                            <div class="flex flex-col md:flex-row gap-4">
                                <div class="flex-1">
                                    <input 
                                        type="date" 
                                        name="from" 
                                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                        placeholder="From"
                                    >
                                </div>
                                <div class="flex-1">
                                    <input 
                                        type="date" 
                                        name="to" 
                                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                        placeholder="To"
                                    >
                                </div>
                            </div>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">No. of Days Served Rendered</label>
                            <input 
                                type="number" 
                                name="rendered" 
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                placeholder="Enter number of days"
                            >
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">No. of Days Service Credits Approved</label>
                            <input 
                                type="number" 
                                name="approved" 
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                placeholder="Enter approved days"
                            >
                        </div>
                    </div>

                    <div class="pt-4">
                        <button 
                            type="submit" 
                            name="save" 
                            class="px-6 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors duration-200 flex items-center"
                        >
                            <i class="fas fa-save mr-2"></i> Save Service Credit
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
include('dbcon.php');    
if (isset($_POST['save'])){
    $emp_id = $_POST['name'];
    $from = $_POST['from'];
    $to = $_POST['to'];
    $rendered = $_POST['rendered'];
    $approved = $_POST['approved'];

    mysqli_query($conn,"insert into leave_record (from_date,to_date,employeeID,No_of_Days,No_of_Days_approved) 
        values('$from','$to','$emp_id','$rendered','$approved')") or die(mysqli_error());

    header('location:emp_profiles.php');
}
?>