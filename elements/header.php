<?php
  require './Connection/auth.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= $pageName ?></title>
  <!-- CSS only -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- JavaScript Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js'></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" />
</head>

<body>
  <header class="p-3 text-bg-dark">
    <div class="container">
      <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
        <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
          <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap">
            <use xlink:href="#bootstrap"></use>
          </svg>
        </a>

        <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
          <li><a href="#" class="nav-link px-2 text-secondary">Home</a></li>
          <li><a href="#" class="nav-link px-2 text-white">Features</a></li>
          <li><a href="#" class="nav-link px-2 text-white">Pricing</a></li>
          <li><a href="#" class="nav-link px-2 text-white">FAQs</a></li>
          <li><a href="#" class="nav-link px-2 text-white">About</a></li>
        </ul>

        <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3" role="search">
          <input type="search" class="form-control form-control-dark text-bg-dark" placeholder="Search..." aria-label="Search">
        </form>
        <?php
        if (isset($user) && !empty($user)) {
          ?>
               <div class="text-end m-1"> Hello,  <?= $user['first_name']; ?></div>
               <div class="text-end"> <a href="/logout.php" class="text-warning" style="text-decoration: none;">log out</a></div>
          <?php
          
        } else {
        ?>
          <div class="text-end">
            <button type="button" class="btn btn-outline-light me-2"> <a href="/log-in.php" class="text-white" style="text-decoration: none;"> Login</a></button>
            <button type="button" class="btn btn-warning"><a href="/sign-up.php" class="text-secondary " style="text-decoration: none;"> Sign-up </a></button>
          </div>
        <?php

        }

        ?>


      </div>
    </div>
  </header>