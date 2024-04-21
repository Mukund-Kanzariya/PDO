<?php

include ('../includes/init.php');

$username = $_POST['username']; 
$password = $_POST['password'];
$email = $_POST['email'];
$number = $_POST['number'];

$query = "INSERT INTO user (username, password, email, number) VALUES (?,?,?,?)";
$params=[$username,$password,$email,$number];
$statement = $connection->prepare($query);
$data = $statement->execute($params);

// echo $data;

// $connection->($query);   

// $params = [$username, $password, $email, $number];
// $statement = $connection->prepare($query);
// $data = $statement->execute($params);
// echo $data;