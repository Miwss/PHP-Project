<?php
// Старт сессии
session_start();

// Уничтожение сессии
session_destroy();

// Перенаправление на страницу входа
header("location: listLogin.php");
exit;
?>