<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ошибка</title>    
    <link rel="stylesheet" href="main.css">
</head>
<body>
    <?php
    require_once("maksim_podgornuy_database.php");
    $id=$_GET['id'];

    // Проверяем, есть ли записи в таблице student, связанные с удаляемым majorID
    $query_check_students = $con->prepare("SELECT COUNT(*) FROM student WHERE majorID = :id");
    $query_check_students->execute(array(':id' => $id));
    $student_count = $query_check_students->fetchColumn();

    if ($student_count == 0) {
        $query_delete_major = $con->prepare("DELETE FROM major WHERE majorID = :id");
        $query_delete_major->execute(array(':id' => $id));
        
        // Перенаправляем пользователя на список major после успешного удаления
        header('Location: maksim_podgornuy_major_list.php');
        exit(); // После перенаправления необходимо завершить выполнение скрипта
    } else {
        ?>
            <p>Ошибка: Невозможно удалить major, так как есть связанные записи в таблице student.</p>
            <p><a href="index.php">Вернуться к форме</a></p>
        <?php
    }
    ?>
</body>
</html>




