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
    <?php
    if (!empty($article)) {
        ?>
        <h1>Редактировать новость</h1>
        <form action="edit.php" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo $article->id; ?>">
            <input type="text" name="title" value="<?php echo $article->title; ?>"><br><br>
            <textarea name="content" cols="30" rows="10"><?php echo $article->content; ?></textarea><br><br>
            <button type="submit">Редактировать</button>
        </form>
        <?php
    } ?>
</div>
</body>
</html>
