<?php
    require("head.php") ;
?>

    <div class="album py-5 bg-light">
        <div class="container">
            <div class="row g-3 mb-5 ">
                <h1 class="text-center mb-5"><?= $_SESSION['message_acceuil'];?></h1>
                <h1 class="text-center mb-5">Vous gérez désormais le batiment : </h1>
                <!-- bouton pour retourner à la page d'accueil -->
                <div class="d-grid gap-2 d-md-block">
                </div>

            </div><!-- row -->
        </div><!--container--> 
        
    </div><!--***************album************************-->




<?php
    require("footer.php") ;
?>


