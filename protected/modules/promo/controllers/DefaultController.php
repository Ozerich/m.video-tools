<?php

class DefaultController extends Controller
{
    public function actionIndex()
    {
        $form = new PromoForm();

        if (Yii::app()->request->isPostRequest) {
            if (isset($_POST['PromoForm'])) {
                $form->attributes = $_POST['PromoForm'];
                if ($form->validate()) {

                    $generator = new PromoGenerator();
                    $file = $generator->createPromo($form->name, $form->type);

                    $this->redirect($file);
                }
            }
        }

        $this->render('index', array('model' => $form));
    }
}