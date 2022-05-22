<?php
require 'db1.php';
include 'include1.php';
$sql = 'SELECT * FROM addmembertb ';
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
          <th>firstname</th>
          <th>lastname</th>
          <th>phone</th>
        
          <th>Action</th>
        </tr>
        <?php foreach($clubadded as $club): ?>
          <tr>
            <td><?= $club->id; ?></td>
            <td><?= $club->firstname; ?></td>
            <td><?= $club->lastname; ?></td>
            <td><?= $club->phone; ?></td>
            <td>
              <a href="updatemeber.php?id=<?= $club->id ?>" class="btn btn-info">Edit</a>
              <a onclick="return confirm('Are you sure you want to delete this entry?')" href="deletemember.php?id=<?= $club->id ?>" class='btn btn-danger'>Delete</a>
            </td>
          </tr>
        <?php endforeach; ?>
      </table>
    </div>
  </div>
</div>
<a href="addclubmember.php" class="btn btn-info">add new member</a>
<a href="header1.php" class="btn btn-info">log out</a>
<?php require 'footer.php'; ?>
