    <!-- Main content -->
    <div class="container-fluid mt-3">
        <!-- Main Content -->
        <div class="container my-5">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card p-4">
                        <h3 class="mb-4 text-center text-white">Edit Category</h3>

                        <form action="<?php echo site_url("Rannim/update_category") ?>" method="post" enctype="multipart/form-data">
                        
                            <input type="hidden" name="category_id" id="category_id" value="<?php echo $category->category_id; ?>">
                            <input type="hidden" name="old_category_photo" id="old_category_photo" value="<?php echo $category->category_photo; ?>">

                            <div class="input-group flex-nowrap mb-3">
                                <span class="input-group-text text-white" style="background-color: #181818; border: 1px solid #282828;" id="addon-wrapping">Category Name</span>
                                <input id="edit_category_name" style="background-color: #181818; border: 1px solid #282828;" type="text" class="form-control text-white" aria-label="Category Name" aria-describedby="addon-wrapping" name="category_name" value="<?php echo $category->category_name; ?>">
                            </div>

                            <div class="input-group mb-3">
                                <label class="input-group-text text-white" for="inputGroupSelect01" style="background-color: #181818; border: 1px solid #282828;">Type</label>
                                <select class="form-select text-white" id="inputGroupSelect01" style="background-color: #181818; border: 1px solid #282828;" name="type_id">
                                    <?php foreach ($types as $type) { ?>
                                            <option value="<?php echo $type->type_id; ?>" class="text-white" <?php echo ($type->type_id == $category->type_id) ? 'selected' : ''; ?>><?php echo $type->type_name; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            
                            <div class="input-group flex-nowrap mb-3">
                                <span class="input-group-text text-white" 
                                    style="background-color: #181818; border: 1px solid #282828;" 
                                    id="addon-wrapping">Category Photo</span>

                                <!-- Hidden file input -->
                                <input type="file" id="edit_file" name="edit_category_photo" style="display: none;" id="edit_category_photo" value="<?php echo $category->category_photo ?>">

                                <!-- Styled label -->
                                <label for="edit_file" id="edit_label" class="form-control text-white" style="background-color: #181818; border: 1px solid #282828; cursor: pointer; margin: 0;">
                                    <?php echo $category->category_photo ?>
                                </label>
                            </div>

                            <div class="text-center">
                                <button type="submit" class="btn-spotify">Update Category</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </div>
</div>

<script src="<?php echo base_url(); ?>assets/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/all_views.js"></script>
<script src="<?php echo base_url(); ?>assets/js/edit_views.js"></script>
<script>
  const all_views = document.createElement('link');
  all_views.rel = 'stylesheet';
  all_views.href = '<?php echo base_url(); ?>assets/css/all_views.css';
  document.head.appendChild(all_views);
  
  const edit_views = document.createElement('link');
  edit_views.rel = 'stylesheet';
  edit_views.href = '<?php echo base_url(); ?>assets/css/edit_views.css';
  document.head.appendChild(edit_views);
</script>

<script>
    document.getElementById('edit_file').addEventListener('change', function() {
        const label = document.getElementById('edit_label');
        if (this.files && this.files.length > 0) {
            label.textContent = this.files[0].name;
        }
    });
</script>
</body>
</html>