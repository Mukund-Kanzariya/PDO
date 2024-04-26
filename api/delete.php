<?php

$id=$_GET['deleteid'];

include('../includes/init.php');

$query="DELETE FROM `user` WHERE id='$id'";

$statement=$connection->prepare($query);
$statement->execute();

header("location:../index.php");

?>