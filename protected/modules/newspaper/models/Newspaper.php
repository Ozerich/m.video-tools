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
            array('user_id, date, name, reff', 'required'),
        );
    }

    public function attributeLabels()
    {
        return array(
            'user_id' => 'Создатель газеты',
            'date' => 'Дата публикации',
            'reff' => 'Реф',
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

    public function defaultScope()
    {
        return array(
            'order' => 'date DESC'
        );
    }


    public function copyFrom(Newspaper $model)
    {
        $this->attributes = $model->attributes;
        $this->save();

        foreach($model->pages as $page){
            $new_page = new Page();
            $new_page->copyFrom($page);
            $new_page->newspaper_id = $this->id;
            $new_page->save();
        }
    }
}