<?php

namespace App\Models;

use App\Model;


class Article extends Model
{
    public const TABLE = 'news';

    public $title;
    public $content;
    public $author_id;

    /**
     * @param string $name
     * @return false|mixed|void
     */
    public function __get(string $name)
    {
        if ('author' == $name && !empty($this->author_id)) {
            return Author::findById($this->author_id);
        }
    }

    /**
     * @param $name
     * @return bool
     */
    public function __isset($name)
    {
        if ('author' == $name && !empty($this->author_id)) {
            return true;
        } else {
            return false;
        }
    }
}