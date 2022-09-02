<?php

namespace App;

class View
{
    protected $data = [];

    public function set($name, $value)
    {
        return $this->data[$name] = $value;
    }

    public function display($template)
    {
        include $template;
    }

    public function render($template)
    {
        ob_start();
        include $template;
        $content = ob_get_contents();
        ob_end_clean();
        return $content;
    }
}