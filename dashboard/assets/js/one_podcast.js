  // Example JS for Play/Pause and Timeline
  const audio = document.getElementById('audio');
  const playBtn = document.getElementById('playPauseBtn');
  const playIcon = document.getElementById('playIcon');
  const pauseIcon = document.getElementById('pauseIcon');
  const timeline = document.getElementById('timeline');
  const progress = document.getElementById('progress');
  const currentTimeEl = document.getElementById('currentTime');
  const durationEl = document.getElementById('duration');

  playBtn.addEventListener('click', () => {
    if(audio.paused){
      audio.play();
      playIcon.style.display = 'none';
      pauseIcon.style.display = 'block';
    } else {
      audio.pause();
      playIcon.style.display = 'block';
      pauseIcon.style.display = 'none';
    }
  });

  audio.addEventListener('timeupdate', () => {
    const percent = (audio.currentTime / audio.duration) * 100;
    progress.style.width = percent + '%';
    currentTimeEl.textContent = Math.floor(audio.currentTime / 60) + ':' + ('0'+Math.floor(audio.currentTime%60)).slice(-2);
    durationEl.textContent = Math.floor(audio.duration / 60) + ':' + ('0'+Math.floor(audio.duration%60)).slice(-2);
  });

    // Share modal
    const shareBtn = document.getElementById('shareBtn');
    const shareModal = document.getElementById('shareModal');
    const closeBtn = shareModal.querySelector('.close');
    shareBtn.addEventListener('click', () => shareModal.style.display='block');
    closeBtn.addEventListener('click', () => shareModal.style.display='none');
    window.addEventListener('click', e => { if(e.target==shareModal) shareModal.style.display='none'; });
    document.getElementById('copyBtn').addEventListener('click', () => {
    document.getElementById('shareURL').select();
    document.execCommand('copy');
  });