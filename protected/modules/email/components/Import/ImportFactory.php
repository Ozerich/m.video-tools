<?php

class ImportFactory extends CApplicationComponent
{
    public static function GetParser($filename)
    {
        $file_ext = strpos($filename, '.') ? strtolower(substr($filename, strrpos($filename, '.') + 1)) : '';

        if($file_ext == 'json'){
            return new ImportJsonParser();
        }

        if($file_ext == 'xls' || $file_ext == 'xlxs'){
            return new ImportXlsParser();
        }

        return null;
    }
} 