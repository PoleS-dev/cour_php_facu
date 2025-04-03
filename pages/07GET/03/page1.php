<!DOCTYPE html>
<html>
<head>
    <title>Formulaire GET</title>
</head>
<body>
    <h2>Formulaire (méthode GET)</h2>

    <p>Pour envoyer des données avec la méthode get via un formulaire :</p>

    <p> Dans la balise form ajouter l'attribut action et mettre le lien du fichier qui traitera les données du formulaire </p>
    <p> Ajouter l'attribut method avec get pour informer de la manière dont sera traitée les données </p>
    <p>Dans les inputs ajouter l'attribut name pour que le backend puisse identifier les noms des clés du tableau $_GET </p>
    <p>La valeur de ces clés sera les données ecris pas le user</p>

    
    <form action="page2.php" method="get">
        
        <label for="nom">Votre nom :</label>
        <input type="text"  name="nom" required>
        <br><br>
        <label for="nom">Votre prénom :</label>
        <input type="text"  name="prenom" required>
        <br><br>
 
        <input type="submit" value="Envoyer">
        <!-- Ne pas oublier de mettre type=submit pour que les données soient recupérer -->
         <!-- toujour dans la balise form -->
    </form>
</body>
</html>