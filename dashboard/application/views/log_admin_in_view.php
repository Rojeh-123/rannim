<!DOCTYPE html>
<html lang="en">
<head>
  <meta property="og:title" content="Rannim | Log In" />
  <meta property="og:description" content="Log in to Rannim, your ultimate music streaming platform. Access your playlists, discover new music, and connect with artists." />
  <meta property="og:image" content="https://raw.githubusercontent.com/marhttpscoo747/ranim/main/imgs/og_image.png" />
  <meta property="og:url" content="<?php echo base_url(); ?>" />
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <link rel="icon" href="<?php echo base_url(); ?>assets/img/logo_only.png" />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
  <link href="<?php echo base_url(); ?>assets/css/login.css" rel="stylesheet">
  <title>Rannim | Login</title>
</head>
<body>
  <div class="login-page">
    <div class="login-card shadow-sm" style="height: 58vh;" role="main" aria-labelledby="login-title">
      <img src="<?php echo base_url(); ?>assets/img/logo_only.png" alt="Rannim Logo" class="login-logo" />
      <h1 id="login-title" class="sr-only">Rannim Login</h1>
      <span style="color: red; margin-top: -6%; display: block;">
        <?php if(isset($msg) && $msg == 1){
          echo "Invalid email or password";
        } ?>
      </span>

      <form class="form" id="login-form" novalidate method="post" action="<?php echo site_url('Rannim/log_admin_in'); ?>">
        <div class="form-group">
          <input class="form-control custom-input" type="email" placeholder="E-mail" name="email" id="email" required />
        </div>

        <div class="form-group password-wrapper">
          <input class="form-control custom-input" type="password" id="password" placeholder="Password" required name="password" />
          <button type="button" class="eye-btn" id="toggle-password" aria-label="Show password">👁️</button>
        </div>

        <div class="form-group">
          <button type="submit" class="login-btn">Login</button>
        </div>
      </form>

    </div>
  </div>

  <script src="<?php echo base_url(); ?>assets/js/sign_up.js"></script>
</body>
</html>
