<?php

class AuthController extends Controller
{
    public $layout = 'guest';

    public function actionLogin()
    {
        $model = new User();

        if(Yii::app()->request->isPostRequest){
            $model->attributes = $_POST['User'];

            $identity = new UserIdentity($model->email, $model->password);
            if($identity->authenticate()){
                Yii::app()->user->login($identity, 3600*24*30);
                $this->redirect('/');
            }
            else{
                $model->addError('password', 'Неверный пароль');
            }
        }

        $this->render('login', array('model' => $model));
    }

    public function actionLogout()
    {
        Yii::app()->user->logout();
        $this->redirect('/');
    }

}