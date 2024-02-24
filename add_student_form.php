<?php
require_once ("maksim_podgornuy_database.php");
   
$resq=$con->query('SELECT majorID, majorName FROM major');
$majors=$resq->fetchALL(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Добавление студента</title>
    <link rel="stylesheet" href="main.css">
</head>
<body>
    <header>
        <h1>Школа кунг-фу Максима Подгорного</h1> 
    </header>

    <section class="add_student_form">
    <h2>Добавление студента</h2>
        <form action="add_student.php" method="post">
            
        <p><label for="major">Специальность:</label>
        <select id="major" name="majorID" require>
            <?php
                foreach($majors as $el)
                {
                    ?>
                    <option value="<?=$el['majorID']?>"><?=$el['majorName']?></option>
                    <?php
                }
            ?>
        </select></p>
            <p><label for="firstName">Имя:</label><input type='text' value='' id='firstName' name='firstName' require/></p>
            <p><label for="lastName">Фамилия:</label><input type='text' value='' id='lastName' name='lastName' require/></p>
            <p><label for="gender">Пол:</label><input type='radio' value='Ж' id='gender' name='gender' checked />Ж
                                                <input type='radio' value='М' id='gender' name='gender' />М</p>
            <p><input type='submit' value='Добавить'></p>
        </form>
        <p><a href="index.php">Список студентов</a></p>
    </section>
    <footer>
         <p>&copy; 2023 Podgorniy Maksim All Rights Reserved</p>
    </footer>
</body>
</html>