      <!-- Album Section -->
    <div class="container-fluid">
      <div class="album-section">
        <div class="album-header d-flex align-items-center gap-3">

            <img src="<?php echo base_url(); ?>assets/uploads/albums_photos/<?php echo $album->album_photo ?>" 
                alt="Album Cover" class="album-cover">

            <div class="album-info me-2">
                <h1><?php echo $album->album_name ?></h1>
                <span>Album • <?php echo $number_of_songs ?> songs</span>
            </div>

            <button data-bs-toggle="modal" data-bs-target="#add_song_to_album" 
                    class="option-btn add-song-btn"
                    title="Add a song to this album">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="white" class="bi bi-plus-lg" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2"/>
                </svg>
            </button>

        </div>

        <table class="songs-table mt-4">
          <thead>
            <tr>
              <th>#</th>
              <th>Photo</th>
              <th>Title</th>
              <th>Date Added</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach($album_songs as $index => $song){ ?>
              <tr>
                <td><strong><?php echo $index + 1; ?></strong></td>
                <td><img src="<?php echo base_url(); ?>assets/uploads/songs_photos/<?php echo $song->song_photo ?>" alt="song"></td>
                <td><a href="<?php echo site_url('Rannim/show_one_song/' . $song->song_id); ?>" class="text-white text-decoration-none"><?php echo $song->title; ?></a></td>
                <td><?php echo $song->created_at; ?></td>
                <td>
                  <button class="btn btn-sm btn-outline-danger">
                      <a href="<?php echo site_url("Rannim/delete_song_from_album/$song->song_id/$album->album_id"); ?>" style="text-decoration: none; color: inherit;">
                          <span style="font-weight: bold;">Remove</span>
                      </a>
                  </button>
                </td>
              </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

    <!-- Modal -->
    <div class="modal fade" id="add_song_to_album" tabindex="-1" aria-labelledby="add_song_to_albumLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content" style="background-color: #181818; color: white; border: 1px solid #282828;">
                <form action="<?php echo site_url('Rannim/add_song_to_album'); ?>" method="post">
                <div class="modal-header" style="border-bottom: 1px solid #282828;">
                    <h1 class="modal-title fs-5" id="add_song_to_albumLabel">Add Song To Album</h1>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="album_id" value="<?php echo $album->album_id ?>">

                    <div class="input-group mb-3">
                        <label class="input-group-text text-white" for="inputGroupSelect01" style="background-color: #181818; border: 1px solid #282828;">Song</label>
                        <select class="form-select text-white" id="inputGroupSelect01" style="background-color: #181818; border: 1px solid #282828;" name="song">
                            <option selected class="text-white" disabled>Select Song</option>
                            <?php foreach ($songs as $song) { ?>
                                <option value="<?php echo $song->song_id; ?>" class="text-white"><?php echo $song->title; ?></option>
                            <?php } ?>
                        </select>
                    </div>

                </div>
                <div class="modal-footer" style="border-top: 1px solid #282828;">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" style="background-color: #282828; border: none;">Close</button>
                    <button type="submit" class="btn btn-success" style="background-color: #7e56f1; border: none;">Add Song</button>
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
  
  const one_album = document.createElement('link');
  one_album.rel = 'stylesheet';
  one_album.href = '<?php echo base_url(); ?>assets/css/one_album.css';
  document.head.appendChild(one_album);

  const one_playlist = document.createElement('link');
  one_playlist.rel = 'stylesheet';
  one_playlist.href = '<?php echo base_url(); ?>assets/css/one_playlist.css';
  document.head.appendChild(one_playlist);
</script>
</body>
</html>
