    <!-- Main content -->
    <div class="main-content">
      <div class="container text-center mt-4">
        <div class="card-search hiphop"><a class="text-white" style="text-decoration:none;" href="<?php echo site_url("Rannim/show_all_albums"); ?>">Albums</a></div>
        <div class="card-search newreleases"><a class="text-white" style="text-decoration:none;" href="<?php echo site_url("Rannim/show_all_artists"); ?>">Artists</a></div>
        <div class="card-search discover"><a class="text-white" style="text-decoration:none;" href="<?php echo site_url("Rannim/show_all_bands"); ?>">Bands</a></div>

        <div class="card-search liveevents"><a class="text-white" style="text-decoration:none;" href="<?php echo site_url("Rannim/show_all_categories"); ?>">Categories</a></div>
        <div class="card-search charts"><a class="text-white" style="text-decoration:none;" href="<?php echo site_url("Rannim/show_all_playlists"); ?>">Playlists</a></div>
        <div class="card-search podcasts"><a class="text-white" style="text-decoration:none;" href="<?php echo site_url("Rannim/show_all_podcasts"); ?>">Podcasts</a></div>
        
        <div class="card-search audiobooks"><a class="text-white" style="text-decoration:none;" href="<?php echo site_url("Rannim/show_all_songs"); ?>">Songs</a></div>
        <div class="card-search hiphop"><a class="text-white" style="text-decoration:none;" href="<?php echo site_url("Rannim/show_all_types"); ?>">Types</a></div>
        <div class="card-search country"><a class="text-white" style="text-decoration:none;" href="<?php echo site_url("Rannim/show_all_users"); ?>">Users</a></div>
      </div>
    </div>
  </div>
</div>

<script src="<?php echo base_url(); ?>dashboard/assets/js/all_views.js"></script>
<script>
  const all_views = document.createElement('link');
  all_views.rel = 'stylesheet';
  all_views.href = '<?php echo base_url(); ?>dashboard/assets/css/all_views.css';
  document.head.appendChild(all_views);

  const search = document.createElement('link');
  search.rel = 'stylesheet';
  search.href = '<?php echo base_url(); ?>dashboard/assets/css/search.css';
  document.head.appendChild(search);
</script>
</body>
</html>
