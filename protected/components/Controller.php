<?php

class Controller extends CController
{
    public $layout = '//layouts/main';

    public $menu = array();

    public $breadcrumbs = array();

    public function beforeAction(CAction $action)
    {
        if (Yii::app()->user->isGuest && $action->getId() != 'login') {
            $this->redirect('/login');
        }

        if (!Yii::app()->user->isGuest && $action->getId() == 'login') {
            $this->redirect('/');
        }

        return parent::beforeAction($action);
    }
}