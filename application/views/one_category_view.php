
    <!-- Main content -->
    <div class="container-fluid mt-3">
      <!-- Songs Section -->
      <div class="d-flex justify-content-between align-items-center my-3 mt-2">
        <h3><?php echo $category->category_name; ?> • Songs</h3>
        <a href="<?php echo site_url("Rannim/show_all_songs"); ?>" class="text-decoration-none text-secondary">View all</a>
      </div>
      <div class="row g-3">
        <?php foreach($songs as $song){ ?>
          <div class="col-md-4">
            <div class="card card-custom h-100">
              <img src="<?php echo base_url(); ?>dashboard/assets/uploads/songs_photos/<?php echo $song->song_photo; ?>" 
                  class="card-img-top" style="height:180px; object-fit:cover;">
              <div class="card-body">
                <h5 class="card-title text-white"><?php echo $song->title; ?></h5>
                <p class="card-text text-secondary"><?php echo $song->artist_name; ?></p>
                <small class="text-secondary"><?php echo $song->type_name; ?> • Song</small>
              </div>
            </div>
          </div>
        <?php } ?>
      </div>
    <div class="container-fluid mt-3">
      <!-- Podcasts Section -->
      <div class="d-flex justify-content-between align-items-center my-3 mt-2">
        <h3><?php echo $category->category_name; ?> • Podcasts</h3>
        <a href="<?php echo site_url("Rannim/show_all_podcasts"); ?>" class="text-decoration-none text-secondary">View all</a>
      </div>
      <div class="row g-3">
        <?php foreach($podcasts as $podcast){ ?>
          <div class="col-md-4">
            <div class="card card-custom h-100">
              <img src="<?php echo base_url(); ?>dashboard/assets/uploads/podcasts_photos/<?php echo $podcast->podcast_thumbnail; ?>" 
                  class="card-img-top" style="height:180px; object-fit:cover;">
              <div class="card-body">
                <h5 class="card-title text-white"><?php echo $podcast->title; ?></h5>
                <p class="card-text text-secondary"><?php echo $podcast->artist_name; ?></p>
                <small class="text-secondary"><?php echo $podcast->type_name; ?> • Podcast</small>
              </div>
            </div>
          </div>
        <?php } ?>
      </div>
    </div>
  </div>
</div>
</div>

<!-- Bootstrap JS -->
<script src="<?php echo base_url(); ?>dashboard/assets/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo base_url(); ?>dashboard/assets/js/all_views.js"></script>
<script>
  const all_views = document.createElement('Link');
  all_views.rel = 'stylesheet';
  all_views.href = '<?php echo base_url(); ?>dashboard/assets/css/all_views.css';
  document.head.appendChild(all_views);
</script>
</body>
</html>