<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="https://bootswatch.com/4/flatly/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/css/style.css">

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>

  <script src="https://cloud.tinymce.com/5/tinymce.min.js"></script>
  <script>tinymce.init({ selector:'#txt_area' });</script>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <a class="navbar-brand" href="<?= base_url('/') ?>">CIProject</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarColor02">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="<?= base_url('/') ?>">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url('/about') ?>">About</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url('/posts') ?>">Blog</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url('/catogaries') ?>">Catogary</a>
      </li>  
    </ul>
    <!-- If user are not logged in -->
    <?php if(!$this->session->userdata('logged_in')): ?>
        <ul class="nav navbar-nav navbar-right">
          <a class="nav-link" href="<?= base_url('/users/login') ?>">Login</a>
        </ul>
        <ul class="nav navbar-nav navbar-right">
          <a class="nav-link" href="<?= base_url('/users/register') ?>">Register</a>
        </ul>
    <?php endif; ?>
    <!-- If user are logged in -->
    <?php if($this->session->userdata('logged_in')): ?>
    <ul class="nav navbar-nav navbar-right">
      <a class="nav-link" href="<?= base_url('/catogaries/create') ?>">Create Category</a>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <a class="nav-link" href="<?= base_url('/posts/create') ?>">Create Post</a>
    </ul>
        <ul class="nav navbar-nav navbar-right">
          <a class="nav-link" href="<?= base_url('/users/logout') ?>">Logout</a>
        </ul>
   <?php endif; ?>
  </div>
</nav>
<br>
<div class="container">

<!-- Flash Messages -->
<?php if($this->session->flashdata('user_registered')): ?>
    <?php echo '<p class="alert alert-secondary">'.$this->session->flashdata('user_registered').'</p>' ?>
<?php endif; ?>

<?php if($this->session->flashdata('post_created')): ?>
    <?php echo '<p class="alert alert-secondary">'.$this->session->flashdata('post_created').'</p>' ?>
<?php endif; ?>

<?php if($this->session->flashdata('post_updated')): ?>
    <?php echo '<p class="alert alert-secondary">'.$this->session->flashdata('post_updated').'</p>' ?>
<?php endif; ?>

<?php if($this->session->flashdata('post_deleted')): ?>
    <?php echo '<p class="alert alert-secondary">'.$this->session->flashdata('post_deleted').'</p>' ?>
<?php endif; ?>

<?php if($this->session->flashdata('catogary_created')): ?>
    <?php echo '<p class="alert alert-secondary">'.$this->session->flashdata('catogary_created').'</p>' ?>
<?php endif; ?>

<?php if($this->session->flashdata('login_failed')): ?>
    <?php echo '<p class="alert alert-warning">'.$this->session->flashdata('login_failed').'</p>' ?>
<?php endif; ?>

<?php if($this->session->flashdata('user_loggedin')): ?>
    <?php echo '<p class="alert alert-secondary">'.$this->session->flashdata('user_loggedin').'</p>' ?>
<?php endif; ?>

<?php if($this->session->flashdata('user_logged_out')): ?>
    <?php echo '<p class="alert alert-secondary">'.$this->session->flashdata('user_logged_out').'</p>' ?>
<?php endif; ?>

<?php if($this->session->flashdata('catogary_deleted')): ?>
    <?php echo '<p class="alert alert-secondary">'.$this->session->flashdata('catogary_deleted').'</p>' ?>
<?php endif; ?>
