<?php
require_once 'public/layouts/header.php';
?>

<?php if (isset($_SESSION['username'])) {
  header('Location: /profile'); ?>
<?php } else { ?>
  <div class="container col-6">
    <form class="form-login" action="/registerAction" method="post">
      <h2 class="my-4 text-center">You need to register first</h2>
      <label for="username" class="sr-only">Username</label>
      <input type="input" name="username" class="form-control" placeholder="Username" required autofocus>
      <label for="password" class="sr-only">Password</label>
      <input type="password" name="password" class="form-control" placeholder="Password" minlength="4" required>
      <div class="checkbox mb-3">
        <label for="remember-me">Remember me</label>
        <input type="checkbox" name="remember-me" value="remember-me">
      </div>
      <button class="btn btn-lg btn-primary btn-block" type="submit">Register</button>
    </form>
  </div>
<?php } ?>

<?php require_once 'public/layouts/footer.php'; ?>