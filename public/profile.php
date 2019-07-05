<?php
require_once('public/layouts/header.php');

if (isset($_SESSION['username'])) { ?>
  <div class="container">
    <h1>Profile page</h1>
    <h2><?= 'Welcome ' . $_SESSION['username'] . ' !'; ?></h2>
  </div>
<?php } else {
  header('Location: /login');
}

require_once 'public/layouts/footer.php';
