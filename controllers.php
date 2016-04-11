<?php

// Fonctions Page Login - Adriana
function form_login_show()
{
	$users = get_all_users();
	require 'templates/form_login.php';
	
	//$users = Array ( [0] => Array ([id]=> ; [nom]=>))
	//id, nom, prenom, mail, password, enfant, aliments, rsvp

}

//Fonction Connexion Premiere Fois
function form_firstLogin_post_action()
{

	$firstLoginErrors = array();

	foreach ($_POST as $key => $value) 
	{
		if ($key == 'btnContinue')
		{
			continue;
		}
		elseif (empty($_POST[$key]))
		{
			$firstLoginErrors[] = $key." est vide ";
		}
	}

	if ($firstLoginErrors)
	{
		require 'templates/form_login.php';
	}	
	else
	{
		$firstUser = get_users_firstConnection($_POST['nom'], $_POST['prenom']);
		if ($firstUser)
		{
			header('location: /index.php/profile');
		}
		else
		{
			echo "<br> USER NOT FOUND";

		}

	}

}

//Fonction Montrer Page pour Changement Profile:
function form_profileChange_show()
{
	require 'templates/form_changeProfile.php';
}

//Fonction Changement de Profil
 function form_changeProfile_post_action()
 {
 	echo "This is form change profile post action function";
 }





function form_email()
{
	require 'templates/form_admin.php';

	// if (isset($_POST['envoyer'])) 
	// {
	// 	envoi_email();
		
	// 	echo $users['mail'];
	// }

}



?>