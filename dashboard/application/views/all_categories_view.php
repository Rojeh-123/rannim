    <!-- Main content -->
    <div class="container-fluid mt-3">
      <!-- Categories Section -->
      <div class="d-flex justify-content-between align-items-center mb-2">
        <h3>Rannim Categories</h3>
        <button class="btn btn-outline-purple text-white" data-bs-toggle="modal" data-bs-target="#add_category">Add Category</button>
      </div>
      <div class="row g-3 mt-1">
        <?php foreach($categories as $category){ ?>
          <div class="col-md-4">
              <div class="card card-custom h-100">
                <a href="<?php echo site_url("Rannim/show_one_category/$category->category_id"); ?>" style="text-decoration:none;">
                  <img src="<?php echo base_url(); ?>assets/uploads/categories_photos/<?php echo $category->category_photo; ?>" 
                      class="card-img-top" style="height:180px; object-fit:cover;">
                  <div class="card-body">
                    <h5 class="card-title text-white"><?php echo $category->category_name; ?></h5>
                    <small class="text-secondary">Rannim • Category</small>
                  </div>
                </a>
                <div class="mt-2 p-3 pt-0 d-flex gap-2">
                    <a href="<?php echo site_url("Rannim/edit_category/$category->category_id"); ?>" class="btn btn-sm btn-outline-primary" style="text-decoration:none;">Edit</a>
                    <a href="<?php echo site_url("Rannim/delete_category/$category->category_id/$category->category_photo"); ?>" class="btn btn-sm btn-outline-danger" style="text-decoration:none;">Delete</a>
                </div>
              </div>
          </div>
        <?php } ?>
      </div>
    </div>
  </div>
</div>

  <!-- Modal -->
  <div class="modal fade" id="add_category" tabindex="-1" aria-labelledby="addCategoryLabel" aria-hidden="true">
      <div class="modal-dialog">
          <div class="modal-content" style="background-color: #181818; color: white; border: 1px solid #282828;">
             <form action="<?php echo site_url("Rannim/add_category"); ?>" method="POST" enctype="multipart/form-data">
              <div class="modal-header" style="border-bottom: 1px solid #282828;">
                  <h1 class="modal-title fs-5" id="addCategoryLabel">Add Category</h1>
                  <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">

                <div class="input-group flex-nowrap mb-3">
                    <span class="input-group-text text-white" style="background-color: #181818; border: 1px solid #282828;" id="addon-wrapping">Category Name</span>
                    <input style="background-color: #181818; border: 1px solid #282828;" type="text" class="form-control text-white" aria-label="Category Name" aria-describedby="addon-wrapping" name="category_name">
                </div>

                <div class="input-group mb-3">
                    <label class="input-group-text text-white" for="inputGroupSelect01" style="background-color: #181818; border: 1px solid #282828;">Type</label>
                    <select class="form-select text-white" id="inputGroupSelect01" style="background-color: #181818; border: 1px solid #282828;" name="type_id" onchange="get_albums_by_artist(this.value)">
                        <option selected class="text-white" disabled>Select Type</option>
                        <?php foreach ($types as $type) { ?>
                            <option value="<?php echo $type->type_id; ?>" class="text-white"><?php echo $type->type_name; ?></option>
                        <?php } ?>
                    </select>
                </div>

                <div class="input-group flex-nowrap mb-3">
                    <span class="input-group-text text-white" 
                        style="background-color: #181818; border: 1px solid #282828;" 
                        id="addon-wrapping">Category Photo</span>

                    <!-- Hidden file input -->
                    <input type="file" id="fileUpload" name="category_photo" style="display: none;">

                    <!-- Styled label -->
                    <label for="fileUpload" id="fileLabel" class="form-control text-white" 
                        style="background-color: #181818; border: 1px solid #282828; cursor: pointer; margin: 0;">
                        Select Category Photo
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
            label.textContent = "Select Category Photo";
        }
    });
</script>
</body>
</html>
