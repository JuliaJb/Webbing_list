<?php $title = "Login"; ?>

<?php ob_start() ?>

        <div class="row">
            <div class="box">
                <div class="col-lg-12 text-center">
                    
                    <h2 class="brand-before">
                        <small>Welcome to</small>
                    </h2>
                    <h1 class="brand-name">LOGIN</h1>
                    <hr class="tagline-divider">
                    <h2>
                        <small>By
                            <strong>qja</strong>
                        </small>
                    </h2>
                </div>
            </div>
        </div>

<!-- Debut de Formulaire  -->

		<div class="row">
			<div class="box">
				<div class="col-lg-12">
					<hr>
					<h2 class="intro-text text-center">Prémière Connexion</h2>
					<hr>
					<hr class="visible-xs">

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
          <form class="form-horizontal" method="POST" action="/index.php/login">
					  <div class="form-group">
					    <label for="inputPrenom" class="col-sm-2 control-label">Votre Prénom</label>
					    <div class="col-sm-10">
					      <input type="text" name="prenom" class="form-control" id="inputPrenom" placeholder="Prénom">
					    </div>
					  </div>
					  
					  <div class="form-group">
					    <label for="inputNom" class="col-sm-2 control-label">Votre Nom Famille</label>
					    <div class="col-sm-10">
					      <input type="text" name="nom" class="form-control" id="inputNom" placeholder="Nom">
					    </div>
					  </div>
					  
                      <div class="form-group">
                        <label for="inputCode" class="col-sm-2 control-label">Code d'Accès</label>
                        <div class="col-sm-10">
                          <input type="text" name="code" class="form-control" id="inputCode" placeholder="Code d'Acces">
                        </div>
                      </div>

					  <div class="form-group">
					    <div class="col-sm-offset-2 col-sm-10">
					      <button type="submit" name="btnContinue" class="btn btn-default">CONTINUER</button>
					    </div>
					  </div>
					</form>

                    <hr>
                    <h2 class="intro-text text-center">LOGIN</h2>
                    <hr>
                    <hr class="visible-xs">

                    <form class="form-horizontal" method="POST" action="../forms.php">
                      <div class="form-group">
                        <label for="inputPrenom" class="col-sm-2 control-label">Votre Prénom</label>
                        <div class="col-sm-10">
                          <input type="text" name="prenom" class="form-control" id="inputPrenom" placeholder="Prénom">
                        </div>
                      </div>
                      
                      <div class="form-group">
                        <label for="inputNom" class="col-sm-2 control-label">Votre Nom Famille</label>
                        <div class="col-sm-10">
                          <input type="text" name="nom" class="form-control" id="inputNom" placeholder="Nom">
                        </div>
                      </div>
                      
                      <div class="form-group">
                        <label for="inputCode" class="col-sm-2 control-label">Code d'Accès</label>
                        <div class="col-sm-10">
                          <input type="text" name="code" class="form-control" id="inputCode" placeholder="Code d'Acces">
                        </div>
                      </div>

                      <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                          <button type="submit" name="continue" class="btn btn-default">LOGIN</button>
                        </div>
                      </div>

                      <a href="#" class="btn btn-primary btn-lg active" role="button">J'ai déjà un LOGIN</a>
                    </form>
				
                </div>
			</div>
		</div>

<?php $content = ob_get_clean() ?>

<?php include "layout.php" ?>