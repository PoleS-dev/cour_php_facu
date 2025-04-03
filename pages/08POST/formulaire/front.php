<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="utf-8">
	<title>Formulaire 2</title>
</head>
<body>

<?php var_dump($_POST) ?>


<p>Dans un formulaire utilisant la methode POST pour envoyer des données, les information soumisent ne sont pas visible dasn l'URL</p>
<p>Les données envoyées via POST sont incorporer dans le corps  de la requete HTPP</p>

<p>Pour envoyer via méthode POST  indique method = "post" dans balise form</p>
    


<form action="back.php"  method="post"  >


	
	<label>Pseudo </label><br>
	<input type="text" name="pseudo"><br><br>

	<label>Email</label><br>
	<input type="text" name="email"><br><br>

	<input type="submit"  value="Envoyer">
</form>



<form action="back.php?vetement=chemise&couleur=rouge"  method="post"  >


	
	<label>Pseudo </label><br>
	<input type="text" name="pseudo"><br><br>

	<label>Email</label><br>
	<input type="text" name="email"><br><br>

	<input type="submit"  value="Envoyer">
</form>
</body>
</html>