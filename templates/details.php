<?php $title = "Forum - Détails"; ?>

<?php ob_start(); ?>

    <div class="container">

        <div class="row">
            <div class="box">
                <div class="col-lg-12 text-center">
                    <h1 class="brand-name">Une réponse à cette question ?</h1>
                </div>
            </div>
        </div>
		<div class="row">
			<div class="box">
				<div class="col-lg-12">
					<hr>
					<h2 class="intro-text text-center">Forum</h2>
					<hr>

					<hr class="visible-xs">
                    <?php 
                    
                    foreach ($roles as $role) { ?>
                        <button><a href="forum?id=<?= $role['id']?>"  ><?=$role['libelle']?></a></button>
                        <?php } ?>

                                     

                    
					<?php                 
                    if (isset($_GET['id'])) { 
                    		echo '<h3> La question : </h3>';                                  
                            echo "<br>"; 
                            echo "Titre : ".$posts[0]['titre'];
                            echo "<br>";
                            echo "Auteur : ".$posts[0]['auteur'];
                            echo '<br>';
                            echo "Date de publication : ".$posts[0]['date_publication'];                           
                            echo '<br>';
                            echo "Message : ".$posts[0]['message'];
                            echo '<hr>';
                            echo '<h3> Les réponses : </h3>';
                            echo '<br>';
                            foreach ($reponses as $reponse) {
                            	echo "Auteur : ".$reponse['nom'].' '.$reponse['prenom'];
                            	echo "<br>";
                            	echo "Date de publication : ".$reponse['date_pub'];
                            	echo "<br>";
                            	echo "Message : ".$reponse['reponse'];
                            	echo "<hr>";
                            }
                            

                        }
                    

                    ?>
                    <form action="" method="POST">
                    	<textarea name="message" id="message" cols="30" rows="10" placeholder="Votre réponse"></textarea>
                        <button type="submit" name="reponse">Répondre à la question </button> 
                    </form>

                    









<?php $content = ob_get_clean() ?>

<?php include "layout.php" ?>
