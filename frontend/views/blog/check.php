<?php
use \Yii;
?>
<h1>Check </h1>
<?php
if(Yii::$app->user->can('Report')){
  echo 'มีสิทธิ์';
}else{
  echo 'ไม่มีสิทธิ์';
}
 ?>
