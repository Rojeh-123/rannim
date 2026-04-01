    <!-- Main content -->
    <div class="container-fluid mt-3">
      <!-- Band Cover -->
      <div class="position-relative mb-5">
        <div style="height:300px;background-image:url('https://images.unsplash.com/photo-1511671782779-c97d3d27a1d4?q=80&w=800'); background-size:cover; background-position:center; border-radius:14px;"></div>
        <div style="position:absolute; bottom:-50px; left:20px; width:100px; height:100px; border-radius:50%; overflow:hidden; border:4px solid var(--bg);">
          <img src="<?php echo base_url(); ?>dashboard/assets/uploads/bands_photos/<?php echo $band->band_photo ?>" style="width:100%;height:100%;object-fit:cover;">
        </div>
        <h2 style="position:absolute; bottom:10px; left:130px; color:#fff;"><?php echo $band->band_name ?></h2>
      </div>

      <!-- Band Bio -->
      <div class="band-bio" style="margin-bottom:30px; margin-left:20px; max-width:900px; color:#ccc; font-size:1rem; line-height:1.6;">
        <p>
          <?php echo $band->band_bio ?>
        </p>
      </div>

      <!-- Artists Section -->
      <h3>Artists</h3>
      <div class="row g-3">
        <?php foreach($artists as $artist){ ?>
          <div class="col-md-4">
            <a href="<?php echo site_url("Rannim/show_one_artist/$artist->artist_id"); ?>" style="text-decoration:none;">
              <div class="card card-custom h-100">
                  <img src="<?php echo base_url(); ?>dashboard/assets/uploads/artists_photos/<?php echo $artist->artist_photo; ?>" 
                      class="card-img-top" style="height:180px; object-fit:cover;">
                  <div class="card-body">
                  <h5 class="card-title text-white"><?php echo $artist->artist_name; ?></h5>
                  </div>
              </div>
            </a>
          </div>
        <?php } ?>
      </div>
    </div>
  </div>
</div>

<script src="<?php echo base_url(); ?>dashboard/assets/js/all_views.js"></script>
<script>
  const all_views = document.createElement('link');
  all_views.rel = 'stylesheet';
  all_views.href = '<?php echo base_url(); ?>dashboard/assets/css/all_views.css';
  document.head.appendChild(all_views);
</script>
</body>
</html>