<?php
require_once('public/layouts/header.php');

if (isset($_SESSION['username']) && checkRole($_SESSION['username']) === 1) { ?>
  <div class="container">
    <h1>Admin panel</h1>
    <h2><?= 'Welcome ' . $_SESSION['username'] . ' !'; ?></h2>
  </div>
<?php } else {
  header('Location: /login');
}

require_once 'public/layouts/footer.php';
