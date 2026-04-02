
    <!-- Main content -->
    <div class="container-fluid mt-3">
      <!-- Types Section -->
      <div class="d-flex justify-content-between align-items-center mb-2">
        <h3>Rannim Types</h3>
        <button class="btn btn-outline-purple text-white" data-bs-toggle="modal" data-bs-target="#add_type">Add Type</button>
      </div>
      <div class="row g-3 mt-1">
        <?php foreach($types as $type){ ?>
          <div class="col-md-4">
              <div class="card card-custom h-100">
                    <a href="<?php echo site_url("Rannim/show_one_type/$type->type_id"); ?>" style="text-decoration:none;">
                        <img src="<?php echo base_url(); ?>assets/uploads/types_photos/<?php echo $type->type_photo; ?>" 
                            class="card-img-top" style="height:180px; object-fit:cover;">
                        <div class="card-body">
                            <h5 class="card-title text-white"><?php echo $type->type_name; ?></h5>
                            <small class="text-secondary">Rannim • Type</small>
                        </div>
                    </a>
                    <div class="mt-2 p-3 pt-0 d-flex gap-2">
                        <button onclick="edit_type_modal(<?= $type->type_id ?>)" data-bs-toggle="modal" data-bs-target="#edit_type" class="btn btn-sm btn-outline-primary">Edit</button>
                        <a href="<?php echo site_url("Rannim/delete_type/$type->type_id/$type->type_photo"); ?>" class="btn btn-sm btn-outline-danger" style="text-decoration:none;">Delete</a>
                    </div>
                  </div>
              </div>
        <?php } ?>
      </div>
    </div>
  </div>
</div>

  <!-- Modal -->
  <div class="modal fade" id="edit_type" tabindex="-1" aria-labelledby="edit_typeLabel" aria-hidden="true">
      <div class="modal-dialog">
          <div class="modal-content" style="background-color: #181818; color: white; border: 1px solid #282828;">
             <form action="<?php echo site_url("Rannim/update_type"); ?>" method="POST" enctype="multipart/form-data">
              <div class="modal-header" style="border-bottom: 1px solid #282828;">
                  <h1 class="modal-title fs-5" id="edit_typeLabel">Update Type</h1>
                  <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">

                <input type="hidden" name="type_id" id="type_id">
                <input type="hidden" name="old_type_photo" id="old_type_photo">
                <div class="input-group flex-nowrap mb-3">
                    <span class="input-group-text text-white" style="background-color: #181818; border: 1px solid #282828;" id="addon-wrapping">Type Name</span>
                    <input id="edit_type_name" style="background-color: #181818; border: 1px solid #282828;" type="text" class="form-control text-white" aria-label="Type Name" aria-describedby="addon-wrapping" name="type_name">
                </div>
                <div class="input-group flex-nowrap mb-3">
                    <span class="input-group-text text-white" 
                        style="background-color: #181818; border: 1px solid #282828;" 
                        id="addon-wrapping">Type Photo</span>

                    <!-- Hidden file input -->
                    <input type="file" id="edit_file" name="edit_type_photo" style="display: none;" id="edit_type_photo">

                    <!-- Styled label -->
                    <label for="edit_file" id="edit_label" class="form-control text-white" style="background-color: #181818; border: 1px solid #282828; cursor: pointer; margin: 0;">
                        Select Type Photo (If you want to change it)
                    </label>
                </div>

              </div>
              <div class="modal-footer" style="border-top: 1px solid #282828;">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" style="background-color: #282828; border: none;">Close</button>
                  <button type="submit" class="btn btn-success" style="background-color: #7e56f1; border: none;">Save</button>
              </div>
             </form>
          </div>
      </div>
  </div>

  <!-- Modal -->
  <div class="modal fade" id="add_type" tabindex="-1" aria-labelledby="add_typeLabel" aria-hidden="true">
      <div class="modal-dialog">
          <div class="modal-content" style="background-color: #181818; color: white; border: 1px solid #282828;">
             <form action="<?php echo site_url("Rannim/add_type"); ?>" method="POST" enctype="multipart/form-data">
              <div class="modal-header" style="border-bottom: 1px solid #282828;">
                  <h1 class="modal-title fs-5" id="add_typeLabel">Add Type</h1>
                  <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">

                <div class="input-group flex-nowrap mb-3">
                    <span class="input-group-text text-white" style="background-color: #181818; border: 1px solid #282828;" id="addon-wrapping">Type Name</span>
                    <input style="background-color: #181818; border: 1px solid #282828;" type="text" class="form-control text-white" aria-label="Type Name" aria-describedby="addon-wrapping" name="type_name">
                </div>
                <div class="input-group flex-nowrap mb-3">
                    <span class="input-group-text text-white" 
                        style="background-color: #181818; border: 1px solid #282828;" 
                        id="addon-wrapping">Type Photo</span>

                    <!-- Hidden file input -->
                    <input type="file" id="fileUpload" name="type_photo" style="display: none;">

                    <!-- Styled label -->
                    <label for="fileUpload" id="fileLabel" class="form-control text-white" 
                        style="background-color: #181818; border: 1px solid #282828; cursor: pointer; margin: 0;">
                        Select Type Photo
                    </label>
                </div>

              </div>
              <div class="modal-footer" style="border-top: 1px solid #282828;">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" style="background-color: #282828; border: none;">Close</button>
                  <button type="submit" class="btn btn-success" style="background-color: #7e56f1; border: none;">Save</button>
              </div>
             </form>
          </div>
      </div>
  </div>

<!-- Bootstrap JS -->
<script src="<?php echo base_url(); ?>assets/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/all_views.js?v=1.1"></script>
<script>
  const all_views = document.createElement('link');
  all_views.rel = 'stylesheet';
  all_views.href = '<?php echo base_url(); ?>assets/css/all_views.css';
  document.head.appendChild(all_views);
</script>
<script>
    document.getElementById('fileUpload').addEventListener('change', function() {
        const label = document.getElementById('fileLabel');
        if (this.files && this.files.length > 0) {
            label.textContent = this.files[0].name;
        } else {
            label.textContent = "Select Type Photo";
        }
    });
    
    document.getElementById('edit_file').addEventListener('change', function() {
        const label = document.getElementById('edit_label');
        if (this.files && this.files.length > 0) {
            label.textContent = this.files[0].name;
        } else {
            label.textContent = "Select Type Photo (If you want to change it)";
        }
    });
</script>
<script>
    function edit_type_modal(type_id) {
    $.ajax({
        type: "GET",
        url: "<?php echo site_url('Rannim/edit_type/'); ?>" + type_id,
        dataType: "json",
        success: function(data) {
            var type = data.type;
            $("#edit_type_name").val(type.type_name);
            $("#old_type_photo").val(type.type_photo);
            $("#type_id").val(type.type_id);
        },
        error: function(req, err) {
            console.log("The Error:" + err);
        }
    })
}
</script>
<script src="<?php echo base_url() ?>assets/js/jquery-3.7.1.js"></script>
</body>
</html>
