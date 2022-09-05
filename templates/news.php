<?php
    /** @var \App\View $this */
?>

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
<a href="/admin/"><b>Админ-панель</b></a>
    <h1>News' list</h1>

    <?php foreach ($this->news as $article) { ?>
        <article>
            <h2>
                <a href="/index/article/action?id=<?php echo $article->id; ?>">
                    <?php echo $article->title; ?>
                </a>
            </h2>
            <p><?php echo $article->content; ?></p>
        <?php if (isset($article->author->name)): ?>
            <td><?php echo $article->author->name; ?></td>
        <?php endif; ?>
        </article>
        <hr>
    <?php } ?>

</body>
</html>
