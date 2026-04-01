    <!-- Main Content: Edit Profile Form -->
    <div class="container my-5">
      <div class="row justify-content-center">
        <div class="col-md-6">
          <div class="form-card">
            <h3 class="mb-4 text-center text-white">Edit Profile</h3>

            <form action="<?php echo site_url('Rannim/update_user'); ?>" method="post" enctype="multipart/form-data">
              <input type="hidden" name="user_id" value="<?php echo $user->user_id; ?>">
              <input type="hidden" name="user_old_photo" value="<?php echo $user->user_photo; ?>">
              <div class="input-group flex-nowrap mb-3">
                <span class="input-group-text text-white">Full Name</span>
                <input type="text" class="form-control text-white" name="full_name" value="<?php echo $user->full_name; ?>">
              </div>

              <div class="input-group flex-nowrap mb-3">
                <span class="input-group-text text-white">Username</span>
                <input type="text" class="form-control text-white" name="username" value="<?php echo $user->username; ?>">
              </div>

              <div class="input-group flex-nowrap mb-3">
                <span class="input-group-text text-white">E-mail</span>
                <input type="email" class="form-control text-white" name="email" value="<?php echo $user->email; ?>">
              </div>

              <div class="input-group flex-nowrap mb-3">
                <span class="input-group-text text-white">Mobile</span>
                <input type="text" class="form-control text-white" name="mobile" value="<?php echo $user->mobile; ?>">
              </div>

              <div class="input-group mb-3">
                <label class="input-group-text text-white">Country</label>
                <select class="form-select text-white" name="country">
                    <?php foreach($countries as $country) { ?>
                        <option value="<?php echo $country->country_name; ?>" <?php if($user->country == $country->country_name) echo 'selected'; ?>><?php echo $country->country_name; ?></option>
                    <?php } ?>
                </select>
              </div>

              <div class="input-group flex-nowrap mb-3">
                <span class="input-group-text text-white">Date of Birth</span>
                <input type="date" class="form-control text-white" name="date_of_birth" value="<?php echo $user->date_of_birth; ?>">
              </div>

              <div class="input-group flex-nowrap mb-3">
                <span class="input-group-text">User Photo</span>
                <input type="file" id="fileUpload" style="display:none;" name="edit_user_photo">
                <label for="fileUpload" id="fileLabel" class="form-control text-white" style="border-left:none; cursor:pointer;"><?php echo $user->user_photo; ?></label>
              </div>

              <div class="text-center">
                <button type="submit" class="btn-spotify">Update Profile</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

  </div>
</div>

<script src="<?php echo base_url(); ?>dashboard/assets/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo base_url(); ?>dashboard/assets/js/all_views.js?v=1.1"></script>
<script src="<?php echo base_url(); ?>dashboard/assets/js/edit_playlist.js"></script>
<script>
  const all_views = document.createElement('link');
  all_views.rel = 'stylesheet';
  all_views.href = '<?php echo base_url(); ?>dashboard/assets/css/all_views.css';
  document.head.appendChild(all_views);
  
  const edit_playlist = document.createElement('link');
  edit_playlist.rel = 'stylesheet';
  edit_playlist.href = '<?php echo base_url(); ?>dashboard/assets/css/edit_playlist.css';
  document.head.appendChild(edit_playlist);
  
  const edit_user = document.createElement('link');
  edit_user.rel = 'stylesheet';
  edit_user.href = '<?php echo base_url(); ?>dashboard/assets/css/edit_user.css';
  document.head.appendChild(edit_user);
</script>
</body>
</html>
