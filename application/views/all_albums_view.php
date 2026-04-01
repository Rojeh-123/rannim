
    <!-- Main content -->
    <div class="container-fluid mt-3">
      <!-- Albums Section -->
      <div class="d-flex justify-content-between align-items-center mb-2">
        <h3>Rannim Albums</h3>
      </div>
      <div class="row g-3 mt-1">
        <?php foreach($albums as $album){ ?>
        <div class="col-md-4">
          <a href="<?php echo site_url("Rannim/show_one_album/$album->album_id"); ?>" style="text-decoration:none;">
            <div class="card card-custom h-100">
                <img src="<?php echo base_url(); ?>dashboard/assets/uploads/albums_photos/<?php echo $album->album_photo; ?>" 
                    class="card-img-top" style="height:180px; object-fit:cover;">
                <div class="card-body">
                <h5 class="card-title text-white"><?php echo $album->album_name; ?></h5>
                <p class="card-text text-secondary">Category • <?php echo $album->category_name; ?></p>
                <small class="text-secondary"><?php echo isset($number_of_songs[$album->album_id]) ? $number_of_songs[$album->album_id] : '0'; ?> Songs • Album</small>
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
