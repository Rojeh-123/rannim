    <!-- Main content -->
    <div class="container-fluid mt-3">
      <!-- Admins Section -->
      <div class="d-flex justify-content-between align-items-center mb-2">
        <h3>Rannim Admins</h3>
        <?php if($this->session->userdata('admin_rank') == "priest"){ ?>
          <button class="btn btn-outline-purple text-white" data-bs-toggle="modal" data-bs-target="#add_admin">Add Admin</button>
        <?php } ?>
      </div>
      <div class="row g-3 mt-1">
        <?php foreach($admins as $admin){ ?>
            <div class="col-md-4">
                <div class="card card-custom h-100" 
                     style="background:#181818; border:1px solid #242424; border-radius:16px;">

                    <img src="https://images.unsplash.com/photo-1531427186611-ecfd6d936c79?fit=crop&w=600&q=80"
                        class="card-img-top"
                        style="height:180px; object-fit:cover; border-top-left-radius:16px; border-top-right-radius:16px;">

                    <div class="card-body text-white">

                        <!-- Name + Username -->
                        <div class="d-flex justify-content-between align-items-center mb-1">
                            <h5 class="card-title mb-0"><?php echo $admin->full_name; ?></h5>
                            <small class="text-secondary">@<?php echo $admin->username; ?></small>
                        </div>

                        <!-- Email + Mobile -->
                        <div class="d-flex justify-content-between">
                            <small class="text-secondary"><?php echo $admin->email; ?></small>
                            <small class="text-secondary"><?php echo $admin->mobile; ?></small>
                        </div>

                        <!-- Rank & Status -->
                        <div class="d-flex justify-content-between mt-2">
                            <div>
                                <small class="d-block" style="color:#7f57f1;">
                                    <?php echo ucfirst($admin->admin_rank); ?>
                                </small>

                                <?php if($admin->account_status == "1"){ ?>
                                    <span class="badge bg-success mt-1">Active</span>
                                <?php }else{ ?>
                                    <span class="badge bg-danger mt-1">Disabled</span>
                                <?php } ?>
                            </div>

                            <div class="mt-3 d-flex flex-wrap gap-2">

                                <?php if($this->session->userdata('admin_rank') == "priest"){ ?>

                                    <button class="btn btn-sm btn-outline-primary">
                                        <a href="<?php echo site_url('Rannim/edit_admin/'.$admin->admin_id); ?>" 
                                           style="text-decoration:none; color:inherit;">
                                            Edit
                                        </a>
                                    </button>
                                    <?php if($this->session->userdata('admin_id') != $admin->admin_id){ ?>
                                        <?php if($admin->account_status == "1"){ ?>
                                            <button class="btn btn-sm btn-outline-danger">
                                                <a href="<?php echo site_url('Rannim/disable_admin/'.$admin->admin_id); ?>" 
                                                    style="text-decoration:none; color:inherit;">
                                                    Disable
                                                </a>
                                            </button>
                                        <?php }else{ ?>
                                            <button class="btn btn-sm btn-outline-success">
                                                <a href="<?php echo site_url('Rannim/enable_admin/'.$admin->admin_id); ?>" 
                                                    style="text-decoration:none; color:inherit;">
                                                    Enable
                                                </a>
                                            </button>
                                        <?php } ?>
                                    <?php } ?>

                                <?php }else{ ?>
                                    <p class="text-secondary">Priests only</p>
                                <?php } ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
      </div>
    </div>
  </div>
</div>

  <!-- Modal -->
  <div class="modal fade" id="add_admin" tabindex="-1" aria-labelledby="add_adminLabel" aria-hidden="true">
      <div class="modal-dialog">
          <div class="modal-content" style="background-color: #181818; color: white; border: 1px solid #282828;">
             <form action="<?php echo site_url("Rannim/add_admin"); ?>" method="POST" enctype="multipart/form-data">
              <div class="modal-header" style="border-bottom: 1px solid #282828;">
                  <h1 class="modal-title fs-5" id="add_adminLabel">Add Admin</h1>
                  <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                    
                    <div class="input-group flex-nowrap mb-3">
                        <span class="input-group-text text-white" style="background-color: #181818; border: 1px solid #282828;" id="addon-wrapping">Full Name</span>
                        <input style="background-color: #181818; border: 1px solid #282828;" type="text" class="form-control text-white" aria-label="Full Name" aria-describedby="addon-wrapping" name="full_name">
                    </div>

                    <div class="input-group flex-nowrap mb-3">
                        <span class="input-group-text text-white" style="background-color: #181818; border: 1px solid #282828;" id="addon-wrapping">Username</span>
                        <input style="background-color: #181818; border: 1px solid #282828;" type="text" class="form-control text-white" aria-label="Username" aria-describedby="addon-wrapping" name="username">
                    </div>

                    <div class="input-group flex-nowrap mb-3">
                        <span class="input-group-text text-white" style="background-color: #181818; border: 1px solid #282828;" id="addon-wrapping">E-mail</span>
                        <input style="background-color: #181818; border: 1px solid #282828;" type="email" class="form-control text-white" aria-label="E-mail" aria-describedby="addon-wrapping" name="email">
                    </div>

                    <div class="input-group flex-nowrap mb-3">
                        <span class="input-group-text text-white" style="background-color: #181818; border: 1px solid #282828;" id="addon-wrapping">Password</span>
                        <input style="background-color: #181818; border: 1px solid #282828;" type="password" class="form-control text-white" aria-label="Password" aria-describedby="addon-wrapping" name="password">
                    </div>

                    <div class="input-group flex-nowrap mb-3">
                        <span class="input-group-text text-white" style="background-color: #181818; border: 1px solid #282828;" id="addon-wrapping">Mobile</span>
                        <input style="background-color: #181818; border: 1px solid #282828;" type="text" class="form-control text-white" aria-label="Mobile" aria-describedby="addon-wrapping" name="mobile">
                    </div>

                    <div class="input-group mb-3">
                        <label class="input-group-text text-white" for="inputGroupSelect01" style="background-color: #181818; border: 1px solid #282828;">Rank</label>
                        <select class="form-select text-white" id="inputGroupSelect01" style="background-color: #181818; border: 1px solid #282828;" name="admin_rank">
                            <option selected class="text-white" disabled>Choose...</option>
                            <option value="priest" class="text-white">Priest</option>
                            <option value="admin" class="text-white">Admin</option>
                        </select>
                    </div>

              </div>
              <div class="modal-footer" style="border-top: 1px solid #282828;">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" style="background-color: #282828; border: none;">Close</button>
                  <button type="submit" class="btn btn-success" style="background-color: #7e56f1; border: none;">Save</button>
              </div>
             </form>
          </div>
      </div>
  </div>

<!-- Bootstrap JS -->
<script src="<?php echo base_url(); ?>assets/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/all_views.js?v=1.1?v=1.1"></script>
<script>
  const all_views = document.createElement('link');
  all_views.rel = 'stylesheet';
  all_views.href = '<?php echo base_url(); ?>assets/css/all_views.css';
  document.head.appendChild(all_views);
</script>
</body>
</html>
