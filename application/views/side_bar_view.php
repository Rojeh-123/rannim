<!doctype html>
<html lang="en">
<head>
  <meta property="og:title" content="<?php echo $title ?>" />
  <meta property="og:description" content="Welcome to Rannim, your ultimate music streaming platform. Discover, listen, and share your favorite tunes all in one place." />
  <meta property="og:image" content="https://raw.githubusercontent.com/marhttpscoo747/ranim/main/imgs/og_image.png" />
  <meta property="og:url" content="<?php echo base_url(); ?>" />
  <meta property="og:type" content="website" />
  <meta name="description" content="Welcome to Rannim, your ultimate music streaming platform. Discover, listen, and share your favorite tunes all in one place." />
  <meta name="keywords" content="music, streaming, playlists, songs, artists, albums, podcasts, Rannim">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?php echo $title ?></title>

  <!-- Bootstrap CSS -->
  <link rel="icon" href="<?php echo base_url(); ?>dashboard/assets/img/logo_only.png" />
  <link rel="stylesheet" href="<?php echo base_url(); ?>dashboard/assets/css/bootstrap.min.css">
</head>
<body>

<div class="d-flex">
  <!-- Sidebar -->
  <nav class="sidebar d-none d-md-block">
  <!-- Mobile Close Button -->
  <button class="btn-close btn-close-white d-md-none position-absolute top-0 end-0 m-2" id="sidebarClose" aria-label="Close"></button>
    <div class="mb-4 text-center">
      <img src="https://raw.githubusercontent.com/marcoo747/ranim/main/imgs/og_image.png" alt="logo" class="img-fluid rounded mb-2" style="max-width:120px;">
      <h4>Rannim</h4>
    </div>
    <ul class="nav flex-column">
      <li class="nav-item"><a class="nav-link" href="<?php echo site_url('Rannim'); ?>">🏠 Home</a></li>
      <li class="nav-item"><a class="nav-link" href="<?php echo site_url('Rannim/search_view'); ?>">🔍 Search</a></li>
      <?php if($this->session->userdata("user_id") != null){ ?>
        <li class="nav-item"><a class="nav-link" href="<?php echo site_url('Rannim/show_add_playlist'); ?>">➕ Create Playlist</a></li>
        <li class="nav-item"><a class="nav-link" href="<?php echo site_url('Rannim/show_all_users'); ?>">👥 Users</a></li>
        <li class="nav-item"><a class="nav-link" href="<?php echo site_url('Rannim/show_user_profile/' . $this->session->userdata('user_id')); ?>">👤 Profile</a></li>
      <?php } ?>
      <li class="nav-item"><a class="nav-link" href="<?php echo site_url('Rannim/show_all_albums'); ?>">🎵 All Albums</a></li>
      <li class="nav-item"><a class="nav-link" href="<?php echo site_url('Rannim/show_all_artists'); ?>">🎤 All Artists</a></li>
      <li class="nav-item"><a class="nav-link" href="<?php echo site_url('Rannim/show_all_bands'); ?>">🥁 All Bands</a></li>
      <li class="nav-item"><a class="nav-link" href="<?php echo site_url('Rannim/show_all_categories'); ?>">📂 All Categories</a></li>
      <li class="nav-item"><a class="nav-link" href="<?php echo site_url('Rannim/show_all_playlists'); ?>">🎶 All Playlists</a></li>
      <li class="nav-item"><a class="nav-link" href="<?php echo site_url('Rannim/show_all_podcasts'); ?>">🎙️ All Podcasts</a></li>
      <li class="nav-item"><a class="nav-link" href="<?php echo site_url('Rannim/show_all_songs'); ?>">🎧 All Songs</a></li>
      <li class="nav-item"><a class="nav-link" href="<?php echo site_url('Rannim/show_all_types'); ?>">🗂️ All Types</a></li>
    </ul>
  </nav>

  <div class="flex-grow-1">
    <!-- Topbar -->
    <div class="topbar position-relative">
      <div class="d-flex align-items-center gap-2">
        <button class="btn btn-outline-light d-md-none" id="hamburger">☰</button>
        <form action="<?php echo site_url("Rannim/search"); ?>" method="post">
          <div class="search d-flex d-sm-flex align-items-center gap-2">
              <input type="search" placeholder="Search..." id="searchInput" name="query">
              <button type="submit" id="searchBtn">Search</button>
          </div>
        </form>
      </div>

      <div class="d-flex align-items-center gap-3 position-relative">
        
      <?php if($this->session->userdata("user_id") != null){ ?>
        <!-- Notifications -->
        <!-- <div class="position-relative">
          <button class="btn btn-outline-purple" id="bellBtn">🔔 <span class="badge bg-primary" id="notifBadge">3</span></button>
          <div class="popup p-2" id="notifPopup">
            <div class="d-flex align-items-center mb-2">
              <img src="https://images.unsplash.com/photo-1511671782779-c97d3d27a1d4?q=80&w=400" class="rounded me-2" style="width:40px;height:40px;">
              <div>
                <strong>New playlist: ترانيم قلب دائود</strong><br>
                <small class="text-secondary">2 hours ago</small>
              </div>
            </div>
            <div class="d-flex align-items-center mb-2">
              <img src="https://images.unsplash.com/photo-1522071820081-009f0129c71c?q=80&w=400" class="rounded me-2" style="width:40px;height:40px;">
              <div>
                <strong>New follower</strong><br>
                <small class="text-secondary">5 hours ago</small>
              </div>
            </div>
            <button class="btn w-100 mt-2" style="background:linear-gradient(90deg,var(--accent),var(--accent-2));color:#fff;">Show more</button>
          </div>
        </div> -->

        <!-- User -->
        <div class="position-relative">
          <button class="btn btn-outline-purple rounded-circle p-1" id="profileBtn">
            <img src="<?php echo base_url(); ?>dashboard/assets/uploads/users_photos/<?php echo $this->session->userdata("user_photo") ?>" class="rounded-circle" style="width:40px;height:40px;">
          </button>
          <div class="profile-popup p-2" id="profilePopup">
            <a href="<?php echo site_url("Rannim/show_user_profile/" . $this->session->userdata("user_id")); ?>" class="d-block py-1 px-2 text-white text-decoration-none rounded hover-bg">👤 View Profile</a>
            <a href="<?php echo site_url("Rannim/log_out/"); ?>" class="d-block py-1 px-2 text-white text-decoration-none rounded hover-bg">🚪 Log out</a>
          </div>
        </div>
      <?php } else { ?>
        <div class="d-flex align-items-center">
          <div class="auth-buttons">
            <a href="<?php echo site_url('Rannim/log_user_in_view'); ?>" class="log-in">Log in</a>
            <a href="<?php echo site_url('Rannim/register_view'); ?>" class="sign-up">Sign up</a>
          </div>
        </div>
      <?php } ?>
      </div>
    </div>
