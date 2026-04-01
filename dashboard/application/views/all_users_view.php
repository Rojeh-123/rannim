    <!-- Main content -->
    <div class="container-fluid mt-3">
      <!-- Users Section -->
      <div class="d-flex justify-content-between align-items-center mb-2">
        <h3>Rannim Users</h3>
      </div>
      <div class="row g-3 mt-1">
        <?php foreach($users as $user){ ?>
        <div class="col-md-4">
            <a href="<?php echo site_url("Rannim/show_one_user/$user->user_id"); ?>" style="text-decoration:none;">
            <div class="card card-custom h-100">
                <img src="<?php echo base_url(); ?>assets/uploads/users_photos/<?php echo $user->user_photo; ?>" 
                    class="card-img-top" style="height:180px; object-fit:cover;">
                <div class="card-body">
                    <h5 class="card-title text-white"><?php echo $user->username; ?></h5>
                    <small class="text-secondary">Rannim • User</small>
                    <div class="mt-2 d-flex gap-2">
                        <button class="btn btn-sm btn-outline-danger"><a href="<?php echo site_url("Rannim/delete_user/$user->user_id/$user->user_photo"); ?>" style="text-decoration:none; color:inherit;">Remove</a></button>
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
<script src="<?php echo base_url(); ?>assets/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/all_views.js?v=1.1"></script>
<script>
  const all_views = document.createElement('link');
  all_views.rel = 'stylesheet';
  all_views.href = '<?php echo base_url(); ?>assets/css/all_views.css';
  document.head.appendChild(all_views);
</script>
</body>
</html>
