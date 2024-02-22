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

    //récupération de l'id du manager
    $id_manager = $_GET['id_manager'];
        

    require("../view/admin.view.php");
   
?>
