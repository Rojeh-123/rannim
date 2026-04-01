// Toggle password visibility
document.querySelector('.toggle-password').addEventListener('click', function () {
  const passwordInput = document.querySelector('.password-wrapper input');
  const type = passwordInput.getAttribute('type');

  if (type === 'password') {
    passwordInput.setAttribute('type', 'text');
    this.textContent = '🙈'; // change icon
  } else {
    passwordInput.setAttribute('type', 'password');
    this.textContent = '👁️';
  }
});

// Simple form validation
document.querySelector('.login-form').addEventListener('submit', function (e) {
  const email = document.querySelector('input[type="email"]').value.trim();
  const password = document.querySelector('.password-wrapper input').value.trim();

  if (email === '' || password === '') {
    alert('Please enter both email and password.');
    e.preventDefault(); // prevent form submission
  }
});