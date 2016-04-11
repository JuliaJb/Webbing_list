<?php $title = "Changement Profil"; ?>

<?php ob_start() ?>

        <div class="row">
            <div class="box">
                <div class="col-lg-12 text-center"> 
                    <h1 class="brand-name">Modifiez votre Profil</h1>
                </div>
            </div>
        </div>

<!-- Debut de Formulaire  -->

		<div class="row">
			<div class="box">
				<div class="col-lg-12">
					
<!-- DIV pour affichage d'erreures -->

<!-- Formulaire Premiere Connexion -->
<!-- names: ['email']['password']['enfants']['rsvp']['btnChange'] -->

          <form class="form-horizontal" method="POST" action="">
            <fieldset>
              <input type="" class="form-control input-spaced" name="email" placeholder="" id="">
              <input type="" class="form-control input-spaced" name="password" placeholder="" id="">
              <input type="" class="form-control input-spaced" name="enfants" placeholder="" id="">
              <input type="" class="form-control input-spaced" name="rsvp" placeholder="" id="">
              <button name="btnChange" class="btn btn-default">Créer Profil</button>
            </fieldset>
          </form>
				
        <!-- End Original Container -->
          </div>
			</div>
		</div>

<?php $content = ob_get_clean() ?>

<?php include "layout.php" ?>