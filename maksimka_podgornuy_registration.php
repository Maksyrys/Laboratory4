<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="main.css">
</head>
<body>
    <div>
        <header>
            <h1>Регистрация</h1> 
            <?php
            if(isset($_GET['err']))
                switch($_GET['err'])
            {
                case 1: echo '<p>Ошибка ввода данных</p>';
                        break;
                case 2: echo '<p>Такой пользователь уже зарегистрирован</p>';
                        break;
            }



            ?>
            <form action="maksimka_podgornuy_registration_do.php" method="post">
                <p><label for="login">Логин</label><input type="text" name="login" id="login" require></p>
                <p><label for="name">Имя</label><input type="text" name="name" id="name" require></p>
                <p><label for="password">Пароль</label><input type="text" name="password" id="password" require></p>
                <p><input type="submit" value="Зарегистрироваться"></p>
            </form>
        </header>


    </div>
</body>
</html>