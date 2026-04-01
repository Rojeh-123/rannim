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
  <link rel="icon" href="<?php echo base_url(); ?>assets/img/logo_only.png" />
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css">
</head>
<body>

<div class="d-flex">
  <!-- Sidebar -->
  <nav class="sidebar d-md-block">
  <!-- Mobile Close Button -->
  <button class="btn-close btn-close-white d-md-none position-absolute top-0 end-0 m-2" id="sidebarClose" aria-label="Close"></button>
    <div class="mb-4 text-center">
      <img src="https://raw.githubusercontent.com/marcoo747/ranim/main/imgs/og_image.png" alt="logo" class="img-fluid rounded mb-2" style="max-width:120px;">
      <h4>Rannim</h4>
    </div>
<ul class="nav flex-column">
    <!-- About Developer -->
    <li class="nav-item"><a class="nav-link" href="<?php echo site_url('Rannim/show_our_view'); ?>">👨‍💻 About Developers</a></li>

    <li class="nav-item"><a class="nav-link" href="<?php echo site_url('Rannim/show_all_admins'); ?>">🏠 Home</a></li>
    <li class="nav-item"><a class="nav-link" href="<?php echo site_url('Rannim/search_view'); ?>">🔍 Search</a></li>

    <li class="nav-item"><a class="nav-link" href="<?php echo site_url('Rannim/show_all_users'); ?>">👥 Users</a></li>
    <li class="nav-item"><a class="nav-link" href="<?php echo site_url('Rannim/show_all_admins'); ?>">🛡️ Admins</a></li>
    <li class="nav-item"><a class="nav-link" href="<?php echo site_url('Rannim/show_all_countries'); ?>">🌍 Countries</a></li>

    <li class="nav-item"><a class="nav-link" href="<?php echo site_url('Rannim/show_all_albums'); ?>">🎵 All Albums</a></li>
    <li class="nav-item"><a class="nav-link" href="<?php echo site_url('Rannim/show_all_artists'); ?>">🎤 All Artists</a></li>
    <li class="nav-item"><a class="nav-link" href="<?php echo site_url('Rannim/show_all_bands'); ?>">🥁 All Bands</a></li>
    <li class="nav-item"><a class="nav-link" href="<?php echo site_url('Rannim/show_all_categories'); ?>">📂 All Categories</a></li>
    <li class="nav-item"><a class="nav-link" href="<?php echo site_url('Rannim/show_all_playlists'); ?>">🎶 All Playlists</a></li>
    <li class="nav-item"><a class="nav-link" href="<?php echo site_url('Rannim/show_all_podcasts'); ?>">🎙️ All Podcasts</a></li>
    <li class="nav-item"><a class="nav-link" href="<?php echo site_url('Rannim/show_all_songs'); ?>">🎧 All Songs</a></li>
    <li class="nav-item"><a class="nav-link" href="<?php echo site_url('Rannim/show_all_lyrics'); ?>">📜 Songs Lyrics</a></li>

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
    </div>
