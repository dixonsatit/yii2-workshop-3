<?php

namespace frontend\controllers;
use \Yii;
use \yii\web\Controller;
use frontend\models\AuthForm;
use frontend\models\Account;

class AuthController extends Controller
{
    // public function actionIndex()
    // {
    //     $model = new AuthForm();
    //     if($model->load(Yii::$app->request->post())
    //     && $model->validate()){
    //
    //       $account = Account::find()
    //       ->where('username=:username',
    //       [':username'=>$model->username])->one();
    //       if($account!=null){
    //         print_r($account->attributes);
    //       }else{
    //         echo 'No user';
    //       }
    //
    //     }else{
    //       return $this->render('index',[
    //         'model' => $model
    //       ]);
    //     }
    //
    // }
    //
    public function actionIndex()
    {
        $model = new AuthForm();
        if($model->load(Yii::$app->request->post())
        && $model->login()){
          //return $this->goHome();
          return $this->goBack();
        }else{
          return $this->render('index',[
            'model' => $model
          ]);
        }

    }

}
