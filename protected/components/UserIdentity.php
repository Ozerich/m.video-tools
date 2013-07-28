<?php

class UserIdentity extends CUserIdentity
{
    private $_id;
    public $role;

    public function authenticate()
    {
        $user = User::model()->find('LOWER(email)=?', array(strtolower($this->username)));

        if (($user === null) or !$user->validatePassword($this->password)) {
            $this->errorCode = self::ERROR_USERNAME_INVALID;
        } else {
            $this->_id = $user->id;
            $this->username = $user->email;
            $this->errorCode = self::ERROR_NONE;
        }

        return !$this->errorCode;
    }

    public function getId()
    {
        return $this->_id;
    }
}