<?php

class User extends CActiveRecord
{
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public function tableName()
    {
        return 'users';
    }

    public function rules()
    {
        return array(
            array('email', 'required'),
            array('name, surname, password', 'safe'),
            array('email', 'email'),
        );
    }

    public function attributeLabels()
    {
        return array(
            'email' => 'E-mail пользователя',
            'name' => 'Имя',
            'surname' => 'Фамилия',
            'password' => 'Пароль',
        );
    }

    public function validatePassword($password)
    {
        return md5($password) === $this->password;
    }

    public function hashPassword($password)
    {
        return md5($password);
    }


    public function __toString()
    {
        return $this->name . ' ' . $this->surname;
    }
}