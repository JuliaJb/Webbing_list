<?php $title = "Admin"; ?>

<?php ob_start() ?>

    <div class="container">

        <div class="row">
            <div class="box">
                <div class="col-lg-12 text-center">
                    <h2 class="brand-before">
                        <small>Bienvenue dans</small>
                    </h2>
                    <h1 class="brand-name">Votre espace administrateur</h1>
                    <hr class="tagline-divider">
                    <h2>
                        <small>Pour
                            <strong>Ginette et Marcus</strong>
                        </small>
                    </h2>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="box">
                <div class="col-lg-12">
                    <hr>
                    <h2 class="intro-text text-center">Quelques stats sur
                        <strong>vos invités</strong>
                    </h2>
                    <hr>
                    <div class="stats">
                        <div class="stat">
                            <div class="circle">
                                <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                            </div>  
                            <p>90 invités</p>
                        </div>

                        <div class="stat">
                            <div class="circle">
                                <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
                            </div>  
                            <p>25 Oui</p>
                        </div>

                        <div class="stat">
                            <div class="circle">
                                <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                            </div>  
                            <p>3 Non</p>
                        </div>

                    </div>

                
                </div>
            </div>
        </div>

        <div class="row">
            <div class="box">
                <div class="col-lg-12">
                    <hr>
                    <h2 class="intro-text text-center">Contactez vos invités
                        <strong>par email</strong>
                    </h2>
                    <hr>
                    
                    <form class="form-horizontal" method="POST" action="templates/email.php">
                      <div class="form-group">
                        <label for="emailId" class="col-sm-2 control-label">Objet</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="emailId" placeholder="Objet de l'email" name="objet">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="contenuId" class="col-sm-2 control-label">Contenu de votre email</label>
                        <div class="col-sm-10">
                          <textarea id="contenuId" class="form-control" rows="3"></textarea>
                        </div>
                      </div>
                      <div class="form-group">
                            <label for="groupeId" class="col-sm-2 control-label">Quel groupe ?</label>
                                <div class="col-sm-offset-2 col-sm-10">
                                    <label class="checkbox-inline">
                                        <input type="checkbox" id="groupeId" name="groupeMa" value="3"> Maurice
                                    </label>
                                    <label class="checkbox-inline">
                                        <input type="checkbox" id="groupeId" name="groupeFr" value="2"> France
                                    </label>
                                </div>
                      </div>
                      <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                          <button type="submit" class="btn btn-default" name="envoyer">Envoyer</button>
                        </div>
                      </div>
                    </form>

                </div>
            </div>
        </div>

    </div>
    <!-- /.container -->


<?php $content = ob_get_clean() ?>

<?php include "layout.php" ?>