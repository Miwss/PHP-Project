<!DOCTYPE html>
<html>
<head>
    <title>Добро пожаловать!</title>
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
        header {
            background-color: #333;
            color: #fff;
            padding: 10px;
        }

        h1 {
            margin-top: 0;
            color: #333;
        }

        section {
            margin: 20px auto;
            width: 500px;
            background-color: #fff;
            border: 1px solid #ccc;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 5px rgba(0,0,0,0.1);
        }

        p {
            margin-bottom: 10px;
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
    <header>
        <h1>Добро пожаловать!</h1>
    </header>
    <section>
        <p>Здравствуйте, Вы успешно вошли в свой аккаунт.</p>
        <p>Теперь вы можете начать пользоваться нашим сервисом.</p>
        <p><a href="logout.php">Выйти</a></p>
    </section>
    <script>
    setTimeout(function() {
        window.location.href = "index.php";
    }, 2000);
</script>
</body>
</html>
