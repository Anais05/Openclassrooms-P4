
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width" />
        <meta name="description" content="Blog de Jean Forteroche pour 'billet simple pour l'Alaska'" />
        <meta name="keywords" content="billet simple pour l'Alaska">

        <meta property="og:title" content="billet simple pour l'Alaska de Jean Forteroche" />
        <meta property="og:type" content="website" />
        <meta property="og:url" content="http://projet4-jeanforteroche.anais-assamoi.fr/" />
        <meta property="og:image" content="http://projet4-jeanforteroche.anais-assamoi.fr/public/img/alaska-banniere.png" />

        <link rel="stylesheet" type="text/css" href="../public/CSS/stylesheet.css">
        <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro&display=swap" rel="stylesheet">       
        <link rel="shortcut icon" type="image/x-icon" href="../public/img/favicon.ico">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
        <title><?= $title ?></title>
    </head>

    <body>

        <div id="page">

            <header id="accueil">
                <h1 id="auteur"> Jean <span>Forteroche</span> </h1>
                    <nav id="menu">
                        <ul>
                            <li><a href="index.php?action=home">Accueil</a></li>
                                <?php
                                    if (!empty($_SESSION))  {
                                        echo '<li><a href="index.php?action=logout">Déconnexion</a></li>';
                                    } else {
                                        echo '<li><a href="index.php?action=login">Connexion</a></li>';
                                    }
                                    ?>
                                    <li><a href="index.php?action=adminLogin">Admin</a></li>
                                    <?php
                                    if (!empty($_SESSION)) {
                                        echo "<li class = 'utilisateur'><i class='fas fa-user'></i>" . htmlspecialchars($_SESSION['pseudo']) . "</li>";
                                    }
                                ?>
                                
                        </ul>
                    </nav>
                    <span id="bars"><i class="fas fa-bars"></i></span>
            </header>

            <div id="banniere">
                <div class="body">
                    <h2>Billet simple pour l'Alaska</h2>
                </div>
            </div>

            <section id="container">

                <div id="sidebar">
                    <img src="../public/img/intro.jpg" alt="montagne">
                    <div>
                        <p> Bienvenue sur mon blog ! </br>Pour mon 5e ouvrage, j'ai décidé d'innover et de rendre ce livre interactif.
                        j'ai eu l'idée de partager mon nouveau roman <span class="oeuvre">"Billet Simple pour l'Alaska" </span>de manière innovante et entièrement gratuite. 
                        Un nouveau chapitre sera posté au fur et à mesure sur le blog. N’hésitez pas à laisser des commentaires. Bonne lecture à tous !</p> 
                        <p class="signature" >Jean Forteroche</p>
                    </div>
                </div>

                <div class="content">
                    <?= $content ?>
                </div>

            </section>


            <footer>
                <div id="footer">
                    <div class="siteLink">
                        <h3>Navigation</h3>
                        <div  id="siteLink">
                            <a href="index.php?action=home">Accueil</a></br>
                            <a href="index.php?action=login" >Connexion</a></br>
                            <a href="index.php?action=subscribe">Inscription</a></br>
                        </div>
                    </div>
                    <div class="about">
                        <h3>En savoir plus</h3>
                        <div id="about">
                            <a href="index.php?action=biographie" class="text-white">L'auteur</a></br>
                        </div>
                    </div>
                </div>
            </footer>

            <script src="../public/js/messages.js"></script>
            <script src="../public/js/burgerMenu.js"></script>
            
        </div>
    </body>
</html>



