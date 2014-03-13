<?php

class HtmlHelper
{
    public static function CodeToHtml($code)
    {
        $code = str_replace("\n", "<br>", $code);

        $code = preg_replace('#\[bold\](.+?)\[/bold\]#sui', '<b>\\1</b>', $code);

        return $code;
    }
} 