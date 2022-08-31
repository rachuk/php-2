<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $article[0]->title; ?></title>
</head>
<body>
<a href="index.php"><h1> New's list</h1></a>

<h2><?php echo $article[0]->title; ?></h2>

<article>
    <?php echo $article[0]->content; ?>
</article>

<br>

</body>
</html>
