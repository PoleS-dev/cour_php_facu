<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<style>
        form {
            max-width: 500px;
            margin: auto;
            padding: 1rem;
            background-color: #f5f5f5;
            border-radius: 8px;
        }
 
        label {
            display: block;
            margin-top: 10px;
            font-weight: bold;
        }
 
        input, select {
            width: 100%;
            padding: 0.5rem;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
 
        button {
            margin-top: 15px;
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
 
        button:hover {
            background-color: #0056b3;
        }
</style>
</head>
<body>
   
 
    <h2 style="text-align: center;">Ajouter un nouvel employé</h2>
 
    <form   method="POST" action="form_back_end.php">
<label for="prenom">Prénom</label>
<input type="text" name="prenom" id="prenom" required>
 
        <label for="nom">Nom</label>
<input type="text" name="nom" id="nom" required>
 
        <label for="sexe">Sexe</label>
<select name="sexe" id="sexe" required>
<option value="">-- Sélectionner --</option>
<option value="m">Masculin</option>
<option value="f">Féminin</option>
</select>
 
        <label for="service">Service</label>
<input type="text" name="service" id="service" required>
 
        <label for="date_embauche">Date d'embauche</label>
<input type="date" name="date_embauche" id="date_embauche" required>
 
        <label for="salaire">Salaire (€)</label>
<input type="number" name="salaire" id="salaire" required min="0" step="0.01">
 
        <input name="form-number5" type="submit" value="Enregistrer">
</form>


    
</body>
</html>