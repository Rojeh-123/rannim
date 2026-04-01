<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <link rel="icon" href="<?php echo base_url(); ?>dashboard/assets/img/logo_only.png" />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="<?php echo base_url(); ?>dashboard/assets/css/bootstrap.min.css" />
  <link rel="stylesheet" href="<?php echo base_url(); ?>dashboard/assets/css/sign_up.css" />
  <title>Rannim | Sign Up</title>
</head>
<body>
  <div class="signup-page">
    <div class="signup-card shadow-sm" role="main" aria-labelledby="signup-title">
      <img src="<?php echo base_url(); ?>dashboard/assets/img/logo_only.png" alt="Rannim Logo" class="signup-logo" />

      <h1 id="signup-title" class="sr-only">Sign up</h1>
      <span id="password_text" class="text-danger fw-bold"></span>

      <form class="form" id="signup-form" enctype="multipart/form-data" novalidate method="post" action="<?php echo site_url('Rannim/register'); ?>">
        <div class="form-group">
          <input class="form-control custom-input" type="text" placeholder="Full Name" name="full_name" id="full_name" required />
        </div>

        <div class="form-group">
          <input class="form-control custom-input" type="text" placeholder="Username" name="username" id="username" required />
        </div>

        <div class="form-group">
          <input class="form-control custom-input" type="email" placeholder="E-mail" name="email" id="email" required />
        </div>

        <div class="form-group">
          <input class="form-control custom-input" type="text" placeholder="Phone Number (optional)" name="mobile" id="phone_number" />
        </div>

        <div class="form-group">
          <input class="form-control custom-input" type="date" name="date_of_birth" id="birth_date" required />
        </div>

        <div class="form-group">
          <input 
            class="form-control custom-input" 
            list="countries" 
            name="country" 
            id="country" 
            placeholder="Select your country" 
            required
          />

          <datalist id="countries">
            <?php foreach($countries as $country){ ?>
              <option value="<?php echo $country->country_name ?>"></option>
            <?php } ?>
          </datalist>
        </div>

        <div class="form-group password-wrapper">
          <input class="form-control custom-input" type="password" id="password" placeholder="Password" required name="password" />
          <button type="button" class="eye-btn" id="toggle-password" aria-label="Show password">👁️</button>
        </div>

        <div class="form-group password-wrapper">
          <input class="form-control custom-input" type="password" id="confirm-password" placeholder="Confirm Password" required name="confirm_password" />
          <button type="button" class="eye-btn" id="toggle-confirm-password" aria-label="Show confirm password">👁️</button>
        </div>

        <div class="form-group file-input-wrapper" aria-hidden="false">
          <!-- Invisible but clickable file input positioned over the visible label -->
          <input class="real-file-input" type="file" id="photo" accept="image/*" name="user_photo" />
          <span class="file-input-text" id="file-label" tabindex="0">Profile Photo (Optional)</span>
        </div>

        <div class="form-group">
          <button type="submit" class="signup-btn">Sign Up</button>
        </div>
      </form>

      <div class="guest-section">
        <p class="mb-1">Enter as a guest?</p>
        <a href="<?php echo site_url("Rannim/guest_mode") ?>" class="guest-btn">Guest Mode</a>
      </div>

      <div class="login-section">
        <p class="mb-1">Already have an account?</p>
        <a href="<?php echo site_url("Rannim/log_user_in_view") ?>" class="login-btn">Log in</a>
      </div>
    </div>
  </div>

  <script>
    const password = document.getElementById('password');
    const confirm_password = document.getElementById('confirm-password');
    const password_text = document.getElementById('password_text');

    function checkPasswords() {
      if (password.value !== confirm_password.value) {
        password_text.textContent = "The Password doesn't match the confirm password!";
      } else {
        password_text.textContent = "";
      }
    }

    password.addEventListener('input', checkPasswords);
    confirm_password.addEventListener('input', checkPasswords);
  </script>
  <script src="<?php echo base_url(); ?>dashboard/assets/js/sign_up.js"></script>
</body>
</html>
