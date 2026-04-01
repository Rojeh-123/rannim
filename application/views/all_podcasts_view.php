   <!-- Main content -->
    <div class="container-fluid mt-3">
      <!-- Podcasts Section -->
      <div class="d-flex justify-content-between align-items-center mb-2">
        <h3>Rannim Podcasts</h3>
      </div>
      <div class="row g-3 mt-1">
        <?php foreach($podcasts as $podcast){ ?>
          <div class="col-md-4">
            <a href="<?php echo site_url("Rannim/show_one_podcast/$podcast->podcast_id"); ?>" style="text-decoration:none;">
              <div class="card card-custom h-100">
                  <img src="<?php echo base_url(); ?>dashboard/assets/uploads/podcasts_photos/<?php echo $podcast->podcast_thumbnail; ?>" 
                      class="card-img-top" style="height:180px; object-fit:cover;">
                  <div class="card-body">
                  <h5 class="card-title text-white"><?php echo $podcast->title; ?></h5>
                  <p class="card-text text-secondary">Host • <?php echo $podcast->artist_name; ?></p>
                  <small class="text-secondary">Category • <?php echo $podcast->category_name; ?></small><br>
                  <small class="text-secondary">Type • <?php echo $podcast->type_name; ?></small>
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
