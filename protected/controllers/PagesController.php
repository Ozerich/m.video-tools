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
		
		Yii::app()->db->createCommand('UPDATE `regions` SET `pos` = pos - 1 WHERE `page_id`=:page_id AND `pos` > :pos')->bindValue('page_id',$item->page_id)->bindValue('pos',$item->pos)->query();
		
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
		
		$model->page_id = Yii::app()->request->getPost('page_id');
		$model->x = Yii::app()->request->getPost('x');
        $model->y = Yii::app()->request->getPost('y');
        $model->width = Yii::app()->request->getPost('width');
        $model->height = Yii::app()->request->getPost('height');
        $model->url = Yii::app()->request->getPost('url');
        $model->alt = Yii::app()->request->getPost('alt');
		
		if($item_id === 0){
			Yii::app()->db->createCommand('UPDATE `regions` SET `pos` = pos + 1 WHERE `page_id`=:page_id AND `pos` >= :pos')->bindValue('page_id',$model->page_id)->bindValue('pos',Yii::app()->request->getPost('pos'))->query();
		}
		else{
			
			if($model->pos != Yii::app()->request->getPost('pos')){
			
				if($model->pos < Yii::app()->request->getPost('pos')){
					Yii::app()->db->createCommand('UPDATE `regions` SET `pos` = pos - 1 WHERE `page_id`=:page_id AND `pos` > :from AND `pos` <= :to')->bindValue('page_id',$model->page_id)
					->bindValue('from',$model->pos)->bindValue('to',Yii::app()->request->getPost('pos'))->query();
				}
				else{
					Yii::app()->db->createCommand('UPDATE `regions` SET `pos` = pos + 1 WHERE `page_id`=:page_id AND `pos` >= :from AND `pos` < :to')->bindValue('page_id',$model->page_id)
					->bindValue('from',Yii::app()->request->getPost('pos'))->bindValue('to',$model->pos)->query();
				}
				
			}
		}

        $model->pos = Yii::app()->request->getPost('pos');
        $model->save();

        echo $model->id;

        Yii::app()->end();
    }

}