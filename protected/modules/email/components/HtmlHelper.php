<?php

class HtmlHelper
{
    static $reff;
    static $images_url;

    public static function construct($reff, $images_url)
    {
        self::$reff = $reff;
        self::$images_url = $images_url;
    }

    public static function download($url)
    {
        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
        $data = curl_exec($curl);
        curl_close($curl);
        return $data;
    }

    public static function get_image_size($url)
    {
        $raw = self::download($url);
        $im = @imagecreatefromstring($raw);

        if (!$im) {
            return null;
        }

        $width = imagesx($im);
        $height = imagesy($im);

        return array($width, $height);
    }

    public static function CodeToHtml($code)
    {
        $code = str_replace("\n", "<br>", $code);

        $code = preg_replace('#\[bold\](.+?)\[/bold\]#sui', '<b>\\1</b>', $code);

        return $code;
    }

    public static function Font($text, $options = array())
    {
        if (isset($options['color']) && $options['color'] == 'red') {
            $options['color'] = '#ed1c29';
        }

        $default_options = array(
            'font' => 'Tahoma',
            'size' => 12,
            'bold' => false,
            'color' => '#000000',
            'underline' => false,
            'line-height' => 14,
            'valign' => null,
            'align' => null,
            'up' => false,
        );

        foreach ($default_options as $option => $value) {
            if (!isset($options[$option]) || empty($options[$option])) {
                $options[$option] = $value;
            }
        }

        if (strlen($options['color']) == 4) {
            $options['color'] = $options['color'] . substr($options['color'], 1);
        }

        if ($options['color'] == '#000000') {
            $options['color'] = '#000001';
        }

        $options['font'] .= ', sans-serif';

        $css_options = array(
            'font-family' => $options['font'],
            'font-size' => $options['size'] . 'px',
            'line-height' => $options['line-height'] . 'px',
            'font-weight' => $options['bold'] ? 'bold' : 'normal',
            'color' => $options['color'],
            'text-decoration' => $options['underline'] ? 'underline' : 'none',
        );

        if ($options['valign']) {
            $css_options['vertical-align'] = $options['valign'];
        }

        if ($options['align']) {
            $css_options['text-align'] = $options['align'];
        }

        if ($options['up']) {
            $css_options['text-transform'] = 'uppercase';
        }

        foreach ($css_options as $option => &$value) {
            $value = $option . ':' . $value;
        }
        $css_options = implode(';', $css_options);


        return '<font ' . ($options['valign'] ? ' valign="' . $options['valign'] . '"' : '') . ($options['align'] ? ' align="' . $options['align'] . '"' : '') . ' face="' . $options['font'] . '" color="' . $options['color'] . '" style="' . $css_options . '">' . $text . '</font>';
    }


    public static function PrintSpacer($width, $height = 0)
    {
        $width = $width == 0 ? '100%' : $width;
        $height = $height == 0 ? '100%' : $height;

        echo '<img src="http://www.mvideo.ru/img/mailer/0.gif" width="' . $width . '" height="' . $height . '"/>';
    }

    public static function prepare_url($url)
    {
        if (strpos($url, 'act=unsubscribe')) {
            return $url;
        }
        $reff = 'reff=' . self::$reff;

        if (substr($url, strlen($url) - strlen($reff)) != $reff) {

            $url = trim(preg_replace('#[(?&)]reff\=.*?[?&$]#sui', '\\1', $url));

            $last_symbol = substr($url, strlen($url) - 1);
            if ($last_symbol == '?' || $last_symbol == '&') {
                $url = substr($url, 0, strlen($url) - 1);
            }

            $url .= strpos($url, '?') ? '&' : '?';
            $url .= $reff;
        }
        return $url;
    }

    public static function Link($url, $label)
    {
        return '<a style="text-decoration: none" href="' . self::prepare_url($url) . '" target="_blank">' . trim($label) . '</a>';
    }


    public static function Image($url, $alt = '', $css_options = array(), $map = null)
    {
        foreach ($css_options as $option => &$value) {
            $value = $option . ':' . $value;
        }
        $css_options = implode(';', $css_options);

        $size = self::get_image_size($url);

        if (!$size) {
            return '';
        }

        return '<img ' . ($map ? 'usemap="#' . $map . '" ' : '') . ($css_options ? 'style="' . $css_options . '"' : '') . ' width="' . $size[0] . '" height="' . $size[1] . '" vspace="0" hspace="0" border="0" src="' . $url . '" alt="' . trim($alt) . '">';
    }

    public static function Banner($file, $url = null, $areas = array())
    {
        if ($url) {
            $url = self::prepare_url($url);
        }

        $banner_src = self::$images_url . $file;

        if (!empty($areas)) {

            $img_id = "img_" . (rand() % 100000);

            $result = self::Image($banner_src, '', array(), $img_id);
            $result .= '<map id="' . $img_id . '" name="' . $img_id . '">';
            foreach ($areas as $coords => $url) {
                $result .= '<area target="_blank" alt="" href="' . self::prepare_url($url) . '" shape="rect" coords="' . $coords . '"/>';
            }
            $result .= '</map>';

            return $result;
        } else {
            $img = self::Image($banner_src);
        }

        if (!$url && empty($areas)) {
            return $img;
        }

        if ($url && empty($areas)) {
            return self::Link($url, $img);
        }

        return $img;
    }
} 