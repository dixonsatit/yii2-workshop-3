<h1>index 4</h1>
ชื่อ : <?= $fullname ?> <br>
 หน่วยงาน : <?= $office ?> <br>
 ทักษะ : <?= $skill[0]; ?> <br>
 <ul>
 <?php foreach ($skill as $key => $value) {
   echo ' <li>'.$value.'</li>';
 }
 ?>
  </ul>
 ทักษะ : <?= $fullnames['title']; ?>
