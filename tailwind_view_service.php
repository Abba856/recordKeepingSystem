<?php 
include('dbcon.php'); 
include('session.php');
include('tailwind_header.php'); 
$get_id = $_GET['id'];
$result = mysqli_query($conn,"select * from employee where employeeID='$get_id'") or die (mysqli_error());
$get_row = mysqli_fetch_array($result);
?>
<body class="bg-gray-100 m-0 p-0">
    <?php include('tailwind_nav.php'); ?>
    
    <div class="container mx-auto px-4 py-1">
        <div class="bg-white rounded-xl shadow-lg p-6 mb-8">
            <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-6">
                <div>
                    <h1 class="text-2xl font-bold text-gray-800 flex items-center">
                        <i class="fas fa-briefcase text-blue-500 mr-3"></i> <?php echo $get_row['FirstName']; ?>&nbsp;&nbsp;<?php echo $get_row['MiddleName']; ?>&nbsp;&nbsp;<?php echo $get_row['LastName']; ?> Service Record
                    </h1>
                    <p class="text-gray-600 mt-1">View and manage service records</p>
                </div>
                
                <div class="mt-4 md:mt-0 flex flex-wrap gap-2">
                    <a href="emp_profiles.php" class="flex items-center px-4 py-2 bg-gray-200 text-gray-800 rounded-lg hover:bg-gray-300 transition-colors duration-200">
                        <i class="fas fa-arrow-left mr-2"></i> Back
                    </a>
                    <a href="service_view.php?id=<?php echo $get_id; ?>" class="flex items-center px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 transition-colors duration-200">
                        <i class="fas fa-print mr-2"></i> Print Preview
                    </a>
                </div>
            </div>

            <!-- Service Records Table -->
            <div class="overflow-x-auto">
                <table class="min-w-full bg-white rounded-lg overflow-hidden" id="log">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="py-3 px-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Inclusive Date</th>
                            <th class="py-3 px-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Designation</th>
                            <th class="py-3 px-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                            <th class="py-3 px-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Salary</th>
                            <th class="py-3 px-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Station/Place</th>
                            <th class="py-3 px-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Branch</th>
                            <th class="py-3 px-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Remarks</th>
                            <th class="py-3 px-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Action</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        <?php 
                        $emp_query = mysqli_query($conn,"select * from service_record where employeeID='$get_id' order by from_date");
                        while($row = mysqli_fetch_array($emp_query)){ 
                            $id = $row['service_record_id']; 
                            $emp = $row['employeeID']; 
                        ?>
                        <tr class="hover:bg-gray-50 del<?php echo $id ?>">
                            <?php
                                $result = mysqli_query($conn,"select * from employee where employeeID='$emp'") or die(mysqli_error());
                                $row_emp = mysqli_fetch_array($result);
                            ?>
                            <td class="py-3 px-4 text-sm text-gray-800"><?php echo $row['from_date']." - ".$row['to_date']; ?></td>
                            <td class="py-3 px-4 text-sm text-gray-800"><?php echo $row['Designation']; ?></td>
                            <td class="py-3 px-4 text-sm text-gray-800"><?php echo $row['status']; ?></td>
                            <td class="py-3 px-4 text-sm text-gray-800"><?php echo $row['salary']; ?></td>
                            <td class="py-3 px-4 text-sm text-gray-800"><?php echo $row['station_place']; ?></td>
                            <td class="py-3 px-4 text-sm text-gray-800"><?php echo $row['branch']; ?></td>
                            <td class="py-3 px-4 text-sm text-gray-800"><?php echo $row['Remarks']; ?></td>
                            <td class="py-3 px-4 text-sm">
                                <button 
                                    class="btn-danger1 inline-flex items-center px-3 py-1 bg-red-100 text-red-700 rounded-lg hover:bg-red-200 transition-colors duration-200"
                                    id="<?php echo $id; ?>"
                                >
                                    <i class="fas fa-trash mr-1"></i> Delete
                                </button>
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

    <script type="text/javascript">
        $(document).ready( function() {
            $('.btn-danger1').click( function() {
                var id = $(this).attr("id");
                if(confirm("Are you sure you want to delete this Record?")){
                    $.ajax({
                        type: "POST",
                        url: "delete_service.php",
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