<!doctype html>
<html class="" lang="fr">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Mettit</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="public/css/style.css">
  <script defer src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/js/all.min.js"></script>
</head>

<body>
  <header>
    <nav class="navbar navbar-expand-md navbar-dark bg-primary fixed-top">
      <a class="navbar-brand" href="/">Mettit</a>

      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarMenu" aria-controls="navbarMenu" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarMenu">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a class="nav-link" href="/newPost">New Post</a>
          </li>
          <!-- Profil -->
          <li class="nav-item">
            <?php if (isset($_SESSION['username'])) { ?>
              <a class="nav-link" href="/profile">Profile</a>
            <?php } ?>
          </li>
          <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="text" placeholder="Search">
            <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
          </form>
        </ul>
        <ul class="navbar-nav">
          <li class="nav-item">
            <?php if (checkRole($_SESSION['username']) === 1) { ?>
              <a class="nav-link" href="/admin">Admin Panel</a>
            <?php } ?>
          </li>
          <!-- S'inscrire -->
          <li class="nav-item">
            <?php if (!isset($_SESSION['username'])) { ?>
              <a class="nav-link" href="/register">Register</a>
            <?php } ?>
          </li>
          <!-- Connexion/Deconnexion -->
          <li class="nav-item">
            <?php if (isset($_SESSION['username'])) { ?>
              <a class="nav-link" href="/logoutAction">Logout</a>
            <?php } else { ?>
              <a class="nav-link" href="/login">Login</a>
            <?php } ?>
          </li>
        </ul>
      </div>
    </nav>
  </header>