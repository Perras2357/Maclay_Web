<?php
    require("head.php") ;
?>

    <div class="album py-5 bg-light">
        <div class="container">
            <h1 class="text-center mb-5">Les batiments</h1> 
            <div class="row g-3 mb-5 ">
            <table class="table">
                <thead>
                    <tr>
                    <th scope="col">Name building</th>
                    <th scope="col">Adresse street</th>
                    <th scope="col">Id Manager</th>
                    <th scope="col">Modifier Manager</th>
                    </tr>
                </thead>
                <tbody>
                   <?php
                        foreach ($contenu as $key => $value) 
                        {
                            //requette qui permettra de resortir le nom du manager correspondant à l'id_manager
                            $requet = "select name_manager from manager where id_manager =$value->id_manager and id_manager != 0";
                            $contenu1 = requet($requet);

                            echo "<tr>";
                            echo "<td>".$value -> name_build."</td>";
                            echo "<td>".$value -> addr_street."</td>";
                            if(!empty($contenu1))
                            {
                                foreach ($contenu1 as $key => $value1) 
                                {
                                    echo "<td>".$value1 -> name_manager."</td>";
                                }
                            }
                            else
                            {
                                echo "<td>".$value -> id_manager."</td>";
                            }
                            echo "<td><a href='modifier_manager.php?id_manager=".$id_manager."&id_build=".$value -> id_build."'>Modifier</a></td>";
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
