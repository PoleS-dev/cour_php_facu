

<?php 
ini_set('display_errors', 1);
error_reporting(E_ALL);


session_start();
var_dump($_COOKIE);
// var_dump($_SESSION);
// var_dump($_COOKIE);

if (isset($_POST['login'])){


if(isset($_POST['prenom'] )&&  isset($_POST['nom']) ){
    
    $_SESSION["prenom"]=$_POST['prenom'];
    $_SESSION["nom"]=$_POST['nom'];
}

       $session_name=$_SESSION["nom"];
       $session_prenom=$_SESSION["prenom"];

if(isset($_POST["cookie_accepted"]) || empty($_POST["cookie_refused"])){
    
    setcookie('cookie_name',$session_name,time()+(86400 * 30),"/cour_php/pages/10COOKIE/");
    setcookie('cookie_prenom',$session_prenom,time()+(86400 * 30),"/cour_php/pages/10COOKIE/");
    setcookie('cookie_accepted', 'true', time() + (86400 * 30), "/cour_php/pages/10COOKIE/");
}
if(isset($_POST["cookie_refused"]) ){
    setcookie('cookie_name', '', time() - 3600, "/cour_php/pages/10COOKIE/");
    setcookie('cookie_prenom', '', time() - 3600, "/cour_php/pages/10COOKIE/");
    setcookie('cookie_accepted', 'false', time() - 3600, "/cour_php/pages/10COOKIE/");
}
    

    header('Location: welcom.php');
    exit();



}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<style>
    .modal{
        width: 50%;
        padding: 5px;
        background-color: greenyellow;
    }
</style>



<form method="post" >

<label for="">nom</label>
<input type="text" value="<?php echo isset($_COOKIE['cookie_name'])  ? htmlspecialchars($_COOKIE['cookie_name']) :""    ?> " name="nom" >

<label for="">prenom</label>
<input type="text"name="prenom" value="<?php echo isset($_COOKIE['cookie_prenom'])  ? htmlspecialchars($_COOKIE['cookie_prenom']) :""    ?>  " >

<input type="submit" name="login" value="login">

</form>

<div class="modal">

<form action="" method="post">

<input type="submit" name="cookie_refused" value="refuser">
<input type="submit" name="cookie_accepted" value="accepter">



</form>




</div>

<script src="https://cdn.jsdelivr.net/npm/js-cookie@3.0.5/dist/js.cookie.min.js"></script>

<script>


    

    console.log(document.cookie)

    function getCookies() {
  const cookies = {};
  document.cookie.split(";").forEach(cookie => {
    const [name, value] = cookie.trim().split("=");
    cookies[name] = decodeURIComponent(value);
  });
  return cookies;
}

const cook =getCookies()
    console.log(cook)
    console.log(Cookies.get('cookie_prenom'))
    

</script>
    
</body>
</html>




