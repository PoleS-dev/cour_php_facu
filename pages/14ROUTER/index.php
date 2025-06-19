<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
session_start();

// INDEX REGROUPE TOUS LES FICHIERS NECESSAIRES A L'EXECUTION DE L'APPLICATION
require_once "./utils/functions.php";

require_once "config/init.php";


include_once "./includes/header.php";


require_once "router.php";

include_once "./includes/footer.php";


?>