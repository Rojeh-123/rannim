    <!-- Main content -->
    <div class="container mt-3">
      <div class="d-flex justify-content-between align-items-center mb-2">
        <h3>My Private Playlists</h3>
        <button class="btn btn-outline-purple text-white" data-bs-toggle="modal" data-bs-target="#add_playlist">Add Playlist</button>
      </div>
      <div class="row g-3 mt-1">
        <?php foreach($my_private_playlists as $playlist){ ?>
          <div class="col-md-4">
            <a href="<?php echo site_url("Rannim/show_one_playlist/$playlist->playlist_id"); ?>" style="text-decoration:none;">
              <div class="card card-custom h-100">
                  <img src="<?php echo base_url(); ?>dashboard/assets/uploads/playlists_photos/<?php echo $playlist->playlist_photo; ?>" 
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
                  <small class="text-secondary">Rannim • <?php echo $number_of_songs; ?> songs</small>
                    <?php if($this->session->userdata('user_id') == $playlist->user_id){ ?>
                        <div class="mt-2 d-flex gap-2">
                            <button class="btn btn-sm btn-outline-primary"><a href="<?php echo site_url("Rannim/edit_playlist/$playlist->playlist_id"); ?>" style="text-decoration:none; color:inherit;">Edit</a></button>
                            <button class="btn btn-sm btn-outline-danger"><a href="<?php echo site_url("Rannim/delete_playlist/$playlist->playlist_id/$playlist->playlist_photo"); ?>" style="text-decoration:none; color:inherit;">Delete</a></button>
                        </div>
                    <?php } ?>
                  </div>
              </div>
            </a>
          </div>
        <?php } ?>
        <?php foreach($my_private_podcasts_playlists as $playlist){ ?>
          <div class="col-md-4">
            <a href="<?php echo site_url("Rannim/show_one_playlist/$playlist->playlist_id"); ?>" style="text-decoration:none;">
              <div class="card card-custom h-100">
                  <img src="<?php echo base_url(); ?>dashboard/assets/uploads/playlists_photos/<?php echo $playlist->playlist_photo; ?>" 
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
                  <small class="text-secondary">Rannim • <?php echo $number_of_songs; ?> songs</small>
                    <?php if($this->session->userdata('user_id') == $playlist->user_id){ ?>
                        <div class="mt-2 d-flex gap-2">
                            <button class="btn btn-sm btn-outline-primary"><a href="<?php echo site_url("Rannim/edit_playlist/$playlist->playlist_id"); ?>" style="text-decoration:none; color:inherit;">Edit</a></button>
                            <button class="btn btn-sm btn-outline-danger"><a href="<?php echo site_url("Rannim/delete_playlist/$playlist->playlist_id/$playlist->playlist_photo"); ?>" style="text-decoration:none; color:inherit;">Delete</a></button>
                        </div>
                    <?php } ?>
                  </div>
              </div>
            </a>
          </div>
        <?php } ?>
      <!-- My Section -->
      <div class="d-flex justify-content-between align-items-center mb-2">
        <h3>My Public Playlists</h3>
      </div>
      <div class="row g-3 mt-1">
        <?php foreach($playlists as $playlist){ ?>
          <?php if($playlist->user_id == $this->session->userdata('user_id')){ ?>
          <div class="col-md-4">
            <a href="<?php echo site_url("Rannim/show_one_playlist/$playlist->playlist_id"); ?>" style="text-decoration:none;">
              <div class="card card-custom h-100">
                  <img src="<?php echo base_url(); ?>dashboard/assets/uploads/playlists_photos/<?php echo $playlist->playlist_photo; ?>" 
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
                  <small class="text-secondary">Rannim • <?php echo $number_of_songs; ?> songs</small>
                    <?php if($this->session->userdata('user_id') == $playlist->user_id){ ?>
                        <div class="mt-2 d-flex gap-2">
                            <button class="btn btn-sm btn-outline-primary"><a href="<?php echo site_url("Rannim/edit_playlist/$playlist->playlist_id"); ?>" style="text-decoration:none; color:inherit;">Edit</a></button>
                            <button class="btn btn-sm btn-outline-danger"><a href="<?php echo site_url("Rannim/delete_playlist/$playlist->playlist_id/$playlist->playlist_photo"); ?>" style="text-decoration:none; color:inherit;">Delete</a></button>
                        </div>
                    <?php } ?>
                  </div>
              </div>
            </a>
          </div>
          <?php } ?>
        <?php } ?>
        <?php foreach($podcasts_playlists as $playlist){ ?>
          <?php if($playlist->user_id == $this->session->userdata('user_id')){ ?>
          <div class="col-md-4">
            <a href="<?php echo site_url("Rannim/show_one_podcast_playlist/$playlist->playlist_id"); ?>" style="text-decoration:none;">
              <div class="card card-custom h-100">
                  <img src="<?php echo base_url(); ?>dashboard/assets/uploads/playlists_photos/<?php echo $playlist->playlist_photo; ?>" 
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
                  <small class="text-secondary">Rannim • <?php echo $number_of_songs; ?> Podcasts</small>
                    <?php if($this->session->userdata('user_id') == $playlist->user_id || $playlist->is_collaborative == 1){ ?>
                        <div class="mt-2 d-flex gap-2">
                            <button class="btn btn-sm btn-outline-primary"><a href="<?php echo site_url("Rannim/edit_playlist/$playlist->playlist_id"); ?>" style="text-decoration:none; color:inherit;">Edit</a></button>
                            <button class="btn btn-sm btn-outline-danger"><a href="<?php echo site_url("Rannim/delete_playlist/$playlist->playlist_id/$playlist->playlist_photo"); ?>" style="text-decoration:none; color:inherit;">Delete</a></button>
                        </div>
                    <?php } ?>
                  </div>
              </div>
            </a>
          </div>
          <?php } ?>
        <?php } ?>
      <!-- Others Section -->
      <div class="d-flex justify-content-between align-items-center mb-2">
        <h3>Rannim Public Playlists</h3>
      </div>
      <div class="row g-3 mt-1">
        <?php foreach($playlists as $playlist){ ?>
          <div class="col-md-4">
            <a href="<?php echo site_url("Rannim/show_one_playlist/$playlist->playlist_id"); ?>" style="text-decoration:none;">
              <div class="card card-custom h-100">
                  <img src="<?php echo base_url(); ?>dashboard/assets/uploads/playlists_photos/<?php echo $playlist->playlist_photo; ?>" 
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
                  <small class="text-secondary">Rannim • <?php echo $number_of_songs; ?> songs</small>
                    <?php if($this->session->userdata('user_id') == $playlist->user_id){ ?>
                        <div class="mt-2 d-flex gap-2">
                            <button class="btn btn-sm btn-outline-primary"><a href="<?php echo site_url("Rannim/edit_playlist/$playlist->playlist_id"); ?>" style="text-decoration:none; color:inherit;">Edit</a></button>
                            <button class="btn btn-sm btn-outline-danger"><a href="<?php echo site_url("Rannim/delete_playlist/$playlist->playlist_id/$playlist->playlist_photo"); ?>" style="text-decoration:none; color:inherit;">Delete</a></button>
                        </div>
                    <?php } ?>
                  </div>
              </div>
            </a>
          </div>
        <?php } ?>
        <?php foreach($podcasts_playlists as $playlist){ ?>
          <div class="col-md-4">
            <a href="<?php echo site_url("Rannim/show_one_podcast_playlist/$playlist->playlist_id"); ?>" style="text-decoration:none;">
              <div class="card card-custom h-100">
                  <img src="<?php echo base_url(); ?>dashboard/assets/uploads/playlists_photos/<?php echo $playlist->playlist_photo; ?>" 
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
                  <small class="text-secondary">Rannim • <?php echo $number_of_songs; ?> Podcasts</small>
                    <?php if($this->session->userdata('user_id') == $playlist->user_id || $playlist->is_collaborative == 1){ ?>
                        <div class="mt-2 d-flex gap-2">
                            <button class="btn btn-sm btn-outline-primary"><a href="<?php echo site_url("Rannim/edit_playlist/$playlist->playlist_id"); ?>" style="text-decoration:none; color:inherit;">Edit</a></button>
                            <button class="btn btn-sm btn-outline-danger"><a href="<?php echo site_url("Rannim/delete_playlist/$playlist->playlist_id/$playlist->playlist_photo"); ?>" style="text-decoration:none; color:inherit;">Delete</a></button>
                        </div>
                    <?php } ?>
                  </div>
              </div>
            </a>
          </div>
        <?php } ?>
      </div>
    </div>
  </div>
</div>
  </div>
</div>

  <!-- Modal -->
  <div class="modal fade" id="add_playlist" tabindex="-1" aria-labelledby="addPlaylistLabel" aria-hidden="true">
      <div class="modal-dialog">
          <div class="modal-content" style="background-color: #181818; color: white; border: 1px solid #282828;">
             <form action="<?php echo site_url("Rannim/add_playlist"); ?>" method="POST" enctype="multipart/form-data">
              <div class="modal-header" style="border-bottom: 1px solid #282828;">
                  <h1 class="modal-title fs-5" id="addPlaylistLabel">Add Playlist</h1>
                  <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">

                <input type="hidden" name="user_id" value="<?php if($this->session->userdata("user_id") != null){ echo $this->session->userdata('user_id');} ?>">

                <div class="input-group flex-nowrap mb-3">
                  <span class="input-group-text">Playlist Name</span>
                  <input type="text" class="form-control" name="playlist_name">
                </div>

                <div class="input-group flex-nowrap mb-3">
                  <span class="input-group-text">Is Collaborative</span>
                  <div class="form-control d-flex align-items-center" style="border-left:none;">
                    <div class="form-check me-3">
                      <input class="form-check-input" type="radio" name="is_collaborative" value="1">
                      <label class="form-check-label">Yes</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="is_collaborative" value="0" checked>
                      <label class="form-check-label">No</label>
                    </div>
                  </div>
                </div>

                <div class="input-group flex-nowrap mb-3">
                  <span class="input-group-text">Is Public</span>
                  <div class="form-control d-flex align-items-center" style="border-left:none;">
                    <div class="form-check me-3">
                      <input class="form-check-input" type="radio" name="is_public" value="1">
                      <label class="form-check-label">Yes</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="is_public" value="0" checked>
                      <label class="form-check-label">No</label>
                    </div>
                  </div>
                </div>

                <div class="input-group flex-nowrap mb-3">
                  <span class="input-group-text">Songs or Podcasts?</span>
                  <div class="form-control d-flex align-items-center" style="border-left:none;">
                    <div class="form-check me-3">
                      <input class="form-check-input" type="radio" name="section" value="0" checked>
                      <label class="form-check-label">Songs</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="section" value="1">
                      <label class="form-check-label">Podcasts</label>
                    </div>
                  </div>
                </div>

                <div class="input-group flex-nowrap mb-3">
                  <span class="input-group-text">Playlist Photo</span>
                  <input type="file" id="fileUpload" style="display:none;" name="playlist_photo">
                  <label for="fileUpload" id="fileLabel" class="form-control" style="border-left:none; cursor:pointer;"></label>
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
<script src="<?php echo base_url(); ?>dashboard/assets/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo base_url(); ?>dashboard/assets/js/all_views.js"></script>
<script>
  const all_views = document.createElement('link');
  all_views.rel = 'stylesheet';
  all_views.href = '<?php echo base_url(); ?>dashboard/assets/css/all_views.css';
  document.head.appendChild(all_views);
  
  const add_modal = document.createElement('link');
  add_modal.rel = 'stylesheet';
  add_modal.href = '<?php echo base_url(); ?>dashboard/assets/css/add_modal.css';
  document.head.appendChild(add_modal);
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
