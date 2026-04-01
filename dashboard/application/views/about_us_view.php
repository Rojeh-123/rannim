    <!-- Main content -->
    <div class="container mt-3">
      <!-- Developers Section -->
      <div class="d-flex justify-content-between align-items-center mb-2">
        <h3>Rannim Developers</h3>
      </div>
      <div class="row g-3 mt-1">
        <div class="col-md-3">
          <div class="card card-custom h-100">
            <img src="<?php echo base_url(); ?>assets/dev_imgs/rojeh.jpg" 
                class="card-img-top">
            <div class="card-body">
              <h5 class="card-title text-white">Rojeh Samy</h5>
              <small class="text-secondary">Full-Stack • Developer</small>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="card card-custom h-100">
            <img src="<?php echo base_url(); ?>assets/dev_imgs/marco.jpg" 
                class="card-img-top">
            <div class="card-body">
              <h5 class="card-title text-white">Marco Makram</h5>
              <small class="text-secondary">Front-End • Developer</small>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="card card-custom h-100">
            <img src="<?php echo base_url(); ?>assets/dev_imgs/koko.jpg" 
                class="card-img-top">
            <div class="card-body">
              <h5 class="card-title text-white">kyroles Yousef</h5>
              <small class="text-secondary">Back-End • Developer</small>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="card card-custom h-100">
            <img src="<?php echo base_url(); ?>assets/dev_imgs/mina.jpg" 
                class="card-img-top">
            <div class="card-body">
              <h5 class="card-title text-white">Mina Sameh</h5>
              <small class="text-secondary">UI/UX • Developer</small>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Bootstrap JS -->
<script src="<?php echo base_url(); ?>assets/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/all_views.js"></script>
<script>
  const all_views = document.createElement('link');
  all_views.rel = 'stylesheet';
  all_views.href = '<?php echo base_url(); ?>assets/css/all_views.css';
  document.head.appendChild(all_views);
</script>
</body>
</html>