<?php ?>


<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="asset/style.css">
</head>

<body>


    <header>


        <nav>


        <!--! <ul>
          

        lien methode get index.php?page=home pour les liens


            <li>
                <a href="index.php?page=home">home</a>
            </li>
            <li>
                <a href="index.php?page=profil">profil</a>
            </li>
            <li>
                <a href="index.php?page=apropos">a propos</a>
            </li>
        </ul> 


        en bas le ul est avec des lien issu du router et de htaccess
    
    
    -->
        <ul>
            <li>
                <a href="home">home</a>
            </li>
            <li>
                <a href="profil">profil</a>
            </li>
            <li>
                <a href="apropos">a propos</a>
            </li>

            <?php if(isset($_SESSION['name'])): ?>
            <li>
                <form action="deconnexion" method="post">
                    <button type="submit" name="deconnexion">se deconnecter</button>
                </form>
            </li>
            <?php else: ?>
            <li>
                <a href="connexion">se connecter</a>
            </li>
            <?php endif; ?>
        </ul>


        </nav>
    </header>




    <main>