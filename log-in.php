<?php
    $pageName= "Home | Welcome to my website.";
    require './elements/header.php';
?>
<main class="form-signin w-25 m-auto">
<form method="post" id="login-form">
  <img class="mb-4" src="/docs/5.2/assets/brand/bootstrap-logo.svg" alt="" width="72" height="57">
  <h1 class="h3 mb-3 fw-normal">Please sign in</h1>
  <div class="form-floating">
    <input type="email" name="email" class="form-control" id="floatingInput" placeholder="name@example.com">
    <label for="floatingInput">Email address</label>
  </div>
  <div class="form-floating">
    <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password">
    <label for="floatingPassword">Password</label>
  </div>
  <button class="w-100 btn btn-lg btn-primary" type="submit" id="login-submit-button">Sign in 
  <div class="spinner-border text-primary" style="display: none;"  id="loader" role="status"></div>
  </button>
  <p class="mt-5 mb-3 text-muted">© 2017–2022</p>
</form>
</main>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>
<script src="./scripts/authScript.js"></script>