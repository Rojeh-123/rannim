    <!-- Main content -->
    <div class="container-fluid mt-3">
      <!-- Focus Section -->
      <div class="d-flex justify-content-between align-items-center mb-2">
        <h3>Focus</h3>
        <a href="<?php echo site_url("Rannim/show_all_songs"); ?>" class="text-decoration-none text-secondary">View all</a>
      </div>
      <div class="row g-3">
        <?php foreach($songs as $song){ ?>
          <div class="col-md-4">
          <a href="<?php echo site_url("Rannim/show_one_song/" . $song->song_id); ?>" style="text-decoration:none;">
            <div class="card card-custom h-100">
              <img src="<?php echo base_url(); ?>dashboard/assets/uploads/songs_photos/<?php echo $song->song_photo; ?>" 
                  class="card-img-top" style="height:180px; object-fit:cover;">
              <div class="card-body">
                <h5 class="card-title text-white"><?php echo $song->title; ?></h5>
                <p class="card-text text-secondary"><?php echo $song->artist_name; ?></p>
                <small class="text-secondary"><?php echo $song->category_name; ?> • <?php echo $song->type_name; ?></small>
              </div>
            </div>
          </a>
          </div>
        <?php } ?>
      </div>

      <!-- Podcasts Section -->
      <div class="d-flex justify-content-between align-items-center mb-2 mt-2">
        <h3>Rannim Podcasts</h3>
        <a href="<?php echo site_url("Rannim/show_all_podcasts"); ?>" class="text-decoration-none text-secondary">View all</a>
      </div>
      <div class="row g-3">
        <?php foreach($podcasts as $podcast){ ?>
          <div class="col-md-4">
          <a href="<?php echo site_url("Rannim/show_one_podcast/" . $podcast->podcast_id); ?>" style="text-decoration:none;">
            <div class="card card-custom h-100">
              <img src="<?php echo base_url(); ?>dashboard/assets/uploads/podcasts_photos/<?php echo $podcast->podcast_thumbnail; ?>" 
                  class="card-img-top" style="height:180px; object-fit:cover;">
              <div class="card-body">
                <h5 class="card-title text-white"><?php echo $podcast->title; ?></h5>
                <p class="card-text text-secondary"><?php echo $podcast->artist_name; ?></p>
                <small class="text-secondary"><?php echo $podcast->category_name; ?> • <?php echo $podcast->type_name; ?></small>
              </div>
            </div>
          </a>
          </div>
        <?php } ?>
      </div>

      <!-- Playlists Section -->
      <div class="d-flex justify-content-between align-items-center my-3 mt-2">
        <h3>Rannim Playlists</h3>
        <a href="<?php echo site_url("Rannim/show_all_playlists"); ?>" class="text-decoration-none text-secondary">View all</a>
      </div>
      <div class="row g-3">
        <?php foreach($playlists as $playlist){ ?>
          <div class="col-md-4">
          <a href="<?php if($playlist->section == 1){echo site_url("Rannim/show_one_podcast_playlist/" . $playlist->playlist_id);}else{echo site_url("Rannim/show_one_playlist/" . $playlist->playlist_id);} ?>" style="text-decoration:none;">
            <div class="card card-custom h-100">
              <img src="<?php echo base_url(); ?>dashboard/assets/uploads/playlists_photos/<?php echo $playlist->playlist_photo; ?>" 
                  class="card-img-top" style="height:180px; object-fit:cover;">
              <div class="card-body">
                <h5 class="card-title text-white"><?php echo $playlist->playlist_name; ?></h5>
                <small class="text-secondary"><?php echo isset($number_of_songs[$playlist->playlist_id]) ? $number_of_songs[$playlist->playlist_id] : '0'; ?> <?php if($playlist->section == 1){echo "Podcasts";}else{echo "Songs";} ?></small>
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

<!-- Bootstrap JS -->
<script src="<?php echo base_url(); ?>dashboard/assets/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo base_url(); ?>dashboard/assets/js/all_views.js"></script>
<script>
  const all_views = document.createElement('link');
  all_views.rel = 'stylesheet';
  all_views.href = '<?php echo base_url(); ?>dashboard/assets/css/all_views.css';
  document.head.appendChild(all_views);
</script>
</body>
</html>