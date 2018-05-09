<header>
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <a class="navbar-brand" href="#">Accueil</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav mr-auto">
                <?php
                // il regarde si il peut ouvrir le dossier, puis si il y a des fichiers il retire les fichiers avec les '.''..' ect...
                // il retire l'extension php et affiche tout ça dans une balise <a>
                if ($handle = opendir('./contents')) {
                    while (false !== ($entry = readdir($handle))) {
                        if ($entry != "." && $entry != ".." && $entry != "404.php" && $entry != "index.php") {
                            $base = basename($entry,'.php');
                            echo "<a href=\"?p=$base\"> $base</a>";
                        }
                    }
                    closedir($handle);
                }
                ?>
                </ul>
                <?php
                // si il n'y a pas d'username de connecté, cela affiche ce qu'il y a dans la balise form
                if ($_SESSION['username'] == ""){
                    ?>
                    <form method="POST" action="/scripts/login.php" class="form-inline my-2 my-lg-0">
                        <input class="form-control mr-sm-2" name="username" id="username" placeholder="Username" type="text">
                        <input class="form-control mr-sm-2" name="password" id="password" placeholder="Password" type="password">
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Login</button>
                    </form>

                    <?php
                    //sinon cela nous affiche le bouton de deco avec l'username
                    }else{
                        ?>
                        <a class="btn btn-outline-danger my-2 my-sm-0" href="/scripts/login.php">Hello <?= $_SESSION['username'] ?> , Deco</a>
                        <?php
                    }
                    ?>
        </div>
    </nav>
</header>
