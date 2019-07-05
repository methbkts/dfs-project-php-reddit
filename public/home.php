<?php
require_once 'public/layouts/header.php';

$articles = getAllArticles();
?>

<div class="container col-6">
  <?php foreach ($articles as $key => $value) : ?>
    <div class="card-content align-center card text-white bg-dark mb-3">
      <div class="text-center card-header"> <?= $value["title"] ?> </div>
      <div class="card-body">
        <img class="img-home" src="<?= $value['image'] ?>?random=<?= $key ?>" alt="Card image <?= ++$key ?>">
        <h4 class="card-title"></h4>
        <p class="card-text"> <?= substr($value["content"], 0, 140) ?></p>
      </div>
      <div class="card-footer">
        <h5 class="card-subtitle mb-2 text-white"><?= $value["category"] ?></h5>
        <h6 class="card-subtitle mb-2 text-white">Written By <strong><?= $value["author"] ?></strong> - <?= $value["date"] ?></h6>
      </div>
    </div>
  <?php endforeach ?>
</div>

<?php require_once 'public/layouts/footer.php'; ?>