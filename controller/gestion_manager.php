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

    //requette qui permettra de ressortir tous les managers
    $requet = "select * from manager where user_type = 2 order by name_manager asc";
    $contenu = requet($requet);

    //on récupère le clique sur le button delete et on supprime le manager
    if(isset($_POST['delete'])) 
    {
        //on modifie l'id_manager de la table building à 0
        $requet = "update building set id_manager = 0 where id_manager = ?";
        $tab_inconnu = [$_POST['delete']];
        $contenu = requet($requet,$tab_inconnu);
        //on supprime le manager
        $requet = "delete from manager where id_manager = ?";
        $tab_inconnu = [$_POST['delete']];
        $contenu = requet($requet,$tab_inconnu);

        //actualisation de la page
        header('location:gestion_manager.php?id_manager='.$_SESSION['id_manager']);
        exit();
    }





require("../view/gestion_manager.view.php");
?>


