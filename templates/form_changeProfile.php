<?php $title = "Changement Profil"; ?>

<?php ob_start() ?>

    <div class="row">
        <div class="box">
            <div class="col-lg-12 text-center"> 
                <h1 class="brand-name">Créez votre Profil</h1>
            </div>
        </div>
    </div>


<!-- Formulaire Changement Profil -->
		<div class="row">
			<div class="box">
				<div class="col-lg-12">
          <h2 class="intro-text text-center">Créez votre Profil</h2>

<!-- DIV pour affichage d'erreures -->
        <?php
          if ($profileCreateErr)
          {
            foreach ($profileCreateErr as $key => $value) 
            {
            ?>
                <div class="errors">
                  <ul class="errors">
                      <li><?= $value ?></li>
                  </ul>
                </div>
            <?php
            }
          }
          ?>

<!-- Debut de Formulaire  -->
<!-- names: ['prenom'] ['nom'] ['email']['password'] -->
<!-- ['rsvp']['regime']['enfants'] ['btnCreateProfile']-->
          <form action="/index.php/profile_change" class="form-horizontal" id="changeProfile" method="POST">
            <fieldset>

              <div class="inputs">
                <input type="text" class="form-control input-space" name="prenom" value="<?= $_SESSION['user']['prenom'] ?>" placeholder="Prénom" id="">
                <input type="text" class="form-control input-space" name="nom" value="<?= $_SESSION['user']['nom'] ?>" placeholder="Nom" id="">
                <input type="email" class="form-control input-space" name="email" value="" placeholder="Email" id="">
                <input type="password" class="form-control input-space" name="password" value="" placeholder="Mot de Passe" id="">
              </div>
              
              <div class="checkboxy">
                <label for="">RSVP</label><br>
                <p class="p-formProfile">Pouvez vous nous rejoindre le jour de notre mariage?</p>
                <input type="radio" name="rsvp" value="1">Oui
                <input type="radio" name="rsvp" value="0">Non
              </div>
              
              <div class="checkboxy">
                <label for="">Régime Alimentaire</label><br>
                <p class="p-formProfile">Avez-vous des allergies alimentaires ou un régime alimentaire spécifique?</p>
                <input type="radio" name="regime" value="1">Oui
                <input type="radio" name="regime" value="0">Non
              </div>
              <textarea name="aliment_specs" id="" cols="30" rows="10"></textarea>

              
              <div class="checkboxy">
                <label for="">Enfants</label><br>
                <input type="radio" name="enfants" value="0">Oui
                <input type="radio" name="enfants" value="1">Non
              </div>

              <button name="btnCreateProfile" id="btnChangeId" class="btn btn-default">Créer Profil</button>


            </fieldset>
          </form>
				
        <!-- End Original Container -->
          </div>
			</div>
		</div>

<?php $content = ob_get_clean() ?>

<?php include "layout.php" ?>