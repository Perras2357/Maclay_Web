<?php
    require("head.php") ;
?>

    <div class="container">

        <div class="row  g-3 mb-2">
            <!-- logo du nouveau manager -->
            <div class="col-lg-2 col-md-4 offset-lg-1 offset-md-1 h-100 shadow">
                <a id="manager" href="../controller/ajout_manager.php?id_manager=<?=$id_manager;?>">
                    <img  src="../ressources/new_manager.webp" alt="ajouter_manager" class="img_nav col-lg-12 col-md-12" >
                </a>
                <div class="card-body">
                    <h6 class="text-center">Ajouter un Manager</h6>
                </div><!-- card-body -->
            </div><!-- card -->
                
            
            <!-- logo de tous les managers -->
            <div class="col-lg-2 col-md-4 offset-lg-1 offset-md-1 h-100 shadow">
                <a id="all_manager" href="../controller/gestion_manager.php?id_manager=<?=$_SESSION['id_manager'];?>">
                    <img  src="../ressources/images.jpeg" alt="Gestion des managers" class="img_nav col-lg-12 col-md-12" >
                </a>
                <div class="card-body">
                    <h6 class="text-center">Gestion des Managers</h6>
                </div><!-- card-body -->
            </div><!-- card -->

            <!-- logo du nouvel acteur-->
                <div class="col-lg-2 col-md-4 offset-lg-1 offset-md-1 h-100 shadow">
                    <a id="acteur" href="new_acteur.php?id_operateur=<?=$id_operateur;?>">
                        <img  src="img/ajouter_acteur.jpeg" alt="ajouter_acteur" class="img_nav col-lg-12 col-md-12" >
                        <div class="card-body">
                            <h6 class="text-center">Ajouter un acteur</h6>
                        </div><!-- card-body -->
                    </a>
                </div><!-- card -->

                <!-- logo liste des nouveaux acteurs -->
                <div class="col-lg-2 col-md-4 offset-lg-1 offset-md-1 h-100 shadow">
                    <a id="acteur" href="liste_acteur.php?id_operateur=<?=$id_operateur;?>">
                        <img  src="img/liste_acteur.png" alt="liste_acteur" class="img_nav col-lg-12 col-md-12" >
                        <div class="card-body">
                            <h6 class="text-center">Acteurs</h6>
                        </div><!-- card-body -->
                    </a>
                </div><!-- card -->









        </div>











</div>

















<?php
    require("footer.php") ;
?>
