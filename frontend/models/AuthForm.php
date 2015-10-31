<?php
namespace frontend\models;
use yii\base\model;

class AuthForm extends model {

  public $username;
  public $password;

  public function Rules(){
    return [
      [['username','password'],'required'],
      ['username','string','max'=>100],
      ['password','string','min'=>6],
      ['username','trim']
    ];
  }
}
