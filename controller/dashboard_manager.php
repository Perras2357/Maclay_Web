<?php
    //----- création de la session ----------------------
    session_start();

    //elements de connexion à la base de données
    $host = 'localhost' ;
    $dbname = 'Maclay' ;
    $client = 'root' ;
    $mdp = '' ;

    //Appel de fichiers
    require("../model/models.php");
    require_once("../model/dbconnexion.php");

    //---------------- Appel de la fonction de connexion à la base de données-------------------------------
    $bd = connexion($host,$dbname,$client,$mdp);

    // requette qui permettra de resortir le batiment correspondant à l'id_build de la session
    $requet = "select * from building where id_build =?";
    $tab_inconnu = [$_SESSION['id_build']];
    $contenu = requet($requet,$tab_inconnu);
    



   





require("../view/dashboard_manager.view.php");
?>



