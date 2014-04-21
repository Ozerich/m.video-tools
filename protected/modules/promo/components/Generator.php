<?php

function rrmdir($dir) {
    if (is_dir($dir)) {
        $objects = scandir($dir);
        foreach ($objects as $object) {
            if ($object != "." && $object != "..") {
                if (filetype($dir."/".$object) == "dir") rrmdir($dir."/".$object); else unlink($dir."/".$object);
            }
        }
        reset($objects);
        rmdir($dir);
    }
}

function copy_directory($source, $destination)
{
    if (is_dir($source)) {
        @mkdir($destination);
        $directory = dir($source);
        while (FALSE !== ($readdirectory = $directory->read())) {
            if ($readdirectory == '.' || $readdirectory == '..') {
                continue;
            }
            $PathDir = $source . '/' . $readdirectory;
            if (is_dir($PathDir)) {
                copy_directory($PathDir, $destination . '/' . $readdirectory);
                continue;
            }
            copy($PathDir, $destination . '/' . $readdirectory);
        }

        $directory->close();
    } else {
        copy($source, $destination);
    }
}

function Zip($source, $folder, $destination)
{
    if (!extension_loaded('zip') || !file_exists($source)) {
        return false;
    }

    $zip = new ZipArchive();
    if (!$zip->open($destination, ZIPARCHIVE::CREATE)) {
        return false;
    }

    $source = str_replace('\\', '/', realpath($source));

    if (is_dir($source) === true) {
        $files = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($source), RecursiveIteratorIterator::SELF_FIRST);

        foreach ($files as $file) {
            $file = str_replace('\\', '/', $file);

            // Ignore "." and ".." folders
            if (in_array(substr($file, strrpos($file, '/') + 1), array('.', '..')))
                continue;

            $file = realpath($file);

            if (is_dir($file) === true) {
                $file = str_replace('\\', '/', $file);
                $zip->addEmptyDir(str_replace($source . '/', '', $file . '/'));
            } else if (is_file($file) === true) {
                $file = str_replace('\\', '/', $file);
                $zip->addFromString(str_replace($source . '/', '', $file), file_get_contents($file));
            }
        }
    } else if (is_file($source) === true) {
        $zip->addFromString(basename($source), file_get_contents($source));
    }

    return $zip->close();
}

class Generator
{
    private function getSamplePage($type)
    {
        if ($type == PromoForm::TYPE_FULL) {
            return 'http://www.mvideo.ru/ipad-air/';
        } else if ($type == PromoForm::TYPE_NOT_FULL) {
            return "http://www.mvideo.ru/iphone-5s/";
        }

        return null;
    }

    private function prepareHtml($html, $name)
    {
        $html = str_replace('href="/', 'href="http://www.mvideo.ru/', $html);
        $html = str_replace('src="/', 'src="http://www.mvideo.ru/', $html);

        if (preg_match('#<div class="promo-pages-listing.+?>(.+?)<div class="clear"></div>#si', $html, $promo_block)) {
            $promo_block_new = "\n\n<style>\n\n</style>\n<link rel=\"stylesheet\" type=\"text/css\" href=\"styles.css\">\n\n<div id=\"" . $name . "\">\n\n</div>\n\n";
            $html = str_replace($promo_block[1], $promo_block_new, $html);
        }

        return $html;
    }

    public function createPromo($name, $type)
    {
        if (substr($name, 0, 6) != 'promo_') {
            $name = 'promo_' . $name;
        }

        $url = $this->getSamplePage($type);
        $html = file_get_contents($url);

        $html = $this->prepareHtml($html, $name);

        $hash = md5(time());
        $tmp_dir = realpath(__DIR__ . '/../../../../web/tmp');

        $dir = $tmp_dir . '/' . $hash;
        if (!file_exists($dir)) {
            mkdir($dir, 0777);
        }

        $sample_dir = realpath(__DIR__ . '/../../../../web/promo_sample');
        copy_directory($sample_dir, $dir);

        $less_file = $dir . '/styles.less';
        $f = fopen($less_file, 'r+');
        $less = fread($f, filesize($less_file));
        fclose($f);

        $less = str_replace('{PROMO_NAME}', $name, $less);

        $f = fopen($less_file, 'w+');
        fwrite($f, $less);
        fclose($f);

        mkdir($dir . '/pics/a/' . $name);


        $f = fopen($dir . '/page.html', 'w+');
        fwrite($f, $html);
        fclose($f);

        $zip_name = $name . '.zip';
        $zip_filepath = $tmp_dir . '/' . $zip_name;
        if (file_exists($zip_filepath)) {
            @unlink($zip_filepath);
        }

        Zip($dir, $hash, $zip_filepath);

        rrmdir($dir);

        return '/web/tmp/' . $zip_name;
    }
} 