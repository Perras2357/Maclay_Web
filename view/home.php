<?php
    require("head.php") ;
?>

    <!-- <div class="container">
        <a href="controller/remplissage.php" class="btn btn-outline-primary">Page de remplissage de  bd avec le fichier json</a>
    </div> -->

    <div class="col-lg-8 col-md-8 offset-lg-2 offset-md-2 shadow-none p-3 mb-5 bg-light rounded p-5">
        <form  method="GET">
            <?php
                if(!empty($erreur1))
                {
                    echo '<p class="text-center"><mark>'.$erreur1.'<mark></p>';   
                }
            ?>
            <!-- login -->
            <div class="row mb-3">
                <label for="login" class="col-md-3 col-form-label">login : </label>
                <div class="col-md-9">
                    <input type="text" class="form-control" id="login" name="login" required >
                    <?php
                      if(!empty($erreur["login"]))
                      {
                        echo '<p class="text-center "><mark>'.$erreur["login"].'<mark></p>';   
                      }      
                    ?>
                </div>
            </div>
            

            <!-- password-->
            <div class="row mb-3">
                <label for="password" class="col-md-3 col-form-label">Password : </label>
                <div class="col-md-9">
                    <input type="password" class="form-control" id="mdp" name="mdp" required > 
                    <?php
                      if(!empty($erreur["mdp"]))
                      {
                        echo '<p class="text-center"><mark>'.$erreur["mdp"].'<mark></p>';   
                      }      
                    ?> 
                </div>
            </div>
            
            <div class="mb-3 py-2">   
                <button type="submit" class="btn btn-primary  col-md-2 offset-md-5 " name="connexion">connexion</button>
            </div>

        </form>
    <div class="mb-3">

<?php
    require("footer.php") ;
?>