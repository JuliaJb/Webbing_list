<?php $title = "Forum - Question"; ?>

<?php ob_start() ?>


<div class="container">

    <div class="row">
        <div class="box">
            <div class="col-lg-12 text-center">
                <h1 class="brand-name">Postez votre question</h1>
            </div>
        </div>
    </div>
    <div class="row">
     <div class="box">
        <div class="col-lg-12">


           <?php 

           foreach ($roles as $role) { ?>
           <button><a href="forum?id=<?= $role['id']?>"  ><?=$role['libelle']?></a></button><?php } ;?>

           <form action="/index.php/forum" method="POST">
            <input type="text" name="titre" placeholder="Titre">
            <?php                     
            foreach ($roles as $role) {
                echo "<br>" ?>
                <input type="radio" id="<?= $role['id']?>" name="role" value="<?= $role['id']?>"><?=$role['libelle'];
                echo "<br>"; } ?>
                <textarea name="message" id="message" cols="30" rows="10" placeholder="Votre question"></textarea>
                <button type="submit" name="post">Poster votre question</button>
            </form>    

            <?php $content = ob_get_clean() ?>

            <?php include "layout.php" ?>













