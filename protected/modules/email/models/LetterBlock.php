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


    public function getFullBannerUrl()
    {
        return $this->letter->images_url . $this->banner_file;
    }

    public function beforeSave()
    {
        $this->banner_area_coords = empty($this->banner_area_coords) ? serialize($this->banner_area_coords) : null;

        return true;
    }

    public function afterFind()
    {
        $this->banner_area_coords = $this->banner_area_coords ? unserialize($this->banner_area_coords) : null;
    }

}