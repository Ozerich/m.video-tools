<?php

class LetterBlock extends CActiveRecord
{
    const POSITION_HEADER = 'header';
    const POSITION_FOOTER = 'footer';

    const TYPE_BANNER = 'banner';
    const TYPE_TEXT = 'text';

    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public function tableName()
    {
        return 'letter_blocks';
    }

    public function rules()
    {
        return array();
    }

    public function attributeLabels()
    {
        return array();
    }

    public function relations()
    {
        return array(
            'letter' => array(self::BELONGS_TO, 'Letter', 'letter_id'),
        );
    }

    public function defaultScope()
    {
        return array(
            'order' => 'priority ASC'
        );
    }

    public function scopes()
    {
        return array(
            'header' => array(
                'condition' => 'position="' . self::POSITION_HEADER . '"',
            ),
            'footer' => array(
                'condition' => 'position="' . self::POSITION_FOOTER . '"'
            ),
        );
    }


    public function getFullBannerUrl($single = false)
    {
        if (empty($this->banner_file)) {
            return '';
        }

        if (strpos($this->banner_file, ';') === false) {
            return $this->letter->images_url . $this->banner_file;
        }

        $urls = explode(';', $this->banner_file);
        foreach ($urls as &$url) {
            $url = $this->letter->images_url . $url;
        }

        return $single ? array_shift($urls) : $urls;
    }

    public function beforeSave()
    {
        $this->banner_area_coords = serialize(empty($this->banner_area_coords) ? array() : $this->banner_area_coords);

        return true;
    }

    public function afterFind()
    {
        $this->banner_area_coords = $this->banner_area_coords ? unserialize($this->banner_area_coords) : array();
    }

    public function isSimple()
    {
        return empty($this->banner_area_coords);
    }


    public function getBlockName()
    {
        if ($this->type == self::TYPE_TEXT) {
            return 'Текстовый блок';
        }

        if (!empty($this->banner_area_coords)) {
            return 'Баннер с несколькими ссылками';
        }

        if (empty($this->banner_url)) {
            return 'Баннер';
        }

        if (strpos($this->banner_file, ';') !== false) {
            return 'Баннер из нескольких картинок';
        }

        return 'Баннер-ссылка';
    }
}
