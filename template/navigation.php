<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Accueil</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">Livre_d_or<span class="sr-only">(current)</span></a>
      </li>
        <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" name="username" id="username" placeholder="Username" type="text">
            <input class="form-control mr-sm-2" name="password" id="password" placeholder="Password" type="password">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Login</button>
        </form>
  </div>
  <?php
                        if ($handle = opendir('./contents')) {
                            while (false !== ($entry = readdir($handle))) {
                                if ($entry != "." && $entry != ".." && $entry != "404.php" && $entry != "index.php" && $entry != "home.php") {
                                    $base = basename($entry,'.php');
                                    echo "<a href=\"?p=$base\">$base</a>";
                                }
                            }
                            closedir($handle);
                        }
                        ?>
</nav>