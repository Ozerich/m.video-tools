<?php

class PromoForm extends CFormModel
{
    const TYPE_FULL = 1;
    const TYPE_NOT_FULL = 2;

    public static function GetTypes()
    {
        return array(
            self::TYPE_FULL => 'На всю ширину (980 пикселей)',
            self::TYPE_NOT_FULL => 'Страница + Боковое меню (740 пикселей)'
        );
    }

    public $name;
    public $type;

    public function rules()
    {
        return array(
            array('name', 'required'),
            array('type', 'safe')
        );
    }

    public function attributeLabels()
    {
        return array(
            'name' => 'Идентификатор страницы',
            'type' => 'Тип шаблона'
        );
    }


} 