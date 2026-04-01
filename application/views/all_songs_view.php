    <!-- Main content -->
    <div class="container-fluid mt-3">
      <!-- Focus Section -->
      <div class="d-flex justify-content-between align-items-center mb-2">
        <h3>All Songs</h3>
      </div>
      <div class="row g-3 mt-1">
        <?php foreach($songs as $song){ ?>
          <div class="col-md-4">
            <a href="<?php echo site_url("Rannim/show_one_song/$song->song_id"); ?>" style="text-decoration:none;">
              <div class="card card-custom h-100">
                  <img src="<?php echo base_url(); ?>dashboard/assets/uploads/songs_photos/<?php echo $song->song_photo; ?>" 
                      class="card-img-top" style="height:180px; object-fit:cover;">
                  <div class="card-body">
                    <h5 class="card-title text-white"><?php echo $song->title; ?></h5>
                    <small class="text-secondary">By <?php echo $song->artist_name; ?></small><br>
                    <div class="d-flex justify-content-between">
                      <span class="text-secondary">Category • <?php echo $song->category_name; ?></span>
                      <span class="text-secondary">Type • <?php echo $song->type_name; ?></span>
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

<!-- Bootstrap JS -->
<script src="<?php echo base_url(); ?>dashboard/assets/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo base_url(); ?>dashboard/assets/js/all_views.js?v=1.1"></script>
<script>
  const all_views = document.createElement('link');
  all_views.rel = 'stylesheet';
  all_views.href = '<?php echo base_url(); ?>dashboard/assets/css/all_views.css';
  document.head.appendChild(all_views);
</script>
</body>
</html>
