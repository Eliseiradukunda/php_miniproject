<?php
require 'db1.php';
$message = '';
if (isset ($_POST['firstname'])  && isset($_POST['lastname']) && isset($_POST['phone'])) {
  $firstname = $_POST['firstname'];
  $lastname = $_POST['lastname'];
  $phone = $_POST['phone'];


  $sql = 'INSERT INTO addmembertb(firstname, lastname, phone) VALUES(:firstname, :lastname, :phone )';
  $statement = $connection->prepare($sql);
  if ($statement->execute([':firstname' => $firstname, ':lastname' => $lastname, ':phone' => $phone ])) {
   header("Location: /elise/selectmember.php");
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
          <label for="firstname">firstname</label>
          <input type="text" name="firstname" id="firstname" class="form-control">
        </div>
        <div class="form-group">
          <label for="lastname">lastname</label>
          <input type="text" name="lastname" id="lastname" class="form-control">
        </div>
         <div class="form-group">
          <label for="phone">phone</label>
          <input type="text" name="phone" id="phone" class="form-control">
        <div class="form-group">
          <button type="submit" class="btn btn-info">add a club</button>
        </div>
      </form>
    </div>
  </div>
</div>
<div>
<a href="selectmember.php" class="btn btn-info">back</a>
        </div>
<?php require 'footer.php'; ?>
