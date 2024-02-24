User
<?php
require_once("maksim_podgornuy_database.php");
$login = $_POST['login'];
$name = $_POST['name'];
$password = $_POST['password'];
$hash = password_hash($password, PASSWORD_BCRYPT);
if((strlen($_POST['login'])==0)||(strlen($_POST['name'])==0)||(strlen($_POST['password'])==0))
    header('location: maksimka_podgornuy_registration.php?err=1');

$query = $con->prepare("INSERT INTO user( login, name, password, userType) VALUES(:login, :name, :password, 0)");
$count = $query->execute(array('login' => $login, 'name' => $name, 'password' => $hash));
 
if($count != 1)
    header('location:maksimka_podgornuy_registration.php?err=2');

//старт сессии
session_start();
$_SESSION['name'] = $name;
$_SESSION['login'] = $login;
$_SESSION['id'] = $con->lastInsertId();
$_SESSION['userType'] = 0;

header('location: index.php');

?>