<?php

include "../model.php";

echo open_database_connection();

include "../fonction.php";


if (isset($_POST['envoyer'])){

	require_once '../vendor/autoload.php';

		global $dbh;

		$stmt = $dbh->prepare("SELECT users.mail FROM users INNER JOIN roles_users ON roles_users.id_user = users.id INNER JOIN roles ON roles_users.id_role = roles.id WHERE roles_users.id_role = :groupeFr OR roles_users.id_role = :groupeMa");
		$stmt->bindValue(':groupeFr', $_POST['groupeFr'], PDO::PARAM_INT);
		$stmt->bindValue(':groupeFr', $_POST['groupeMa'], PDO::PARAM_INT);
		$stmt->execute();

		$users = $stmt->fetch(PDO::FETCH_ASSOC);

		$email = $users['mail'];

		// $mail = new PHPMailer;


		// $mail->isSMTP();  // Set mailer to use SMTP

		// $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
		// $mail->SMTPAuth = true;                               // Enable SMTP authentication
		// $mail->Username = 'wf3fev2016@gmail.com';                 // SMTP username
		// $mail->Password = 'webforce3';                           // SMTP password
		// $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
		// $mail->Port = 587;                                    // TCP port to connect to

		// $mail->setFrom('wf3fev2016@gmail.com', 'Julia');
		// $mail->addAddress('julia.jacob@hotmail.fr', 'julia');
		// // $mail->addAddress('julia.jacob06@gmail.com', 'test');

		// // $mail->addReplyTo('info@example.com', 'Information');
		// // $mail->addCC('cc@example.com');
		// // $mail->addBCC('bcc@example.com');

		// // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
		// // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
		// $mail->isHTML(true);                                  // Set email format to HTML

		// $mail->Subject = 'Reinitialisation de votre mot de passe';

		// $mail->Body    = 'Cliquez sur le lien';

		// $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

		// if(!$mail->send()) {
		//     $message = 'Message could not be sent. Mailer Error: ' . $mail->ErrorInfo;
		// } else {
		//     $message = 'Un message vous a été envoyé, veuillez cliquer sur le lien dans l\'email';
		// }

		// echo $message.'<br>';

		echo $email;


	}

?>
