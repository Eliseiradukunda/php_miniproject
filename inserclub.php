<?php
require 'db1.php';

$message = '';
if (isset ($_POST['club_name'])  && isset($_POST['club_description']) && isset($_POST['club_leader']) && isset($_POST['username']) && isset($_POST['password'])) {
  $club_name = $_POST['club_name'];
  $club_description = $_POST['club_description'];
  $club_leader = $_POST['club_leader'];
   $username = $_POST['username'];
   $password = $_POST['password'];


  $sql = 'INSERT INTO add_club(club_name, club_description, club_leader, username, password) VALUES(:club_name, :club_description, :club_leader, :username, :password )';
  $statement = $connection->prepare($sql);
  if ($statement->execute([':club_name' => $club_name, ':club_description' => $club_description, ':club_leader' => $club_leader, ':username' => $username, ':password' => $password ])) {
   header("Location: /elise");
  }



}


 ?>
<?php require 'header1.php'; ?>
<div class="container">
  <div class="card mt-5">
    <div class="card-header">
      <h2>add a club</h2>
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
          <input type="text" name="club_name" id="club_name" class="form-control">
        </div>
        <div class="form-group">
          <label for="club_description">club_description</label>
          <input type="text" name="club_description" id="club_description" class="form-control">
        </div>
         <div class="form-group">
          <label for="club_leader">club_leader</label>
          <input type="text" name="club_leader" id="club_leader" class="form-control">
        </div>
        </div>
         <div class="form-group">
          <label for="username">username</label>
          <input type="text" name="username" id="username" class="form-control">
        </div>
        <div class="form-group">
          <label for="password">password</label>
          <input type="text" name="password" id="password" class="form-control">
        </div>

        <div class="form-group">
          <button type="submit" class="btn btn-info">add a club</button>
          <a href="header1.php" class="btn btn-info">LOG OUT</a>
        </div>
      </form>
    </div>
  </div>
</div>
<div class="form-group">
          
        </div>

<?php require 'footer.php'; ?>
