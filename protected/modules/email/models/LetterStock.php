<?php

class LetterStock extends CActiveRecord
{
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public function tableName()
    {
        return 'letter_stocks';
    }

    public function rules()
    {
        return array(
            array('letter_id, label, url, date_start, date_end, on_list, on_footer', 'safe')
        );
    }

    public function attributeLabels()
    {
        return array(
            'letter_id' => 'Письмо',
            'label' => 'Название акции',
            'url' => 'Ссылка',
            'date_start' => 'Дата старта',
            'date_end' => 'Дата конца',
            'on_list' => 'Выводить в списке',
            'on_footer' => 'Выводить в дислеймере'
        );
    }

    public function relations()
    {
        return array(
            array(self::BELONGS_TO, 'Letter', 'letter_id')
        );
    }
}