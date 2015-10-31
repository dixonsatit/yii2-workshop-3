<?php
use yii\helpers\Html;

echo Html::encode(Yii::$app->request->get('fullname'));
?>
<h1>Index5</h1>
<p>
  <?=$id;?> :
  <?=$fullname;?>
</p>
