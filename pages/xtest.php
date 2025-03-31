<?php
session_start();

var_dump($_SESSION);

?>


<nav>

<?php
echo $_SESSION['membre']['name_username'];
?>

</nav>