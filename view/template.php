
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width" />
        <meta name="description" content="">
        <meta name="keywords" content="">

        <meta property="og:title" content="" />
        <meta property="og:type" content="website" />
        <meta property="og:url" content="" />
        <meta property="og:image" content="" />

        <link rel="stylesheet" type="text/css" href="../public/CSS/stylesheet.css">
        <link rel="shortcut icon" type="image/x-icon" href="">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
        <title><?= $title ?></title>
    </head>

    <body>

        <div id="page">

            <header id="accueil">
                <h1 id="auteur"> Jean <span>Forteroche</span> </h1>
                    <nav id="menu">
                        <ul>
                            <li><a href="index.php">Accueil</a></li>
                            <li><a href="">Chapitre</a></li>
                            <li><a href="index.php?action=adminLogin">Admin</a></li>

                                <?php
                                    if (!empty($_SESSION))  {
                                        echo '<li><a href="index.php?action=logout">Déconnexion</a></li>';
                                    } else {
                                        echo '<li><a href="index.php?action=login">Connexion</a></li>';
                                    }
                                    if (!empty($_SESSION)) {
                                        echo "<li class = 'utilisateur'><i class='fas fa-user'></i>" . htmlspecialchars($_SESSION['pseudo']) . "</li>";
                                    }
                                ?>
                                
                        </ul>
                    </nav>
            </header>

            <div id="banniere">
                <div class="body">
                    <h2>Billet simple pour l'Alaska</h2>
                </div>
            </div>

            <section id="container">

                <div id="sidebar">
                    <img src="../public/img/1.jpg" alt="montagne">
                    <p> Bienvenue sur mon blog ! Pour mon 3e ouvrage, j'ai décidé d'innover et de rendre ce livre interactif.
                    j'ai eu l'idée de partager mon nouveau roman <span>"Billet Simple pour l'Alaska" </span>de manière innovante et entièrement gratuite. Un nouveau chapitre sera posté au fur et à mesure sur le blog. N’hésitez pas à laisser des commentaires. Bonne lecture à tous ! <br> <span>Jean Forteroche</span> </p>
                </div>

                <div class="content">
                    <?= $content ?>
                </div>
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.js"></script>
                <script src="../js/all-request.js"></script>
            </section>
        </div>
    </body>
</html>



