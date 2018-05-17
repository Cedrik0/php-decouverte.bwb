<?php
//fonction pour afficher la bar de nav
function getNav(){
    ?>
    <nav class="navbar navbar-expand-lg navbar-expand-md navbar-expand-sm navbar-expand-xl navbar-dark bg-dark">


        <ul class="navbar-nav mr-auto">

    <?php
//chemin vers les dossier qui m'interresse
    $cheminDossier = $_SERVER['DOCUMENT_ROOT'] . '/contents';

    //stoque mes dossiers (scan-dir me retourne que du texte mais n'indique pas pour autant le chemin dans une boucle foreach)
    $dossier = scandir($cheminDossier);

    //je parcours mon dossier
    foreach ($dossier as $fichiers) {

        //gestion de l'affichage de mon url sans l'extension
        $Ressource = basename($fichiers, '.php');

        //j'enleve de la vue l'extension et je remplace les underscore par des espace
        $Fichier = explode("_", basename($fichiers, '.php'));
        $nomFichier = implode(" ", $Fichier);


            //si il y a des dossier avec des points,je les enleves de la vue
            if (!in_array($fichiers, array(".", ".."))) {

                //si c'est pas un dossier (is_dir prend en argument le chemin de mon dossier)
                //DIRECTORY_SEPARATOR s'apadapte suivant l'os utilisé et utilisera le séparateur adequate
                if (!is_dir($cheminDossier . DIRECTORY_SEPARATOR . $fichiers)) {

//au click je cible index.php dans l'url ,je defini ma clé et la ressource qui m'interrese (ex ?chemin=contact.php),la resource vient ce stocker dans la clé
//pour plus de sécurité j'ai enlever l'extension de l'url
                ?>
                <li class="nav-item">
                    <a href="?chemin=<?php echo $Ressource; ?>" class="nav-link"><?php echo $nomFichier; ?></a>
                </li>
                <?php
            }else if (is_dir($cheminDossier . DIRECTORY_SEPARATOR . $fichiers)) {


                    ?>
                    <div class="dropdown show">
                    <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <?php echo $nomFichier; ?>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    <?php

                    $sousDossier = scandir($cheminDossier . DIRECTORY_SEPARATOR . $fichiers);

                    foreach ($sousDossier as $contenu) {

                        if (!in_array($contenu, array(".", ".."))) {

                            ?>

                                <a class="dropdown-item" href="#"> <?php echo $contenu; ?> </a>

                            <?php
                        }
                    }
                }
        }
    }
    ?></div></div><?php
    if(isset($_SESSION['pseudo'])){ ?>
        <li class="nav-item bs-tooltip-right bs-popover-right">
            <form method="get" class="form-inline" action="../script/deconnexion.php ">
                <input type="submit" value="deconnexion" >
            </form>
        </li>
<?php }else{ ?>
        <li class="nav-item bs-tooltip-right bs-popover-right">
            <form method="post" class="form-inline" action="../script/connexion.php">
                <label for="pseudo">Pseudo</label> : <input type="text" name="pseudo" id="pseudo" class="form-control mr-sm-2">
                <label for="mdp">Mot de passe</label> : <input type="password" name="mdp" id="mdp" class="form-control mr-sm-2">
                <input type="submit" value="Connexion" >
            </form>
        </li>

        <?php
    }
    ?>
</ul>
</nav>
  <?php
}

//fonction qui permet de d'afficher le bon contenu correspondant au ancre de ma barre nav
function getNavContent(){


    //si ma clé 'chemin' existe dans l'url
    if(isset($_GET['chemin'])){

//j'insere le contenu de la page qui m'interresse en rajoutant l'extension
        include "contents/".$_GET['chemin'].".php";

    }

}

function decodeMessageJson($fichierDecoder){



    $contenuFichier = file_get_contents($_SERVER['DOCUMENT_ROOT'].'/data/message.json',true);

    $fichierDecoder = json_decode($contenuFichier,true);

    return $fichierDecoder;

}

function getFormLivreDor (){


    ?>
    <div class="row">
    <?php
    if (isset($_SESSION['pseudo'])) {

        ?>
        <div class="col-5">
            <form method="post" action="../script/encode.php" class="forLivreDor">
                <label for="nomLivreDor">Votre nom</label> : <input type="text" name="nomLivreDor" id="nomLivreDor" class="inpLivreDor"/><br/>
                <label for="prenomLivreDor">Votre prenom</label> : <input type="text" name="prenomLivreDor" id="prenomLivreDor"class="inpLivreDor"/><br/>
                <p>
                    <label for="messageLivreDor">message : </label><br/>
                    <textarea name="messageLivreDor" id="messageLivreDor" class="textaLivreDor"></textarea>
                </p>
                <input type="submit" value="Envoyer" class="bouton"/>
            </form>
        </div>
        <?php
    };
     //decodeMessageJson($fichierDecoder);
    include $_SERVER['DOCUMENT_ROOT'].'/script/decode.php';
    ?>
    <div class="col-5 test">
        <?php

        foreach ($fichierDecoder as $key => $value){

            foreach ($value as $key1 => $value1){

                echo $key1." : ".$value1."<br>";


            }
?><hr> <?php

        }?>


    </div>
</div>

<?php
}

//fonction qui permet de rajouter un nouvelle utilisateur dans la bdd
function addUser($user){


    $fichierUsers = file_get_contents($_SERVER['DOCUMENT_ROOT'].'/data/users.json',true);


//strlen retoune le nombre de caractere contenu dans mon fihier
//si mon fichier est vide
    if(strlen($fichierUsers)== 0) {
        //je crée un tableau contenant ma liste d'utilisateur
        $users = array();

        //j'insere le nouvelle utilisateur dans la liste
        array_push($users, $user);


        //j'encode ma liste d'utilisateur
        $TableauUsers = json_encode($users);

        var_dump($TableauUsers);

        //le serveur fait une requete de type post vers le fichier
        file_put_contents($_SERVER['DOCUMENT_ROOT'] . '/data/users.json', $TableauUsers);

        //sinon si mon tableau users existe deja
    }else{

        //je recupere mes utilisateur
        $fichierUsersJson = json_decode($fichierUsers);

        //je stocke mon nouvelle utilisateur
        array_push($fichierUsersJson,$user);

        //j'encode le tous
        $TableauUsers = json_encode($fichierUsersJson);

        //j'envois vers mon fichier
        file_put_contents($_SERVER['DOCUMENT_ROOT'] . '/data/users.json', $TableauUsers);


    }


//je redirige l'utilisateur vers le l'accueil (php(point de vue serveur) crée le contenue du livre d'or et l'envoie sur l'index,le navigateur affiche le contenus !!!!)




}

//function qui permet de vérifier si le nom d'utilisateur et le mot de passe taper a la connexion correspond avec la bdd
function getUser($username,$mdp){

    include $_SERVER['DOCUMENT_ROOT'].'/script/decodeUsers.php';

    foreach ($fichierDecoderUsers as  $value) {




        if ($username === $value['Pseudo'] && $mdp === $value['mdp'] ) {

            $_SESSION['pseudo'] = $username;
            $_SESSION['mdp'] = $mdp;

        }

        //echo $key1." : ".$value1."<br>";

    }

}
