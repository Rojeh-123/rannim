    <!-- Main content -->
    <div class="container-fluid mt-3">
      <!-- Albums Section -->
      <div class="d-flex justify-content-between align-items-center mb-2">
        <h3>Rannim Albums</h3>
        <button class="btn btn-outline-purple text-white" data-bs-toggle="modal" data-bs-target="#add_album">Add Album</button>
      </div>
      <div class="row g-3 mt-1">
        <?php foreach($albums as $album){ ?>
        <div class="col-md-4">
            <div class="card card-custom h-100">
                <a href="<?php echo site_url("Rannim/show_one_album/$album->album_id"); ?>" style="text-decoration:none;">
                    <img src="<?php echo base_url(); ?>assets/uploads/albums_photos/<?php echo $album->album_photo; ?>" 
                        class="card-img-top" style="height:180px; object-fit:cover;">
                    <div class="card-body">
                        <h5 class="card-title text-white"><?php echo $album->album_name; ?></h5>
                        <p class="card-text text-secondary">Category • <?php echo $album->category_name; ?></p>
                        <small class="text-secondary"><?php echo isset($number_of_songs[$album->album_id]) ? $number_of_songs[$album->album_id] : '0'; ?> Songs • Album</small>
                    </div>
                </a>
                <div class="mt-2 p-3 pt-0 d-flex gap-2">
                    <a href="<?php echo site_url("Rannim/edit_album/$album->album_id"); ?>" class="btn btn-sm btn-outline-primary" style="text-decoration:none;">Edit</a>
                    <a href="<?php echo site_url("Rannim/delete_album/$album->album_id/$album->album_photo"); ?>" class="btn btn-sm btn-outline-danger" style="text-decoration:none;">Delete</a>
                </div>
            </div>
        </div>
        <?php } ?>
      </div>
    </div>
  </div>
</div>

  <!-- Modal -->
  <div class="modal fade" id="add_album" tabindex="-1" aria-labelledby="addAlbumLabel" aria-hidden="true">
      <div class="modal-dialog">
          <div class="modal-content" style="background-color: #181818; color: white; border: 1px solid #282828;">
             <form action="<?php echo site_url("Rannim/add_album"); ?>" method="POST" enctype="multipart/form-data">
              <div class="modal-header" style="border-bottom: 1px solid #282828;">
                  <h1 class="modal-title fs-5" id="addAlbumLabel">Add Album</h1>
                  <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">

                    <div class="input-group flex-nowrap mb-3">
                        <span class="input-group-text text-white" style="background-color: #181818; border: 1px solid #282828;" id="addon-wrapping">Album Name</span>
                        <input style="background-color: #181818; border: 1px solid #282828;" type="text" class="form-control text-white" aria-label="Album Name" aria-describedby="addon-wrapping" name="album_name">
                    </div>

                    <div class="input-group mb-3">
                        <label class="input-group-text text-white" for="inputGroupSelect01" style="background-color: #181818; border: 1px solid #282828;">Genre</label>
                        <select class="form-select text-white" id="inputGroupSelect01" style="background-color: #181818; border: 1px solid #282828;" name="category">
                            <option selected class="text-white" disabled>Select Category</option>
                            <?php foreach ($categories as $category) { ?>
                                <option value="<?php echo $category->category_id; ?>" class="text-white"><?php echo $category->category_name; ?></option>
                            <?php } ?>
                        </select>
                    </div>

                    <div class="input-group mb-3">
                        <label class="input-group-text text-white" for="inputGroupSelect01" style="background-color: #181818; border: 1px solid #282828;">Artist</label>
                        <select class="form-select text-white" id="inputGroupSelect01" style="background-color: #181818; border: 1px solid #282828;" name="artist">
                            <option selected class="text-white" disabled>Select Artist</option>
                            <?php foreach ($artists as $artist) { ?>
                                <option value="<?php echo $artist->artist_id; ?>" class="text-white"><?php echo $artist->artist_name; ?></option>
                            <?php } ?>
                        </select>
                    </div>

                    <div class="input-group flex-nowrap mb-3">
                        <span class="input-group-text text-white" style="background-color: #181818; border: 1px solid #282828;" id="addon-wrapping">Release Date</span>
                        <input style="background-color: #181818; border: 1px solid #282828;" type="date" class="form-control text-white" aria-label="Release Date" aria-describedby="addon-wrapping" name="release_date">
                    </div>

                    <div class="input-group flex-nowrap mb-3">
                        <span class="input-group-text text-white" style="background-color: #181818; border: 1px solid #282828;" id="addon-wrapping">Album Photo</span>
                        <input style="border-radius: 0 7px 7px 0; background-color: #181818; border: 1px solid #282828;" value="Select Album Photo" type="text" class="form-control text-white" aria-label="Album Photo" value="" aria-describedby="addon-wrapping" readonly id="album_photo_name">
                        <input type="file" id="album_photo" name="album_photo" style="display:none;">
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
