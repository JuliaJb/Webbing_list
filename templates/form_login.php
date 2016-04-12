<?php $title = "Login"; ?>

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
          <?php
          if ($firstLoginErrors)
          {
            foreach ($firstLoginErrors as $key => $value) 
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

<!-- Formulaire Premiere Connexion -->
<!-- names: ['prenom']['nom']['code']['btnContinue'] -->
          <form class="form-horizontal login-inline" method="POST" action="/index.php/login">
            <hr>
            <h2 class="intro-text text-center">Prémière Connexion</h2>
            <hr>
            <hr class="visible-xs">
            <p class="p-form">Créez votre espace utilisateur ici.</p>

            <fieldset>
              <div class="form-group">
                <div class="col-sm-10">
                  <input type="text" name="prenom" class="form-control" id="inputPrenom" placeholder="Prénom">
                </div>
              </div>

              <div class="form-group">
                <div class="col-sm-10">
                  <input type="text" name="nom" class="form-control" id="inputNom" placeholder="Nom">
                </div>
              </div>

              <div class="form-group">
                <div class="col-sm-10">
                  <input type="text" name="code" class="form-control" id="inputCode" placeholder="Code d'Acces">
                </div>
              </div>

              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <button type="submit" name="btnContinue" class="btn btn-default">CONTINUER</button>
                </div>
              </div>
            </fieldset>
					</form>



<!-- Formulaire Login -->
<!-- names: ['email']['password']['code']['btnLogin'] -->                 
          <form class="form-horizontal login-inline" method="POST" action="/index.php/login">
              <hr>
              <h2 class="intro-text text-center">LOGIN</h2>
              <hr>
              <hr class="visible-xs">
              <p class="p-form">Connectez-vous si ous avez déjà créé votre espace utilisteur</p>
  <!-- DIV pour affichage d'erreures Login-->
          <?php
            if ($loginErrs)
            {
              foreach ($loginErrs as $key => $value) 
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

          <fieldset>
            <div class="form-group">
              <div class="col-sm-10">
                <input type="text" name="email" class="form-control" id="inputPrenom" placeholder="E-Mail">
              </div>
            </div>
            
            <div class="form-group">
              <div class="col-sm-10">
                <input type="text" name="password" class="form-control" id="inputNom" placeholder="Mot de Passe">
              </div>
            </div>

            <a href="#">Mot de Passe Oublié</a>
            

            <div class="form-group">
              <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" name="btnLogin" class="btn btn-default">LOGIN</button>
              </div>
            </div>
            </fieldset>
          </form>
				
          </div>
			</div>
		</div>

<?php $content = ob_get_clean() ?>

<?php include "layout.php" ?>