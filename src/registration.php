<?php
// подключаемся к базе данных
$mysqli = new mysqli("db", "root", "example", "reglog");

// проверяем, удалось ли подключение к базе данных
if ($mysqli->connect_errno) {
    die("Не удалось подключиться к базе данных: " . $mysqli->connect_error);
}
if (isset($_POST["submit"])){
    header("Location: listLogin.php");
}
// проверяем, была ли отправлена форма регистрации
if (isset($_POST["submit"])) {
    // получаем данные из формы
    $name = $_POST["name"];
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    // хэшируем пароль для безопасности
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // создаем запрос на добавление нового пользователя в базу данных
    $query = "INSERT INTO users (name, username, email, password) VALUES ('name', '$username', '$email', '$hashed_password')";

    // отправляем запрос на сервер базы данных
    if ($mysqli->query($query) === TRUE) {
        echo "Регистрация прошла успешно!";
    } else {
        echo "Ошибка: " . $query . "<br>" . $mysqli->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Регистрация пользователя</title>
    <style>
        body {
            background-color: #f8f8f8;
            font-family: Arial, sans-serif;
            font-size: 14px;
            line-height: 1.5;
            color: #333;
            padding: 0;
            margin: 0;
        }
        /* header {
            background-color: #333;
            color: #fff;
            padding: 10px;
        } */

        h1 {
            margin-top: 0;
            color: #333;
        }

        form {
            margin: 20px auto;
            width: 300px;
            background-color: #fff;
            border: 1px solid #ccc;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 5px rgba(0,0,0,0.1);
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"] {
            width: 100%;
            height: 30px;
            padding: 5px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #333;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 3px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #555;
        }

        a {
            color: #333;
        }

        a:hover {
            color: #555;
        }
        
    </style>
</head>
<body>
<h1>Регистрация пользователя</h1>
    <form method="post" action="">
        <label for="name">Имя:</label>
        <input type="text" name="name" required><br><br>
        <label for="username">Имя пользователя:</label>
        <input type="text" name="username" required><br><br>
        <label for="email">E-mail:</label>
        <input type="email" name="email" required><br><br>
        <label for="password">Пароль:</label>
        <input type="password" name="password" required><br><br>
        <input type="submit" name="submit" value="Зарегистрироваться">
        <a href="welcome.php">Вход</a>
    </form>
</body>
</html>