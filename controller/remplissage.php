<?php
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

    $requet = 'INSERT INTO building (id_bluid,addr_city, addr_postcode, addr_street, name_bluid, id_manager, open_hour, clos_hour, access) VALUES (?,?,?,?,?,?,?,?,?)';

    $jsonString = file_get_contents('../ressources/data.json');
    $data = json_decode($jsonString, true);
    foreach ($data as $key => $value) 
    {
        $table = [$value['id'],$value['addr_city'], $value['addr_postcode'], $value['addr_street'], $value['name'], 0, date( "7:30"), date( "18:30"), "ouvert"];
        $insert=requet($requet,$table);
        //break;
    }
    require("../view/remplissage.view.php") ;
?>
