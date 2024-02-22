<?php
    require("head.php") ;
?>

    <!-- <div class="container">
        <a href="controller/remplissage.php" class="btn btn-outline-primary">Page de remplissage de  bd avec le fichier json</a>
    </div> -->

    <div class="col-lg-8 col-md-8 offset-lg-2 offset-md-2 shadow-none p-3 mb-5 bg-light rounded p-5">
        <h1 class="text-center mb-5">Changer votre mot de passe pour votre première connexion</h1>
        <form  method="POST">
            <?php
                if(!empty($erreur1))
                {
                    echo '<p class="text-center"><mark>'.$erreur1.'<mark></p>';   
                }
            ?>
            <!-- password -->
            <div class="row mb-3">
                <label for="password" class="col-md-3 col-form-label">password : </label>
                <div class="col-md-9">
                    <input type="text" class="form-control" id="password" name="password" required >
                    <?php
                      if(!empty($erreur["password"]))
                      {
                        echo '<p class="text-center "><mark>'.$erreur["password"].'<mark></p>';   
                      }      
                    ?>
                </div>
            </div>
            

            <!-- confirme_password-->
            <div class="row mb-3">
                <label for="password" class="col-md-3 col-form-label">Confirmer le password : </label>
                <div class="col-md-9">
                    <input type="confirme_password" class="form-control" id="confirme_password" name="confirme_password" required > 
                    <?php
                      if(!empty($erreur["confirme_password"]))
                      {
                        echo '<p class="text-center"><mark>'.$erreur["confirme_password"].'<mark></p>';   
                      }      
                    ?> 
                </div>
            </div>
            
            <div class="mb-3 py-2">   
                <button type="submit" class="btn btn-primary  col-md-2 offset-md-5 " name="valider">valider</button>
            </div>

        </form>
    <div class="mb-3">

<?php
    require("footer.php") ;
?>
