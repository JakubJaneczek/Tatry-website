<?php
require_ONCE '../../vendor/autoload.php';

use MongoDB\BSON\ObjectID;


function get_db()
{
    $mongo = new MongoDB\Client(
        "mongodb://localhost:27017/wai",
        [
            'username' => 'wai_web',
            'password' => 'w@i_w3b',
        ]);

    $db = $mongo->wai;

    return $db;
}

function LoginExist($log)
{
	$db=get_db();
	$query = ['login' => $log];
	$user = $db->users->findOne($query);
	if ($user) {return true; }
	else { return false;}
}

function AddNewUser($log, $pass, $email)
{
	$db=get_db();
	$wynik = $db->users->insertOne([ 'login' => $log, 'password' => password_hash($pass, PASSWORD_DEFAULT), 'email' => $email]);
	return $wynik;	 
}

function AllUsers(){
	$db=get_db();
	if ($db->users->count()>0) {
	  return $db->users->find();
	}
	else return false;
}

function ReadUser($login, $password){
	try {
	   $db = get_db();
		$user = $db->users->findOne(['login' => $login]);  
	   if($user !== null &&  password_verify($password,  $user['password']))
	   {
		 session_regenerate_id();
		 $_SESSION['user_id'] = $user['_id'];
		 return true;
		}
		else { return false; }
		}
	catch( Exception $e) { return $e; }	
}

 function AddAuthor($author, $title, $filename)
{
	$db = get_db();
	$wynik = $db->author->insertOne(['author' => $author, 'title' => $title, 'photo' => $filename]);
	return $wynik;
}

function photoExist($file, &$author, &$title)
{
	$db=get_db();
		
	$users = $db->author->find(['photo' => $file]);

	foreach ($users as $user)
	{
		$author = $user['author'];
		//echo $author;
		$title = $user['title'];
		return $author; return $title;
	} 
}

function AllAuthor()
{
	$db=get_db();
	if ($db->author->count()>0) {
	  return $db->author->find();
	}
	else return false;
}

function AllCheckbox()
{
	$db=get_db();
	if ($db->checkbox->count()>0) {
	  return $db->checkbox->find();
	}
	else return false;
}

function AddCheckbox($file)
{
	$db=get_db();
	
	$zapamietane = $db->checkbox->insertOne(['photo' => $file]);
	
	return $zapamietane;
}

function clearCheckboxes()
{
	
    $db=get_db();
	
	$collection = $db->checkbox;
	$collection->drop();
}

  function photoSaved($file)
  {
	$db=get_db();
		
	if($db->checkbox->findOne(['photo' => $file]))
	return true;
	else return false;
  }

  function clearSelected($file)
  {
	$db=get_db();
	$collection = $db->checkbox;
	$zapamietane = $collection ->deleteOne(['photo' => $file]);
	return $zapamietane;
  }
  
?>