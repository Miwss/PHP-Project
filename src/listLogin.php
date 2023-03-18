<?php
if (isset($_POST["login"])) {
    // удаляем данные пользователя из сессии
    header("Location: login.php");
    exit;
}
if (isset($_POST["loginAdmin"])){
    header("Location: LoginAdmin.php");
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
    </header>
    <div class="container">
            <form method="post" action="">
                <input type="submit" name="login" value="Войти">
                <input type="submit" name="loginAdmin" value="Админ Панель">
            </form>
    </div>
</body>
</html>
