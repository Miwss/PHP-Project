<?php
// подключаемся к базе данных
$mysqli = new mysqli("db", "root", "example", "reglog");

// проверяем, удалось ли подключение к базе данных
if ($mysqli->connect_errno) {
    die("Не удалось подключиться к базе данных: " . $mysqli->connect_error);
}

// проверяем, была ли отправлена форма входа
if (isset($_POST["login"])) {
    // получаем данные из формы
    $username = $_POST["username"];
    $password = $_POST["password"];

    // создаем запрос на выборку пользователя из базы данных
    $query = "SELECT * FROM users WHERE username='$username'";

    // отправляем запрос на сервер базы данных
    $result = $mysqli->query($query);

    // проверяем, найден ли пользователь с таким именем
    if ($result->num_rows == 1) {
        // получаем данные о пользователе из результата выборки
        $row = $result->fetch_assoc();

        // проверяем, совпадает ли хэш пароля с введенным паролем
        if ($username === "root" && $password === "root") {
            // если пароли совпадают, сохраняем данные пользователя в сессии
            session_start();
            $_SESSION["user_id"] = $row["id"];
            $_SESSION["username"] = $row["username"];
            header("Location: adminPanel.php");
            exit;
        } else {
            echo "Неверный пароль";
        }
    } else {
        echo "Пользователь с таким именем не найден";
    }
}

// проверяем, была ли отправлена форма выхода
if (isset($_POST["logout"])) {
    // удаляем данные пользователя из сессии
    session_start();
    session_unset();
    session_destroy();
    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Вход/выход</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 16px;
            line-height: 1.5;
            margin: 0;
            padding: 0;
            background-color: #f5f5f5;
        }

        header {
            background-color: #333;
            color: #fff;
            padding: 10px;
        }

        h1 {
            margin: 0;
            font-size: 24px;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }

        label {
            display: block;
            margin-bottom: 10px;
        }

        input[type="text"],
        input[type="password"],
        input[type="submit"] {
            display: block;
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #333;
            color: #fff;
            border: none;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #555;
        }

        p {
            margin: 0;
        }

        a {
            color: #333;
        }
    </style>
</head>
<body>
<header>
        <h1>Панель Администратора</h1>
    </header>
    <div class="container">
        <?php if (isset($_SESSION["user_id"])): ?>
            <p>Вы вошли как <?php echo $_SESSION["username"]; ?> (<a href="#" onclick="document.getElementById('logout-form').submit()">выйти</a>)</p>
            <form id="logout-form" method="post" action="">
                <input type="hidden" name="logout">
            </form>
        <?php else: ?>
            <h2>Вход</h2>
            <form method="post" action="">
                <label for="username">username:</label>
                <input type="text" name="username" required>
                <label for="password">Password:</label>
                <input type="password" name="password" required>
                <input type="submit" name="login" value="Войти">
            </form>
        <?php endif; ?>
    </div>
</body>
</html>
