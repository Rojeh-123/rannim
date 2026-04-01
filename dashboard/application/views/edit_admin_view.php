    <!-- Main content -->
    <div class="container-fluid mt-3">
        <!-- Main Content -->
        <div class="container my-5">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card p-4">
                        <h3 class="mb-4 text-center text-white">Edit Admin</h3>

                        <form action="<?php echo site_url("Rannim/update_admin") ?>" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="admin_id" value="<?php echo $admin->admin_id; ?>">
                            <div class="input-group flex-nowrap mb-3">
                                <span class="input-group-text text-white" style="background-color: #181818; border: 1px solid #282828;" id="addon-wrapping">Full Name</span>
                                <input type="text" class="form-control text-white" aria-label="Full Name" aria-describedby="addon-wrapping" name="full_name" value="<?php echo $admin->full_name ?>">
                            </div>

                            <div class="input-group flex-nowrap mb-3">
                                <span class="input-group-text text-white" style="background-color: #181818; border: 1px solid #282828;" id="addon-wrapping">Username</span>
                                <input type="text" class="form-control text-white" aria-label="Username" aria-describedby="addon-wrapping" name="username" value="<?php echo $admin->username ?>">
                            </div>

                            <div class="input-group flex-nowrap mb-3">
                                <span class="input-group-text text-white" style="background-color: #181818; border: 1px solid #282828;" id="addon-wrapping">E-mail</span>
                                <input type="email" class="form-control text-white" aria-label="E-mail" aria-describedby="addon-wrapping" name="email" value="<?php echo $admin->email ?>">
                            </div>

                            <div class="input-group flex-nowrap mb-3">
                                <span class="input-group-text text-white" style="background-color: #181818; border: 1px solid #282828;" id="addon-wrapping">Mobile</span>
                                <input type="text" class="form-control text-white" aria-label="Mobile" aria-describedby="addon-wrapping" name="mobile" value="<?php echo $admin->mobile ?>">
                            </div>

                            <div class="input-group mb-3">
                                <label class="input-group-text text-white" for="inputGroupSelect01" style="background-color: #181818; border: 1px solid #282828;">Rank</label>
                                <select class="form-select text-white" id="inputGroupSelect01" style="background-color: #181818; border: 1px solid #282828;" name="admin_rank">
                                    <option value="priest" class="text-white" <?php echo ($admin->admin_rank == "priest") ? 'selected' : ''; ?>>Priest</option>
                                    <option value="admin" class="text-white" <?php echo ($admin->admin_rank == "admin") ? 'selected' : ''; ?>>Admin</option>
                                </select>
                            </div>

                            <div class="text-center">
                                <button type="submit" class="btn-spotify">Update Admin</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </div>
</div>

<script src="<?php echo base_url(); ?>assets/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/all_views.js?v=1.1"></script>
<script src="<?php echo base_url(); ?>assets/js/edit_views.js"></script>
<script>
  const all_views = document.createElement('link');
  all_views.rel = 'stylesheet';
  all_views.href = '<?php echo base_url(); ?>assets/css/all_views.css';
  document.head.appendChild(all_views);
  
  const edit_views = document.createElement('link');
  edit_views.rel = 'stylesheet';
  edit_views.href = '<?php echo base_url(); ?>assets/css/edit_views.css';
  document.head.appendChild(edit_views);
</script>
</body>
</html>
