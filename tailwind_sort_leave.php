<?php 
include('dbcon.php'); 
include('session.php');
include('tailwind_header.php');

if (isset($_POST['sort'])){
    $sort = $_POST['sort'];
}
?>
<body class="bg-gray-100 m-0 p-0">
    <?php include('tailwind_nav.php'); ?>
    
    <div class="container mx-auto px-4 py-1">
        <div class="bg-white rounded-xl shadow-lg p-6 mb-8">
            <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-6">
                <div>
                    <h1 class="text-2xl font-bold text-gray-800 flex items-center">
                        <i class="fas fa-file-alt text-blue-500 mr-3"></i> Service Credit
                    </h1>
                    <p class="text-gray-600 mt-1">View and manage service credits by year</p>
                </div>
                
                <div class="mt-4 md:mt-0">
                    <form method="POST" action="leave_preview.php" class="inline-block">
                        <input type="hidden" name="print_sort" value="<?php echo $sort; ?>">
                        <button type="submit" name="print" class="flex items-center px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 transition-colors duration-200">
                            <i class="fas fa-print mr-2"></i> Print Preview
                        </button>
                    </form>
                </div>
            </div>

            <!-- Sort Form -->
            <div class="flex flex-col md:flex-row md:items-center gap-4 mb-6 p-4 bg-gray-50 rounded-lg">
                <form method="POST" class="flex flex-col md:flex-row gap-2">
                    <select name="sort" class="px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                        <?php
                        $year = 1999;
                        while ($year < date("Y")) {
                            $year++;
                        ?>
                        <option value="<?php echo $year; ?>" <?php if(isset($sort) && $sort == $year) echo 'selected'; ?>><?php echo $year; ?></option>
                        <?php }; ?>
                    </select>
                    <button type="submit" name="ok" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors duration-200">
                        Sort
                    </button>
                </form>
            </div>

            <!-- Leave Records Table -->
            <div class="overflow-x-auto">
                <table class="min-w-full bg-white rounded-lg overflow-hidden" id="log">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="py-3 px-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                            <th class="py-3 px-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Inclusive Date</th>
                            <th class="py-3 px-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Days Served Rendered</th>
                            <th class="py-3 px-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Days Approved</th>
                            <th class="py-3 px-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Action</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        <?php 
                        if (isset($_POST['ok'])) {
                            $sort = $_POST['sort'];
                        ?>
                        <?php 
                        $emp_query = mysqli_query($conn,"select * from leave_record where from_date like '%$sort%'");	
                        while($row = mysqli_fetch_array($emp_query)){ 
                            $id = $row['leave_id']; 
                            $emp = $row['employeeID']; 
                        ?>
                        <tr class="hover:bg-gray-50 del<?php echo $id ?>">
                            <?php
                                $result = mysqli_query($conn,"select * from employee where employeeID='$emp'") or die(mysqli_error());
                                $row_emp = mysqli_fetch_array($result);
                            ?>
                            <td class="py-3 px-4 text-sm text-gray-800"><?php echo $row_emp['FirstName']." ".$row_emp['LastName']; ?></td>
                            <td class="py-3 px-4 text-sm text-gray-800"><?php echo $row['from_date']."-".$row['to_date']; ?></td>
                            <td class="py-3 px-4 text-sm text-gray-800"><?php echo $row['No_of_Days']; ?></td>
                            <td class="py-3 px-4 text-sm text-gray-800"><?php echo $row['No_of_Days_approved']; ?></td>
                            <td class="py-3 px-4 text-sm">
                                <button 
                                    class="btn-danger1 inline-flex items-center px-3 py-1 bg-red-100 text-red-700 rounded-lg hover:bg-red-200 transition-colors duration-200"
                                    id="<?php echo $id; ?>"
                                >
                                    <i class="fas fa-trash mr-1"></i> Delete
                                </button>
                            </td>
                        </tr>
                        <?php 
                        }
                        } else {
                            // Show all records if no sort is selected
                            $emp_query = mysqli_query($conn,"select * from leave_record");
                            while($row = mysqli_fetch_array($emp_query)){ 
                                $id = $row['leave_id']; 
                                $emp = $row['employeeID']; 
                            ?>
                            <tr class="hover:bg-gray-50 del<?php echo $id ?>">
                                <?php
                                    $result = mysqli_query($conn,"select * from employee where employeeID='$emp'") or die(mysqli_error());
                                    $row_emp = mysqli_fetch_array($result);
                                ?>
                                <td class="py-3 px-4 text-sm text-gray-800"><?php echo $row_emp['FirstName']." ".$row_emp['LastName']; ?></td>
                                <td class="py-3 px-4 text-sm text-gray-800"><?php echo $row['from_date']."-".$row['to_date']; ?></td>
                                <td class="py-3 px-4 text-sm text-gray-800"><?php echo $row['No_of_Days']; ?></td>
                                <td class="py-3 px-4 text-sm text-gray-800"><?php echo $row['No_of_Days_approved']; ?></td>
                                <td class="py-3 px-4 text-sm">
                                    <button 
                                        class="btn-danger1 inline-flex items-center px-3 py-1 bg-red-100 text-red-700 rounded-lg hover:bg-red-200 transition-colors duration-200"
                                        id="<?php echo $id; ?>"
                                    >
                                        <i class="fas fa-trash mr-1"></i> Delete
                                    </button>
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

    <script type="text/javascript">
        $(document).ready( function() {
            $('.btn-danger1').click( function() {
                var id = $(this).attr("id");
                if(confirm("Are you sure you want to delete this Record?")){
                    $.ajax({
                        type: "POST",
                        url: "delete_leave.php",
                        data: ({id: id}),
                        cache: false,
                        success: function(html){
                            $(".del"+id).fadeOut('slow'); 
                        } 
                    }); 
                } else {
                    return false;
                }
            });                
        });
    </script>
</body>
</html>