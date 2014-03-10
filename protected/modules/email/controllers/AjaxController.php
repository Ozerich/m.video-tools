<?php

class AjaxController extends Controller
{
    public function beforeAction($action)
    {
        if (Yii::app()->request->isAjaxRequest == false) {
            throw new CHttpException(404);
        }

        return parent::beforeAction($action);
    }

    public function actionTop_text()
    {
        $id = Yii::app()->request->getPost('id');
        $model = Letter::model()->findByPk($id);
        if (!$model) {
            throw new CHttpException(404);
        }

        $model->top_text = Yii::app()->request->getPost('value');

        $model->save();
    }


    public function actionDelete_block()
    {
        $id = Yii::app()->request->getPost('id');

        $model = LetterBlock::model()->findByPk($id);
        if (!$model) {
            throw new CHttpException(404);
        }

        $model->delete();

        die;
    }

    public function actionSubmit_block()
    {
        $id = Yii::app()->request->getPost('id');

        if ($id) {
            $model = LetterBlock::model()->findByPk($id);
            if (!$model) {
                throw new CHttpException(404);
            }
        } else {
            $model = new LetterBlock();
            $model->letter_id = Yii::app()->request->getPost('letter_id');
        }

        $model->position = Yii::app()->request->getPost('position');
        $model->type = Yii::app()->request->getPost('type');

        $request_data = Yii::app()->request->getPost('data');

        $model->text = $model->banner_url = $model->banner_file = '';

        if ($model->type == 'banner') {
            $model->banner_url = isset($request_data['url']) ? $request_data['url'] : '';
            $model->banner_file = isset($request_data['file']) ? $request_data['file'] : '';
        } else if ($model->type == 'text') {
            $model->text = isset($request_data['text']) ? $request_data['text'] : '';
        }

        if ($model->save()) {
            echo json_encode(array(
                'success' => 1,
                'block' => $this->renderPartial('/constructor/simple_block', array(
                        'model' => $model
                    ), true)
            ));
        } else {
            echo json_encode(array(
                'success' => 0,
                'errors' => $model->getErrors()
            ));
        }

        die;
    }
}