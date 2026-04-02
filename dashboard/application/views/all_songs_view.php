
    <!-- Main content -->
    <div class="container-fluid mt-3">
      <!-- Focus Section -->
      <div class="d-flex justify-content-between align-items-center mb-2">
        <h3>All Songs</h3>
        <button class="btn btn-outline-purple text-white" data-bs-toggle="modal" data-bs-target="#add_song">Add Song</button>
      </div>
      <div class="row g-3 mt-1">
        <?php foreach($songs as $song){ ?>
          <div class="col-md-4">
              <div class="card card-custom h-100">
                <a href="<?php echo site_url("Rannim/show_one_song/$song->song_id"); ?>" style="text-decoration:none;">
                  <img src="<?php echo base_url(); ?>assets/uploads/songs_photos/<?php echo $song->song_photo; ?>" 
                      class="card-img-top" style="height:180px; object-fit:cover;">
                  <div class="card-body">
                    <h5 class="card-title text-white"><?php echo $song->title; ?></h5>
                    <small class="text-secondary">By <?php echo $song->artist_name; ?></small><br>
                    <div class="d-flex justify-content-between">
                      <span class="text-secondary">Category • <?php echo $song->category_name; ?></span>
                      <span class="text-secondary">Type • <?php echo $song->type_name; ?></span>
                    </div>
                  </div>
                </a>
                <div class="mt-2 p-3 pt-0 d-flex gap-2">
                    <a href="<?php echo site_url("Rannim/edit_song/$song->song_id"); ?>" class="btn btn-sm btn-outline-primary" style="text-decoration:none;">Edit</a>
                    <a href="<?php echo site_url("Rannim/delete_song/$song->song_id/$song->song_photo"); ?>" class="btn btn-sm btn-outline-danger" style="text-decoration:none;">Delete</a>
                </div>
              </div>
          </div>
        <?php } ?>
      </div>
    </div>
  </div>
</div>

  <!-- Modal -->
  <div class="modal fade" id="add_song" tabindex="-1" aria-labelledby="add_songLabel" aria-hidden="true">
      <div class="modal-dialog">
          <div class="modal-content" style="background-color: #181818; color: white; border: 1px solid #282828;">
             <form action="<?php echo site_url("Rannim/add_song"); ?>" method="POST" enctype="multipart/form-data">
              <div class="modal-header" style="border-bottom: 1px solid #282828;">
                  <h1 class="modal-title fs-5" id="add_songLabel">Add Song</h1>
                  <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">

                <div class="input-group mb-3">
                    <label class="input-group-text text-white" for="inputGroupSelect01" style="background-color: #181818; border: 1px solid #282828;">Artist</label>
                    <select class="form-select text-white" id="inputGroupSelect01" style="background-color: #181818; border: 1px solid #282828;" name="artist" onchange="get_albums_by_artist(this.value)">
                        <option selected class="text-white" disabled>Select Artist</option>
                        <?php foreach ($artists as $artist) { ?>
                            <option value="<?php echo $artist->artist_id; ?>" class="text-white"><?php echo $artist->artist_name; ?></option>
                        <?php } ?>
                    </select>
                </div>

                <div class="input-group mb-3">
                    <label class="input-group-text text-white" for="inputGroupSelect01" style="background-color: #181818; border: 1px solid #282828;">Type</label>
                    <select class="form-select text-white" id="inputGroupSelect01" style="background-color: #181818; border: 1px solid #282828;" name="type" onchange="get_categories_by_type(this.value)">
                        <option selected class="text-white" disabled>Select Type</option>
                        <?php foreach ($types as $type) { ?>
                            <option value="<?php echo $type->type_id; ?>" class="text-white" ><?php echo $type->type_name; ?></option>
                        <?php } ?>
                    </select>
                </div>

                <div class="input-group mb-3">
                    <label class="input-group-text text-white" for="inputGroupSelect01" style="background-color: #181818; border: 1px solid #282828;">Category</label>
                    <select class="form-select text-white" id="category_options" style="background-color: #181818; border: 1px solid #282828;" name="category">
                        <option selected disabled>Select Category</option>
                    </select>
                </div>
                
                <div class="input-group flex-nowrap mb-3">
                    <span class="input-group-text text-white" style="background-color: #181818; border: 1px solid #282828;" id="addon-wrapping">Title</span>
                    <input style="background-color: #181818; border: 1px solid #282828;" type="text" class="form-control text-white" aria-label="Title" aria-describedby="addon-wrapping" name="title">
                </div>

                <div class="input-group flex-nowrap mb-3">
                    <span class="input-group-text text-white" style="background-color: #181818; border: 1px solid #282828;" id="addon-wrapping">Sound File</span>
                    <input style="border-radius: 0 7px 7px 0; background-color: #181818; border: 1px solid #282828;" type="text" class="form-control text-white" aria-label="Sound File" aria-describedby="addon-wrapping" readonly id="song_file_name">
                    <input type="file" id="song_file" name="song_file" style="display:none;">
                </div>

                <div class="input-group flex-nowrap mb-3">
                    <span class="input-group-text text-white" style="background-color: #181818; border: 1px solid #282828;" id="addon-wrapping">Song Thumbnail</span>
                    <input style="border-radius: 0 7px 7px 0; background-color: #181818; border: 1px solid #282828;" type="text" class="form-control text-white" aria-label="Song Thumbnail" aria-describedby="addon-wrapping" readonly id="song_photo_name">
                    <input type="file" id="song_photo" name="song_photo" style="display:none;">
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
    const fileInput = document.getElementById('song_photo');
    const fileNameDisplay = document.getElementById('song_photo_name');

    fileNameDisplay.addEventListener('click', () => {
        fileInput.click();
    });

    fileInput.addEventListener('change', () => {
        if (fileInput.files.length > 0) {
            fileNameDisplay.value = fileInput.files[0].name;
        }
    });

    const fileInput2 = document.getElementById('song_file');
    const fileNameDisplay2 = document.getElementById('song_file_name');

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
<script>
  function get_categories_by_type(type_id) {
    $.ajax({
        type: "GET",
        url: "<?php echo site_url("Rannim/get_categories_by_type/"); ?>" + type_id,
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
<script src="<?php echo base_url() ?>assets/js/jquery-3.7.1.js"></script>
</body>
</html>
