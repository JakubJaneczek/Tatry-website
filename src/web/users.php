<?php
require_once '../../mongo.php';
$users = AllUsers();
$author = AllAuthor();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Użytkownicy</title>
    <link rel="stylesheet" href="styles.css"/>
</head>
<body>
   
 <?php if ($users): ?>
 <ol>
    <?php foreach ($users as $user): ?>
      <li><?= $user['login']. $user['password']. $user['email'] ?> 
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
