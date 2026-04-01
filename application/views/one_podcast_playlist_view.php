    <!-- Album Section -->
    <div class="container-fluid">
      <div class="album-section">
        <div class="album-header">
          <img src="https://images.unsplash.com/photo-1507874457470-272b3c8d8ee2?q=80&w=600" alt="Album Cover">
          <div class="album-info">
            <h1><?php echo $playlist->playlist_name; ?></h1>
            <span>Playlist • <?php echo count($playlist_podcasts); ?> Podcasts</span>
            <?php if($this->session->userdata('user_id') == $playlist->user_id || $playlist->is_collaborative == 1){ ?>
              <button data-bs-toggle="modal" data-bs-target="#add_podcast" class="option-btn d-inline" title="Add a podcast to this playlist">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="white" class="bi bi-plus-lg" viewBox="0 0 16 16">
                  <path fill-rule="evenodd" d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2"/>
                </svg>
              </button>
            <?php } ?>
          </div>
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
            <?php foreach ($playlist_podcasts as $index => $podcast) { ?>
              <tr>
                <td><strong><?php echo $index + 1; ?></strong></td>
                <td><img src="<?php echo base_url()?>dashboard/assets/uploads/podcasts_photos/<?php echo $podcast->podcast_thumbnail?>" alt="podcast"></td>
                <td><a href="#" class="text-white text-decoration-none"><?php echo $podcast->title; ?></a></td>
                <td><?php echo $podcast->created_at; ?></td>
                <?php if($this->session->userdata('user_id') == $playlist->user_id || $playlist->is_collaborative == 1){ ?>
                  <td>
                    <button class="btn btn-sm btn-danger">
                      <a href="<?php echo site_url("Rannim/delete_podcast_from_playlist/$podcast->podcast_id/$playlist->playlist_id"); ?>" style="text-decoration: none; color: inherit;">
                        <span style="font-weight: bold;">Remove</span>
                      </a>
                    </button>
                  </td>
                <?php }else{ ?>
                  <td><em>You can edit your own Playlists.</em></td>
                <?php } ?>
              </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

  <!-- Modal -->
  <div class="modal fade" id="add_podcast" tabindex="-1" aria-labelledby="add_podcastLabel" aria-hidden="true">
      <div class="modal-dialog">
        <form action="<?php echo site_url('Rannim/add_podcast_to_playlist'); ?>" method="POST">
          <input type="hidden" name="playlist_id" value="<?php echo $playlist->playlist_id ?>">
          <div class="modal-content" style="background-color: #181818; color: white; border: 1px solid #282828;">
              <div class="modal-header" style="border-bottom: 1px solid #282828;">
                  <h1 class="modal-title fs-5" id="add_podcastLabel">Add Podcast</h1>
                  <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <input type="hidden" name="playlist_id" value="<?php echo $playlist->playlist_id; ?>">

                <div class="input-group mb-3">
                    <label class="input-group-text text-white" for="inputGroupSelect01" 
                          style="background-color: #181818; border: 1px solid #282828;">
                        Podcast
                    </label>
                    <select class="form-select text-white" id="inputGroupSelect01" 
                            style="background-color: #181818; border: 1px solid #282828;" 
                            name="podcast">
                        <option selected class="text-white" disabled>Select Podcast</option>
                        <?php foreach ($podcasts as $podcast) { ?>
                            <option value="<?php echo $podcast->podcast_id; ?>" class="text-white"><?php echo $podcast->title; ?></option>
                        <?php } ?>
                    </select>
                </div>
              <div class="modal-footer" style="border-top: 1px solid #282828;">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" style="background-color: #282828; border: none;">Close</button>
                  <button type="Submit" class="btn btn-success" style="background-color: #7e56f1; border: none;">Save</button>
              </div>
            </div>
          </div>
        </form>
      </div>
  </div>

<!-- Bootstrap JS -->
<script src="<?php echo base_url(); ?>dashboard/assets/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo base_url(); ?>dashboard/assets/js/all_views.js?v=1.1"></script>
<script>
  const all_views = document.createElement('link');
  all_views.rel = 'stylesheet';
  all_views.href = '<?php echo base_url(); ?>dashboard/assets/css/all_views.css';
  document.head.appendChild(all_views);

  const one_album = document.createElement('link');
  one_album.rel = 'stylesheet';
  one_album.href = '<?php echo base_url(); ?>dashboard/assets/css/one_album.css';
  document.head.appendChild(one_album);

  const one_playlist = document.createElement('link');
  one_playlist.rel = 'stylesheet';
  one_playlist.href = '<?php echo base_url(); ?>dashboard/assets/css/one_playlist.css';
  document.head.appendChild(one_playlist);
</script>
</body>
</html>
