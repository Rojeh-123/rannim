    <!-- Album Section -->
    <div class="container-fluid">
      <div class="album-section">
        <div class="album-header">
          <img src="https://images.unsplash.com/photo-1507874457470-272b3c8d8ee2?q=80&w=600" alt="Album Cover">
          <div class="album-info">
            <h1><?php echo $playlist->playlist_name; ?></h1>
            <span>Playlist • <?php echo count($playlist_podcasts); ?> Podcasts</span>
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
            <?php foreach ($playlist_podcasts as $index => $podcast) { ?>
              <tr>
                <td><strong><?php echo $index + 1; ?></strong></td>
                <td><img src="<?php echo base_url()?>assets/uploads/podcasts_photos/<?php echo $podcast->podcast_thumbnail?>" alt="podcast"></td>
                <td><a href="#" class="text-white text-decoration-none"><?php echo $podcast->title; ?></a></td>
                <td><?php echo $podcast->created_at; ?></td>
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
