<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div>
        <header>
            <h1>Авторизация</h1> 
            <?php
            if(isset($_GET['err']))
                switch($_GET['err'])
            {
                case 1: echo '<p>Нет такого пользователя или неверный пароль</p>';
                        break;
                case 2: echo '<p>Такой пользователь уже зарегистрирован</p>';
                        break;
            }
            ?>
            <form action="maksimka_podgornuy_autorization_do.php" method="post">
                <p><label for="login">Логин</label><input type="text" name="login" id="login" require></p>
                <p><label for="password">Пароль</label><input type="text" name="password" id="password" require></p>
                <p><input type="submit" value="Войти"></p>
            </form>
        </header>


    </div>
</body>
</html>