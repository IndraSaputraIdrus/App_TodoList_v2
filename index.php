<?php

session_start();
require_once __DIR__ .  '/function/queryAllData.php';

if (queryAllData()) {
  $rows = queryAllData();
  $no = 1;
}


?>

<?php require_once __DIR__ . '/templates/header.php'; ?>
<div class="container">

  <div class="wrapper d-flex flex-column justify-content-center align-items-center" style="height: 100vh;">

    <div class="form" style="width: 25rem;">

      <?php if (isset($_SESSION['alert'])) : ?>
        <div class="alert alert-<?= $_SESSION['alert']['tipe']; ?> alert-dismissible fade show" role="alert">
          <?= $_SESSION['alert']['pesan']; ?>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <?php unset($_SESSION['alert']); ?>
      <?php endif; ?>



      <form action="function/add.php" method="post">

        <div class="form-group">
          <input type="text" class="form-control" name="add" placeholder="Add Todo List..." autocomplete="off" autofocus>
          <button type="submit" class="mt-2 btn btn-primary btn-block" name="submit">Add Todo List</button>
        </div>

      </form>
    </div>

    <div class="card border-dark" style="width: 25rem;">
      <div class="card-header text-center">
        <h2>Todo List</h2>
      </div>
      <ul class="list-group list-group-flush">

        <?php foreach ($rows as $row) : ?>
          <li class="list-group-item">
            <?= $no++; ?>. <?= $row['todo_list']; ?>
            <a href="function/delete.php?id=<?= $row['id']; ?>" class="badge badge-danger float-right" onclick="return confirm('yakin?');">Delete</a>
          </li>
        <?php endforeach; ?>

      </ul>
    </div>
  </div>

</div>
<?php require_once 'templates/footer.php'; ?>