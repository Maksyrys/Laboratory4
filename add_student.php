<?php
require_once("maksim_podgornuy_database.php");


$majorID = $_POST['majorID'];
$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$gender = $_POST['gender'];


$query_check = $con->prepare("SELECT * FROM student WHERE majorID = :majorID AND firstName = :firstName AND lastName = :lastName AND gender = :gender");
$query_check->execute(array('majorID' => $majorID, 'firstName' => $firstName, 'lastName' => $lastName, 'gender' => $gender));

if ($query_check->rowCount() > 0) {

    header('location: maksimka_podgornuy_error.php');
    exit; 
}

$query_insert = $con->prepare("INSERT INTO student(majorID, firstName, lastName, gender) VALUES(:majorID, :firstName, :lastName, :gender)");
$query_insert->execute(array('majorID' => $majorID, 'firstName' => $firstName, 'lastName' => $lastName, 'gender' => $gender));


header('location: index.php?idMajor=' . $majorID);
?>

