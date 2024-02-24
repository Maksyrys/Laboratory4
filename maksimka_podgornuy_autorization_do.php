<?php
require_once("maksim_podgornuy_database.php");
$login = $_POST['login'];
$password = $_POST['password'];
$hash = password_hash($password, PASSWORD_BCRYPT);

$query = $con->prepare("SELECT password, name, id, userType FROM user WHERE login = :login");
$count = $query->execute(array('login' => $_POST['login']));

if($count != 1)
    header('location:maksimka_podgornuy_autorization.php?err=1');
$row=$query->fetch();

if(!password_verify($password, $hash))
    header('location:maksimka_podgornuy_autorization.php?err=1');   



session_start();
$_SESSION['name'] = $row['name'];
$_SESSION['login'] = $row['login'];
$_SESSION['id'] = $row['id'];
$_SESSION['userType'] = $row['userType'];

header('location: index.php');

?>