<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\Employee */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Employees', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="employee-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'title',
            'name',
            'surname',
            'genderName',
            'birthday',
            'height',
            'weight',
            'blood_type',
            'ceallphone',
            'personal_id',
            'photo',
            'nationality',
            'race',
            'religion',
            'skill',
            'salary',
            'department_id',
            'user_id',
            'created_by',
            'created_at',
            'updated_by',
            'updated_at',
            'tumbon_id',
            'aumphur_id',
            'province_id',
        ],
    ]) ?>

</div>
