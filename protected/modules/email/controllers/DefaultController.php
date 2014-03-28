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


                if (isset($_POST['copy_from']) && $_POST['copy_from']) {
                    $other_model = Letter::model()->findByPk($_POST['copy_from']);
                    if ($other_model) {
                        $model->copyFrom($other_model);
                    }
                } else {
                    $file = CUploadedFile::getInstanceByName('import_file');
                    if ($file) {
                        try {
                            Yii::app()->import->importFile($file, $model);
                        } catch (ImportException $ex) {
                            $model->delete();
                        }
                    }
                }

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


    public function actionPreview($id)
    {
        $model = Letter::model()->findByPk($id);
        if (!$model) {
            throw new CHttpException(404);
        }

        $this->layout = 'none';

        $this->render('/letter/main', array(
            'letter' => $model
        ));
    }
}