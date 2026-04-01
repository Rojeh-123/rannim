    <!-- Main content -->
    <div class="container-fluid mt-3">
        <!-- Header -->
        <div class="d-flex justify-content-between align-items-center mb-2">
            <h3>All Podcasts</h3>
            <button class="btn btn-outline-purple text-white" data-bs-toggle="modal" data-bs-target="#add_podcast">
                Add Podcast
            </button>
        </div>

        <!-- Cards -->
        <div class="row g-3 mt-1">
            <?php foreach($podcasts as $podcast){ ?>
            <div class="col-md-4">
                <a href="<?php echo site_url("Rannim/show_one_podcast/$podcast->podcast_id"); ?>" style="text-decoration:none;">
                <div class="card card-custom h-100">

                    <img src="<?php echo base_url(); ?>assets/uploads/podcasts_photos/<?php echo $podcast->podcast_thumbnail; ?>" 
                        class="card-img-top"
                        style="height:180px; object-fit:cover;">

                    <div class="card-body">
                        <h5 class="card-title text-white"><?php echo $podcast->title; ?></h5>
                        <small class="text-secondary">Host • <?php echo $podcast->artist_name; ?></small><br>

                        <div class="d-flex justify-content-between">
                            <span class="text-secondary">Category • <?php echo $podcast->category_name; ?></span>
                            <span class="text-secondary">Type • <?php echo $podcast->type_name; ?></span>
                        </div>

                        <div class="mt-2 d-flex gap-2">
                            <button class="btn btn-sm btn-outline-primary">
                                <a href="<?php echo site_url("Rannim/edit_podcast/$podcast->podcast_id"); ?>"
                                style="text-decoration:none; color:inherit;">
                                Edit
                                </a>
                            </button>

                            <button class="btn btn-sm btn-outline-danger">
                                <a href="<?php echo site_url("Rannim/delete_podcast/$podcast->podcast_id/$podcast->podcast_thumbnail"); ?>"
                                style="text-decoration:none; color:inherit;">
                                Delete
                                </a>
                            </button>
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

  <!-- Modal -->
  <div class="modal fade" id="add_podcast" tabindex="-1" aria-labelledby="add_podcastLabel" aria-hidden="true">
      <div class="modal-dialog">
          <div class="modal-content" style="background-color: #181818; color: white; border: 1px solid #282828;">
             <form action="<?php echo site_url("Rannim/add_podcast"); ?>" method="POST" enctype="multipart/form-data">
              <div class="modal-header" style="border-bottom: 1px solid #282828;">
                  <h1 class="modal-title fs-5" id="add_podcastLabel">Add Podcast</h1>
                  <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">

                <div class="input-group mb-3">
                    <label class="input-group-text text-white" for="inputGroupSelect01" style="background-color: #181818; border: 1px solid #282828;">Host</label>
                    <select class="form-select text-white" id="inputGroupSelect01" style="background-color: #181818; border: 1px solid #282828;" name="host" onchange="get_albums_by_host(this.value)">
                        <option selected class="text-white" disabled>Select Host</option>
                        <?php foreach ($hosts as $host) { ?>
                            <option value="<?php echo $host->artist_id; ?>" class="text-white"><?php echo $host->artist_name; ?></option>
                        <?php } ?>
                    </select>
                </div>

                <div class="input-group mb-3">
                    <label class="input-group-text text-white" for="inputGroupSelect01" style="background-color: #181818; border: 1px solid #282828;">Type</label>
                    <select class="form-select text-white" id="inputGroupSelect01" style="background-color: #181818; border: 1px solid #282828;" name="type" onchange="get_categories_by_type(this.value)">
                        <option selected class="text-white" disabled>Select Type</option>
                        <?php foreach ($types as $type) { ?>
                            <option value="<?php echo $type->type_id; ?>" class="text-white"><?php echo $type->type_name; ?></option>
                        <?php } ?>
                    </select>
                </div>

                <div class="input-group mb-3">
                    <label class="input-group-text text-white" for="inputGroupSelect01" style="background-color: #181818; border: 1px solid #282828;">Category</label>
                    <select class="form-select text-white" id="category_options" style="background-color: #181818; border: 1px solid #282828;" name="category">
                        <option disabled selected>Select Category</option>
                    </select>
                </div>
                
                <div class="input-group flex-nowrap mb-3">
                    <span class="input-group-text text-white" style="background-color: #181818; border: 1px solid #282828;" id="addon-wrapping">Title</span>
                    <input style="background-color: #181818; border: 1px solid #282828;" type="text" class="form-control text-white" aria-label="Title" aria-describedby="addon-wrapping" name="title">
                </div>

                <div class="input-group flex-nowrap mb-3">
                    <span class="input-group-text text-white" style="background-color: #181818; border: 1px solid #282828;" id="addon-wrapping">Description</span>
                    <textarea 
                        class="form-control text-white" 
                        style="background-color: #181818; border: 1px solid #282828; resize: none;" 
                        aria-label="Description" 
                        aria-describedby="addon-wrapping" 
                        name="description"
                        rows="3"></textarea>
                </div>

                <div class="input-group flex-nowrap mb-3">
                    <span class="input-group-text text-white" style="background-color: #181818; border: 1px solid #282828;" id="addon-wrapping">Podcast File</span>
                    <input style="border-radius: 0 7px 7px 0; background-color: #181818; border: 1px solid #282828;" type="text" class="form-control text-white" aria-label="Podcast File" aria-describedby="addon-wrapping" readonly id="podcast_file_name">
                    <input type="file" id="podcast_file" name="podcast_file" style="display:none;">
                </div>

                <div class="input-group flex-nowrap mb-3">
                    <span class="input-group-text text-white" style="background-color: #181818; border: 1px solid #282828;" id="addon-wrapping">Podcast Thumbnail</span>
                    <input style="border-radius: 0 7px 7px 0; background-color: #181818; border: 1px solid #282828;" type="text" class="form-control text-white" aria-label="Podcast Thumbnail" aria-describedby="addon-wrapping" readonly id="podcast_thumbnail_name">
                    <input type="file" id="podcast_thumbnail" name="podcast_thumbnail" style="display:none;">
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
<script src="<?php echo base_url(); ?>assets/js/all_views.js?v=1.1"></script>
<script>
  const all_views = document.createElement('link');
  all_views.rel = 'stylesheet';
  all_views.href = '<?php echo base_url(); ?>assets/css/all_views.css';
  document.head.appendChild(all_views);
  
  const add_modal = document.createElement('link');
  add_modal.rel = 'stylesheet';
  add_modal.href = '<?php echo base_url(); ?>assets/css/add_modal.css';
  document.head.appendChild(add_modal);
</script>

<script>
  function get_categories_by_type(type_id) {
    $.ajax({
        type: "GET",
        url: "http://localhost/rannim/dashboard/index.php/Rannim/get_categories_by_type/" + type_id,
        dataType: "json",
        success: function(data) {
          var length = data.categories.length;
          var elements = '<option selected disabled>Select Category</option>';
          for (var i = 0; i < length; i++) {
              elements += "<option value='" + data.categories[i]["category_id"] + "'>" + data.categories[i]["category_name"] + "</option>";
          }
          $("#category_options").html(elements);
        },
        error: function(req, err) {
            console.log("The Error:" + err);
        }
    })
  }

    const fileInput = document.getElementById('podcast_thumbnail');
    const fileNameDisplay = document.getElementById('podcast_thumbnail_name');

    fileNameDisplay.addEventListener('click', () => {
        fileInput.click();
    });

    fileInput.addEventListener('change', () => {
        if (fileInput.files.length > 0) {
            fileNameDisplay.value = fileInput.files[0].name;
        }
    });

    const fileInput2 = document.getElementById('podcast_file');
    const fileNameDisplay2 = document.getElementById('podcast_file_name');

    fileNameDisplay2.addEventListener('click', () => {
        fileInput2.click();
    });

    fileInput2.addEventListener('change', () => {
        if (fileInput2.files.length > 0) {
            fileNameDisplay2.value = fileInput2.files[0].name;
        }
    });

    fileInput2.addEventListener('change', () => {
        if (fileInput2.files.length > 0) {
            fileNameDisplay2.value = fileInput2.files[0].name;
        }
    });
</script>
<script src="<?php echo base_url() ?>assets/js/jquery-3.7.1.js"></script>
</body>
</html>
