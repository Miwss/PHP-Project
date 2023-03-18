<?php
if(isset($_POST['submit'])){
	$file_name = $_FILES['file']['name'];
	$file_size = $_FILES['file']['size'];
	$file_tmp = $_FILES['file']['tmp_name'];
	$file_type = $_FILES['file']['type'];
	$target_dir = "uploads/";
	$target_file = $target_dir . basename($_FILES["file"]["name"]);

	move_uploaded_file($file_tmp, $target_file);
	echo "Файл ".$file_name." загружен на сервер";
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Скачать файл</title>
</head>
<body>
	<h1>Скачать файл</h1>
	<a href="uploads/file_name">Скачать файл</a>
</body>
</html>
