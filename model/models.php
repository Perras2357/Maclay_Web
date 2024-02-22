<?php

//-------------------------connexion à la bd-------------------------------------------
 
    //Fonction qui permet de générer une requet
    function requet($requet , array $tab = null)
    {
        
       global $bd ; 
       

        if ($tab!=null) 
        {
            
            $contenu = $bd -> prepare($requet);
            $contenu -> execute($tab);
            $nbr = $contenu-> rowcount();
            if($nbr>1)
            {
                $resultat = $contenu->fetchAll();
            }
            else
            {
                $resultat = $contenu->fetch();
            }
        }
        else
        {
            
            $contenu = $bd->query($requet);
            $resultat = $contenu->fetchAll();
            
        }
        
        return $resultat ;
    }

    // fonction qui permet de récupérer les derniers identifiants en fonction de la table et la colonne passé en paramètre
    function last_id($table , $colonne)
    {
        $requet = "select * from ".$table." order by ".$colonne." desc limit 1";
        $contenu = requet($requet);
        if (!empty($contenu)) 
        {
            foreach ($contenu as $element) 
            {
                $id0 = $element -> $colonne ;
            }
            $id = $id0 + 1 ;
        }
        else
        {
            $id = 0;
        } 
        return $id ;
    }

    
    #-------- Activer les pages ----------------------
    function activation($nom_page)
    {
        $page = array_pop(explode('/',$_SERVER['SCRIPT_NAME']) );

        if($page == $nom_page.'.php')
        {
            return 'active bg-dark';
        }
        
    }

    //------------------- Fonction qui permet de vérifier si la connexion est établit ------------------------
    function control_connex($table_session , $contenu)
    {
        if(isset($table_session) && $contenu==$table_session && isset($contenu))
        {
            return 'enabled';
        }
        else
        {
            return 'disabled';
        }
    }

//Fonction qui vérie si un champ est vide ou pas
    function champ_vide(string $nom_champ)
    {
        //$nom_inter = rtrim($nom_champ,' '); ici on supprime tous les espaces en les remplacant par RIEN
        if(!empty($nom_champ) && trim($nom_champ,' ' ) != '')
        {
            // echo "le champ ".$nom_champ." n'est pas vide";
            return 1 ;
        }
        else
        {
          // echo "le champ ".$nom_champ." est vide";
          return 0 ;
        }
        
    } 


  
//Fonction qui vérifie si un nom se trouve dans un tableau de noms 
    function in_element (array $table , string $element)
    {
        
            if(!empty($table)) 
            {
               if (champ_vide($element))
                {
                    if (in_array($element, $table)) 
                    {
                        echo "<br>".$element."  se trouve dans le tableau";
                    }
                    else
                    {
                        echo "<br>".$element."   ne se trouve pas dans le tableau";
                    }
                }
                else
                {
                    echo ' <br> entrez un element à rechercher';
                } 
            }
            else 
            {
                echo " <br> entrez un tableau ayant du comptenu";
            }   
             
    }   
    
    //-------------------Fonction qui vérifie si un nombre d'élément donné est vide ou pas ----------
    function table_empty(array $nom_table )
    {
        $c = true ;
        foreach($nom_table as $values)
        {
            if (champ_vide($values)==0) 
            {
                $c = false;
            }
        }
        return $c ;
    }

    // Fonction qui vérifie si les éléments d'un tableaux sont tous non nuls
    function tab_vide(array $tab)
    {
        $resultat = true ;
        if(!empty($tab))
        {
            foreach($tab as $element)
            {
                if(champ_vide($element)==0)
                {
                    $resultat = false ;
                }
            }
        }
        return $resultat ; 
    }

    



?>
