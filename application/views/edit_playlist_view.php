    <!-- Edit Playlist Form -->
    <div class="container-fluid">
      <div class="row justify-content-center">
        <div class="col-md-6">
          <div class="form-card">
            <h3 class="mb-4 text-center text-white">Edit Playlist</h3>

            <form action="<?php echo site_url("Rannim/update_playlist"); ?>" method="post" enctype="multipart/form-data">
              <input type="hidden" name="playlist_id" value="<?php echo $playlist->playlist_id; ?>">
              <input type="hidden" name="playlist_old_photo" value="<?php echo $playlist->playlist_photo; ?>">
              <div class="input-group flex-nowrap mb-3">
                <span class="input-group-text">Playlist Name</span>
                <input type="text" class="form-control" name="playlist_name" value="<?php echo $playlist->playlist_name; ?>">
              </div>

              <div class="input-group flex-nowrap mb-3">
                <span class="input-group-text">Is Collaborative</span>
                <div class="form-control d-flex align-items-center" style="border-left:none;">
                  <div class="form-check me-3">
                    <input class="form-check-input" type="radio" name="is_collaborative" value="1" <?php if($playlist->is_collaborative == 1 ){echo "checked";} ?>>
                    <label class="form-check-label text-white">Yes</label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="is_collaborative" value="0" <?php if($playlist->is_collaborative == 0 ){echo "checked";} ?>>
                    <label class="form-check-label text-white">No</label>
                  </div>
                </div>
              </div>

              <div class="input-group flex-nowrap mb-3">
                <span class="input-group-text">Is Public</span>
                <div class="form-control d-flex align-items-center" style="border-left:none;">
                  <div class="form-check me-3">
                    <input class="form-check-input" type="radio" name="is_public" value="1" <?php if($playlist->is_public == 1 ){echo "checked";} ?>>
                    <label class="form-check-label text-white">Yes</label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="is_public" value="0" <?php if($playlist->is_public == 0 ){echo "checked";} ?>>
                    <label class="form-check-label text-white">No</label>
                  </div>
                </div>
              </div>

              <div class="input-group flex-nowrap mb-3">
                <span class="input-group-text">Songs or Podcasts?</span>
                <div class="form-control d-flex align-items-center" style="border-left:none;">
                  <div class="form-check me-3">
                    <input class="form-check-input" type="radio" name="section" value="0" <?php if($playlist->section == 0 ){echo "checked";} ?>>
                    <label class="form-check-label text-white">Songs</label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="section" value="1" <?php if($playlist->section == 1 ){echo "checked";} ?>>
                    <label class="form-check-label text-white">Podcasts</label>
                  </div>
                </div>
              </div>

              <div class="input-group flex-nowrap mb-3">
                <span class="input-group-text">Playlist Photo</span>
                <input type="file" id="fileUpload" style="display:none;" name="playlist_photo">
                <label for="fileUpload" id="fileLabel" class="form-control text-white" style="border-left:none; cursor:pointer;"><?php echo $playlist->playlist_photo; ?></label>
              </div>

              <div class="text-center">
                <button type="submit" class="btn-spotify">Update Playlist</button>
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
<script src="<?php echo base_url(); ?>dashboard/assets/js/all_views.js"></script>
<script src="<?php echo base_url(); ?>dashboard/assets/js/edit_playlist.js"></script>
<script>
  const all_views = document.createElement('link');
  all_views.rel = 'stylesheet';
  all_views.href = '<?php echo base_url(); ?>dashboard/assets/css/all_views.css';
  document.head.appendChild(all_views);
  
  const edit_playlist = document.createElement('link');
  edit_playlist.rel = 'stylesheet';
  edit_playlist.href = '<?php echo base_url(); ?>dashboard/assets/css/edit_playlist.css';
  document.head.appendChild(edit_playlist);
</script>
</body>
</html>
