<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel frontend\models\EmployeeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Employees';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="employee-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Employee', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?php Pjax::begin();?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            // 'title',
            // 'name',
            // 'surname',
            'fullname',
            //'gender',
            [
              'attribute'=>'gender',
              'filter' => $searchModel->itemAlias('gender'),
              'value'=>function($model){
                return $model->genderName;
              }
            ],

            // 'birthday',
            // 'height',
            // 'weight',
            // 'blood_type',
            // 'ceallphone',
            // 'personal_id',
            // 'photo',
            // 'nationality',
            // 'race',
            // 'religion',
            // 'skill',
            // 'salary',
            // 'department_id',
            // 'user_id',
            // 'created_by',
            'created_at:dateTime',
            // 'updated_by',
            // 'updated_at',
            // 'tumbon_id',
            // 'aumphur_id',
            // 'province_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
  <?php Pjax::end();?>
</div>
