<?php

namespace App;

class View implements \Countable, \Iterator
{
    use ViewTrate;

    public function render($template)
    {
        ob_start();
        include $template;
        $content = ob_get_contents();
        ob_end_clean();
        return $content;
    }

    public function display($template)
    {
        echo $this->render($template);
    }


    public function count(): int
    {
        return count($this->data);
    }

    public function current(): mixed
    {
        return current($this->data);
    }

    public function next(): void
    {
        next($this->data);
    }

    public function key(): mixed
    {
        return key($this->data);
    }

    public function valid(): bool
    {
        return (false !== $this->current());
    }

    public function rewind(): void
    {
        reset($this->data);
    }
}