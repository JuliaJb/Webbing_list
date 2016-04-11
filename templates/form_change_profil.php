<?php $title = "Changement Profil"; ?>

<?php ob_start() ?>

        <div class="row">
            <div class="box">
                <div class="col-lg-12 text-center"> 
                    <h1 class="brand-name">LOGIN</h1>
                </div>
            </div>
        </div>

<!-- Debut de Formulaire  -->

		<div class="row">
			<div class="box">
				<div class="col-lg-12">
					
<!-- DIV pour affichage d'erreures -->

<!-- Formulaire Premiere Connexion -->
<!-- names: ['prenom']['nom']['code']['btnContinue'] -->

          <input type="text" name="prenom" class="form-control" id="inputPrenom" placeholder="Prénom">
          <input type="text" name="prenom" class="form-control" id="inputPrenom" placeholder="Prénom">
          <input type="text" name="prenom" class="form-control" id="inputPrenom" placeholder="Prénom">

          



				
        <!-- End Original Container -->
          </div>
			</div>
		</div>

<?php $content = ob_get_clean() ?>

<?php include "layout.php" ?>