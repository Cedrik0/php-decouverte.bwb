<?php
//session_start();
require "fonction.php";

$user = array (

    "Pseudo" => $_POST['pseudoInscription'],
    "mdp" => $_POST['mdpInscription'],
    "mail" => $_POST['mailInscription'],
);

header('Location:http://www.restalacarte.bwb/?chemin=inscription');

if(verifUser($_POST['pseudoInscription'])){
    //$_SESSION['USER_EXIST'] = true;
    header('Location:http://www.restalacarte.bwb/?chemin=inscription&exist=true');

}else{

     addUser($user);

}


//cette fonction vérifie si la valeur que l'utilisateur a rentrer existe dans ma db (data base)
//si c'est le cas elle affiche un texte


function verifUser($userPseudo){


    $contenuFichierUsers = file_get_contents($_SERVER['DOCUMENT_ROOT'] . '/data/users.json', true);

    $fichierDecoderUsers = json_decode($contenuFichierUsers, true);

    foreach ($fichierDecoderUsers as $value) {
        if (!empty($userPseudo)) {
            if ($userPseudo === $value['Pseudo']) {

                return true;

            }

            //$value['Pseudo'];

            //echo $key1." : ".$value1."<br>";

        }

    }
    return false;
}
//echo addUser($user);
