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

//Fonction Login
function form_login_post_action()
{
	if (isset($_POST['btnLogin']))
	{
		$loginErrs = array();

		//Gestion d'erreures
		foreach ($_POST as $key => $value) 
		{
			if ($key == 'btnLogin')
			{
				continue;
			}
			elseif (empty($key))
			{
				$loginErrs[] = $key." est vide";
			}
		}//end foreach
		
		if ($loginErrs)
		{
			require 'templates/form_login.php';
		}	
		// else
		// {
		// 	$loginUser = get_users_login($_POST['email'], $_POST['password']);
		// 	if ($loginUser)
		// 	{
		// 		header('location: /');
		// 	}
		// 	else
		// 	{
		// 		$loginErrs[] = "Email ou Mot de Passe incorrects. Veuillez réessayer.";
		// 		require 'templates/form_login.php';
		// 	}
		// }

	}//end first if condition
}//function end

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
			$updateUser = update_user_data($_SESSION['user']['id'], $_POST['nom'], $_POST['prenom'], $_POST['email'], $_POST['password'], $_POST['enfants'], $_POST['regime'], $_POST['rsvp'], $_POST['aliment_specs']);
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
	$users = get_all_users();
	$countUsers = count_users();
	$countAttending = count_attending();
	$countNotAttending = count_not_attending();
	$listAttending = list_attending();
	require 'templates/form_admin.php';
}



function envoi_email($subject, $body, $groupeMa, $groupeFr)
{
	$usersFr = get_emails_france();
	$usersMa = get_emails_maurice();

	// var_dump($usersMa);
	// echo "<br>";
	// var_dump($usersFr);

	require_once 'vendor/autoload.php';

	$mail = new PHPMailer;

	$mail->isSMTP();  // Set mailer to use SMTP

	$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
	$mail->SMTPAuth = true;                               // Enable SMTP authentication
	$mail->Username = 'wf3fev2016@gmail.com';                 // SMTP username
	$mail->Password = 'webforce3';                           // SMTP password
	$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
	$mail->Port = 587;                                    // TCP port to connect to

	$mail->setFrom('wf3fev2016@gmail.com', 'Julia');


	if (isset($_POST['groupeFr'])) {
		for ($i=0; $i < count($usersFr) ; $i++) { 
			$mail->addAddress($usersFr[$i]['mail'], 'test');
		}
	}

	if (isset($_POST['groupeMa'])) {
		for ($i=0; $i < count($usersMa) ; $i++) { 
			$mail->addAddress($usersMa[$i]['mail'], 'test');
		}
	}

	// $mail->addReplyTo('info@example.com', 'Information');
	// $mail->addCC('cc@example.com');
	// $mail->addBCC('bcc@example.com');

	// $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
	// $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
	$mail->isHTML(true);                                  // Set email format to HTML

	$mail->Subject = $subject;

	$mail->Body    = $body;

	$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

	if(!$mail->send()) {
	    $message = 'Message could not be sent. Mailer Error: ' . $mail->ErrorInfo;
	} else {
	    $message = 'Votre email a bien été envoyé. Vous pouvez en renvoyer un si vous le souhaitez';
	}

	return $message;
}


function form_email_action()
{
	if (isset($_POST['envoyer'])) 
	{
		$emailErrors = [];
		$messageEmail = '';

		foreach ($_POST as $key => $value) 
		{
			if ($key == 'envoyer')
			{
				continue;
			}
			elseif (empty($_POST[$key]))
			{
				$emailErrors[$key] = "Veuillez renseigner le champ ".$key.".";
			}
		}

		if ( !isset($_POST['groupeMa']) && !isset($_POST['groupeFr']) ) {
			
			$emailErrors['checkbox'] = "Veuillez sélectionner au moins un groupe";
		}

		if (!empty($emailErrors))
		{
			require 'templates/form_admin.php';
		}	
		else
		{
		
			$message = envoi_email( $_POST['objet'], $_POST['contenu'], isset($_POST['groupeMa'])? $_POST['groupeMa'] : "" , isset($_POST['groupeFr'])? $_POST['groupeFr'] : "" );

			require 'templates/form_admin.php';

		}

	}

}







?>