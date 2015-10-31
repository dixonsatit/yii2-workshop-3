<?php
namespace frontend\models;
use yii\base\model;
use frontend\models\Account;

class AuthForm extends model {

  public $username;
  public $password;
  private $_user;

  public function Rules(){
    return [
      [['username','password'],'required'],
      ['username','string','max'=>100],
      ['password','string','min'=>6],
      ['password','validatePassword'],
      ['username','trim']
    ];
  }

  public function validatePassword($attribute, $params)
  {
      if (!$this->hasErrors()) {
          $user = $this->getUser();
          if (!$user || !$user->validatePasswordMd5($this->password)) {
              $this->addError($attribute, 'Incorrect username or password.');
          }
      }
  }

  public function login(){
  }
  protected function getUser(){
    if($this->_user === null){
      $this->_user = Account::find()->where(
      'username = :username',
      [':username'=> $this->username]
      )->one();
    }
    return $this->_user;
  }
}
