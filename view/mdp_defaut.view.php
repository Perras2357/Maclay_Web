<?php
    require("head.php") ;
?>

    <div class="album py-5 bg-light">
        <div class="container">
            <div class="row g-3 mb-5 ">
                <h1 class="text-center mb-5">votre mot de passe par defaut est : </h1>
                <h2 class="text-center mb-3"> <?=$_SESSION['mdp_defaut'];?> </h2>
                <h1 class="text-center mb-5">Vous gérez désormais le batiment : </h1>
                <h2 class="text-center mb-3"> <?=$contenu->name_build;?> </h2>
                <!-- bouton pour retourner à la page d'accueil -->
                <div class="d-grid gap-2 d-md-block">
                    <a href="admin.php?id_manager=<?=$_SESSION['id_manager'];?>" class="btn btn-primary" type="button">Retourner à la page d'accueil</a>
                </div>

            </div><!-- row -->
        </div><!--container--> 
        
    </div><!--***************album************************-->




<?php
    require("footer.php") ;
?>

