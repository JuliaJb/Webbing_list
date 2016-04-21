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
function update_user_data($id, $nom, $prenom, $mail, $password, $enfant, $aliments, $rsvp, $aliment_specs) 
{
	$link = open_database_connection();
	$sql = "UPDATE `users` SET `nom`= :nom,`prenom`= :prenom, `mail`= :mail, `password`= :password, `enfant`= :enfant, `aliments`= :aliments, `rsvp`= :rsvp,`aliment_specs`=:aliment_specs WHERE id= :id";
	$result = $link->prepare($sql);
	$result->bindValue(":nom", $nom);
	$result->bindValue(":prenom", $prenom);
	$result->bindValue(":mail", $mail);
	$result->bindValue(":password", $password);
	$result->bindValue(":enfant", $enfant);
	$result->bindValue(":aliments", $aliments);
	$result->bindValue(":rsvp", $rsvp);
	$result->bindValue(":aliment_specs", $aliment_specs);
	$result->bindValue(":id", $id);
	$result->execute();
	close_database_connection($link);
	return "update done";
}

//Fonction pour le Login
function get_users_login($email, $password)
{
	$link = open_database_connection();
	$sql = "SELECT `id`, `nom`, `prenom`, `mail`, `aliment_specs`, `aliments`, `rsvp` FROM `users` WHERE `mail` like :email AND `password` like :password";
	$result = $link->prepare($sql);
	$result->bindValue(":email", $email);
	$result->bindValue(":password", $password);
	$result->execute();
	$loginUser = array();
	while ($row = $result->fetch(PDO::FETCH_ASSOC))
	{
		$loginUser[] = $row;
	}
	close_database_connection($link);
	$_SESSION['user']['id'] = $loginUser[0]['id'];
	$_SESSION['user']['prenom'] = $loginUser[0]['prenom'];
	$_SESSION['user']['nom'] = $loginUser[0]['nom'];
	$_SESSION['user']['email'] = $loginUser[0]['mail'];
	$_SESSION['user']['aliment_specs'] = $loginUser[0]['aliment_specs'];
	$_SESSION['user']['aliments'] = $loginUser[0]['aliments'];
	$_SESSION['user']['rsvp'] = $loginUser[0]['rsvp'];
	return $loginUser;
}




function get_emails_maurice()
{
	$link = open_database_connection();
	$result = $link->query("SELECT users.mail FROM users INNER JOIN roles_users ON roles_users.id_user = users.id INNER JOIN roles ON roles_users.id_role = roles.id WHERE roles_users.id_role = 3");

	$usersMa = array();
	while ($row = $result->fetch(PDO::FETCH_ASSOC))
	{
		$usersMa[] = $row;
	}
	close_database_connection($link);
	return $usersMa;
}


function get_emails_france()
{
	$link = open_database_connection();
	$result = $link->query("SELECT users.mail FROM users INNER JOIN roles_users ON roles_users.id_user = users.id INNER JOIN roles ON roles_users.id_role = roles.id WHERE roles_users.id_role = 2");

	$usersFr = array();
	while ($row = $result->fetch(PDO::FETCH_ASSOC))
	{
		$usersFr[] = $row;
	}
	close_database_connection($link);
	return $usersFr;

}

function count_users()
{
	$link = open_database_connection();
	$result = $link->query("SELECT COUNT(*) as count FROM users");
	$countUsers = $result->fetch(PDO::FETCH_ASSOC);

	return $countUsers;
}

function count_attending()
{
	$link = open_database_connection();
	$result = $link->query("SELECT COUNT(*) as count FROM users WHERE `rsvp` = 1");
	$countAttending = $result->fetch(PDO::FETCH_ASSOC);

	return $countAttending;
}

function list_attending()
{

	$link = open_database_connection();
	$result = $link->query('SELECT * FROM users WHERE `rsvp` = 1');
	$listAttending = array();
	while ($row = $result->fetch(PDO::FETCH_ASSOC))
	{
		$listAttending[] = $row;
	}
	close_database_connection($link);
	return $listAttending;
}

function count_not_attending()
{
	$link = open_database_connection();
	$result = $link->query("SELECT COUNT(*) as count FROM users WHERE `rsvp` = 0");
	$countNotAttending = $result->fetch(PDO::FETCH_ASSOC);

	return $countNotAttending;
}


// function forum

function get_all_posts_by_role($id){
	$link = open_database_connection();
    $stmt = $link->prepare("SELECT * from posts WHERE id_role = :id ORDER BY date_publication DESC");
    $stmt->bindValue(':id',$id, PDO::PARAM_INT);

    $stmt->execute();
    $posts = $stmt->fetchAll(PDO::FETCH_ASSOC);
    close_database_connection($link);
    return $posts;

}
function get_post_by_id($user_id){

	$link = open_database_connection();
	$stmt = $link->prepare("SELECT p.id, p.titre, p.auteur, p.date_publication, p.message, p.id_role from posts as p ORDER BY 4 DESC ");
     $stmt->execute();
    $posts = $stmt->fetchAll(PDO::FETCH_ASSOC);
    close_database_connection($link);
    return $posts;
}
	
function get_button_by_role(){

	$link = open_database_connection();
    if (isset($_SESSION['user'])) {
        $stmt = $link->prepare("SELECT * FROM roles WHERE id IN (SELECT id_role FROM roles_users WHERE id_user = :id)");
        $stmt->bindValue(':id',$_SESSION['user']['id'], PDO::PARAM_INT);
        $stmt->execute();
        $roles = $stmt->fetchAll(PDO::FETCH_ASSOC);
        close_database_connection($link);
    	return $roles;  
    }
}


function get_rep_by_id($id){

	$link = open_database_connection();
    $stmt = $link->prepare("SELECT p.id, r.id, r.id_user, r.date_pub, r.id_post, r.reponse,u.id, u.nom, u.prenom from posts as p INNER JOIN reponses as r ON p.id = r.id_post INNER JOIN users as u ON u.id = r.id_user WHERE p.id = :id ORDER BY 3 DESC");
    $stmt->bindValue(':id',$id, PDO::PARAM_INT);
    $stmt->execute();
    $reponses = $stmt->fetchAll(PDO::FETCH_ASSOC);
    close_database_connection($link);
    return $reponses;

}
function post_question($user_nom,$role,$message,$titre){
	
		
	
	$link = open_database_connection();
	$stmt = $link->prepare("INSERT INTO posts(auteur, date_publication, id_role, message, titre) VALUES (:auteur, :date_publication, :id_role, :message, :titre)");
	$stmt->bindValue(':auteur',$user_nom,PDO::PARAM_STR);
	$stmt->bindValue(':date_publication',date('Y-m-d H:i:s'),PDO::PARAM_STR);
	$stmt->bindValue(':id_role',$role,PDO::PARAM_STR);
	$stmt->bindValue(':message',$message,PDO::PARAM_STR);
	$stmt->bindValue(':titre',$titre,PDO::PARAM_STR);
	$stmt->execute();
	close_database_connection($link);
	
}

function post_reponse($id, $reponse, $user_id){
	
		
	
	$link = open_database_connection();
	$stmt = $link->prepare("INSERT INTO reponses(id_user, date_pub, id_post, reponse) VALUES (:id_user, :date_pub, :id_post, :reponse)");
	$stmt->bindValue(':id_user',$user_id,PDO::PARAM_STR);
	$stmt->bindValue(':date_pub',date('Y-m-d H:i:s'),PDO::PARAM_STR);
	$stmt->bindValue(':id_post',$id,PDO::PARAM_STR);
	$stmt->bindValue(':reponse',$reponse,PDO::PARAM_STR);
	$stmt->execute();
	close_database_connection($link);

	
}

// fin function forum




















