<?php

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    if(isset($_POST['deconnexion'])) {

        unset($_SESSION['name']);
        unset($_SESSION['LAST_ACTIVITY']);
        session_destroy();
        unset($_COOKIE['name']);
    
        header("Location: home");
        exit();
    }
}



?>
