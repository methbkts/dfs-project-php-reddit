<?php
require_once('public/layouts/header.php');

$categories = getAllCategories();
// $user = getAllUsers();

if (isset($_SESSION['username'])) { ?>
  <!-- </br> -->
  <div class="container col-6">
    <div class="col card border-secondary mb-3" style="max-width: 50rem;">
      <div class="card-body">
        <form action="/newPostAction" method="POST">
          <fieldset>
            <h2>Create a new post</h2>
            <div class="form-group">
              <label for="title" class="sr-only">Title</label>
              <input type="input" class="form-control" name="title" aria-describedby="title" placeholder="Title">
            </div>
            <div class="form-group">
              <label for="category" class="sr-only">Category</label>
              <select class="form-control" id="categories">
                <?php foreach ($categories as $key => $value) : ?>
                  <option><?= $value["name"] ?></option>
                <?php endforeach ?>
              </select>
            </div>
            <div class="form-group">
              <label for="content" class="sr-only">Content</label>
              <textarea class="form-control" name="content" rows="3" placeholder="Write the content here"></textarea>
            </div>
            <div class="form-group">
              <label for="image" class="sr-only">Image</label>
              <input type="input" class="form-control" name="image" aria-describedby="image" placeholder="image">
            </div>
            <fieldset class="form-group">
            </fieldset>
            <button type="submit" class=" btn btn-primary">Submit</button>
          </fieldset>
        </form>
      </div>
    </div>
  </div>

<?php } else {
  header('Location: /login');
}
require_once 'public/layouts/footer.php'; ?>