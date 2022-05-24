<?php
require 'db1.php';
$id = $_GET['id'];
$sql = 'DELETE FROM addmembertb WHERE id=:id';
$statement = $connection->prepare($sql);
if ($statement->execute([':id' => $id])) {
  header("Location: /elise/selectmember.php");
}