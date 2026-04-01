    <!-- User Profile Section -->
    <main class="main mt-4">
      <div class="container-fluid text-white user-profile">

        <!-- User Photo -->
        <div class="row justify-content-center mb-4">
          <div class="col-auto">
            <div class="user-photo" style="background-image: url('<?php echo base_url(); ?>dashboard/assets/uploads/users_photos/<?php echo $user->user_photo; ?>');"></div>
          </div>
        </div>

        <!-- User Info Cards -->
        <div class="row justify-content-center mb-3 g-3">
          <div class="col-md-6">
            <div class="card card-custom p-3 h-100">
              <p class="label mb-1">Full Name</p>
              <p class="value"><?php echo $user->full_name ?></p>
            </div>
          </div>
          <div class="col-md-6">
            <div class="card card-custom p-3 h-100">
              <p class="label mb-1">Username</p>
              <p class="value"><?php echo $user->username ?></p>
            </div>
          </div>
          <div class="col-md-6">
            <div class="card card-custom p-3 h-100">
              <p class="label mb-1">E-mail</p>
              <?php if($user->user_id == $this->session->userdata('user_id')){ ?>
                <p class="value"><?php echo $user->email ?></p>
              <?php }else{ ?>
                <p class="value">*****@gmail.com</p>
              <?php } ?>
            </div>
          </div>
          <div class="col-md-6">
            <div class="card card-custom p-3 h-100">
              <p class="label mb-1">Mobile</p>
              <?php if($user->user_id == $this->session->userdata('user_id')){ ?>
                <p class="value"><?php echo $user->mobile ?></p>
              <?php }else{ ?>
                <p class="value">+012********</p>
              <?php } ?>
            </div>
          </div>
          <div class="col-md-6">
            <div class="card card-custom p-3 h-100">
              <p class="label mb-1">Country</p>
              <p class="value"><?php echo $user->country ?></p>
            </div>
          </div>
          <div class="col-md-6">
            <div class="card card-custom p-3 h-100">
              <p class="label mb-1">Date Of Birth</p>
              <?php if($user->user_id == $this->session->userdata('user_id')){ ?>
                <p class="value"><?php echo $user->date_of_birth ?></p>
              <?php }else{ ?>
                <p class="value">****-**-**</p>
              <?php } ?>
            </div>
          </div>
        </div>

        <?php if($user->user_id == $this->session->userdata('user_id')){ ?>

            <!-- Account Type & Actions -->
            <div class="row justify-content-center mb-3">
                <div class="col text-center">
                <?php if($user->is_premium == 1){ ?>
                    <p class="fw-bold fs-5" style="color: var(--accent);">Premium Account</p>
                <?php }else{ ?>
                    <p class="fw-bold fs-5" style="color: var(--accent);">Free Account</p>

                    <div class="col text-center">
                        <button class="btn-upgrade-glass">Upgrade to Premium</button>
                    </div>
                <?php } ?>
                </div>
            </div>

            <div class="row justify-content-center mb-3">
                <div class="col-auto">
                    <button class="btn btn-outline-primary me-2"><a href="<?php echo site_url('Rannim/edit_user/'. $user->user_id); ?>" style="text-decoration: none; color: inherit;">Edit</a></button>
                    <button class="btn btn-outline-danger me-2"><a href="<?php echo site_url('Rannim/delete_user/'. $user->user_id . '/' . $user->user_photo); ?>" style="text-decoration: none; color: inherit;">Delete</a></button>
                    <button class="btn btn-outline-warning"><a href="<?php echo site_url('Rannim/log_out/'); ?>" style="text-decoration: none; color: inherit;">Log Out</a></button>
                </div>
            </div>
        <?php } ?>

      </div>
    </main>

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

  const one_user = document.createElement('link');
  one_user.rel = 'stylesheet';
  one_user.href = '<?php echo base_url(); ?>dashboard/assets/css/one_user.css';
  document.head.appendChild(one_user);
</script>
</body>
</html>
