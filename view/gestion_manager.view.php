<?php
    require("head.php") ;
?>

    <div class="album py-5 bg-light">
        <div class="container">
            <h1 class="text-center mb-5">Les Managers</h1> 
            <div class="row g-3 mb-5 ">
                    <table class="table">
                        <thead>
                            <tr>
                            <th scope="col">Name manager</th>
                            <th scope="col">Fonction</th>
                            <th scope="col">Mail</th>
                            <th scope="col">batiment</th>
                            <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                                foreach ($contenu as $key => $value) 
                                {
                                    //requette qui permettra de resortir le nom du batiment correspondant à value => id_manager
                                    $requet = "select name_build from building where id_manager =$value->id_manager";
                                    $contenu1 = requet($requet);


                                    echo "<tr>";
                                    echo "<td>".$value -> name_manager."</td>";
                                    echo "<td>".$value -> function."</td>";                       
                                    echo "<td>".$value -> mail."</td>";
                                    if(!empty($contenu1))
                                    {
                                        foreach ($contenu1 as $key => $value1) 
                                        {
                                            echo "<td>".$value1 -> name_build."</td>";
                                        }
                                    }
                                    else
                                    {
                                        echo "<td>Contactez l'administrateur</td>";
                                    }
                                    echo "tr>";
                                    echo "<form method='post'>";
                                    echo "<td><button type='submit' class='btn btn-primary' name='delete' value='$value->id_manager'>Supprimer</button></td>";                       
                                    echo "<td>modifier</td>";
                                    echo "</form>";
                                    echo "</tr>";
                                    echo "</tr>";
                                }
                            ?>
                        </tbody>
                        </table>
            </div><!-- row -->
        </div><!--container--> 
        
    </div><!--***************album************************-->




<?php
    require("footer.php") ;
?>
