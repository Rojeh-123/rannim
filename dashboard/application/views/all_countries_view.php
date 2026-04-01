    <!-- Main content -->
    <div class="container-fluid mt-3">
      <!-- Countries Section -->
      <div class="d-flex justify-content-between align-items-center mb-2">
        <h3>Rannim Countries</h3>
        <button class="btn btn-outline-purple text-white" data-bs-toggle="modal" data-bs-target="#add_country">Add Country</button>
      </div>
      <div class="row g-3 mt-1">
        <?php foreach($countries as $country){ ?>
          <div class="col-md-4">
              <div class="card card-custom h-100">
                  <img src="<?php echo base_url(); ?>assets/uploads/countries_flags/<?php echo $country->country_flag; ?>" 
                      class="card-img-top" style="height:180px; object-fit:cover;">
                  <div class="card-body">
                    <h5 class="card-title text-white"><?php echo $country->country_name; ?></h5>
                    <small class="text-secondary">Rannim • Country</small>
                    <div class="mt-2 d-flex gap-2">
                        <button class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#edit_country" onclick="edit_country_modal(<?php echo $country->country_id; ?>)">Edit</button>
                        <button class="btn btn-sm btn-outline-danger"><a href="<?php echo site_url("Rannim/delete_country/$country->country_id/$country->country_flag"); ?>" style="text-decoration:none; color:inherit;">Delete</a></button>
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
  <div class="modal fade" id="add_country" tabindex="-1" aria-labelledby="addCountryLabel" aria-hidden="true">
      <div class="modal-dialog">
          <div class="modal-content" style="background-color: #181818; color: white; border: 1px solid #282828;">
             <form action="<?php echo site_url("Rannim/add_country"); ?>" method="POST" enctype="multipart/form-data">
              <div class="modal-header" style="border-bottom: 1px solid #282828;">
                  <h1 class="modal-title fs-5" id="addCountryLabel">Add Country</h1>
                  <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">

                <div class="input-group flex-nowrap mb-3">
                    <span class="input-group-text text-white" style="background-color: #181818; border: 1px solid #282828;" id="addon-wrapping">Country Name</span>
                    <input style="background-color: #181818; border: 1px solid #282828;" type="text" class="form-control text-white" aria-label="Country Name" aria-describedby="addon-wrapping" name="country_name">
                </div>
                <div class="input-group flex-nowrap mb-3">
                    <span class="input-group-text text-white" 
                        style="background-color: #181818; border: 1px solid #282828;" 
                        id="addon-wrapping">Country Flag</span>

                    <!-- Hidden file input -->
                    <input type="file" id="fileUpload" name="country_flag" style="display: none;">

                    <!-- Styled label -->
                    <label for="fileUpload" id="fileLabel" class="form-control text-white" 
                        style="background-color: #181818; border: 1px solid #282828; cursor: pointer; margin: 0;">
                        Select Country Flag
                    </label>
                </div>

              </div>
              <div class="modal-footer" style="border-top: 1px solid #282828;">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" style="background-color: #282828; border: none;">Close</button>
                  <button type="button" class="btn btn-success" style="background-color: #7e56f1; border: none;">Save</button>
              </div>
             </form>
          </div>
      </div>
  </div>

  <!-- Modal -->
  <div class="modal fade" id="edit_country" tabindex="-1" aria-labelledby="edit_countryLabel" aria-hidden="true">
      <div class="modal-dialog">
          <div class="modal-content" style="background-color: #181818; color: white; border: 1px solid #282828;">
             <form action="<?php echo site_url("Rannim/update_country"); ?>" method="POST" enctype="multipart/form-data">
              <div class="modal-header" style="border-bottom: 1px solid #282828;">
                  <h1 class="modal-title fs-5" id="edit_countryLabel">Update Country</h1>
                  <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">

                <input type="hidden" name="country_id" id="country_id">
                <input type="hidden" name="old_flag" id="old_flag">
                <div class="input-group flex-nowrap mb-3">
                    <span class="input-group-text text-white" style="background-color: #181818; border: 1px solid #282828;" id="addon-wrapping">Country Name</span>
                    <input id="edit_country_name" style="background-color: #181818; border: 1px solid #282828;" type="text" class="form-control text-white" aria-label="Country Name" aria-describedby="addon-wrapping" name="country_name">
                </div>
                <div class="input-group flex-nowrap mb-3">
                    <span class="input-group-text text-white" 
                        style="background-color: #181818; border: 1px solid #282828;" 
                        id="addon-wrapping">Country Flag</span>

                    <!-- Hidden file input -->
                    <input type="file" id="edit_file" name="edit_country_flag" style="display: none;" id="edit_country_flag">

                    <!-- Styled label -->
                    <label for="edit_file" id="edit_label" class="form-control text-white" style="background-color: #181818; border: 1px solid #282828; cursor: pointer; margin: 0;">
                        Select Country Flag (If you want to change it)
                    </label>
                </div>

              </div>
              <div class="modal-footer" style="border-top: 1px solid #282828;">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" style="background-color: #282828; border: none;">Close</button>
                  <button type="button" class="btn btn-success" style="background-color: #7e56f1; border: none;">Save</button>
              </div>
             </form>
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
<script>
    document.getElementById('fileUpload').addEventListener('change', function() {
        const label = document.getElementById('fileLabel');
        if (this.files && this.files.length > 0) {
            label.textContent = this.files[0].name;
        } else {
            label.textContent = "Select Category Photo";
        }
    });
</script>

<script>
    document.getElementById('fileUpload').addEventListener('change', function() {
        const label = document.getElementById('fileLabel');
        if (this.files && this.files.length > 0) {
            label.textContent = this.files[0].name;
        } else {
            label.textContent = "Select Country Flag";
        }
    });
</script>

<script>
    document.getElementById('edit_file').addEventListener('change', function() {
        const label = document.getElementById('edit_label');
        if (this.files && this.files.length > 0) {
            label.textContent = this.files[0].name;
        } else {
            label.textContent = "Select Country Flag (If you want to change it)";
        }
    });
</script>


<script>
    function edit_country_modal(country_id) {
    $.ajax({
        type: "GET",
        url: "http://localhost/rannim/dashboard/index.php/Rannim/edit_country/" + country_id,
        dataType: "json",
        success: function(data) {
            var country = data.country;
            $("#edit_country_name").val(country.country_name);
            $("#old_flag").val(country.country_flag);
            $("#country_id").val(country.country_id);
        },
        error: function(req, err) {
            console.log("The Error:" + err);
        }
    })
}
</script>
<script src="<?php echo base_url() ?>assets/js/jquery-3.7.1.js"></script>
</body>
</html>