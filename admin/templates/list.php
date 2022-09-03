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

<form action="add.php" method="post">
    <input type="submit" value="Добавить статью">
</form>
<hr>
<?php

foreach ($this->news as $article) { ?>
    <h3><?php echo $article->title; ?></h3>
    <div><?php echo $article->content ?></div><br>
    <?php if (isset($article->author->name)): ?>
        <td><?php echo $article->author->name; ?></td>
    <?php endif; ?>
    <form action="delete.php" method="post">
        <input type="hidden" name="id" value="<?php echo $article->id; ?>">
        <input type="submit" value="Удалить статью">
    </form>
    <br>
    <form action="edit.php?id=<?php echo $article->id; ?>" method="post">
        <input type="submit" value="Изменить статью">
    </form>
    <hr>

<?php }; ?>
</div>
</body>
</html>
