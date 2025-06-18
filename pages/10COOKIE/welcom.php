<h1>welcome</h1>

<?php
session_start();

if(isset($_COOKIE['cookie_accepted']) && $_COOKIE['cookie_accepted'] === 'true'){
    echo "<p>Cookie accepté</p>";
}else{
    echo "<p>Cookie refusé</p>";
}


?>


<form action="logout.php" method="post">
<input type="submit" value="deconnexion" name="logout">
</form>




