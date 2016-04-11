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

	echo "I am the form_firstLogin_post_action function";

	foreach ($_POST as $key => $value) 
	{
		if ($key == 'btnContinue')
		{
			continue;
		}
		elseif (empty($_POST[$key]))
		{
			$firstLoginErrors[] = $key." est vide.";
		}
	}	

	echo "<pre>";
	print_r($firstLoginErrors);
	echo "</pre>";

}



?>