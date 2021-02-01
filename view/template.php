<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="Content-Language" content="fr">
        <meta name="Description" content="Optimisez vos chances de gagner au Loto !">
        
        <script src="./public/vendor/jquery/jquery-3.5.1.min.js"></script>

        <link rel="stylesheet" href="./public/vendor/bootstrap/css/bootstrap.min.css">
        <script src="./public/vendor/bootstrap/js/bootstrap.min.js" ></script>

        <script src="https://kit.fontawesome.com/5556f112b7.js" crossorigin="anonymous"></script>

        <title>LotoHACK - <?= $title ?></title>

        <link href="./public/css/common.css" rel="stylesheet"/> 
        <script src="./public/js/main.js"></script>
        <script src="./public/js/fonctions.js"></script>

        <?php if(isset($head)) echo $head; ?>
    </head>
    <body>
        <header role="banner">
            <div class="left-block">
                <img src="./public/images/branding/logo.svg" alt="Logo" class="logo">
            </div>
            <nav>
                <a href="index.php">Accueil</a>
                <a href="statistiques.php">Statistiques</a>
                <a href="reducteur.php">Réducteur</a>
                <a href="generateur.php">Grilles à jouer</a>
                <a href="importation.php">Importation</a>
            </nav>
        </header>
        <div class="header-gradient"><div></div></div>
        <div class="page">
            <main role="main">
                <?= $content ?>
            </main>
            <footer role="contentinfo">
                <div class="container-fluid">
                    <div class="d-flex justify-content-around">
                        <div class="col text-center">
                            <p>&copy; <?= date('Y'); ?> LotoHACK</p>
                            <a href="mentions.php">Mentions légales</a>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </body>
</html>