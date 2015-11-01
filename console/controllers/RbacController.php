<?php
namespace console\controllers;
use yii\console\Controller;
use yii\helpers\Console;
use \Yii;
class RbacController extends Controller {

  public function actionIndex(){
    Console::output('Hello Console');
  }
  public function actionInit(){
    $auth = Yii::$app->authManager;
    $auth->removeAll();

    $admin = $auth->createRole('Admin');
    $admin->description = 'ผู้ดูแลระบบ';
    $auth->add($admin);

    $author = $auth->createRole('Author');
    $author->description = 'ผู้เขียนบทความ';
    $auth->add($author);

    $user = $auth->createRole('User');
    $user->description = 'ผู้ใช้งาน';
    $auth->add($user);

    $report = $auth->createRole('Report');
    $report->description = 'รายงาน';
    $auth->add($report);

    $report1 = $auth->createPermission('report1');
    $auth->add($report1);
    $auth->addChild($report,$report1);

    $index = $auth->createPermission('index');
    $auth->add($index);
    $auth->addChild($user,$index);

    $view = $auth->createPermission('view');
    $auth->add($view);
    $auth->addChild($user,$view);

    $rule = new \common\rbac\AuthorRule;
    $auth->add($rule);

    $update = $auth->createPermission('updateOwnBlog');
    $update->ruleName = $rule->name;
    $auth->add($update);
    $auth->addChild($author,$update);

    $auth->addChild($user,$report);
    $auth->addChild($author,$user);
    $auth->addChild($admin,$author);

    $auth->assign($admin, 1);
    $auth->assign($author, 2);

    Console::output('Success!');
  }
  public function actionLoadData(){
    Console::output('Hello Console');
  }


}
