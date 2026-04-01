// toggle password visibility (single function covers both)
function toggleVisibility(inputId, btnId) {
  const input = document.getElementById(inputId);
  const btn = document.getElementById(btnId);
  if (!input || !btn) return;
  if (input.type === 'password') {
    input.type = 'text';
    btn.textContent = '🙈';
    btn.setAttribute('aria-pressed','true');
  } else {
    input.type = 'password';
    btn.textContent = '👁️';
    btn.setAttribute('aria-pressed','false');
  }
}

document.getElementById('toggle-password').addEventListener('click', function(){
  toggleVisibility('password','toggle-password');
});
document.getElementById('toggle-confirm-password').addEventListener('click', function(){
  toggleVisibility('confirm-password','toggle-confirm-password');
});

// File input label update
const fileInput = document.getElementById('photo');
const fileLabel = document.getElementById('file-label');
fileInput.addEventListener('change', updateFileName);
function updateFileName(){
  const file = fileInput.files && fileInput.files[0];
  fileLabel.textContent = file ? file.name : 'Profile Photo (Optional)';
}

// Allow keyboard activation of file input when file-label focused
fileLabel.addEventListener('keydown', function(e){
  if (e.key === 'Enter' || e.key === ' ') {
    e.preventDefault();
    fileInput.click();
  }
});