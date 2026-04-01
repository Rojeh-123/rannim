    <!-- Main content -->
    <div class="container-fluid mt-3">
      <!-- Bands Section -->
      <div class="d-flex justify-content-between align-items-center mb-2">
        <h3>Rannim Bands</h3>
        <button class="btn btn-outline-purple text-white" data-bs-toggle="modal" data-bs-target="#add_band">Add Band</button>
      </div>
      <div class="row g-3 mt-1">
        <?php foreach($bands as $band){ ?>
          <div class="col-md-4">
            <a href="<?php echo site_url("Rannim/show_one_band/$band->band_id"); ?>" style="text-decoration:none;">
            <div class="card card-custom h-100">
              <img src="<?php echo base_url(); ?>assets/uploads/bands_photos/<?php echo $band->band_photo; ?>" 
                  class="card-img-top" style="height:180px; object-fit:cover;">
              <div class="card-body">
                <h5 class="card-title text-white"><?php echo $band->band_name; ?></h5>
                <small class="text-secondary">Rannim • Band</small>
                <div class="mt-2 d-flex gap-2">
                    <button class="btn btn-sm btn-outline-primary"><a href="<?php echo site_url("Rannim/edit_band/$band->band_id"); ?>" style="text-decoration:none; color:inherit;">Edit</a></button>
                    <button class="btn btn-sm btn-outline-danger"><a href="<?php echo site_url("Rannim/delete_band/$band->band_id/$band->band_photo"); ?>" style="text-decoration:none; color:inherit;">Delete</a></button>
                </div>
              </div>
            </div>
            </a>
          </div>
        <?php } ?>
      </div>
    </div>
  </div>
</div>

  <!-- Modal -->
  <div class="modal fade" id="add_band" tabindex="-1" aria-labelledby="addBandLabel" aria-hidden="true">
      <div class="modal-dialog">
          <div class="modal-content" style="background-color: #181818; color: white; border: 1px solid #282828;">
             <form action="<?php echo site_url("Rannim/add_band"); ?>" method="POST" enctype="multipart/form-data">
              <div class="modal-header" style="border-bottom: 1px solid #282828;">
                  <h1 class="modal-title fs-5" id="addBandLabel">Add Band</h1>
                  <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">

                <div class="input-group flex-nowrap mb-3">
                    <span class="input-group-text text-white" style="background-color: #181818; border: 1px solid #282828;" id="addon-wrapping">Band Name</span>
                    <input style="background-color: #181818; border: 1px solid #282828;" type="text" class="form-control text-white" aria-label="Band Name" aria-describedby="addon-wrapping" name="band_name">
                </div>

                <div class="input-group flex-nowrap mb-3">
                  <span class="input-group-text text-white" style="background-color: #181818; border: 1px solid #282828;" id="addon-wrapping">Band bio</span>
                  <textarea 
                      class="form-control text-white" 
                      style="background-color: #181818; border: 1px solid #282828; resize: none;" 
                      aria-label="Band bio" 
                      aria-describedby="addon-wrapping" 
                      name="band_bio" 
                      rows="3"></textarea>
                </div>

                <div class="input-group flex-nowrap mb-3">
                    <span class="input-group-text text-white" 
                        style="background-color: #181818; border: 1px solid #282828;" 
                        id="addon-wrapping">Band Photo</span>

                    <!-- Hidden file input -->
                    <input type="file" id="fileUpload" name="band_photo" style="display: none;">

                    <!-- Styled label -->
                    <label for="fileUpload" id="fileLabel" class="form-control text-white" 
                        style="background-color: #181818; border: 1px solid #282828; cursor: pointer; margin: 0;">
                        Select Band Photo
                    </label>
                </div>

              </div>
              <div class="modal-footer" style="border-top: 1px solid #282828;">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" style="background-color: #282828; border: none;">Close</button>
                  <button type="button" class="btn btn-success" style="background-color: #7e56f1; border: none;">Save</button>
              </div>
             </form>
          </div>
      </div>
  </div>

<!-- Bootstrap JS -->
<script src="<?php echo base_url(); ?>assets/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/all_views.js"></script>
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
            label.textContent = "Select Band Photo";
        }
    });
</script>
</body>
</html>