<?php
require 'db1.php';
$id = $_GET['id'];
$sql = 'DELETE FROM add_club WHERE id=:id';
$statement = $connection->prepare($sql);
if ($statement->execute([':id' => $id])) {
  header("Location: /elise/selectclub.php");
}