

<?php
require_once("maksim_podgornuy_database.php");

if(isset($_POST['majorName']) && trim($_POST['majorName']) !== '') {
    // Если поле не пустое, выполняем вставку в базу данных
    $query = $con->prepare("INSERT INTO major(majorName) VALUES(:majorName)");
    $query->execute(array('majorName' => $_POST['majorName']));
    header('Location: maksim_podgornuy_major_list.php');
    exit();
} else {
    // Если поле пустое или содержит только пробелы, перенаправляем на страницу с ошибкой
    header('Location: maksimka_podgornuy_error.php');
    exit();
}
?>