<?php
    //----- création de la session ----------------------
    session_start();
   //elements de connexion à la base de données
   $host = 'localhost' ;
   $dbname = 'Maclay' ;
   $client = 'root' ;
   $mdp = '' ;

   //Appel de fichiers
   require("model/models.php");
   require_once("model/dbconnexion.php");

    //---------------- Appel de la fonction de connexion à la base de données-------------------------------
    $bd = connexion($host,$dbname,$client,$mdp);


    $erreur = array();  //Variable qui récupère les erreurs

    if(isset($_GET['connexion'])) //vérifie si la variable validé existe
    {
        extract($_GET);
        $controle = [$login, $mdp]; //tableau à controler

        if (tab_vide($controle)==true) // Vérifie si tous les éléments du tableau ont du contenu
        {
            if (mb_strlen($login)<3) 
            {
                $erreur["login"] = "Veillez entrer un login valide SVP";//Erreur si le login ne correspond pas
            }
            if (mb_strlen($mdp)<4) 
            {
                $erreur["mdp"] = "Veillez entrer un password valide SVP";//Erreur si le password ne correspond pas
            }
            if (empty($erreur)) 
            {
                //requette qui va me permettre de vérifier si c'est un manager qui essaie de se connecter
                $requet1 = "select * from manager where mail =?";
                $tab_inconnu = [$login];
                $contenu_user1 = requet($requet1,$tab_inconnu); //Appel de la fonction qui génère les requetes
                if (!empty($contenu_user1)) 
                {
                    //controle de mdp
                    $passwordFromDatabase = $contenu_user1 -> password;
                    if (($passwordFromDatabase == $mdp) || (password_verify($mdp, $passwordFromDatabase))) 
                    {                                               
                        //creation de la session id_manager
                        $_SESSION["id_manager"] = $contenu_user1 -> id_manager;;
                        //session user_type
                        $_SESSION["user_type"] = $contenu_user1 -> user_type;
                        //on vérifie le type d'utilisateur
                        if (($contenu_user1 -> user_type)==1) //si c'est un admin
                        {
                            //redirection vers la page manager
                            header('Location:controller/admin.php?id_manager='.$_SESSION["id_manager"]);
                            exit();
                        }
                        else
                        {
                            $_SESSION['message_acceuil'] = "Bienvenue sur votre espace M/Mme : ".$contenu_user1 -> name_manager;
                            //on vérifie si le mot de passe hashé correspond
                            if (password_verify($mdp, $passwordFromDatabase)) 
                            {
                                //redirection vers la page manager
                                header('Location:controller/dashboard_manager.php?id_manager='.$_SESSION['id_manager'].'');
                                exit();
                            }
                            else
                            {
                                //redirection vers la page permettant de changer le mot de passe par deafaut
                                header('Location:controller/change_password.php?id_manager='.$_SESSION["id_manager"].'');
                                exit();
                            }
                        }
                    }
                    else 
                    {
                        $erreur1= 'Ce mot de passe ne correspond pas au login';
                    }     
                }
                else 
                {
                    $erreur1= 'Ce login n\'existe pas';
                }
            }                 
        }
        else
        {
            $erreur1 = "Veillez remplir tous les champs SVP"; //Erreur si aumoins un élément du tableau est vide
        }
    }




require("view/home.php");
?>
