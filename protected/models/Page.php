<?php

class Page extends CActiveRecord
{
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public function tableName()
    {
        return 'pages';
    }

    public function rules()
    {
        return array(
            array('newspaper_id, num', 'required'),
            array('image', 'safe'),
        );
    }

    public function attributeLabels()
    {
        return array(
            'newspaper_id' => 'Газета',
            'num' => 'Порядковый номер газеты',
            'image' => 'Фоновая картинка',
        );
    }

    public function relations()
    {
        return array(
            'newspaper' => array(self::BELONGS_TO, 'Newspaper', 'newspaper_id'),
            'regions' => array(self::HAS_MANY, 'Region', 'page_id')
        );
    }

    public function afterDelete()
    {
        foreach ($this->regions as $region) {
            $region->delete();
        }
    }

    public function defaultScope()
    {
        return array(
            'order' => 'num ASC',
        );
    }
}