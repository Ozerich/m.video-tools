<?php

class Newspaper extends CActiveRecord
{
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public function tableName()
    {
        return 'newspapers';
    }

    public function rules()
    {
        return array(
            array('user_id, date, name', 'required'),
        );
    }

    public function attributeLabels()
    {
        return array(
            'user_id' => 'Создатель газеты',
            'date' => 'Дата публикации',
            'name' => 'Название газеты',
        );
    }

    public function relations()
    {
        return array(
            'user' => array(self::BELONGS_TO, 'User', 'user_id'),
            'pages' => array(self::HAS_MANY, 'Page', 'newspaper_id')
        );
    }
}