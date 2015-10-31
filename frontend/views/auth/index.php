<?php
/* @var $this yii\web\View */
use \yii\helpers\Html;
use \yii\widgets\ActiveForm;
//use yii\bootstrap\ActiveForm;
?>
<h1>auth/index</h1>

<?php $form = ActiveForm::begin() ?>
<?= $form->field($model,'username')->textInput(['placeholder'=>'Username']); ?>
<?= $form->field($model,'password')->passwordInput(); ?>
<div class="form-group">
    <?= Html::submitButton('Login', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
</div>
<?php ActiveForm::end() ?>
