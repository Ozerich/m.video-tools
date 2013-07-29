<?php

class PagesController extends Controller
{

    public function actionView($id)
    {
        $newspaper = Newspaper::model()->findByPk($id);
        if (!$newspaper) {
            throw new CHttpException(404);
        }


        $this->render('view', array('newspaper' => $newspaper));
    }


    public function actionDelete_item($id)
    {
        $item = Region::model()->findByPk($id);
        if (!Yii::app()->request->isAjaxRequest) {
            throw new CHttpException(404);
        }

        $item->delete();
        Yii::app()->end();
    }

    public function actionItem()
    {
        if (!Yii::app()->request->isAjaxRequest) {
            throw new CHttpException(404);
        }

        $item_id = Yii::app()->request->getPost('id');

        $model = $item_id ? Region::model()->findByPk($item_id) : new Region();
        if (!$model) {
            throw new CHttpException(404);
        }

        $model->x = Yii::app()->request->getPost('x');
        $model->y = Yii::app()->request->getPost('y');
        $model->width = Yii::app()->request->getPost('width');
        $model->height = Yii::app()->request->getPost('height');
        $model->url = Yii::app()->request->getPost('url');
        $model->alt = Yii::app()->request->getPost('alt');
        $model->page_id = Yii::app()->request->getPost('page_id');

        $model->save();

        echo $model->id;

        Yii::app()->end();
    }

}