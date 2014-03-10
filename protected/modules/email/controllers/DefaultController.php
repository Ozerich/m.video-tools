<?php

class DefaultController extends Controller
{
    public function actionIndex()
    {
        $letters = Letter::model()->findAll();

        $this->render('index', array('models' => $letters));
    }

    public function actionCreate()
    {
        $model = new Letter();

        if (Yii::app()->request->isPostRequest) {
            $model->attributes = $_POST['Letter'];

            if ($model->save()) {
                $this->redirect('/email/default/edit/' . $model->id);
            }
        }

        $this->render('create', array('model' => $model));
    }

    public function actionDelete($id)
    {
        $model = Letter::model()->findByPk($id);
        if (!$model) {
            throw new CHttpException(404);
        }

        $model->delete();

        $this->redirect('/email/default/index');
    }


    public function actionEdit($id)
    {
        $model = Letter::model()->findByPk($id);
        if (!$model) {
            throw new CHttpException(404);
        }

        if (Yii::app()->request->isPostRequest) {
            $model->attributes = $_POST['Letter'];

            if ($model->save()) {
                $this->redirect('/email/default/edit/' . $model->id);
            }
        }

        $this->render('edit', array('model' => $model, 'active_tab' => Yii::app()->request->getParam('tab', 1)));
    }
}