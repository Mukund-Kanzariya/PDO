<?php

include('../includes/init.php');

$id=$_POST['id'];
$username=$_POST['username'];
$password=$_POST['password'];
$email=$_POST['email'];
$number=$_POST['number'];

$query="UPDATE user SET username=?, password=?, email=?, number=? WHERE id=?";
$params=[$username,$password,$email,$number,$id];

$statement=$connection->prepare($query);
$statement->execute($params);

?>