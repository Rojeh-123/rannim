    <!-- Main content -->
    <div class="container-fluid mt-3">
        <!-- Main Content -->
        <div class="container my-5">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card p-4">
                        <h3 class="mb-4 text-center text-white">Edit Band</h3>

                        <form action="<?php echo site_url("Rannim/update_band") ?>" method="post" enctype="multipart/form-data">
                        
                            <input type="hidden" name="band_id" value="<?php echo $band->band_id; ?>">
                            <input type="hidden" name="old_band_photo" value="<?php echo $band->band_photo; ?>">
                            
                            <div class="input-group flex-nowrap mb-3">
                                <span class="input-group-text text-white" style="background-color: #181818; border: 1px solid #282828;" id="addon-wrapping">Band Name</span>
                                <input style="background-color: #181818; border: 1px solid #282828;" type="text" class="form-control text-white" aria-label="Band Name" aria-describedby="addon-wrapping" name="band_name" value="<?php echo $band->band_name; ?>">
                            </div>

                            <div class="input-group flex-nowrap mb-3">
                                <span class="input-group-text text-white" style="background-color: #181818; border: 1px solid #282828;" id="addon-wrapping">Band bio</span>
                                <textarea 
                                    class="form-control text-white" 
                                    style="background-color: #181818; border: 1px solid #282828; resize: none;" 
                                    aria-label="Band bio" 
                                    aria-describedby="addon-wrapping" 
                                    name="band_bio" 
                                    rows="3"><?php echo $band->band_bio; ?></textarea>
                            </div>

                            <div class="input-group flex-nowrap mb-3">
                                <span class="input-group-text text-white" 
                                    style="background-color: #181818; border: 1px solid #282828;" 
                                    id="addon-wrapping">Band Photo</span>

                                <!-- Hidden file input -->
                                <input type="file" id="fileUpload" name="band_photo" style="display: none;" value="<?php echo $band->band_photo; ?>">

                                <!-- Styled label -->
                                <label for="fileUpload" id="fileLabel" class="form-control text-white" 
                                    style="background-color: #181818; border: 1px solid #282828; cursor: pointer; margin: 0;">
                                    <?php echo $band->band_photo; ?>
                                </label>
                            </div>

                            <div class="text-center">
                                <button type="submit" class="btn-spotify">Update Band</button>
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
<script src="<?php echo base_url(); ?>assets/js/all_views.js?v=1.1"></script>
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
    document.getElementById('fileUpload').addEventListener('change', function() {
        const label = document.getElementById('fileLabel');
        if (this.files && this.files.length > 0) {
            label.textContent = this.files[0].name;
        }
    });
</script>
</body>
</html>
