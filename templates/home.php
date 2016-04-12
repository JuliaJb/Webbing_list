<?php $title = "Homepage"; ?>

<?php ob_start() ?>

    <div class="row">
        <div class="box">
            <div class="col-lg-12 text-center"> 
                <h1 class="brand-name">Homepage</h1>
            </div>
        </div>
    </div>


		<div class="row">
			<div class="box">
				<div class="col-lg-12">


<!-- Formulaire Changement Profil -->


          <h2 class="intro-text text-center">Infos du mariage</h2>




				
        <!-- End Original Container -->
          </div>
			</div>
		</div>

<?php $content = ob_get_clean() ?>

<?php include "layout.php" ?>