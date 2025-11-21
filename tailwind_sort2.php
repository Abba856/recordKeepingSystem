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
                        <i class="fas fa-filter text-blue-500 mr-3"></i> Personnel Sorting
                    </h1>
                    <p class="text-gray-600 mt-1">Sort personnel by qualification</p>
                </div>
                
                <div class="mt-4 md:mt-0 flex flex-wrap gap-2">
                    <a href="emp_add.php" class="flex items-center px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors duration-200">
                        <i class="fas fa-plus-circle mr-2"></i> Add Personnel
                    </a>
                    <a href="user_account.php" class="flex items-center px-4 py-2 bg-gray-200 text-gray-800 rounded-lg hover:bg-gray-300 transition-colors duration-200">
                        <i class="fas fa-user mr-2"></i> User Account
                    </a>
                </div>
            </div>

            <!-- Sort Forms -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
                <div class="bg-gray-50 p-4 rounded-lg">
                    <form method="post" action="sort.php" class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Sort Personnel by School</label>
                            <div class="flex gap-2">
                                <select name="sort" class="flex-1 px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                    <option value="">Select School</option>
                                    <?php
                                        $while_query = mysqli_query($conn,"select * from school") or die(mysqli_error());
                                        while($row = mysqli_fetch_array($while_query)){
                                    ?>
                                    <option value="<?php echo $row['Name']; ?>"><?php echo $row['Name']; ?></option>
                                    <?php }; ?>
                                </select>
                                <button name="filter" class="px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 transition-colors duration-200 flex items-center">
                                    <i class="fas fa-filter mr-1"></i> Sort
                                </button>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="bg-gray-50 p-4 rounded-lg">
                    <form method="post" action="sort1.php" class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Sort Personnel by Position</label>
                            <div class="flex gap-2">
                                <select name="position" class="flex-1 px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                    <option value="">Select Position</option>
                                    <?php
                                        $while_query = mysqli_query($conn,"select * from position") or die(mysqli_error());
                                        while($row = mysqli_fetch_array($while_query)){
                                    ?>
                                    <option value="<?php echo $row['position']; ?>"><?php echo $row['position']; ?></option>
                                    <?php }; ?>
                                </select>
                                <button name="filter1" class="px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 transition-colors duration-200 flex items-center">
                                    <i class="fas fa-filter mr-1"></i> Sort
                                </button>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="bg-gray-50 p-4 rounded-lg">
                    <form method="post" class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Sort Personnel by Qualification</label>
                            <div class="flex gap-2">
                                <select name="qualification" class="flex-1 px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                    <option value="">Select Qualification</option>
                                    <?php
                                        $while_query = mysqli_query($conn,"select * from qualification") or die(mysqli_error());
                                        while($row = mysqli_fetch_array($while_query)){
                                    ?>
                                    <option value="<?php echo $row['qualification']; ?>"><?php echo $row['qualification']; ?></option>
                                    <?php }; ?>
                                </select>
                                <button name="filter2" class="px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 transition-colors duration-200 flex items-center">
                                    <i class="fas fa-filter mr-1"></i> Sort
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <?php
            if(isset($_POST['filter2'])){
                $qualification = $_POST['qualification'];
                $name_query = mysqli_query($conn,"select * from qualification where qualification='$qualification'") or die(mysqli_error());
                $query_row = mysqli_fetch_array($name_query);
            ?>
            <div class="alert alert-info bg-blue-50 border border-blue-200 text-blue-700 p-4 rounded-lg mb-6">
                <h2 class="text-lg font-semibold"><?php echo $query_row['qualification'] . ' Degree List'; ?></h2>
            </div>
            <?php } ?>

            <!-- Personnel Table -->
            <div class="overflow-x-auto">
                <table class="min-w-full bg-white rounded-lg overflow-hidden" id="log">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="py-3 px-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">FirstName</th>
                            <th class="py-3 px-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">LastName</th>
                            <th class="py-3 px-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">MiddleName</th>
                            <th class="py-3 px-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Sex</th>
                            <th class="py-3 px-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Photo</th>
                            <th class="py-3 px-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        <?php
                        if (isset($_POST['filter2'])){
                            $qualification = $_POST['qualification'];
                            $emp_query = mysqli_query($conn,"select * from employee where qualification='$qualification'");
                            while($row = mysqli_fetch_array($emp_query)){ 
                                $id = $row['employeeID']; 
                        ?>
                        <tr class="hover:bg-gray-50 del<?php echo $id ?>">
                            <td class="py-3 px-4 text-sm text-gray-800"><?php echo $row['FirstName']; ?></td>
                            <td class="py-3 px-4 text-sm text-gray-800"><?php echo $row['LastName']; ?></td>
                            <td class="py-3 px-4 text-sm text-gray-800"><?php echo $row['MiddleName']; ?></td>
                            <td class="py-3 px-4 text-sm text-gray-800"><?php echo $row['Sex']; ?></td>
                            <td class="py-3 px-4">
                                <img class="w-10 h-8 object-cover rounded" 
                                     src="<?php echo $row['location'];?>" 
                                     alt="<?php echo $row['FirstName']. ' ' .$row['LastName'];?>" 
                                     onmouseover="showtrail('<?php echo $row['location'];?>','<?php echo $row['FirstName']. ' ' .$row['LastName'];?>',200,5)" 
                                     onmouseout="hidetrail()">
                            </td>
                            <td class="py-3 px-4 text-sm space-x-2">
                                <a href="edit_emp.php?id=<?php echo $id; ?>" class="inline-flex items-center px-3 py-1 bg-blue-100 text-blue-700 rounded-lg hover:bg-blue-200 transition-colors duration-200">
                                    <i class="fas fa-edit mr-1"></i> Edit
                                </a>
                                <button data-toggle="modal" href="#d<?php echo $id; ?>" class="inline-flex items-center px-3 py-1 bg-red-100 text-red-700 rounded-lg hover:bg-red-200 transition-colors duration-200">
                                    <i class="fas fa-trash mr-1"></i> Delete
                                </button>
                                <?php include('button_delete.php'); ?>
                                <button data-toggle="modal" href="#<?php echo $id; ?>" class="inline-flex items-center px-3 py-1 bg-yellow-100 text-yellow-700 rounded-lg hover:bg-yellow-200 transition-colors duration-200">
                                    <i class="fas fa-eye mr-1"></i> View
                                </button>
                                <?php
                                    include('button_view.php');
                                ?>
                                <button data-toggle="modal" href="#a<?php echo $id; ?>" class="inline-flex items-center px-3 py-1 bg-green-100 text-green-700 rounded-lg hover:bg-green-200 transition-colors duration-200">
                                    <i class="fas fa-plus mr-1"></i> Add
                                </button>
                                <?php
                                    include('button_add.php');
                                ?>
                            </td>
                        </tr>
                        <?php 
                            }
                        } else {
                            // Show all if no filter is applied
                            $emp_query = mysqli_query($conn,"select * from employee where Classification='Teaching'");
                            while($row = mysqli_fetch_array($emp_query)){ 
                                $id = $row['employeeID']; 
                        ?>
                        <tr class="hover:bg-gray-50 del<?php echo $id ?>">
                            <td class="py-3 px-4 text-sm text-gray-800"><?php echo $row['FirstName']; ?></td>
                            <td class="py-3 px-4 text-sm text-gray-800"><?php echo $row['LastName']; ?></td>
                            <td class="py-3 px-4 text-sm text-gray-800"><?php echo $row['MiddleName']; ?></td>
                            <td class="py-3 px-4 text-sm text-gray-800"><?php echo $row['Sex']; ?></td>
                            <td class="py-3 px-4">
                                <img class="w-10 h-8 object-cover rounded" 
                                     src="<?php echo $row['location'];?>" 
                                     alt="<?php echo $row['FirstName']. ' ' .$row['LastName'];?>" 
                                     onmouseover="showtrail('<?php echo $row['location'];?>','<?php echo $row['FirstName']. ' ' .$row['LastName'];?>',200,5)" 
                                     onmouseout="hidetrail()">
                            </td>
                            <td class="py-3 px-4 text-sm space-x-2">
                                <a href="edit_emp.php?id=<?php echo $id; ?>" class="inline-flex items-center px-3 py-1 bg-blue-100 text-blue-700 rounded-lg hover:bg-blue-200 transition-colors duration-200">
                                    <i class="fas fa-edit mr-1"></i> Edit
                                </a>
                                <button data-toggle="modal" href="#d<?php echo $id; ?>" class="inline-flex items-center px-3 py-1 bg-red-100 text-red-700 rounded-lg hover:bg-red-200 transition-colors duration-200">
                                    <i class="fas fa-trash mr-1"></i> Delete
                                </button>
                                <?php include('button_delete.php'); ?>
                                <button data-toggle="modal" href="#<?php echo $id; ?>" class="inline-flex items-center px-3 py-1 bg-yellow-100 text-yellow-700 rounded-lg hover:bg-yellow-200 transition-colors duration-200">
                                    <i class="fas fa-eye mr-1"></i> View
                                </button>
                                <?php
                                    include('button_view.php');
                                ?>
                                <button data-toggle="modal" href="#a<?php echo $id; ?>" class="inline-flex items-center px-3 py-1 bg-green-100 text-green-700 rounded-lg hover:bg-green-200 transition-colors duration-200">
                                    <i class="fas fa-plus mr-1"></i> Add
                                </button>
                                <?php
                                    include('button_add.php');
                                ?>
                            </td>
                        </tr>
                        <?php 
                            }
                        }
                        ?>
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