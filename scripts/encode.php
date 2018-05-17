<?php


//je definis un message
$message = array(

        "nom" => $_POST['nomLivreDor'],
        "prenom" => $_POST['prenomLivreDor'],
        'message' => $_POST['messageLivreDor'],


);

//le serveur envoi une requete de type get vers le fichier message.json
//et recupere le fichier sous forme de chainde caractère
//l'argument true sert a rechercher le fichier dans le chemin d'inclusion c'est a dire dans le chemin spécifie en 1er argument

    $contenuFichier = file_get_contents($_SERVER['DOCUMENT_ROOT'].'/data/message.json',true);



    //strlen retoune le nombre de caractere contenu dans mon fichier
    //si mon fichier est vide
    if(strlen($contenuFichier)=== 0){

        //je crée un tableau contenant mes messages
        $listeDeMessages = array();

        //j'insere le message que l'utilisateur a poster dans ma liste de message
        array_push($listeDeMessages, $message);


        //j'encode mon message en json pour l'envoi
        $messageEncoder = json_encode($listeDeMessages);

        //le serveur fait une requete de type post vers le fichier
        file_put_contents($_SERVER['DOCUMENT_ROOT'].'/data/message.json', $messageEncoder);

//sinon,mon tableau liste de message étant déja crée alors...
    }else{




        //je decode mon tableau de json, nouvelle requette de type get du serveur vers mon fichier

        $tableauJson = json_decode($contenuFichier);



        //je rajoute le message dans le tableau que j'ai recuperer de mon fichier

        array_push($tableauJson, $message);



        //je réencode mon tableau en json pour l'envoi

        $messageEncoder = json_encode($tableauJson);



        //le serveur post le contenus vers mon fichier avec les données actualisées

        file_put_contents($_SERVER['DOCUMENT_ROOT'].'/data/message.json', $messageEncoder);


    }
//je redirige l'utilisateur vers le livre d'or (php(point de vue serveur) crée le contenue du livre d'or et l'envoie sur l'index,le navigateur affiche le contenus !!!!)
header('Location: http://www.restalacarte.bwb/?chemin=livre_d_or');


