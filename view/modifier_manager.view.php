<?php
    require("head.php") ;
?>

    <div class="col-lg-8 col-md-8 offset-lg-2 offset-md-2 shadow-none p-3 mb-5 bg-light rounded p-5">
            <form  method="post">
                <?php
                    if(!empty($erreur1))
                    {
                        echo '<p class="text-center"><mark>'.$erreur1.'<mark></p>';   
                    }
                ?>
                <!-- nom -->
                <div class="row mb-3">
                    <label for="name" class="col-md-3 col-form-label">nom : </label>
                    <div class="col-md-9">
                        <input type="text" class="form-control" id="nom" name="nom" required >
                        <?php
                        if(!empty($erreur["nom"]))
                        {
                            echo '<p class="text-center "><mark>'.$erreur["nom"].'<mark></p>';   
                        }      
                        ?>
                    </div>
                </div>

                <!-- prenom -->
                <div class="row mb-3">
                    <label for="prenom" class="col-md-3 col-form-label">Prenom : </label>
                    <div class="col-md-9">
                        <input type="text" class="form-control" id="prenom" name="prenom">
                    </div>
                </div>
                
                <!-- Poste -->
                <div class="row mb-3">
                    <label for="poste" class="col-md-3 col-form-label">Poste : </label>
                    <div class="col-md-9">
                        <input type="text" class="form-control" id="poste" name="poste" value="Manager" >
                        <?php
                            if(!empty($erreur["poste"]))
                            {
                                echo '<p class="text-center"><mark>'.$erreur["poste"].'<mark></p>';   
                            }      
                            ?>
                    </div>
                </div>

                <!-- email -->
                <div class="row mb-3">
                    <label for="email" class="col-md-3 col-form-label">Email : </label>
                    <div class="col-md-9">
                        <input type="email" class="form-control" id="email" name="email" required >
                        <?php
                            if(!empty($erreur["email"]))
                            {
                                echo '<p class="text-center"><mark>'.$erreur["email"].'<mark></p>';   
                            }      
                        ?>
                    </div>
                </div>
                
                <div class="mb-3 py-2">   
                    <button type="submit" class="btn btn-primary  col-md-2 offset-md-5 " name="enregistrer">Enregistrer</button>
                </div>

            </form>
        <div class="mb-3">











</div>

















<?php
    require("footer.php") ;
?>
