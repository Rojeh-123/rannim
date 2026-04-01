


    <!-- Main content -->
    <div class="container-fluid mt-3">
      <!-- Focus Section -->
      <div class="d-flex justify-content-between align-items-center mb-2">
        <h3>Songs</h3>
        <a href="<?php echo site_url('Rannim/songs'); ?>" class="text-decoration-none text-secondary">View all</a>
      </div>
      <div class="row g-3">
        <?php if (isset($results['songs_results']) && count($results['songs_results']) > 0) { ?>
            <?php foreach($results['songs_results'] as $song) { ?>
                <div class="col-md-4">
                <a href="<?php echo site_url("Rannim/show_one_song/" . $song->song_id); ?>" style="text-decoration:none;">
                    <div class="card card-custom h-100">
                        <img src="<?php echo base_url(); ?>dashboard/assets/uploads/songs_photos/<?php echo $song->song_photo; ?>" 
                            class="card-img-top" style="height:180px; object-fit:cover;">
                        <div class="card-body">
                            <h5 class="card-title text-white"><?php echo $song->title; ?></h5>
                            <p class="card-text text-secondary"><?php echo $song->artist_name; ?></p>
                            <small class="text-secondary"><?php echo $song->category_name; ?> •  <?php echo $song->type_name ?></small>
                        </div>
                    </div>
                </a>
                </div>
            <?php } ?>
        <?php } ?>
      </div>

      <!-- Podcasts Section -->
      <div class="d-flex justify-content-between align-items-center mb-2 mt-2">
        <h3>Podcasts</h3>
        <a href="<?php echo site_url('Rannim/podcasts'); ?>" class="text-decoration-none text-secondary">View all</a>
      </div>
      <div class="row g-3">
        <?php if (isset($results['podcasts_results']) && count($results['podcasts_results']) > 0) { ?>
            <?php foreach($results['podcasts_results'] as $podcast) { ?>
                <div class="col-md-4">
                <a href="<?php echo site_url("Rannim/show_one_podcast/" . $podcast->podcast_id); ?>" style="text-decoration:none;">
                    <div class="card card-custom h-100">
                        <img src="<?php echo base_url(); ?>dashboard/assets/uploads/podcasts_photos/<?php echo $podcast->podcast_thumbnail; ?>" 
                            class="card-img-top" style="height:180px; object-fit:cover;">
                        <div class="card-body">
                            <h5 class="card-title text-white"><?php echo $podcast->title; ?></h5>
                            <p class="card-text text-secondary"><?php echo $podcast->artist_name; ?></p>
                            <small class="text-secondary"><?php echo $podcast->category_name; ?> • <?php echo $podcast->type_name ?></small>
                        </div>
                    </div>
                </a>
                </div>
            <?php } ?>
        <?php } ?>
      </div>

      <!-- Playlists Section -->
      <div class="d-flex justify-content-between align-items-center my-3 mt-2">
        <h3>Artists</h3>
        <a href="<?php echo site_url('Rannim/artists'); ?>" class="text-decoration-none text-secondary">View all</a>
      </div>
      <div class="row g-3">
        <?php if (isset($results['artists_results']) && count($results['artists_results']) > 0) { ?>
            <?php foreach($results['artists_results'] as $artist) { ?>
                <div class="col-md-4">
                <a href="<?php echo site_url("Rannim/show_one_artist/" . $artist->artist_id); ?>" style="text-decoration:none;">
                    <div class="card card-custom h-100">
                        <img src="<?php echo base_url(); ?>dashboard/assets/uploads/artists_photos/<?php echo $artist->artist_photo; ?>" 
                            class="card-img-top" style="height:180px; object-fit:cover;">
                        <div class="card-body">
                            <h5 class="card-title text-white"><?php echo $artist->artist_name; ?></h5>
                            <p class="card-text text-secondary">
                                <img src="<?php echo base_url(); ?>dashboard/assets/uploads/countries_flags/<?php echo $artist->country_flag; ?>" alt="Country Flag" class="me-1" style="width:16px;height:12px;">
                                <?php echo $artist->country_name; ?>
                            </p>
                            <small class="text-secondary">Rannim • Artist</small>
                        </div>
                    </div>
                </a>
                </div>
            <?php } ?>
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