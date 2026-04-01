    <!-- Main content -->
    <div class="container-fluid mt-3">
        <!-- Main Content -->
        <div class="container my-5">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card p-4">
                        <h3 class="mb-4 text-center text-white">Edit Podcast</h3>

                        <form action="<?php echo site_url("Rannim/update_podcast") ?>" method="post" enctype="multipart/form-data">
                        
                            <input type="hidden" name="podcast_id" value="<?php echo $podcast->podcast_id; ?>">
                            <input type="hidden" name="old_podcast_thumbnail" value="<?php echo $podcast->podcast_thumbnail; ?>">
                            <input type="hidden" name="old_podcast_file" value="<?php echo $podcast->podcast_file; ?>">

                            <div class="input-group mb-3">
                                <label class="input-group-text text-white" for="inputGroupSelect01" style="background-color: #181818; border: 1px solid #282828;">Host</label>
                                <select class="form-select text-white" id="inputGroupSelect01" style="background-color: #181818; border: 1px solid #282828;" name="host" onchange="get_albums_by_host(this.value)">
                                    <?php foreach ($hosts as $host) { ?>
                                        <option value="<?php echo $host->artist_id; ?>" class="text-white" <?php if ($host->artist_id == $podcast->host_id) echo 'selected'; ?>><?php echo $host->artist_name; ?></option>
                                    <?php } ?>
                                </select>
                            </div>

                            <div class="input-group mb-3">
                                <label class="input-group-text text-white" for="inputGroupSelect01" style="background-color: #181818; border: 1px solid #282828;">Type</label>
                                <select class="form-select text-white" id="inputGroupSelect01" style="background-color: #181818; border: 1px solid #282828;" name="type" onchange="get_categories_by_type(this.value)">
                                    <?php foreach ($types as $type) { ?>
                                        <option value="<?php echo $type->type_id; ?>" class="text-white" <?php if ($type->type_id == $podcast->type_id) echo 'selected'; ?>><?php echo $type->type_name; ?></option>
                                    <?php } ?>
                                </select>
                            </div>

                            <div class="input-group mb-3">
                                <label class="input-group-text text-white" for="inputGroupSelect01" style="background-color: #181818; border: 1px solid #282828;">Category</label>
                                <select class="form-select text-white" id="category_options" style="background-color: #181818; border: 1px solid #282828;" name="category">
                                    <option value="<?php echo $podcast->category_id; ?>"><?php echo $podcast->category_name; ?></option>
                                </select>
                            </div>
                            
                            <div class="input-group flex-nowrap mb-3">
                                <span class="input-group-text text-white" style="background-color: #181818; border: 1px solid #282828;" id="addon-wrapping">Title</span>
                                <input style="background-color: #181818; border: 1px solid #282828;" type="text" class="form-control text-white" aria-label="Title" aria-describedby="addon-wrapping" name="title" value="<?php echo $podcast->title; ?>">
                            </div>

                            <div class="input-group flex-nowrap mb-3">
                                <span class="input-group-text text-white" style="background-color: #181818; border: 1px solid #282828;" id="addon-wrapping">Description</span>
                                <textarea 
                                    class="form-control text-white" 
                                    style="background-color: #181818; border: 1px solid #282828; resize: none;" 
                                    aria-label="Description" 
                                    aria-describedby="addon-wrapping" 
                                    name="description"
                                    rows="3"
                                    ><?php echo $podcast->description; ?></textarea>
                            </div>

                            <div class="input-group flex-nowrap mb-3">
                                <span class="input-group-text text-white" style="background-color: #181818; border: 1px solid #282828;" id="addon-wrapping">Podcast File</span>
                                <input style="border-radius: 0 7px 7px 0; background-color: #181818; border: 1px solid #282828;" type="text" class="form-control text-white" aria-label="Podcast File" aria-describedby="addon-wrapping" readonly id="podcast_file_name" value="<?php echo $podcast->podcast_file; ?>">
                                <input type="file" id="podcast_file" name="podcast_file" style="display:none;" value="<?php echo $podcast->podcast_file; ?>">
                            </div>

                            <div class="input-group flex-nowrap mb-3">
                                <span class="input-group-text text-white" style="background-color: #181818; border: 1px solid #282828;" id="addon-wrapping">Podcast Thumbnail</span>
                                <input style="border-radius: 0 7px 7px 0; background-color: #181818; border: 1px solid #282828;" type="text" class="form-control text-white" aria-label="Podcast Thumbnail" aria-describedby="addon-wrapping" readonly id="podcast_thumbnail_name" value="<?php echo $podcast->podcast_thumbnail; ?>">
                                <input type="file" id="podcast_thumbnail" name="podcast_thumbnail" style="display:none;" value="<?php echo $podcast->podcast_thumbnail; ?>">
                            </div>

                            <div class="text-center">
                                <button type="submit" class="btn-spotify">Update Podcast</button>
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
<script src="<?php echo base_url(); ?>assets/js/all_views.js"></script>
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
</script>

<script>
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