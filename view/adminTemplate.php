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
        <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro&display=swap" rel="stylesheet">       
        <link rel="shortcut icon" type="image/x-icon" href="">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
        <script src="https://cdn.tiny.cloud/1/jl6f24ufioica8cezqjtsyw38b0bbm09z9wyvnu3rnqnfatl/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
        <title><?= $title ?></title>
    </head>

    <body>


        <div id="page">

            <header id="accueil">
                <h1 id="auteur"> Jean <span>Forteroche</span> </h1>
                    <nav id="menu">
                        <ul>
                            <li><a href="index.php">Accueil</a></li>
                            <li><a href="index.php?action=createpost">Ajouter un chapitre</a></li>
                            <?php
                                    
                                    if (!empty($_SESSION))  {
                                        echo '<li><a href="index.php?action=logout">Déconnexion</a></li>';
                                    } 
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
                        <p> Bienvenue sur mon blog ! <br>Pour mon 5e ouvrage, j'ai décidé d'innover et de rendre ce livre interactif.
                        j'ai eu l'idée de partager mon nouveau roman <span class="oeuvre">"Billet Simple pour l'Alaska" </span>de manière innovante et entièrement gratuite. 
                        Un nouveau chapitre sera posté au fur et à mesure sur le blog. N’hésitez pas à laisser des commentaires. Bonne lecture à tous !</p> 
                        <p class="signature" >Jean Forteroche</p>
                    </div>
                </div>

                <div class ="content">
                    <?= $content ?>
                </div>
            </section>
            
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.js"></script>
            <script src="../public/js/texteditor.js"></script>
            <script src="../public/js/messages.js"></script>
            <script src="../public/js/burgerMenu.js"></script>


        </div>

    </body>
</html>


			