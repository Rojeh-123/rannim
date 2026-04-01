    <!-- Main content -->
    <div class="container-fluid mt-3">
      <!-- Users Section -->
      <div class="d-flex justify-content-between align-items-center mb-2">
        <h3>Rannim Users</h3>
      </div>
      <div class="row g-3 mt-1">
        <?php foreach($users as $user){ ?>
        <div class="col-md-4">
            <a href="<?php echo site_url("Rannim/show_user_profile/$user->user_id"); ?>" style="text-decoration:none;">
            <div class="card card-custom h-100">
                <img src="<?php echo base_url(); ?>dashboard/assets/uploads/users_photos/<?php echo $user->user_photo; ?>" 
                    class="card-img-top" style="height:180px; object-fit:cover;">
                <div class="card-body">
                    <h5 class="card-title text-white"><?php echo $user->username; ?></h5>
                    <small class="text-secondary">Rannim • User</small>
                    <?php if($this->session->userdata('user_id') == $user->user_id){ ?>
                      <div class="mt-2 d-flex gap-2">
                          <button class="btn btn-sm btn-outline-primary"><a href="<?php echo site_url("Rannim/edit_user/$user->user_id"); ?>" style="text-decoration:none; color:inherit;">Edit</a></button>
                          <button class="btn btn-sm btn-outline-danger"><a href="<?php echo site_url("Rannim/delete_user/$user->user_id/$user->user_photo"); ?>" style="text-decoration:none; color:inherit;">Delete</a></button>
                          <button class="btn btn-sm btn-outline-warning"><a href="<?php echo site_url("Rannim/log_out"); ?>" style="text-decoration:none; color:inherit;">Log Out</a></button>
                      </div>
                    <?php }else{ ?>
                      <p class="mt-2">You can edit and delete your own account.</p>
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