<?php

class Letter extends CActiveRecord
{
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public function tableName()
    {
        return 'letters';
    }

    public function rules()
    {
        return array(
            array('name, reff,date,top_text,images_url', 'safe')
        );
    }

    public function attributeLabels()
    {
        return array(
            'name' => 'Название рассылки',
            'reff' => 'Рефф',
            'date' => 'Дата рассылки',
            'top_text' => 'Текст вверху страницы',
            'images_url' => 'URL к папке с картинками'
        );
    }

    public function relations()
    {
        return array(
            'header_blocks' => array(self::HAS_MANY, 'LetterBlock', 'letter_id', 'scopes' => 'header'),
            'footer_blocks' => array(self::HAS_MANY, 'LetterBlock', 'letter_id', 'scopes' => 'footer'),
            'blocks' => array(self::HAS_MANY, 'LetterBlock', 'letter_id'),
        );
    }

    public function defaultScope()
    {
        return array(
            'order' => 'date DESC'
        );
    }

}