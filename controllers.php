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

	if (isset($_POST['btnContinue']))
	{
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
				$firstLoginErrors[] = "Votre Nom et Prénom ne sont pas dans la liste d'invités. Vérifiez l'orthographe et réessayez.";
				require 'templates/form_login.php';
			}
		}
	}
}

//Fonction Montrer Page pour Changement Profile:
function form_profileChange_show()
{
	require 'templates/form_changeProfile.php';
}

//Fonction Création de Profil
 
 function form_changeProfile_post_action()
 {
	
	$profileCreateErr = array();
 	if (isset($_POST['btnCreateProfile']))
 	{
 		//Vérification Champs obligatoires remplis
 		if (!isset($_POST['rsvp']))
		{
			$profileCreateErr[] = "Vous devez confirmer votre réservation, s'il vous plâit.";
		}
 		foreach ($_POST as $key => $value) 
 		{
 			if ($key == 'regime')
 			{
 				continue;
 			}
 			elseif ($key == 'enfants')
 			{
 				continue;
 			}
 			elseif ($key == 'btnCreateProfile')
 			{
 				continue;
 			}
 			elseif ($key == 'rsvp')
 			{
 				continue;
 			}
 			elseif (empty($_POST[$key])) 
 			{
 				$profileCreateErr[] = $key." est vide";
 			}
 		}//end foreach

 		//Sans erreurs, on passe aux fonctions 
 		//concernant la base de données
 		if ($profileCreateErr)
		{
			require 'templates/form_changeProfile.php';
			echo "there is an error with profileCreateErr";
		}
		else
		{
			$updateUser = update_user_names($_SESSION['user']['id'], $_POST['nom'], $_POST['prenom']);
			header('Location: /');
		}


 	}//end first condition
 }//end function


//Fonction afficher homepage
 function homepage_show()
 {
 	require 'templates/home.php';
 }

 //Fonction Deconnexion
 function deconnexion()
 {
 	unset($_SESSION['user']);
 	header('Location: /');
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