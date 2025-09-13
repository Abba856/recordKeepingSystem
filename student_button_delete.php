<!-- Delete Student Modal -->
<div class="modal hide fade" id="d<?php echo $id; ?>">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">×</button>
        <h3><i class="icon-trash icon-large"></i> Confirm Delete</h3>
    </div>
    <div class="modal-body">
        <div class="alert alert-danger">
            <p><strong>Are you sure you want to delete this student record?</strong></p>
            <p>This action cannot be undone!</p>
        </div>
    </div>
    <div class="modal-footer">
        <a href="#" class="btn" data-dismiss="modal"><i class="icon-remove icon-large"></i> Cancel</a>
        <a href="student_delete.php<?php echo '?id='.$id; ?>" class="btn btn-danger"><i class="icon-trash icon-large"></i> Yes, Delete</a>
    </div>
</div>