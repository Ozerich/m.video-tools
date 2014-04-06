<?php

class HtmlHelper
{
    static $reff;
    static $images_url;
    static $utm_campaign;
    static $region;

    public static function construct($reff, $region, $images_url, $utm_campaign)
    {
        self::$reff = $reff;
        self::$region = $region;
        self::$utm_campaign = $utm_campaign;
        self::$images_url = $images_url;
    }

    public static function GetCabinetUrl()
    {
        return empty(self::$region) || (self::$region != 'MB' && self::$region != 'RB') ? 'http://www.mvideo.ru/cabinet/' : 'http://www.mvideo-bonus.ru/personal/login/';
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
        $code = preg_replace('#\[center\](.+?)\[/center\]#sui', '<center>\\1</center>', $code);
        $code = preg_replace_callback('#\[size (\d+)\](.+?)\[/size\]#sui', function ($matches) {
            return self::Font($matches[2], array('size' => $matches[1]));
        }, $code);

        if (preg_match_all('#\[url="*(.+?)"*\](.+?)\[/url\]#sui', $code, $links, PREG_SET_ORDER)) {
            foreach ($links as $link) {
                $code = str_replace($link[0], self::Link($link[1], self::Font($link[2], array('color' => '#ed1c29'))), $code);
            }
        };

        return str_replace('&nbsp;', ' ',Yii::app()->decoda->parse($code));
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
            'line-height' => 'normal',
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
            'line-height' => is_numeric($options['line-height']) ? $options['line-height'] . 'px' : $options['line-height'],
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

    public static function prepare_url($url, $utm_content = null)
    {
        $utm_content = str_replace(' ','', $utm_content);
        $parts = parse_url($url);
        $query = null;
        if (isset($parts['query'])) {
            parse_str($parts['query'], $query);
        }

        if ($query && isset($query['utm_content'])) {
            $utm_content = $query['utm_content'];
        }

        $params = array(
            'reff' => self::$reff.'_'.self::$utm_campaign,
            'cyEmail' => '$pers_3$'
        );

        if ($utm_content) {
            $params['utm_source'] = 'Action_mail';
            $params['utm_medium'] = 'email';
            $params['utm_campaign'] = self::$utm_campaign;
            $params['utm_content'] = $utm_content;
            $params['reff'] .= '_' . $utm_content;
        }


        if ($query) {
            foreach ($query as $key => $value) {
                if (!isset($params[$key])) {
                    $params[$key] = $value;
                }
            }
            $url = str_replace('?' . $parts['query'], '', $url);
        }

        $param_str = array();
        foreach ($params as $key => $value) {
            $param_str[] = $key . '=' . $value;
        }
        $param_str = implode('&', $param_str);

        return $url . (strpos($url, '?') ? '&' : '?') . $param_str;
    }

    public static function Link($url, $label, $utm_content = null, $title = '')
    {
        if ((strpos($url, 'http://') !== false && strpos($url, 'mvideo.ru') == false) || strpos($url, '@') || strpos($url, 'unsubscribe')) {

        } else {
            $url = self::prepare_url($url, $utm_content);
        }

        return '<a title="'.$title.'" style="text-decoration: none" href="' . $url . '" target="_blank">' . trim($label) . '</a>';
    }


    public static function Image($url, $alt = '', $css_options = array(), $map = null, &$sizes = array())
    {
        foreach ($css_options as $option => &$value) {
            $value = $option . ':' . $value;
        }
        $css_options = implode(';', $css_options);

        $sizes = self::get_image_size($url);

        if (!$sizes) {
            return '';
        }

        return '<img ' . ($map ? 'usemap="#' . $map . '" ' : '') . ($css_options ? 'style="' . $css_options . '"' : '') . ' width="' . $sizes[0] . '" height="' . $sizes[1] . '" vspace="0" hspace="0" border="0" src="' . $url . '" alt="' . trim($alt) . '">';
    }

    public static function Banner($file, $url = null, $areas = array(), $utm_content = null, $alt = '')
    {
        if ($url) {
            $url = self::prepare_url($url, $utm_content);
        }

        if (strpos($file, ';') !== false) {
            $files = explode(';', $file);
            $result = '<table cellpadding="0" cellspacing="0" border="0" width="100%"><tr>';
            foreach ($files as $ind => $file) {
                $sizes = array();
                $img = self::Image(self::$images_url . trim($file), $alt, array(), null, $sizes);

                $result .= '<td valign="top" style="vertical-align: top">' . ($url ? self::Link($url, $img) : $img) . "</td>";
            }
            $result .= '</tr></table>';

            return $result;
        }

        $banner_src = strpos($file, 'http://') === false ? self::$images_url . $file : $file;

        if (!empty($areas)) {

            $img_id = "img_" . (rand() % 100000);

            $result = self::Image($banner_src, '', array(), $img_id);
            $result .= '<map id="' . $img_id . '" name="' . $img_id . '">';
            foreach ($areas as $coords => $url) {
                $result .= '<area target="_blank" alt="'.$alt.'" href="' . self::prepare_url($url, $utm_content) . '" shape="rect" coords="' . $coords . '"/>';
            }
            $result .= '</map>';

            return $result;
        } else {
            $img = self::Image($banner_src, $alt);
        }

        if (!$url && empty($areas)) {
            return $img;
        }

        if ($url && empty($areas)) {
            return self::Link($url, $img, $utm_content, $alt);
        }

        return $img;
    }


    public static function GetDateRangeText($date_start, $date_end)
    {
        $monthes = array('января', 'февраля', 'марта', 'апреля', 'мая', 'июня', 'июля', 'августа', 'сентября', 'октября', 'ноября', 'декабря');
        $date_start = explode('-', $date_start);
        $date_end = explode('-', $date_end);

        return 'c ' . (int)$date_start[2] . ' по ' . (int)$date_end[2] . ' ' . $monthes[(int)$date_end[1] - 1];
    }


    public static function prepare_price($price)
    {
        $price = (int)str_replace(' ', '', $price);
        if ($price == 0) {
            return '';
        }
        if ($price < 1000) {
            return $price;
        }
        return floor($price / 1000) . ' ' . ($price % 1000);
    }
} 