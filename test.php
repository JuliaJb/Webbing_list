<?php

function open_database_connection() {
	define('DB_HOST', 'localhost');
	define('DB_NAME', 'webbing');
	define('DB_USER', 'webbing');
	define('DB_PASSWORD', 'webbing');


	try 
	{
		$dbh = new PDO('mysql:host='.DB_HOST.';dbname='.DB_NAME.';charset=utf8', ''.DB_USER.'', ''.DB_PASSWORD.'');
		$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
		$dbh->setAttribute(PDO::ATTR_EMULATE_PREPARES, false); 
		return $dbh;
	} 
	catch(PDOException $e) 
	{
		print "Erreur : " . $e->getMessage() . "<br>";
		die();
	}
}

function close_database_connection($dbh) {
	$dbh = null;
}

function get_users_firstConnection($nom, $prenom)
{
	$link = open_database_connection();
	$sql = "SELECT `nom`, `prenom` FROM `users` WHERE `nom` like :nom AND `prenom` like :prenom";
	$result = $link->prepare($sql);
	$result->bindValue(":nom", $nom);
	$result->bindValue(":prenom", $prenom);
	$result->execute();
	while ($row = $result->fetch(PDO::FETCH_ASSOC))
	{
		$firstUser[] = $row;
	}
	close_database_connection($link);
	return $firstUser;

}

$firstUser = get_users_firstConnection('adriana', 'adriana');


//See if function exists outside of function:
echo "I want to see what exists Outside function : ";
if ($firstUser)
{
	echo "firstUser exists <br>";
	echo "<pre>";
	print_r($firstUser);
	echo "</pre>";
}
else
{
	echo "firstUser does not exist";
}



