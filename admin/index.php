<!doctype html>
<?php
include ('./lib/php/liste_include.php');
$db = Connexion::getInstance($dsn, $user, $pass);
session_start();
$scripts = array();
$i = 0;
foreach (glob('./lib/js/jquery/*.js')as $js) {
    $fichierJs[$i] = $js;
    $i++;
}
?>

<html>
    <head>
        <title>????</title>
        <meta charset='UTF-8'/>
        <link rel="stylesheet" type="text/css" href="../utilisateur/lib/css/utcss.css"/>
        <link rel="stylesheet" type="text/css" href="./lib/css/style_pc.css"/>
        <link rel="stylesheet" type="text/css" href="./lib/css/style_jquery.css"/>
        <link rel="stylesheet" type="text/css" href="./lib/css/mediaqueries.css"/>

        <?php
        foreach ($fichierJs as $js) {
            ?> <script type="text/javascript" scr="<?php print $js; ?>"></script>
            <?php
        }
        ?>
        <script type="text/javascript" src="./lib/js/fonctionsJqueryAdmin.js"></script>
    </head>

    <body>
        <?php ?> 
        <section id= "all">
            <header id = "header">
                <img src = "./images/?????.???" alt = "Banniere" id = "image_header"/><br/>
                <section id = "deco">
                    <?php
                    if (isset($_SESSION['admin'])) {
                        ?><a href="./lib/php.deconnexion.php">Déconnecter</a>
                        <?php
                    }
                    ?>
                </section>
                </hearder>

                <?php if (!isset($_SESSION['admin'])) {
                    ?>
                    <section id="login">
                        <?php
                        require './pages/identification.php';
                        ?>
                    </section><?php
                } else {
                    ?>
                    <section id="ex">
                        <div class="ex" id="ex1"
                             <ul class="nav">
                                     <?php
                                     if (file_exists('./lib/php/menu.php')) {
                                         include ('./lib/php/menu.php');
                                     }
                                     ?>
                            </ul>
                    </section>

                    <section id="all2">
                        <div class="ex" id="ex1">
                            <?php
                            if (!isset($_SESSION['page'])) {
                                $_SESSION['page'] = "accueil";
                            }
                            if (isset($_GET['page'])) {
                                $_SESSION['page'] = $_GET['page'];
                            }
                            $chemin = './pages/' . $_SESSION['page'] . '.php';
                            if (file_exists($chemin)) {
                                include($chemin);
                            }
                            ?>
                        </div>
                    </section>
                    <footer>Copyright 2015-2016 ?????? - ???????</footer>
                    <?php
                }
                ?>
    </body>
</html>
