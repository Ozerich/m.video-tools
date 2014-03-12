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

        $model = Yii::app()->request->getPost('type') == 'catalog' ? LetterCatalogBlock::model()->findByPk($id) : LetterBlock::model()->findByPk($id);
        if (!$model) {
            throw new CHttpException(404);
        }

        $model->delete();

        die;
    }

    public function actionSubmit_block()
    {
        $id = Yii::app()->request->getPost('id');

        $is_catalog = Yii::app()->request->getPost('position') == 'catalog';

        if ($id) {
            $model = $is_catalog ? LetterCatalogBlock::model()->findByPk($id) : LetterBlock::model()->findByPk($id);
            if (!$model) {
                throw new CHttpException(404);
            }
        } else {
            $model = $is_catalog ? new LetterCatalogBlock() : new LetterBlock();
            $model->letter_id = Yii::app()->request->getPost('letter_id');
        }

        $model->type = Yii::app()->request->getPost('type');

        $request_data = Yii::app()->request->getPost('data');
        if ($is_catalog) {

            $model->columns = Yii::app()->request->getPost('columns', 2);

            $model->url = isset($request_data['url']) ? $request_data['url'] : '';
            $model->image = isset($request_data['image']) ? $request_data['image'] : '';

            if ($model->type == 'product') {
                $model->product_category = isset($request_data['category']) ? $request_data['category'] : '';
                $model->product_model = isset($request_data['model']) ? $request_data['model'] : '';
                $model->product_yellow = isset($request_data['yellow']) ? $request_data['yellow'] : '';
                $model->product_price = isset($request_data['price']) ? $request_data['price'] : '';
                $model->product_old_price = isset($request_data['old_price']) ? $request_data['old_price'] : null;
                $model->product_all_url = isset($request_data['all_url']) ? $request_data['all_url'] : null;
                $model->product_all_label = isset($request_data['all_label']) ? $request_data['all_label'] : null;
                $model->product_features = isset($request_data['features']) ? explode("\n", $request_data['features']) : array();
            }

        } else {
            $model->position = Yii::app()->request->getPost('position');

            $model->text = $model->banner_url = $model->banner_file = '';

            if ($model->type == 'banner') {
                $model->banner_url = isset($request_data['url']) ? $request_data['url'] : '';
                $model->banner_file = isset($request_data['file']) ? $request_data['file'] : '';
            } else if ($model->type == 'text') {
                $model->text = isset($request_data['text']) ? $request_data['text'] : '';
            }
        }

        if ($model->save()) {
            $model->afterFind();
            echo json_encode(array(
                'success' => 1,
                'block' => $this->renderPartial('/constructor/' . ($is_catalog ? 'content_block' : 'simple_block'), array(
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


    public function actionSave_stocks()
    {
        $id = Yii::app()->request->getPost('letter_id');
        $model = Letter::model()->findByPk($id);

        if (!$model) {
            throw new CHttpException(404);
        }

        $stocks = array();

        $stocks_request = Yii::app()->request->getPost('stocks', array());
        if ($stocks_request && is_array($stocks_request)) {
            foreach ($stocks_request as $stock) {
                $stocks[$stock['name']] = $stock['url'];
            }
        }

        $model->stocks = $stocks;
        $model->save();
    }
}