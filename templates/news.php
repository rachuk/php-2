<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>News</title>
</head>
<body>
<h1>News' list</h1>

<?php

foreach ($this->data['news'] as $article) { ?>
    <article>
        <a href="article.php?id=<?php echo $article->id; ?>"> <?php echo $article->title; ?></a><br>
        <?php echo $article->content; ?> <br><br>
    </article>
<?php } ?>

</body>
</html>
