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

    var_dump($_SESSION['message_acceuil']);
    $erreur = array();  //Variable qui récupère les erreurs

    if(isset($_POST['valider'])) //vérifie si la variable validé existe
    {
        extract($_POST);
        $controle = [$password, $confirme_password]; //tableau à controler

        if (tab_vide($controle)==true) // Vérifie si tous les éléments du tableau ont du contenu
        {
            if (mb_strlen($password)<6) 
            {
                $erreur["password"] = "Veillez entrer un password valide SVP avec un minimum de 6 caractères";//Erreur si le pass$password ne correspond pas
            }
            if ($confirme_password!= $password) 
            {
                $erreur["confirme_password"] = "Le password ne correspond pas";//Erreur si le password ne correspond pas
            }
            if (empty($erreur)) 
            {
                
                //on hash le password et on le modifie dans la base de données dans la table manager
                $password = password_hash($password, PASSWORD_DEFAULT);
                $requet = "update manager set password = ? where id_manager = ?";
                $tab = [$password, $_SESSION['id_manager']];
                $contenu = requet($requet,$tab);
                //redirection vers la page manager
                $_SESSION['message_acceuil'] .= " Pour votre première connexion";
                header('Location:dashboard_manager.php?id_manager='.$_SESSION['id_manager'].'');
                exit();
            }                 
        }
        else
        {
            $erreur1 = "Veillez remplir tous les champs SVP"; //Erreur si aumoins un élément du tableau est vide
        }
    }




require("../view/change_password.view.php");
?>

