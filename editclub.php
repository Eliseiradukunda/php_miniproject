<?php
require 'db1.php';
$id = $_GET['id'];
$sql = 'SELECT * FROM add_club WHERE id=:id';
$statement = $connection->prepare($sql);
$statement->execute([':id' => $id ]);
$clubadded = $statement->fetch(PDO::FETCH_OBJ);
if (isset ($_POST['club_name'])  && isset($_POST['club_description']) && isset($_POST['club_leader'])) {
 $club_name = $_POST['club_name'];
  $club_description = $_POST['club_description'];
  $club_leader = $_POST['club_leader'];
 
  $sql = 'UPDATE add_club SET club_name=:club_name, club_description=:club_description, club_leader=:club_leader WHERE id=:id';
  $statement = $connection->prepare($sql);
  if ($statement->execute([':club_name' => $club_name, ':club_description' => $club_description, ':club_leader' => $club_leader, ':id' => $id])) {
    header("Location: /elise");
  }



}


 ?>
<?php require 'header1.php'; ?>
<div class="container">
  <div class="card mt-5">
    <div class="card-header">
      <h2>Update person</h2>
    </div>
    <div class="card-body">
      <?php if(!empty($message)): ?>
        <div class="alert alert-success">
          <?= $message; ?>
        </div>
      <?php endif; ?>
      <form method="post">
        <div class="form-group">
          <label for="club_name">club_name</label>
          <input value="<?= $clubadded->club_name; ?>" type="text" name="club_name" id="club_name" class="form-control">
        </div>
        <div class="form-group">
          <label for="club_description">club_description</label>
          <input type="text" value="<?= $clubadded->club_description; ?>" name="club_description" id="club_description" class="form-control">
        </div>
        <div class="form-group">
          <label for="club_leader">club_leader</label>
          <input type="text" value="<?= $clubadded->club_leader; ?>" name="club_leader" id="club_leader" class="form-control">
       
       
        <div class="form-group">
          <button type="submit" class="btn btn-info">Update a club</button>
        </div>
      </form>
    </div>
  </div>
</div>
<a href="header1.php" class="btn btn-info">LOG OUT</a>
<a href="selectclub.php" class="btn btn-info">qwit editing</a>
<?php require 'footer.php'; ?>
