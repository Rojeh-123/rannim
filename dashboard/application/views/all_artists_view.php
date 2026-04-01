    <!-- Main content -->
    <div class="container-fluid mt-3">
      <!-- Artists Section -->
      <div class="d-flex justify-content-between align-items-center mb-2">
        <h3>Rannim Artists</h3>
        <button class="btn btn-outline-purple text-white" data-bs-toggle="modal" data-bs-target="#add_artist">Add Artist</button>
      </div>
      <div class="row g-3 mt-1">
          <?php foreach($artists as $artist){ ?>
          <div class="col-md-4">
            <a href="<?php echo site_url("Rannim/show_one_artist/$artist->artist_id"); ?>" style="text-decoration:none;">
              <div class="card card-custom h-100">
                  <img src="<?php echo base_url(); ?>assets/uploads/artists_photos/<?php echo $artist->artist_photo; ?>" 
                      class="card-img-top" style="height:180px; object-fit:cover;">
                  <div class="card-body">
                    <h5 class="card-title text-white"><?php echo $artist->artist_name; ?></h5>
                    <p class="card-text text-secondary">Country • <?php echo $artist->country_name; ?></p>
                    <?php $number_of_songs = $this->Rannim_model->count_artist_songs_num($artist->artist_id); ?>
                    <small class="text-secondary"><?php echo $number_of_songs ?> Songs • Artist</small>
                    <div class="mt-2 d-flex gap-2">
                        <button class="btn btn-sm btn-outline-primary"><a href="<?php echo site_url("Rannim/edit_artist/$artist->artist_id"); ?>" style="text-decoration:none; color:inherit;">Edit</a></button>
                        <button class="btn btn-sm btn-outline-danger"><a href="<?php echo site_url("Rannim/delete_artist/$artist->artist_id/$artist->artist_photo"); ?>" style="text-decoration:none; color:inherit;">Delete</a></button>
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
  <div class="modal fade" id="add_artist" tabindex="-1" aria-labelledby="addArtistLabel" aria-hidden="true">
      <div class="modal-dialog">
          <div class="modal-content" style="background-color: #181818; color: white; border: 1px solid #282828;">
             <form action="<?php echo site_url("Rannim/add_artist"); ?>" method="POST" enctype="multipart/form-data">
              <div class="modal-header" style="border-bottom: 1px solid #282828;">
                  <h1 class="modal-title fs-5" id="addArtistLabel">Add Artist</h1>
                  <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <div class="input-group flex-nowrap mb-3">
                    <span class="input-group-text text-white" style="background-color: #181818; border: 1px solid #282828;" id="addon-wrapping">Artist Name</span>
                    <input style="background-color: #181818; border: 1px solid #282828;" type="text" class="form-control text-white" aria-label="Artist Name" aria-describedby="addon-wrapping" name="artist_name">
                </div>

                <div class="input-group flex-nowrap mb-3">
                  <span class="input-group-text text-white" style="background-color: #181818; border: 1px solid #282828;" id="addon-wrapping">Artist bio</span>
                  <textarea 
                      class="form-control text-white" 
                      style="background-color: #181818; border: 1px solid #282828; resize: none;" 
                      aria-label="Artist bio" 
                      aria-describedby="addon-wrapping" 
                      name="artist_bio" 
                      rows="3"></textarea>
                </div>

                <div class="input-group mb-3">
                    <label class="input-group-text text-white" for="inputGroupSelect01" style="background-color: #181818; border: 1px solid #282828;">Artist's Country</label>
                    <select class="form-select text-white" id="inputGroupSelect01" style="background-color: #181818; border: 1px solid #282828;" name="artist_country">
                        <option selected class="text-white" disabled>Select The Artist's Country</option>
                        <?php foreach ($countries as $country) { ?>
                            <option value="<?php echo $country->country_id; ?>" class="text-white"><?php echo $country->country_name; ?></option>
                        <?php } ?>
                    </select>
                </div>

                <div class="input-group mb-3">
                    <label class="input-group-text text-white" for="inputGroupSelect02" style="background-color: #181818; border: 1px solid #282828;">Artist's Band</label>
                    <select class="form-select text-white" id="inputGroupSelect02" style="background-color: #181818; border: 1px solid #282828;" name="artist_band">
                        <option selected class="text-white" disabled>Select The Artist's Band</option>
                        <?php foreach ($bands as $band) { ?>
                            <option value="<?php echo $band->band_id; ?>" class="text-white"><?php echo $band->band_name; ?></option>
                        <?php } ?>
                    </select>
                </div>

                <div class="input-group flex-nowrap mb-3">
                    <span class="input-group-text text-white" 
                        style="background-color: #181818; border: 1px solid #282828;" 
                        id="addon-wrapping">Artist Photo</span>

                    <!-- Hidden file input -->
                    <input type="file" id="fileUpload" name="artist_photo" style="display: none;">

                    <!-- Styled label -->
                    <label for="fileUpload" id="fileLabel" class="form-control text-white" 
                        style="background-color: #181818; border: 1px solid #282828; cursor: pointer; margin: 0;">
                        Select Artist Photo
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
  
  const add_modal = document.createElement('link');
  add_modal.rel = 'stylesheet';
  add_modal.href = '<?php echo base_url(); ?>assets/css/add_modal.css';
  document.head.appendChild(add_modal);
</script>

<script>
    document.getElementById('fileUpload').addEventListener('change', function() {
        const label = document.getElementById('fileLabel');
        if (this.files && this.files.length > 0) {
            label.textContent = this.files[0].name;
        } else {
            label.textContent = "Select Artist Photo";
        }
    });
</script>
</body>
</html>