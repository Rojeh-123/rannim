    <!-- Main content -->
    <div class="container-fluid mt-3">
      <!-- Categories Section -->
      <div class="d-flex justify-content-between align-items-center mb-2">
        <h3>Rannim Categories</h3>
      </div>
      <div class="row g-3 mt-1">
        <?php foreach($categories as $category){ ?>
          <div class="col-md-4">
            <a href="<?php echo site_url("Rannim/show_one_category/$category->category_id"); ?>" style="text-decoration:none;">
              <div class="card card-custom h-100">
                  <img src="<?php echo base_url(); ?>dashboard/assets/uploads/categories_photos/<?php echo $category->category_photo; ?>" 
                      class="card-img-top" style="height:180px; object-fit:cover;">
                  <div class="card-body">
                  <h5 class="card-title text-white"><?php echo $category->category_name; ?></h5>
                  <small class="text-secondary">Rannim • Category</small>
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
