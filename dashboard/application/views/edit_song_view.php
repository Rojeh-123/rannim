    <!-- Main content -->
    <div class="container-fluid mt-3">
        <!-- Main Content -->
        <div class="container my-5">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card p-4">
                        <h3 class="mb-4 text-center text-white">Edit Song</h3>

                        <form action="<?php echo site_url("Rannim/update_song") ?>" method="post" enctype="multipart/form-data">
                        
                            <input type="hidden" name="song_id" value="<?php echo $song->song_id; ?>">
                            <input type="hidden" name="old_song_photo" value="<?php echo $song->song_photo; ?>">
                            <input type="hidden" name="old_song_file" value="<?php echo $song->song_file; ?>">

                            <div class="input-group mb-3">
                                <label class="input-group-text text-white" for="inputGroupSelect01" style="background-color: #181818; border: 1px solid #282828;">Artist</label>
                                <select class="form-select text-white" id="inputGroupSelect01" style="background-color: #181818; border: 1px solid #282828;" name="artist" onchange="get_albums_by_artist(this.value)">
                                    <?php foreach ($artists as $artist) { ?>
                                        <option value="<?php echo $artist->artist_id; ?>" class="text-white" <?php if ($artist->artist_id == $song->artist_id) echo 'selected'; ?>><?php echo $artist->artist_name; ?></option>
                                    <?php } ?>
                                </select>
                            </div>

                            <div class="input-group mb-3">
                                <label class="input-group-text text-white" for="inputGroupSelect01" style="background-color: #181818; border: 1px solid #282828;">Type</label>
                                <select class="form-select text-white" id="inputGroupSelect01" style="background-color: #181818; border: 1px solid #282828;" name="type" onchange="get_categories_by_type(this.value)">
                                    <?php foreach ($types as $type) { ?>
                                        <option value="<?php echo $type->type_id; ?>" class="text-white" <?php if ($type->type_id == $song->type_id) echo 'selected'; ?>><?php echo $type->type_name; ?></option>
                                    <?php } ?>
                                </select>
                            </div>

                            <div class="input-group mb-3">
                                <label class="input-group-text text-white" for="inputGroupSelect01" style="background-color: #181818; border: 1px solid #282828;">Category</label>
                                <select class="form-select text-white" id="category_options" style="background-color: #181818; border: 1px solid #282828;" name="category">
                                    <option value="<?php echo $song->category_id; ?>"><?php echo $song->category_name; ?></option>
                                </select>
                            </div>
                            
                            <div class="input-group flex-nowrap mb-3">
                                <span class="input-group-text text-white" style="background-color: #181818; border: 1px solid #282828;" id="addon-wrapping">Title</span>
                                <input style="background-color: #181818; border: 1px solid #282828;" type="text" class="form-control text-white" aria-label="Title" aria-describedby="addon-wrapping" name="title" value="<?php echo $song->title; ?>" required>
                            </div>

                            <div class="input-group flex-nowrap mb-3">
                                <span class="input-group-text text-white" style="background-color: #181818; border: 1px solid #282828;" id="addon-wrapping">User Sound File</span>
                                <input style="border-radius: 0 7px 7px 0; background-color: #181818; border: 1px solid #282828;" type="text" class="form-control text-white" aria-label="Sound File" aria-describedby="addon-wrapping" readonly id="song_file_name" value="<?php echo $song->song_file; ?>">
                                <input type="file" id="song_file" name="song_file" style="display:none;" value="<?php echo $song->song_file; ?>">
                            </div>

                            <div class="input-group flex-nowrap mb-3">
                                <span class="input-group-text text-white" style="background-color: #181818; border: 1px solid #282828;" id="addon-wrapping">Song Thumbnail</span>
                                <input style="border-radius: 0 7px 7px 0; background-color: #181818; border: 1px solid #282828;" type="text" class="form-control text-white" aria-label="Song Thumbnail" aria-describedby="addon-wrapping" readonly id="song_photo_name" value="<?php echo $song->song_photo; ?>">
                                <input type="file" id="song_photo" name="song_photo" style="display:none;" value="<?php echo $song->song_photo; ?>">
                            </div>

                            <div class="text-center">
                                <button type="submit" class="btn-spotify">Update Song</button>
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

<script src="<?php echo base_url() ?>assets/js/jquery-3.7.1.js"></script>
</body>
</html>
