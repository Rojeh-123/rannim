
    <!-- Main content -->
    <div class="container-fluid mt-3">
      <!-- Artist Cover -->
      <div class="cover-photo" style="background-image:url('https://images.unsplash.com/photo-1511671782779-c97d3d27a1d4?q=80&w=1200');">
        <div class="profile-photo">
          <img src="<?php echo base_url(); ?>assets/uploads/artists_photos/<?php echo $artist->artist_photo ?>" alt="Artist Photo">
        </div>
      </div>

      <!-- Artist Name -->
      <h2 style="margin-left:140px;margin-bottom:10px;"><?php echo $artist->artist_name ?></h2>

      <!-- Artist Bio -->
      <p class="artist-bio" style="margin-left:140px; margin-bottom:20px; max-width:800px; color:#ccc; font-size:1rem; line-height:1.6;">
        <?php echo $artist->artist_bio ?>
      </p>

      <!-- Song List -->
      <ul class="song-list" aria-live="polite">
        <?php foreach($songs as $song){ ?>
            <li class="song-item">
                <div class="play-icon d-flex justify-content-center align-items-center" title="Play">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="black" class="bi bi-play-fill" viewBox="0 0 16 16">
                        <path d="m11.596 8.697-6.363 3.692c-.54.313-1.233-.066-1.233-.697V4.308c0-.63.692-1.01 1.233-.696l6.363 3.692a.802.802 0 0 1 0 1.393"/>
                    </svg>
                </div>
                <a href="<?php echo site_url("Rannim/show_one_song/" . $song->song_id); ?>" class="gap-2" style="text-decoration:none; color:inherit; display:flex;">
                    <div class="song-title"><?php echo $song->title ?></div>
                </a>
                <div class="song-controls">
                    <a href="<?php echo base_url(); ?>assets/uploads/songs_sounds/<?php echo $song->song_file ?>" download title="Download" class="btn-song">
                    <img src="<?php echo base_url(); ?>assets/img/download-button.png" alt="Download">
                    </a>
                    <button class="btn-song" title="Share" 
                            data-bs-toggle="modal" 
                            data-bs-target="#share" 
                            onclick="document.getElementById('share_link').value = '<?php echo addslashes($song->share_link); ?>'">
                        <img src="<?php echo base_url(); ?>assets/img/share.png" alt="Share">
                    </button>
                </div>
                <audio src="<?php echo base_url(); ?>assets/uploads/songs_sounds/<?php echo $song->song_file ?>" preload="metadata"></audio>
            </li>
        <?php } ?>
      </ul>
    </div>
  </div>
</div>

  <!-- Modal -->
  <div class="modal fade" id="share" tabindex="-1" aria-labelledby="shareLabel" aria-hidden="true">
      <div class="modal-dialog">
          <div class="modal-content" style="background-color: #181818; color: white; border: 1px solid #282828;">
              <div class="modal-header" style="border-bottom: 1px solid #282828;">
                  <h1 class="modal-title fs-5" id="shareLabel">Share Link</h1>
                  <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <div class="input-group flex-nowrap mb-3">
                    <input id="share_link" style="background-color: #181818; border: 1px solid #282828;" type="text" class="form-control text-white" aria-label="Share Link" aria-describedby="addon-wrapping" readonly>
                </div>
              </div>
              <div class="modal-footer" style="border-top: 1px solid #282828;">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" style="background-color: #282828; border: none;">Close</button>
                  <button type="button" id="copy_btn" onclick="copy_to_clipboard()" class="btn btn-success" style="background-color: #7e56f1; border: none;">Copy Link</button>
              </div>
          </div>
      </div>
  </div>

<script src="<?php echo base_url(); ?>assets/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/all_views.js"></script>
<script>
  const all_views = document.createElement('link');
  all_views.rel = 'stylesheet';
  all_views.href = '<?php echo base_url(); ?>assets/css/all_views.css';
  document.head.appendChild(all_views);
  
  const one_artist = document.createElement('link');
  one_artist.rel = 'stylesheet';
  one_artist.href = '<?php echo base_url(); ?>assets/css/one_artist.css';
  document.head.appendChild(one_artist);
</script>
<script>
document.querySelectorAll('.song-item').forEach(item => {
    const playBtn = item.querySelector('.play-icon');
    const audio = item.querySelector('audio');

    const playSVG = `
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="black" class="bi bi-play-fill" viewBox="0 0 16 16">
            <path d="m11.596 8.697-6.363 3.692c-.54.313-1.233-.066-1.233-.697V4.308c0-.63.692-1.01 1.233-.696l6.363 3.692a.802.802 0 0 1 0 1.393"/>
        </svg>
    `;

    const pauseSVG = `
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="black" class="bi bi-pause-fill" viewBox="0 0 16 16">
            <path d="M5.5 3.5A1.5 1.5 0 0 1 7 5v6a1.5 1.5 0 0 1-3 0V5a1.5 1.5 0 0 1 1.5-1.5m5 0A1.5 1.5 0 0 1 12 5v6a1.5 1.5 0 0 1-3 0V5a1.5 1.5 0 0 1 1.5-1.5"/>
        </svg>
    `;

    // When play icon clicked
    playBtn.addEventListener('click', () => {

        // Pause all other audio and reset their icons
        document.querySelectorAll('.song-item').forEach(otherItem => {
            const otherAudio = otherItem.querySelector('audio');
            const otherBtn = otherItem.querySelector('.play-icon');

            if (otherAudio !== audio) {
                otherAudio.pause();
                otherBtn.innerHTML = playSVG;
            }
        });

        // Toggle this audio
        if (audio.paused) {
            audio.play();
            playBtn.innerHTML = pauseSVG;
        } else {
            audio.pause();
            playBtn.innerHTML = playSVG;
        }
    });

    // When audio ends → reset icon
    audio.addEventListener('ended', () => {
        playBtn.innerHTML = playSVG;
    });
});
</script>
</body>
</html>