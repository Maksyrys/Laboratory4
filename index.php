<?php


require_once("maksim_podgornuy_database.php");

session_start();

if(isset($_SESSION))
    $userType = $_SESSION['userType'];
else
    $userType = -1;

    
if(isset($_GET['idMajor']))
    $majorID=$_GET['idMajor'];
else
    $majorID=1;

$resq=$con->query('SELECT majorID, majorName FROM major');
$majors=$resq->fetchALL(PDO::FETCH_ASSOC);

$resq=$con->query('SELECT studentID, majorID, firstName, lastName, gender  FROM student WHERE majorID='.$majorID);
$students=$resq->fetchALL(PDO::FETCH_ASSOC);

$resq=$con->query('SELECT majorID, majorName FROM major WHERE majorID='.$majorID);
$major=$resq->fetch(PDO::FETCH_ASSOC)['majorName'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="main.css">
    <title>Школа кунг-фу Имя Фамилия</title>
</head>
<body>
    <div class = "container">

        <header>
            <h1>Школа кунг-фу Максима Подгорного</h1> 
        </header>
                    <aside>

                        <ul>
                            <h3>Специальности</h3>
                            <?php
                            for($i=0;$i<count($majors);$i++)
                            {
                            ?>
                                <li><a href="index.php?idMajor=<?=$majors[$i]['majorID']?>"><?=$majors[$i]['majorName'];?></a></li>
                            <?php
                            }
                            ?>
                        </ul>
                        <ul>
                            <?php
                            if(!isset($_SESSION['userType']))
                            {
                            ?>
                                <li><a href="maksimka_podgornuy_registration.php">Зарегистрироваться</a></li>
                                <li><a href="maksimka_podgornuy_autorization.php">Войти</a></li>
                            <?php
                            }
                            else
                            {
                            ?>
                                <li><a href="profile.php"><?=$_SESSION['name']?></a></li>
                                <li><a href="logout.php">Выход</a></li>
                            <?php
                            }
                            ?>
                        </ul>

                    </aside>



            <section>
                <h2><?=$major?></h2>
                <table>
                    <thead>
                        <tr>
                            <th>StudentID</th>
                            <th>FirstName</th>
                            <th>lastName</th>
                            <th>gender</th>  
                            <th></th>      
                        </tr>
                    </thead>

                        <?php
                        for($i=0;$i<count($students);$i++)
                        {
                        ?>
                            <tr>
                                <td><?=$students[$i]['studentID']?></td>
                                <td><?=$students[$i]['firstName']?></td>
                                <td><?=$students[$i]['lastName']?></td>
                                <td><?=$students[$i]['gender']?></td>
                                <td>
                                    <?php
                                    if($userType>0)
                                    {
                                    ?>
                                        <a class="delete-button" href="delete_student.php?id=<?=$students[$i]['studentID']?>">Удалить</a>
                                    <?php
                                    }
                                    ?>
                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                </table>
                        <?php
                            if($userType>0)
                            {
                            ?>
                            <p><a href="add_student_form.php">Добавить студента</a></p>
                            <p><a href="maksim_podgornuy_major_list.php">Добавить/Список Специальностей</a></p>
                            <?php
                            }
                            ?>
                    
            </section>

    <footer>
         <p>&copy; 2023 Podgorniy Maksim All Rights Reserved</p>
    </footer>
</body>
</html>