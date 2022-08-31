<?php

require __DIR__ . '/../autoload.php';

$db = new \App\Db();
$sql1 = "UPDATE news SET 
        title=
        'Новая интересная статья', 
        content=
        'Текст с какой-то новой очень интересной статьей'
        WHERE id=2";

var_dump($db->execute($sql1, []));

$sql2 = "INSERT INTO news (title, content) VALUES ( 
        'Еще одно название статьи',
                                          
        'Третья статья о чем-то'
        )";

var_dump($db->execute($sql2, []));
