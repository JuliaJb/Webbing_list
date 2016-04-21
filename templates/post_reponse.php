<?php $title = "Forum - Réponse"; ?>

<?php ob_start() ?>

<div class="container">

    <div class="row">
        <div class="box">
            <div class="col-lg-12 text-center">
                <h2 class="brand-before">
                    <small>Welcome to</small>
                </h2>
                <h1 class="brand-name">Business Casual</h1>
                <hr class="tagline-divider">
                <h2>
                    <small>By
                        <strong>Start Bootstrap</strong>
                    </small>
                </h2>
            </div>
        </div>
    </div>
    <div class="row">
     <div class="box">
        <div class="col-lg-12">
           <hr>
           <h2 class="intro-text text-center">Poster votre réponse :</h2>
           <hr>
           <hr class="visible-xs">

           <?php 

           foreach ($roles as $role) { ?>
           <button><a href="?id=<?= $role['id']?>"  ><?=$role['libelle']?></a></button><?php } ;?>

           <form action="/index.php/details?id=" method="POST">
                <textarea name="message" id="message" cols="30" rows="10" placeholder="Votre réponse"></textarea>
                <button type="submit" name="reponse">Poster votre réponse</button>
            </form>    

            <?php $content = ob_get_clean() ?>

            <?php include "layout.php" ?>













