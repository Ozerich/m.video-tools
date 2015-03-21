<?php

abstract class ImportBlock
{
    abstract function saveToLetter($letter, $position = null);

    protected function htmlToCode($html)
    {
        $html = preg_replace("#<br/*>#sui", "\n", $html);

        $html = preg_replace("#<b>(.+?)</b>#sui", "[bold]\\1[/bold]", $html);

        return $html;
    }
}