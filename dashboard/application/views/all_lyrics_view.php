    <!-- Main content -->
    <div class="container-fluid mt-3">
      <!-- Lyrics Section -->
      <div class="d-flex justify-content-between align-items-center mb-2">
        <h3>Rannim Lyrics</h3>
        <button class="btn btn-outline-purple text-white" data-bs-toggle="modal" data-bs-target="#add_lyric">Add lyric</button>
      </div>
      <div class="row g-3 mt-1">
            <?php foreach($lyrics as $lyric){ ?>
                <div class="col-12 col-sm-6 col-lg-4 col-xl-4">
                    <div class="card card-custom lyric-card">

                        <!-- Title -->
                        <h4 class="fw-bold mb-3">🎵 <?php echo $lyric->title; ?></h4>

                        <!-- Artist + Genre -->
                        <div class="d-flex flex-column mb-3" style="color: var(--muted); font-size: 0.85rem; gap: 4px;">
                            <span><strong>Artist:</strong> <?php echo $lyric->artist_name; ?></span>
                            <span><strong>Genre:</strong> <?php echo $lyric->category_name; ?></span>
                        </div>

                        <!-- Lyric text -->
                        <div class="lyric-box mb-3">
                            <pre><?php echo $lyric->lyric_line; ?></pre>
                        </div>

                        <!-- Buttons -->
                        <div class="d-flex justify-content-between mt-2 gap-2">
                            <button onclick="edit_lyric_modal(<?= $lyric->lyric_id ?>)" data-bs-toggle="modal" data-bs-target="#edit_lyric" class="btn btn-sm btn-outline-primary fw-bold flex-grow-1">Edit</button>
                            <button class="btn btn-sm btn-outline-danger fw-bold flex-grow-1"><a href="<?php echo site_url('Rannim/delete_lyric/'. $lyric->lyric_id); ?>" style="text-decoration: none; color: inherit;">Delete</a></button>
                        </div>

                    </div>
            </div>
            <?php } ?>
        </div>
      </div>
  </div>
</div>

  <!-- Modal -->
  <div class="modal fade" id="add_lyric" tabindex="-1" aria-labelledby="addlyricLabel" aria-hidden="true">
      <div class="modal-dialog">
          <div class="modal-content" style="background-color: #181818; color: white; border: 1px solid #282828;">
             <form action="<?php echo site_url("Rannim/add_lyric"); ?>" method="POST" enctype="multipart/form-data">
              <div class="modal-header" style="border-bottom: 1px solid #282828;">
                  <h1 class="modal-title fs-5" id="addlyricLabel">Add Lyric</h1>
                  <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">

                <div class="input-group mb-3">
                    <label class="input-group-text text-white" for="inputGroupSelect01" style="background-color: #181818; border: 1px solid #282828;">Song</label>
                    <select class="form-select text-white" id="inputGroupSelect01" style="background-color: #181818; border: 1px solid #282828;" name="song">
                            <option disabled selected>Select Song</option>
                        <?php foreach($songs as $song) { ?>
                            <option value="<?php echo $song->song_id; ?>"><?php echo $song->title; ?></option>
                        <?php } ?>
                    </select>
                </div>

                <div class="input-group flex-nowrap mb-3">
                <span class="input-group-text text-white" style="background-color: #181818; border: 1px solid #282828;" id="addon-wrapping">Lyric Line</span>
                <textarea 
                    class="form-control text-white" 
                    style="background-color: #181818; border: 1px solid #282828; resize: none;" 
                    aria-label="Artist bio" 
                    aria-describedby="addon-wrapping" 
                    name="lyric_line" 
                    rows="3"></textarea>
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

  <!-- Modal -->
  <div class="modal fade" id="edit_lyric" tabindex="-1" aria-labelledby="edit_lyricLabel" aria-hidden="true">
      <div class="modal-dialog">
          <div class="modal-content" style="background-color: #181818; color: white; border: 1px solid #282828;">
             <form action="<?php echo site_url("Rannim/update_lyric"); ?>" method="POST" enctype="multipart/form-data">
              <div class="modal-header" style="border-bottom: 1px solid #282828;">
                  <h1 class="modal-title fs-5" id="edit_lyricLabel">Update Lyric</h1>
                  <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">

                <input type="hidden" name="lyric_id" id="lyric_id">

                <div class="input-group flex-nowrap mb-3">
                <span class="input-group-text text-white" style="background-color: #181818; border: 1px solid #282828;" id="addon-wrapping">Lyric Line</span>
                <textarea 
                    id="lyric_line"
                    class="form-control text-white" 
                    style="background-color: #181818; border: 1px solid #282828; resize: none;" 
                    aria-label="Artist bio" 
                    aria-describedby="addon-wrapping" 
                    name="edit_lyric_line" 
                    rows="4"></textarea>
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
  
  const all_lyrics = document.createElement('link');
  all_lyrics.rel = 'stylesheet';
  all_lyrics.href = '<?php echo base_url(); ?>assets/css/all_lyrics.css?v=1.1';
  document.head.appendChild(all_lyrics);
</script>
<script>
    document.getElementById('fileUpload').addEventListener('change', function() {
        const label = document.getElementById('fileLabel');
        if (this.files && this.files.length > 0) {
            label.textContent = this.files[0].name;
        } else {
            label.textContent = "Select Category Photo";
        }
    });
</script>

<script>
    document.getElementById('fileUpload').addEventListener('change', function() {
        const label = document.getElementById('fileLabel');
        if (this.files && this.files.length > 0) {
            label.textContent = this.files[0].name;
        } else {
            label.textContent = "Select lyric Flag";
        }
    });
</script>

<script>
    document.getElementById('edit_file').addEventListener('change', function() {
        const label = document.getElementById('edit_label');
        if (this.files && this.files.length > 0) {
            label.textContent = this.files[0].name;
        } else {
            label.textContent = "Select lyric Flag (If you want to change it)";
        }
    });
</script>

<script>
function edit_lyric_modal(lyric_id) {
    $.ajax({
        type: "GET",
        url: "<?php echo site_url("Rannim/edit_lyric/"); ?>" + lyric_id,
        dataType: "json",
        success: function(data) {
            var lyric = data.lyric;
            $("#edit_timestamp_sec").val(lyric.timestamp_sec);
            $("#lyric_id").val(lyric.lyric_id);
            $("#lyric_line").val(lyric.lyric_line);
        },
        error: function(req, err) {
            console.log("The Error:" + err);
        }
    });
}
</script>
<script src="<?php echo base_url() ?>assets/js/jquery-3.7.1.js"></script>
</body>
</html>
