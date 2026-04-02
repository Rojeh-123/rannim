    <div class="container-fluid mt-3">
      <!-- Others Section -->
      <div class="d-flex justify-content-between align-items-center mb-2">
        <?php if(!empty($playlists)){ ?>
          <h3>Rannim Songs Playlists</h3>
        <?php } ?>
      </div>
      <div class="row g-3 mt-1">
        <?php foreach($playlists as $playlist){ ?>
          <div class="col-md-4">
              <div class="card card-custom h-100">
                <a href="<?php echo site_url("Rannim/show_one_playlist/$playlist->playlist_id"); ?>" style="text-decoration:none;">
                   <img src="<?php echo base_url(); ?>assets/uploads/playlists_photos/<?php echo $playlist->playlist_photo; ?>" 
                       class="card-img-top" style="height:180px; object-fit:cover;">
                   <div class="card-body">
                   <h5 class="card-title text-white"><?php echo $playlist->playlist_name; ?></h5>
                   <?php
                   if($this->Rannim_model->get_number_of_songs($playlist->playlist_id) == 0){
                       if($this->Rannim_model->get_number_of_playlist_podcasts($playlist->playlist_id) == 0){
                           $number_of_songs = 0;
                       } else {
                           $number_of_songs = $this->Rannim_model->get_number_of_playlist_podcasts($playlist->playlist_id);
                       }
                   } else {
                       $number_of_songs = $this->Rannim_model->get_number_of_songs($playlist->playlist_id);
                   }
                   ?>
                   <small class="text-secondary">Rannim • <?php echo $this->Rannim_model->get_number_of_songs_playlist($playlist->playlist_id); ?> songs</small>
                   </div>
                </a>
                <div class="p-3 pt-0">
                  <a href="<?php echo site_url("Rannim/delete_playlist/$playlist->playlist_id/$playlist->playlist_photo"); ?>" class="btn btn-sm btn-outline-danger" style="text-decoration:none;">Delete</a>
                </div>
              </div>
          </div>
        <?php } ?>
      <div class="d-flex justify-content-between align-items-center mb-2">
        <?php if(!empty($podcasts_playlists)){ ?>
          <h3>Rannim Podcasts Playlists</h3>
        <?php } ?>
      </div>
        <?php foreach($podcasts_playlists as $playlist){ ?>
          <div class="col-md-4">
              <div class="card card-custom h-100">
                <a href="<?php echo site_url("Rannim/show_one_podcast_playlist/$playlist->playlist_id"); ?>" style="text-decoration:none;">
                  <img src="<?php echo base_url(); ?>assets/uploads/playlists_photos/<?php echo $playlist->playlist_photo; ?>" 
                      class="card-img-top" style="height:180px; object-fit:cover;">
                  <div class="card-body">
                  <h5 class="card-title text-white"><?php echo $playlist->playlist_name; ?></h5>
                  <?php
                  if($this->Rannim_model->get_number_of_songs($playlist->playlist_id) == 0){
                      if($this->Rannim_model->get_number_of_playlist_podcasts($playlist->playlist_id) == 0){
                          $number_of_songs = 0;
                      } else {
                          $number_of_songs = $this->Rannim_model->get_number_of_playlist_podcasts($playlist->playlist_id);
                      }
                  } else {
                      $number_of_songs = $this->Rannim_model->get_number_of_songs($playlist->playlist_id);
                  }
                  ?>
                  <small class="text-secondary">Rannim • <?php echo $this->Rannim_model->get_number_of_podcasts_playlist($playlist->playlist_id); ?> Podcasts</small>
                  </div>
                </a>
                <div class="p-3 pt-0">
                  <a href="<?php echo site_url("Rannim/delete_playlist/$playlist->playlist_id/$playlist->playlist_photo"); ?>" class="btn btn-sm btn-outline-danger" style="text-decoration:none;">Delete</a>
                </div>
              </div>
          </div>
        <?php } ?>
      </div>
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
// Update the label text when a file is selected
const fileUpload = document.getElementById('fileUpload');
const fileLabel = document.getElementById('fileLabel');

fileUpload.addEventListener('change', function() {
    if(this.files.length > 0) {
        fileLabel.textContent = this.files[0].name;
    } else {
        fileLabel.textContent = '';
    }
});
</script>
</body>
</html>
