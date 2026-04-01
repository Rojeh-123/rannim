    <!-- Main content -->
    <div class="container-fluid mt-3">
        <!-- Main Content -->
        <div class="container my-5">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card p-4">
                        <h3 class="mb-4 text-center text-white">Edit Album</h3>

                        <form action="<?php echo site_url("Rannim/update_album") ?>" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="album_id" value="<?php echo $album->album_id; ?>">
                            <input type="hidden" name="album_old_photo" value="<?php echo $album->album_photo; ?>">

                            <div class="input-group flex-nowrap mb-3">
                                <span class="input-group-text text-white" style="background-color: #181818; border: 1px solid #282828;" id="addon-wrapping">Album Name</span>
                                <input style="background-color: #181818; border: 1px solid #282828;" type="text" class="form-control text-white" aria-label="Album Name" aria-describedby="addon-wrapping" name="album_name" value="<?php echo $album->album_name; ?>" required>
                            </div>

                            <div class="input-group mb-3">
                                <label class="input-group-text text-white" for="inputGroupSelect01" style="background-color: #181818; border: 1px solid #282828;">Genre</label>
                                <select class="form-select text-white" id="inputGroupSelect01" style="background-color: #181818; border: 1px solid #282828;" name="category">
                                    <option selected class="text-white" disabled>Select Category</option>
                                    <?php foreach ($categories as $category) { ?>
                                        <option value="<?php echo $category->category_id; ?>" class="text-white" <?php if ($category->category_id == $album->genre_id) echo 'selected'; ?>><?php echo $category->category_name; ?></option>
                                    <?php } ?>
                                </select>
                            </div>

                            <div class="input-group mb-3">
                                <label class="input-group-text text-white" for="inputGroupSelect01" style="background-color: #181818; border: 1px solid #282828;">Artist</label>
                                <select class="form-select text-white" id="inputGroupSelect01" style="background-color: #181818; border: 1px solid #282828;" name="artist">
                                    <?php foreach ($artists as $artist) { ?>
                                        <option value="<?php echo $artist->artist_id; ?>" class="text-white" <?php if ($artist->artist_id == $album->artist_id) echo 'selected'; ?>><?php echo $artist->artist_name; ?></option>
                                    <?php } ?>
                                </select>
                            </div>

                            <div class="input-group flex-nowrap mb-3">
                                <span class="input-group-text text-white" style="background-color: #181818; border: 1px solid #282828;" id="addon-wrapping">Release Date</span>
                                <input style="background-color: #181818; border: 1px solid #282828;" type="date" class="form-control text-white" aria-label="Release Date" aria-describedby="addon-wrapping" name="release_date" value="<?php echo $album->release_date; ?>">
                            </div>

                            <div class="input-group flex-nowrap mb-3">
                                <span class="input-group-text text-white" style="background-color: #181818; border: 1px solid #282828;" id="addon-wrapping">Album Photo</span>
                                <input style="border-radius: 0 7px 7px 0; background-color: #181818; border: 1px solid #282828;" type="text" class="form-control text-white" aria-label="Album Photo" aria-describedby="addon-wrapping" readonly id="album_photo_name" value="<?php echo $album->album_photo; ?>">
                                <input type="file" id="album_photo" name="album_photo" style="display:none;" value="<?php echo $album->album_photo; ?>">
                            </div>

                            <div class="text-center">
                                <button type="submit" class="btn-spotify">Update Album</button>
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
  const fileInput = document.getElementById('album_photo');
  const fileNameDisplay = document.getElementById('album_photo_name');

  fileNameDisplay.addEventListener('click', () => {
      fileInput.click();
  });

  fileInput.addEventListener('change', () => {
      if (fileInput.files.length > 0) {
          fileNameDisplay.value = fileInput.files[0].name;
      }
  });
</script>
</body>
</html>