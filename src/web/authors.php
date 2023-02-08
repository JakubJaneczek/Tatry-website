<?php
require_once '../mongo.php';
$users =  AllAuthor();
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
      <li><?= $user['author']. $user['title']. $user['photo'] ?> 
       
      </li>
    <?php endforeach ?>
 </ol>
  <?php else: ?>
     <p >Brak użytkowników</p>
 <?php endif ?>
  
</body>
</html>
