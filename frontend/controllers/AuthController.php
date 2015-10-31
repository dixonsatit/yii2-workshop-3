<?php

namespace frontend\controllers;
use \Yii;
use \yii\web\Controller;
use frontend\models\AuthForm;

class AuthController extends Controller
{
    public function actionIndex()
    {
        $model = new AuthForm();
        if($model->load(Yii::$app->request->post())
        && $model->validate()){
          //....
          echo $model->password;
        }else{
          return $this->render('index',[
            'model' => $model
          ]);
        }

    }

}
