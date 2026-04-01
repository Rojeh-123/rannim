    <!-- User Profile Section -->
    <main class="main mt-4">
      <div class="container-fluid text-white user-profile">

        <!-- User Photo -->
        <div class="row justify-content-center mb-4">
          <div class="col-auto">
            <div class="user-photo" style="background-image: url('<?php echo base_url(); ?>assets/uploads/users_photos/<?php echo $user->user_photo; ?>');"></div>
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
              <p class="value"><?php echo $user->email ?></p>
            </div>
          </div>
          <div class="col-md-6">
            <div class="card card-custom p-3 h-100">
              <p class="label mb-1">Mobile</p>
              <p class="value"><?php echo $user->mobile ?></p>
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
              <p class="value"><?php echo $user->date_of_birth ?></p>
            </div>
          </div>
        </div>

<style>
.delete-outline {
  background: transparent;
  border: 2px solid #ff3b3b;
  padding: 10px 26px;
  border-radius: 10px;
  color: #ff3b3b;
  font-weight: 600;
  transition: 0.25s ease;
}

.delete-outline:hover {
  background: #ff3b3b;
  color: #fff;
  transform: translateY(-2px);
}

.delete-outline a {
  text-decoration: none;
  color: inherit;
}
</style>

        <div class="row justify-content-center mb-3">
            <div class="col-auto">
                <button class="delete-outline">
                <a href="<?php echo site_url('Rannim/delete_user/'. $user->user_id . '/' . $user->user_photo); ?>">
                    <i class="bi bi-trash"></i> Delete
                </a>
                </button>
            </div>
        </div>

      </div>
    </main>

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

  const one_user = document.createElement('link');
  one_user.rel = 'stylesheet';
  one_user.href = '<?php echo base_url(); ?>assets/css/one_user.css';
  document.head.appendChild(one_user);
</script>
</body>
</html>
