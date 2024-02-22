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

   $_SESSION['id_build'] = $_GET['id_build'];

    //---------------- Appel de la fonction de connexion à la base de données-------------------------------
    $bd = connexion($host,$dbname,$client,$mdp);

    //récupération de l'id du manager
    $id_manager = $_SESSION['id_manager'];

    $erreur = array();  //Variable qui récupère les erreurs

    //requette qui permettra d'enregistrer le nouveau manager dans la table manager'

    if(isset($_POST['enregistrer'])) 
    {
        extract($_POST);
        $controle = [$nom, $prenom, $poste, $email]; //tableau à controler

        // Vérifie si tous les éléments du tableau qui ont l'attribut required ont du contenu

        if (mb_strlen($nom)<3) 
        {
            $erreur["nom"] = "Veillez entrer un nom valide SVP";//Erreur si le nom ne correspond pas
        }
        //on vérifie si le poste est vide
        if (empty($poste)) 
        {
            $erreur["poste"] = "Veillez entrer un poste valide SVP";//Erreur si le poste ne correspond pas
        }
        //on construit l'expression réguliaire pour le mail au format moise.ndam@universite-paris-saclay.fr ou moise.ndam-perras@up-sud.fr
        $mail = "/^[a-z.-]@((universite-paris-saclay)|(up-sud).fr)$/";  
        
        $validation_callback = function ($email) 
        {
            $custom_pattern = "/^[a-z.-]+@((universite-paris-saclay)|(up-sud))\.fr$/";
            return preg_match($custom_pattern, $email) === 1;
        };
        if (!filter_var($email, FILTER_VALIDATE_EMAIL) || !$validation_callback($email)) 
        {
            $erreur["email"] = "Veillez entrer un email valide SVP";//Erreur si le mail ne correspond pas
        }
        if (empty($erreur)) 
        {
            //on vérifie si le mail existe déjà
            $requet1 = "select * from manager where mail =?";
            $tab_inconnu = [$email];
            $contenu_user1 = requet($requet1,$tab_inconnu); //Appel de la fonction qui génère les requetes
            if (!empty($contenu_user1)) 
            {
                //requette qui permet de vérifier si le manager gère déja le building concerné
                $requet2 = "select * from building where id_manager =? and id_build =?";
                $tab_inconnu2 = [$contenu_user1 -> id_manager, $_SESSION['id_build']];
                $contenu_user2 = requet($requet2,$tab_inconnu2); //Appel de la fonction qui génère les requetes
                if(!empty($contenu_user2))
                {
                    $erreur1 = "Ce manager gère déja ce batiment";
                }
            }
            else
            {
                //requette qui va me permettre d'enregistrer le nouveau manager
                $requet = "insert into manager(id_manager,user_type,name_manager, prenom, function, mail,password) values(?,?,?,?,?,?,?)";
                // récupérer l'heure et la date actuelle
                $date = date("Y-m-d H:i:s");
                $_SESSION["mdp_defaut"] = "maclay".$date;
                $id_new_manager = last_id('manager','id_manager');
                $tab_inconnu = [$id_new_manager,2,$nom, $prenom, $poste, $email, $_SESSION["mdp_defaut"]];
                $contenu_user = requet($requet,$tab_inconnu); //Appel de la fonction qui génère les requetes

                //requette qui va permettre de changer le manager du batiment
                $requet3 = "update building set id_manager = ? where id_build = ?";
                $tab_inconnu3 = [$id_new_manager,$_SESSION['id_build']];
                $contenu_user3 = requet($requet3,$tab_inconnu3); //Appel de la fonction qui génère les requetes

                //redirection vers la page qui permet d'afficher le mot de passe par défaut
                header('Location:mdp_defaut.php?id_manager='.$_SESSION["id_manager"].'&id_build='.$_SESSION['id_build']);
                exit();
            }
            
        } 

    }
   





require("../view/modifier_manager.view.php");
?>

