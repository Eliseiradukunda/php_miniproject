<?php
require 'db1.php';
$sql = 'SELECT * FROM add_club ';
$statement = $connection->prepare($sql);
$statement->execute();
$clubadded = $statement->fetchAll(PDO::FETCH_OBJ);
 ?>
<?php require 'header1.php'; ?>
<div class="container">
  <div class="card mt-5">
    <div class="card-header">
      <h2>All clubs</h2>
    </div>
    <div class="card-body">
      <table class="table table-bordered">
        <tr>
          <th>ID</th>
          <th>Club_Name</th>
          <th>Club_description</th>
          <th>Club_leader</th>
        
          <th>Action</th>
        </tr>
        <?php foreach($clubadded as $club): ?>
          <tr>
            <td><?= $club->id; ?></td>
            <td><?= $club->club_name; ?></td>
            <td><?= $club->club_description; ?></td>
            <td><?= $club->club_leader; ?></td>
            <td>
              <a href="editclub.php?id=<?= $club->id ?>" class="btn btn-info">Edit</a>
              <a onclick="return confirm('Are you sure you want to delete this entry?')" href="deleteclub.php?id=<?= $club->id ?>" class='btn btn-danger'>Delete</a>
            </td>
          </tr>
        <?php endforeach; ?>
      </table>
    </div>
  </div>
</div>
<a href="header1.php" class="btn btn-info">LOG OUT</a>
<?php require 'footer.php'; ?>
