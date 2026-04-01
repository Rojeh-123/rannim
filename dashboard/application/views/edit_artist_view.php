    <!-- Main content -->
    <div class="container-fluid mt-3">
        <!-- Main Content -->
        <div class="container my-5">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card p-4">
                        <h3 class="mb-4 text-center text-white">Edit Artist</h3>

                        <form action="<?php echo site_url("Rannim/update_artist") ?>" method="post" enctype="multipart/form-data">

                            <input type="hidden" name="artist_id" value="<?php echo $artist->artist_id; ?>">
                            <input type="hidden" name="old_artist_photo" value="<?php echo $artist->artist_photo; ?>">
                            
                            <div class="input-group flex-nowrap mb-3">
                                <span class="input-group-text text-white" style="background-color: #181818; border: 1px solid #282828;" id="addon-wrapping">Artist Name</span>
                                <input style="background-color: #181818; border: 1px solid #282828;" type="text" class="form-control text-white" aria-label="Artist Name" aria-describedby="addon-wrapping" name="artist_name" value="<?php echo $artist->artist_name; ?>">
                            </div>

                            <div class="input-group flex-nowrap mb-3">
                                <span class="input-group-text text-white" style="background-color: #181818; border: 1px solid #282828;" id="addon-wrapping">Artist bio</span>
                                <textarea 
                                    class="form-control text-white" 
                                    style="background-color: #181818; border: 1px solid #282828; resize: none;" 
                                    aria-label="Artist bio" 
                                    aria-describedby="addon-wrapping" 
                                    name="artist_bio" 
                                    rows="3"><?php echo $artist->artist_bio; ?></textarea>
                            </div>

                            <div class="input-group mb-3">
                                <label class="input-group-text text-white" for="inputGroupSelect01" style="background-color: #181818; border: 1px solid #282828;">Artist's Country</label>
                                <select class="form-select text-white" id="inputGroupSelect01" style="background-color: #181818; border: 1px solid #282828;" name="artist_country">
                                    <?php foreach ($countries as $country) { ?>
                                        <option value="<?php echo $country->country_id; ?>" class="text-white" <?php if ($country->country_id == $artist->country_id) echo 'selected'; ?>><?php echo $country->country_name; ?></option>
                                    <?php } ?>
                                </select>
                            </div>

                            <div class="input-group mb-3">
                                <label class="input-group-text text-white" for="inputGroupSelect02" style="background-color: #181818; border: 1px solid #282828;">Artist's Band</label>
                                <select class="form-select text-white" id="inputGroupSelect02" style="background-color: #181818; border: 1px solid #282828;" name="artist_band">
                                    <?php foreach ($bands as $band) { ?>
                                        <option value="<?php echo $band->band_id; ?>" class="text-white" <?php if ($band->band_id == $artist->band_id) echo 'selected'; ?>><?php echo $band->band_name; ?></option>
                                    <?php } ?>
                                </select>
                            </div>

                            <div class="input-group flex-nowrap mb-3">
                                <span class="input-group-text text-white" 
                                    style="background-color: #181818; border: 1px solid #282828;" 
                                    id="addon-wrapping">Artist Photo</span>

                                <!-- Hidden file input -->
                                <input type="file" id="fileUpload" name="artist_photo" style="display: none;" value="<?php echo $artist->artist_photo; ?>">

                                <!-- Styled label -->
                                <label for="fileUpload" id="fileLabel" class="form-control text-white" 
                                    style="background-color: #181818; border: 1px solid #282828; cursor: pointer; margin: 0;">
                                    <?php echo $artist->artist_photo; ?>
                                </label>
                            </div>

                            <div class="text-center">
                                <button type="submit" class="btn-spotify">Update Artist</button>
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
    document.getElementById('fileUpload').addEventListener('change', function() {
        const label = document.getElementById('fileLabel');
        if (this.files && this.files.length > 0) {
            label.textContent = this.files[0].name;
        }
    });
</script>
</body>
</html>