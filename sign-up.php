<?php
    $pageName= "Registration | Please sign-in here";
    require './elements/header.php';
    require './Connection/auth.php';
?>
<main class="form-signin w-50 m-auto">
  <form id="signup-form" method="post">
    <!-- <img class="mb-4" src="/docs/5.2/assets/brand/bootstrap-logo.svg" alt="" width="72" height="57"> -->
    <h1 class="h3 mb-3 fw-normal">Please sign up</h1>

    <div class="form-floating mb-3">
      <input type="text" class="form-control"  id="first-name" placeholder="eg: John" name="first_name">
      <label for="floatingInput">First Name</label>
    </div>
    <div class="form-floating mb-3">
      <input type="text" class="form-control" id="last-name"  placeholder="eg: Doe" name="last_name">
      <label for="floatingInput">Last Name</label>
    </div>
    <div class="form-floating mb-3">
      <input type="email" class="form-control" id="email"  placeholder="name@example.com" name="email">
      <label for="floatingInput">Email address</label>
    </div>
    <div class="form-floating mb-3">
      <input type="phone" class="form-control" name="phone" id="phone"  placeholder="+ 1xxxxxxxx">
      <label for="floatingInput">phone</label>
    </div>
    <div class="form-floating mb-3">
      <input type="password" class="form-control" id="password"  placeholder="Password" name="password">
      <label for="floatingPassword">Password</label>
    </div>
    <div class="form-floating mb-3">
      <input type="password" class="form-control"  placeholder="confirm Password" id="c_password" name="c_password">
      <label for="floatingPassword">confirm Password</label>
    </div>

    <div class="checkbox mb-3">
      <label>
        <input type="checkbox" value="remember-me"> Remember me
      </label>
    </div>
    <button class="w-100 btn btn-lg btn-primary" type="submit" id="submit-sign-in">Sign Up 
    <div class="spinner-border text-primary" style="display: none;"  id="loader" role="status"></div>
    </button>
    <p class="mt-5 mb-3 text-muted">© 2017–2022</p>
  </form>
</main>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>
<script src="./scripts/authScript.js"></script>