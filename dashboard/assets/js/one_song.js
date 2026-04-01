const audio = document.getElementById('audio');
const playBtn = document.getElementById('playPauseBtn');
const playIcon = document.getElementById('playIcon');
const pauseIcon = document.getElementById('pauseIcon');
const progress = document.getElementById('progress');
const timeline = document.getElementById('timeline');
const currentTimeElem = document.getElementById('currentTime');

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
  const mins = Math.floor(audio.currentTime / 60);
  const secs = Math.floor(audio.currentTime % 60).toString().padStart(2,'0');
  currentTimeElem.textContent = `${mins}:${secs}`;
});

timeline.addEventListener('click', (e) => {
  const timelineWidth = timeline.offsetWidth;
  const clickX = e.offsetX;
  audio.currentTime = (clickX / timelineWidth) * audio.duration;
});
