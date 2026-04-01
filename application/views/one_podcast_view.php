  <div class="flex-grow-1 d-flex justify-content-center">
    <div class="body">
      <!-- Main content -->
      <div class="main-content">
        <div class="song-view">
          <div class="song-info text-center">
            <img src="<?php echo base_url(); ?>dashboard/assets/uploads/podcasts_photos/<?php echo $podcast->podcast_thumbnail ?>" alt="Podcast Image" class="song-img rounded mb-3" style="max-width:300px;">
            <h2 class="song-title mt-3"><?php echo $podcast->title ?></h2>
            <p class="text-secondary"><?php echo $podcast->artist_name ?></p>
          </div>

          <div class="audio-container text-center mb-3">
            <audio id="audio" src="<?php echo base_url(); ?>dashboard/assets/uploads/podcasts_files/<?php echo $podcast->podcast_file ?>"></audio>

            <!-- Timeline -->
            <div class="timeline-container mt-2">
              <span id="currentTime">0:00</span>
              <div id="timeline">
                <div id="progress"></div>
              </div>
              <span id="duration"><?php echo $podcast->duration ?></span>
            </div>

            <!-- Play/Pause Button -->
            <button id="playPauseBtn" aria-label="Play/Pause" class="mt-2">
              <svg id="playIcon" xmlns="http://www.w3.org/2000/svg" height="32" viewBox="0 0 24 24" fill="white">
                <path d="M8 5v14l11-7z"/>
              </svg>
              <svg id="pauseIcon" xmlns="http://www.w3.org/2000/svg" height="32" viewBox="0 0 24 24" fill="white" style="display: none;">
                <path d="M6 19h4V5H6zm8-14v14h4V5h-4z"/>
              </svg>
            </button>
            </div>

        <!-- Options Buttons -->
        <div class="optioos d-flex justify-content-center gap-3">
        <!-- Download -->
        <a href="<?php echo base_url(); ?>dashboard/assets/uploads/podcasts_files/<?php echo $podcast->podcast_file ?>" download class="option-btn" title="Download this song">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="white" class="bi bi-download" viewBox="0 0 16 16">
                <path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5"/>
                <path d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708z"/>
            </svg>
        </a>

        <!-- Share -->
        <button data-bs-toggle="modal" data-bs-target="#share" class="option-btn" title="Share this song">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="white" class="bi bi-share-fill" viewBox="0 0 16 16">
                <path d="M11 2.5a2.5 2.5 0 1 1 .603 1.628l-6.718 3.12a2.5 2.5 0 0 1 0 1.504l6.718 3.12a2.5 2.5 0 1 1-.488.876l-6.718-3.12a2.5 2.5 0 1 1 0-3.256l6.718-3.12A2.5 2.5 0 0 1 11 2.5"/>
            </svg>
        </button>

        <!-- Block -->
        <button class="option-btn" title="Block this song">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="white" class="bi bi-ban" viewBox="0 0 16 16">
                <path d="M15 8a6.97 6.97 0 0 0-1.71-4.584l-9.874 9.875A7 7 0 0 0 15 8M2.71 12.584l9.874-9.875a7 7 0 0 0-9.874 9.874ZM16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0"/>
            </svg>
        </button>

        <!-- Report -->
        <button class="option-btn" title="Report this song">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="white" class="bi bi-exclamation-circle-fill" viewBox="0 0 16 16">
                <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M8 4a.905.905 0 0 0-.9.995l.35 3.507a.552.552 0 0 0 1.1 0l.35-3.507A.905.905 0 0 0 8 4m.002 6a1 1 0 1 0 0 2 1 1 0 0 0 0-2"/>
            </svg>
        </button>
        </div>

        <div class="lyrics-container">
          <p>
            <?php echo nl2br(htmlspecialchars($podcast->description)); ?>
          </p>
        </div>

        <div class="credits-container">
          <h3 class="credits-title">Details</h3>
          <div class="credit-item">
            <div>
              <p class="artist-name"><?php echo $podcast->artist_name ?></p>
              <p class="role"><?php echo $podcast->band_name ?></p>
            </div>
            <button class="follow-btn">Follow</button>
          </div>
        </div>

      </div>
    </div>

  </div>
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
                    <input value="https://www.share.link.com" id="share_link" style="background-color: #181818; border: 1px solid #282828;" type="text" class="form-control text-white" aria-label="Share Link" aria-describedby="addon-wrapping" readonly>
                </div>
              </div>
              <div class="modal-footer" style="border-top: 1px solid #282828;">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" style="background-color: #282828; border: none;">Close</button>
                  <button type="button" id="copy_btn" onclick="copy_to_clipboard()" class="btn btn-success" style="background-color: #7e56f1; border: none;">Copy Link</button>
              </div>
          </div>
      </div>
  </div>

<script src="<?php echo base_url(); ?>dashboard/assets/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo base_url(); ?>dashboard/assets/js/all_views.js"></script>
<script src="<?php echo base_url(); ?>dashboard/assets/js/one_podcast.js"></script>
<script>
  const all_views = document.createElement('link');
  all_views.rel = 'stylesheet';
  all_views.href = '<?php echo base_url(); ?>dashboard/assets/css/all_views.css';
  document.head.appendChild(all_views);

  const one_song = document.createElement('link');
  one_song.rel = 'stylesheet';
  one_song.href = '<?php echo base_url(); ?>dashboard/assets/css/one_song.css';
  document.head.appendChild(one_song);
</script>
</body>
</html>
