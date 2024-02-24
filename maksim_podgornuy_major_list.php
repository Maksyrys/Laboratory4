<?php
    
require_once("maksim_podgornuy_database.php");

$resq=$con->query('SELECT majorID, majorName FROM major');
$majors=$resq->fetchALL(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Школа кунг-фу Имя Фамилия</title>
    <link rel="stylesheet" href="main.css">
</head>
<body>
    <header>
        <h1>Школа кунг-фу Максима Подгорного</h1> 
    </header>

    <section>
        <h3>Список Специальностей</h3>
            <table>
                <thead>
                    <tr>
                        <th>Name</th>
                        <th></th>    
                    </tr>
                </thead>

                <?php
                for($i=0;$i<count($majors);$i++)
                {
                ?>
                    <tr>
                        <td><?=$majors[$i]['majorName']?></td>
                        <td>
                            <a href="maksimka_podgornuy_delete_major.php?id=<?=$majors[$i]['majorID']?>">Удалить</a>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </table>
        <h3>Добавить Специальности</h3>
            <form method="post" action="maksimka_podgornuy_add_major.php">
                <input type="text" name="majorName">
                <button type="submit">Отправить</button>
            </form>
        <p><a href="index.php">Список студента</a></p>
    </section>
    <footer>
         <p>&copy; 2023 Podgorniy Maksim All Rights Reserved</p>
    </footer>
</body>
</html>