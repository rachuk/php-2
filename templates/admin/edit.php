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
    if (!empty($this->article)) {
        ?>
        <h1>Редактировать новость</h1>
        <form action="/admin/edit/action" method="POST" enctype="multipart/form-data">
            <input type="text" name="id" value="<?php echo $this->article->id; ?>">
            <input type="text" name="title" value="<?php echo $this->article->title; ?>"><br><br>
            <textarea name="content" cols="30" rows="10"><?php echo $this->article->content; ?></textarea><br><br>
            <input type="text" name="author" value="<?php if (isset($this->article->author_id)): ?>
<?php echo $this->article->author_id; ?><?php endif; ?>"><br><br>
<!--            <input type="text" name="author" value="--><?php //echo $article->author->name; ?><!--"><br><br>-->
            <button type="submit">Редактировать</button>
        </form>
        <?php
    } ?>
</div>
</body>
</html>
