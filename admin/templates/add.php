<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Админ панель новостей</title>
</head>
<body>
<div class="container">
    <h1>Добавить новость</h1>
    <form action="add.php" method="POST" enctype="multipart/form-data">
        <input type="text" name="title" value=""><br><br>
        <textarea name="content" cols="30" rows="10"></textarea><br><br>
        <input type="text" name="author" value=""><br>
        <button type="submit">Добавить</button>
    </form>
</div>
</body>
</html>
