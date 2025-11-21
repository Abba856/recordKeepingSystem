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
                        <i class="fas fa-list text-blue-500 mr-3"></i> Entry List
                    </h1>
                    <p class="text-gray-600 mt-1">Manage entries and classifications</p>
                </div>
            </div>

            <!-- Entry Sections -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <!-- School Entry -->
                <div class="bg-gray-50 p-6 rounded-lg">
                    <div class="flex justify-between items-center mb-4">
                        <h3 class="text-lg font-semibold text-gray-800">Schools</h3>
                        <button 
                            data-toggle="modal" 
                            href="#School_entry" 
                            class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors duration-200 flex items-center"
                        >
                            <i class="fas fa-plus mr-2"></i> Add School
                        </button>
                    </div>

                    <!-- Add School Modal -->
                    <div class="modal hide fade" id="School_entry">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">×</button>
                            <h3><i class="fas fa-school mr-2"></i> Add School Entry</h3>
                        </div>
                        <div class="modal-body">
                            <div class="alert alert-info bg-blue-50 border border-blue-200 text-blue-700 p-4 rounded-lg mb-4">
                                Add School Entry
                            </div>
                            <form method="post">
                                <div class="mb-4">
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Name of School</label>
                                    <input 
                                        type="text" 
                                        name="school" 
                                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                        placeholder="Enter school name"
                                    >
                                </div>
                                <button 
                                    type="submit" 
                                    name="add_entry" 
                                    class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors duration-200 flex items-center"
                                >
                                    <i class="fas fa-save mr-2"></i> Save
                                </button>
                            </form>
                        </div>
                    </div>

                    <?php
                        if (isset($_POST['add_entry'])){
                            $school = $_POST['school'];
                            mysqli_query($conn,"insert into school (Name) values ('$school')") or die(mysqli_errno());
                            echo('<script>location.href = "entry.php";</script>');
                        }
                    ?>

                    <!-- School List -->
                    <div class="space-y-2">
                        <?php 
                        $emp_query = mysqli_query($conn,"select * from school");
                        while($row = mysqli_fetch_array($emp_query)){ 
                            $id = $row['school_id']; 
                        ?>
                        <div class="flex justify-between items-center bg-white p-3 rounded-lg border border-gray-200">
                            <span class="text-gray-800"><?php echo $row['Name']; ?></span>
                            <a href="delete_entry.php?id=<?php echo $id; ?>" class="px-3 py-1 bg-red-600 text-white rounded-lg hover:bg-red-700 transition-colors duration-200 text-sm">
                                Delete
                            </a>
                        </div>
                        <?php }?>
                    </div>
                </div>

                <!-- Position Entry -->
                <div class="bg-gray-50 p-6 rounded-lg">
                    <div class="flex justify-between items-center mb-4">
                        <h3 class="text-lg font-semibold text-gray-800">Positions</h3>
                        <button 
                            data-toggle="modal" 
                            href="#add_position" 
                            class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors duration-200 flex items-center"
                        >
                            <i class="fas fa-plus mr-2"></i> Add Position
                        </button>
                    </div>

                    <!-- Add Position Modal -->
                    <div class="modal hide fade" id="add_position">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">×</button>
                            <h3><i class="fas fa-briefcase mr-2"></i> Add Position</h3>
                        </div>
                        <div class="modal-body">
                            <div class="alert alert-info bg-blue-50 border border-blue-200 text-blue-700 p-4 rounded-lg mb-4">
                                Add Position
                            </div>
                            <form method="post">
                                <div class="mb-4">
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Position</label>
                                    <input 
                                        type="text" 
                                        name="position" 
                                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                        placeholder="Enter position"
                                    >
                                </div>
                                <button 
                                    type="submit" 
                                    name="add_entry2" 
                                    class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors duration-200 flex items-center"
                                >
                                    <i class="fas fa-save mr-2"></i> Save
                                </button>
                            </form>
                        </div>
                    </div>

                    <?php
                        if (isset($_POST['add_entry2']) && $_POST['position']){
                            $position = $_POST['position'];
                            mysqli_query($conn,"insert into position (position) values ('$position')") or die(mysqli_errno());
                            echo('<script>location.href = "entry.php";</script>');
                        }
                    ?>

                    <!-- Position List -->
                    <div class="space-y-2">
                        <?php 
                        $emp_query = mysqli_query($conn,"select * from position");
                        while($row = mysqli_fetch_array($emp_query)){ 
                            $id_position = $row['position_id']; 
                        ?>
                        <div class="flex justify-between items-center bg-white p-3 rounded-lg border border-gray-200">
                            <span class="text-gray-800"><?php echo $row['position']; ?></span>
                            <a href="delete_entry_position.php?id=<?php echo $id_position; ?>" class="px-3 py-1 bg-red-600 text-white rounded-lg hover:bg-red-700 transition-colors duration-200 text-sm">
                                Delete
                            </a>
                        </div>
                        <?php }?>
                    </div>
                </div>

                <!-- Qualification Entry -->
                <div class="bg-gray-50 p-6 rounded-lg">
                    <div class="flex justify-between items-center mb-4">
                        <h3 class="text-lg font-semibold text-gray-800">Qualifications</h3>
                        <button 
                            data-toggle="modal" 
                            href="#add_qualification" 
                            class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors duration-200 flex items-center"
                        >
                            <i class="fas fa-plus mr-2"></i> Add Qualification
                        </button>
                    </div>

                    <!-- Add Qualification Modal -->
                    <div class="modal hide fade" id="add_qualification">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">×</button>
                            <h3><i class="fas fa-graduation-cap mr-2"></i> Add Qualification</h3>
                        </div>
                        <div class="modal-body">
                            <div class="alert alert-info bg-blue-50 border border-blue-200 text-blue-700 p-4 rounded-lg mb-4">
                                Add Qualification
                            </div>
                            <form method="post">
                                <div class="mb-4">
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Qualification</label>
                                    <input 
                                        type="text" 
                                        name="qualification" 
                                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                        placeholder="Enter qualification"
                                    >
                                </div>
                                <button 
                                    type="submit" 
                                    name="add_q" 
                                    class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors duration-200 flex items-center"
                                >
                                    <i class="fas fa-save mr-2"></i> Save
                                </button>
                            </form>
                        </div>
                    </div>

                    <?php
                        if (isset($_POST['add_q'])){
                            $qualification = $_POST['qualification'];
                            mysqli_query($conn,"insert into qualification (qualification) values ('$qualification')") or die(mysqli_errno());
                            echo('<script>location.href = "entry.php";</script>');
                        }
                    ?>

                    <!-- Qualification List -->
                    <div class="space-y-2">
                        <?php 
                        $emp_query = mysqli_query($conn,"select * from qualification");
                        while($row = mysqli_fetch_array($emp_query)){ 
                            $id_qualification = $row['qualification_id']; 
                        ?>
                        <div class="flex justify-between items-center bg-white p-3 rounded-lg border border-gray-200">
                            <span class="text-gray-800"><?php echo $row['qualification']; ?></span>
                            <a href="delete_entry_qualification.php?id=<?php echo $id_qualification; ?>" class="px-3 py-1 bg-red-600 text-white rounded-lg hover:bg-red-700 transition-colors duration-200 text-sm">
                                Delete
                            </a>
                        </div>
                        <?php }?>
                    </div>
                </div>
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