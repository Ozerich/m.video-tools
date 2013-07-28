<?php

class SiteController extends Controller
{
    public function actionIndex()
    {
        $this->render('index', array('newspapers' => Newspaper::model()->findAll()));
    }

}