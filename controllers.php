<?php

// Fonctions Page Login - Adriana
function form_login_show()
{
	$users = get_all_users();
	require 'templates/form_login.php';
	
	//$users = Array ( [0] => Array ([id]=> ; [nom]=>))
	//id, nom, prenom, mail, password, enfant, aliments, rsvp

}

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
			header('location: /index.php/admin');
		}
		else
		{
			echo "<br> USER NOT FOUND";

		}

	}

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