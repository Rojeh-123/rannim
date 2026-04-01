
    <!-- Playlist Section -->
    <div class="container-fluid">
      <div class="album-section">
        <div class="album-header">
          <img src="<?php echo base_url(); ?>assets/uploads/playlists_photos/<?php echo $playlist->playlist_photo; ?>" alt="Album Cover">
          <div class="album-info">
            <h1><?php echo $playlist->playlist_name; ?></h1>
            <span>Playlist • <?php echo count($playlist_songs); ?> songs</span>
          </div>
        </div>

        <table class="songs-table mt-4">
          <thead>
            <tr>
              <th>#</th>
              <th>Photo</th>
              <th>Title</th>
              <th>Date Added</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach($playlist_songs as $index => $song){ ?>
              <tr>
                <td><strong><?php echo $index + 1; ?></strong></td>
                <td><img src="<?php echo base_url(); ?>assets/uploads/songs_photos/<?php echo $song->song_photo; ?>" alt="song"></td>
                <td><a href="<?php echo site_url('Rannim/show_one_song/' . $song->song_id); ?>" class="text-white text-decoration-none"><?php echo $song->title; ?></a></td>
                <td><?php echo $song->created_at; ?></td>
              </tr>
            <?php } ?>
          </tbody>
        </table>
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