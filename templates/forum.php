<?php $title = "Forum"; ?>

<?php ob_start() ?>

   
    <div class="container">
        <div class="row">
            <div class="box">
                <div class="col-lg-12 text-center">
                    <h1 class="brand-name">Forum</h1>
                </div>
            </div>
        </div>
		<div class="row">
			<div class="box">
				<div class="col-lg-12">
				
                    
					<?php 
                    
                    foreach ($roles as $role) { ?>
                        <button><a href="?id=<?= $role['id']?>"  ><?=$role['libelle']?></a></button><?php } ?>
                    <form action="post_question" method="POST">
                        <button type="submit" name="post">Poster une nouvelle question </button> 
                    </form>    
                        

                    <?php
                                 
                        foreach ($posts as $post) {
                            echo "<br>"; ?>
                            <a href="details?id=<?=$post['id']?>"><?=$post['titre']?></a>
                            <?php
                            echo "<br>";
                            echo $post['auteur'].' '.$post['date_publication'];
                            echo "<br>";
                        }
                    

                    ?>
                    <hr>
                </div>
            </div>
        </div>
    </div>  

                    









<?php $content = ob_get_clean() ?>

<?php include "layout.php" ?>













 