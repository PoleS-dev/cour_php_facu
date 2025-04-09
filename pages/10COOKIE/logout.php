

<?php 

session_start();

if(isset($_POST["logout"])){

    session_unset();
    session_destroy();


    
     // Suppression du cookie 
 // On supprime le cookie "prenom"
setcookie('cookie_name', '', time() - 3600);





    
    header('Location: index.php');
    exit();

}
