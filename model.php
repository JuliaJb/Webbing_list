<?php

define('DB_HOST', 'localhost');
define('DB_NAME', 'webbing');
define('DB_USER', 'webbing');
define('DB_PASSWORD', 'webbing');

function open_database_connection() {

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


function get_all_users() {
	$link = open_database_connection();
	$result = $link->query('SELECT * FROM users');
	$users = array();
	while ($row = $result->fetch(PDO::FETCH_ASSOC))
	{
		$users[] = $row;
	}
	close_database_connection($link);
	return $users;
	//$users = Array ( [0] => Array ([id]=> ; [nom]=> ...))
	//id, nom, prenom, mail, password, enfant, aliments, rsvp
}

//Fonction pour la connexion pour la première fois
function get_users_firstConnection($nom, $prenom)
{
	$link = open_database_connection();
	$sql = "SELECT * FROM `users` WHERE `nom` like :nom AND `prenom` like :prenom";
	$result = $link->prepare($sql);
	$result->bindValue(":nom", $nom);
	$result->bindValue(":prenom", $prenom);
	$result->execute();
	while ($row = $result->fetch(PDO::FETCH_ASSOC))
	{
		$firstUser[] = $row;
	}
	close_database_connection($link);
	$_SESSION['user']['id'] = $firstUser[0]['id'];
	$_SESSION['user']['prenom'] = $firstUser[0]['prenom'];
	$_SESSION['user']['nom'] = $firstUser[0]['nom'];
	return $firstUser;
}
	//$firstUser = Array ( [0]=> Array ([id])
	//[nom][prenom][mail][password][enfants]
	//[aliments][rsvp])


//Fonction pour créer son profil
// names: ['prenom'] ['nom'] ['email']['password']
//['rsvp']['regime']['enfants'] ['btnCreateProfile']
function update_user_names($id, $nom, $prenom) 
{
	$link = open_database_connection();
	$sql = "UPDATE users SET nom= :nom, prenom= :prenom WHERE id = :id ";
	$result = $link->prepare($sql);
	$result->bindValue(":nom", $nom);
	$result->bindValue(":prenom", $prenom);
	$result->bindValue(":id", $id);
	$result->execute();
	close_database_connection($link);
	return "update done";
}






















