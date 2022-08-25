<?php
$password = "totocacapipilolototololo";
$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

$bool = password_verify($password, $hashedPassword);

var_dump($hashedPassword);
echo "<br>";
var_dump($bool);
?>