<?php 
        include 'include/connect.php';

        var_dump($users);
        $testConnexion = false;

        for($i=0; isset($users[$i]); $i++){
            if($users[$i][0] === "jacques" && $users[$i][3] === "$2y$10\$f7lvz.c2V7qnsgE13xvTEeCIG2Ld7.iL1Fvq89dHyuAe4mPU7HcAi"){
                $testConnexion = true;
                break;
            }
        }

        if($testConnexion){
            echo "Connexion réussie";
        }
        else{
            echo "Nom d'utilisateur ou mot de passe incorrect.";
        }
    ?>