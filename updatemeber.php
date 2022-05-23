<?php
require 'db1.php';
$id = $_GET['id'];
$sql = 'SELECT * FROM addmembertb WHERE id=:id';
$statement = $connection->prepare($sql);
$statement->execute([':id' => $id ]);
$clubadded = $statement->fetch(PDO::FETCH_OBJ);
if (isset ($_POST['firstname'])  && isset($_POST['lastname']) && isset($_POST['phone'])) {
 $firstname = $_POST['firstname'];
  $lastname = $_POST['lastname'];
  $phone = $_POST['phone'];
 
  $sql = 'UPDATE addmembertb SET firstname=:firstname, lastname=:lastname, phone=:phone WHERE id=:id';
  $statement = $connection->prepare($sql);
  if ($statement->execute([':firstname' => $firstname, ':lastname' => $lastname, ':phone' => $phone, ':id' => $id])) {
    header("Location: /elise/selectmember.php");
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
          <label for="firstname">firstname</label>
          <input type="text" value="<?= $clubadded->firstname; ?>" name="firstname" id="club_description" class="form-control">
        </div>
        <div class="form-group">
          <label for="lastname">lastname</label>
          <input type="text" value="<?= $clubadded->lastname; ?>" name="lastname" id="lastname" class="form-control">
            <div class="form-group">
          <label for="phone">club_name</label>
          <input value="<?= $clubadded->phone; ?>" type="text" name="phone" id="phone" class="form-control">
        </div>
       
        <div class="form-group">
          <button type="submit" class="btn btn-info">Update a club member</button>
        </div>
      </form>
    </div>
  </div>
</div>
<a href="header1.php" class="btn btn-info">LOG OUT</a>
<a href="selectmember.php" class="btn btn-info">qwit editing</a>
<?php require 'footer.php'; ?>
