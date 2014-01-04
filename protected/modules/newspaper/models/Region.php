<?php

class Region extends CActiveRecord
{
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public function tableName()
    {
        return 'regions';
    }

    public function rules()
    {
        return array(
            array('page_id, x, y, width, height', 'required'),
            array('url, alt', 'safe'),
        );
    }

    public function attributeLabels()
    {
        return array(
            'page_id' => 'Страница',
            'x' => 'Координата X',
            'y' => 'Координата Y',
            'width' => 'Ширина',
            'height' => 'Высота',
            'url' => 'Ссылка',
            'alt' => 'Подсказка'
        );
    }

    public function relations()
    {
        return array(
            'page' => array(self::BELONGS_TO, 'Page', 'page_id'),
        );
    }
	
	public function defaultScope(){
		return array(
			'order' => 'pos ASC'
		);
	}

}