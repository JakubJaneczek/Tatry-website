<?php
require_once '../../mongo.php';
$users = AllUsers();
$author = AllAuthor();
$checkbox = AllCheckbox();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Użytkownicy</title>
    <link rel="stylesheet" href="styles.css"/>
</head>
<body>
   
 <?php if ($checkbox): ?>
 <ol>
    <?php foreach ($checkbox as $user): ?>
      <li><?= $user['photo']?> 
       <a href="UserEdit.php?uid=<?= $user['_id'] ?>">Edytuj</a> |
       <a href="UserDelete.php?uid=<?= $user['_id'] ?>">Usuń</a>
      </li>
    <?php endforeach ?>
 </ol>
  <?php else: ?>
     <p >Brak użytkowników</p>
 <?php endif ?>
  
</body>
</html>
