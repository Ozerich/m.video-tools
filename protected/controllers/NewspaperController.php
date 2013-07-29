<?php

class NewspaperController extends Controller
{
    public function actionCreate()
    {
        $model = new Newspaper();

        if (Yii::app()->request->isPostRequest) {
            $model->attributes = $_POST['Newspaper'];
            $model->user_id = Yii::app()->user->id;

            if ($model->save()) {

                $pages_count = $_POST['pages_count'];

                for ($page_num = 1; $page_num <= $pages_count; $page_num++) {

                    $page = new Page();
                    $page->newspaper_id = $model->id;
                    $page->num = $page_num;
                    $page->image = Yii::app()->request->getPost('background_' . $page_num);
                    $page->save();
                }

                $this->redirect('/newspaper/edit/'.$model->id);
            }

        }

        $this->render('create', array('model' => $model, 'pages_count' => Yii::app()->request->isPostRequest ? $_POST['pages_count'] : 8));
    }


    public function actionDelete($id)
    {
        $model = Newspaper::model()->findByPk($id);
        if ($model) {
            $model->delete();
        }
        $this->redirect('/');
    }


    public function actionEdit($id)
    {
        $model = Newspaper::model()->findByPk($id);
        if (!$model) {
            throw new CHttpException(404);
        }

        if (Yii::app()->request->isPostRequest) {
            $model->attributes = $_POST['Newspaper'];
            if ($model->save()) {
                $this->redirect('/');
            }
        }

        $this->render('edit', array('model' => $model));
    }


    public function actionDelete_page($id)
    {
        $model = Page::model()->findByPk($id);
        if (!$model) {
            throw new CHttpException(404);
        }

        $model->delete();
    }


    public function actionUpdate_page_image()
    {
        if (!Yii::app()->request->isAjaxRequest) {
            throw new CHttpException(404);
        }

        $page_id = Yii::app()->request->getPost('page_id');
        $src = Yii::app()->request->getPost('src');

        $page = Page::model()->findByPk($page_id);
        if (!$page) {
            throw new CHttpException(404);
        }

        $page->image = $src;
        $page->save();

        Yii::app()->end();
    }

    public function actionUpdate_positions()
    {
        if (isset($_POST['num'])) {
            foreach ($_POST['num'] as $page_id => $num) {
                $page = Page::model()->findByPk($page_id);
                $page->num = $num;
                $page->save();
            }
        }

        $this->redirect(Yii::app()->request->getUrlReferrer());
    }

    public function actionHtml($id)
    {
        $this->layout = 'none';
        $model = Newspaper::model()->findByPk($id);
        if (!$model) {
            throw new CHttpException(404);
        }

        $html = $this->renderPartial('_html', array('model' => $model), true);

        $this->render('html', array('model' => $model, 'html' => $html));
    }


    public function actionDownload_html($id)
    {
        $model = Newspaper::model()->findByPk($id);
        if (!$model) {
            throw new CHttpException(404);
        }

        $html = $this->renderPartial('_html', array('model' => $model), true);

        $f = fopen($_SERVER['DOCUMENT_ROOT'] . '/html.tpl', 'w+');
        fwrite($f, $html);
        fclose($f);

        header("Content-Disposition: attachment;filename=\"" . 'paper.tpl' . "\"");
        header("Content-Type: application/x-download");
        header("Content-Transfer-Encoding: binary");
        header('Pragma: no-cache');
        header('Expires: 0');

        set_time_limit(0);
        readfile($_SERVER['DOCUMENT_ROOT'] . '/html.tpl');
        unlink($_SERVER['DOCUMENT_ROOT'] . '/html.tpl');
    }
}