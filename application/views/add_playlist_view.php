    <!-- Playlist Form -->
    <div class="container-fluid">
      <div class="row justify-content-center">
        <div class="col-md-6">
          <div class="form-card">
            <h3 class="mb-4 text-center text-white">Add Playlist</h3>

            <form action="<?php echo site_url('Rannim/add_playlist'); ?>" method="post" enctype="multipart/form-data">
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
                    <label class="form-check-label text-white">Yes</label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="is_collaborative" value="0" checked>
                    <label class="form-check-label text-white">No</label>
                  </div>
                </div>
              </div>

              <div class="input-group flex-nowrap mb-3">
                <span class="input-group-text">Is Public</span>
                <div class="form-control d-flex align-items-center" style="border-left:none;">
                  <div class="form-check me-3">
                    <input class="form-check-input" type="radio" name="is_public" value="1">
                    <label class="form-check-label text-white">Yes</label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="is_public" value="0" checked>
                    <label class="form-check-label text-white">No</label>
                  </div>
                </div>
              </div>

              <div class="input-group flex-nowrap mb-3">
                <span class="input-group-text">Songs or Podcasts?</span>
                <div class="form-control d-flex align-items-center" style="border-left:none;">
                  <div class="form-check me-3">
                    <input class="form-check-input" type="radio" name="section" value="0" checked>
                    <label class="form-check-label text-white">Songs</label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="section" value="1">
                    <label class="form-check-label text-white">Podcasts</label>
                  </div>
                </div>
              </div>

              <div class="input-group flex-nowrap mb-3">
                <span class="input-group-text">Playlist Photo</span>
                <input type="file" id="fileUpload" style="display:none;" name="playlist_photo">
                <label for="fileUpload" id="fileLabel" class="form-control text-white" style="border-left:none; cursor:pointer;"></label>
              </div>

              <div class="text-center">
                <button type="submit" class="btn-spotify">Save Playlist</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

  </div>
</div>

<!-- Bootstrap JS -->
<script src="<?php echo base_url(); ?>dashboard/assets/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo base_url(); ?>dashboard/assets/js/add_playlist.js"></script>
<script src="<?php echo base_url(); ?>dashboard/assets/js/all_views.js?v=1.1"></script>
<script>
  const all_views = document.createElement('link');
  all_views.rel = 'stylesheet';
  all_views.href = '<?php echo base_url(); ?>dashboard/assets/css/all_views.css';
  document.head.appendChild(all_views);
  
  const add_playlist = document.createElement('link');
  add_playlist.rel = 'stylesheet';
  add_playlist.href = '<?php echo base_url(); ?>dashboard/assets/css/add_playlist.css';
  document.head.appendChild(add_playlist);
</script>
</body>
</html>
