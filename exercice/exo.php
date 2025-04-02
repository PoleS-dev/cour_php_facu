<?php


// Debug des erreurs PHP
ini_set('display_errors', 1);
//display error est activé en mettant valeur 1
ini_set('display_startup_errors', 1);
// doit être activé pour afficher les erreur
error_reporting(E_ALL);
// configure PHP pour signaler tous les types d'erreurs
/*
|--------------------------------------------------------------------------
| Exercices PHP — Fonctions, Tableaux, Affichage HTML
|--------------------------------------------------------------------------
| Objectif : Approfondir la manipulation de tableaux, l'affichage HTML
| et la création de fonctions utiles dans des cas concrets (panier, fiche produit, etc).
| Niveau : Débutant
*/

echo "<h1>Liste des exercices PHP</h1>";

/* 
* EXERCICE 1 — Afficher une variable simple
* ------------------------------------------
* Crée une variable $prenom avec ton prénom et affiche-la dans une balise <h2>.
*/
echo "<h2>1. Affichage d'une variable</h2>";
$prenom = "facundo";
echo "<h2>$prenom</h2>";

/*
* EXERCICE 2 — Affichage d’une fiche produit
* ------------------------------------------
* Crée un tableau associatif avec 'nom' => 'Stylo', 'prix' => 1.5
* Affiche ces données dans une structure HTML (ex : <div class='card'>).
*/
echo "<h2>2. Affichage d'une fiche produit en HTML</h2>";

$tab = [
    "nom" => "stylo",
    "prix" => "1.5"
];

?>

<div class="card">
    <p> <?php $tab["nom"]  ?> </p>
    <p> <?php $tab["prix"]  ?> </p>


</div>

<?php

/*
* EXERCICE 3 — Boucle sur un tableau simple
* ------------------------------------------
* Crée un tableau de 5 prénoms et affiche-les dans une liste HTML <ul>.
* ➕ Fonction utile : foreach
*/
echo "<h2>3. Liste de prénoms</h2>";

$liste = ["name1", "name2", "name3"];

foreach ($liste as $valeur): ?>

    <ul>
        <li> <?php echo $valeur  ?> </li>
    </ul>

    <?php endforeach;




/*
* EXERCICE 4 — Générer plusieurs "cartes produit"
* -----------------------------------------------
* À partir d’un tableau contenant plusieurs produits (nom + prix),
* boucler et afficher chaque produit dans une carte HTML.
*/
echo "<h2>4. Cartes produit HTML avec boucle</h2>";

$produit = [
    [
        "nom" => "stylo",
        "prix" => "1.5"
    ],
    [
        "nom" => "voiture",
        "prix" => "100"
    ],
    [
        "nom" => "table",
        "prix" => "10"
    ],
    [
        "nom" => "insecte",
        "prix" => "1"
    ],
];

foreach ($produit as  $index) {

    echo "fffff".$index["nom"];

    foreach ($index as $cle => $valeur) { ?>

        <div>

            <p> <?php echo $cle . " : " . $valeur   ?> </p>

        </div>



    <?php }
}


/*
* EXERCICE 5 — Addition simple
* -----------------------------
* Crée deux variables $prix1 et $prix2, calcule la somme et affiche
* le total sous forme de texte : "Total : XX €"
*/
echo "<h2>5. Addition de deux prix</h2>";
$prix = 2;
$prix2 = 3;
function sum($a, $b)
{

    $result = $a + $b;

    return "<p> Total :  $result $  </p>";
}

echo sum($prix, $prix2);




/*
* EXERCICE 6 — Ajouter la TVA
* ----------------------------
* Crée une fonction ajouterTVA($prix) qui retourne le prix TTC (20% de TVA).
* ➕ Math : $prix * 1.2
*/
echo "<h2>6. Calcul de la TVA</h2>";

function ajouterTVA($prix) {

    return $prix*1.2;
}

/*
* EXERCICE 7 — Compter des éléments
* ---------------------------------
* Crée un tableau de produits et affiche le nombre total de produits.
* ➕ Fonction utile : count()
*/
echo "<h2>7. Compter les produits</h2>";



/*
* EXERCICE 8 — Fonction d'affichage réutilisable
* ----------------------------------------------
* Crée une fonction afficherProduit($produit) qui prend un tableau associatif
* et affiche une carte HTML avec le nom et le prix du produit.
*/
echo "<h2>8. Fonction réutilisable pour afficher un produit</h2>";
$tab2 =  [
    [
        "nom" => "stylo",
        "prix" => "1.5",
        "description" => "lorem ipsum",
        "tab" => [
            "tab1" => "tab..",
            "tab2" => "..tab"
        ],
        "img" => "https://images.pexels.com/photos/38136/pexels-photo-38136.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1"
    ],
    [
        "nom" => "chaise",
        "prix" => "80",
        "description" => "lorem ipsum",
        "tab" => [
            "tab1" => "tab..",
            "tab2" => "..tab"
        ],
        "img" => "https://images.pexels.com/photos/38136/pexels-photo-38136.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1"
    ],
    [
        "nom" => "table",
        "prix" => "35",
        "description" => "lorem ipsum",
        "tab" => [
            "tab1" => "tab..",
            "tab2" => "..tab"
        ],
        "img" => "https://images.pexels.com/photos/38136/pexels-photo-38136.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1"
    ],

];
function afficherProduit($produit)
{
    ?>
    <style>
        .list2 {
            background-color: greenyellow;
            border: 1px solid black
        }

        img {
            max-width: 100%;
        }

        section {
            width: 100%;
            display: flex;
            gap: 10px;
            background-color: aqua;

            flex-wrap: wrap;
        }

        article {
            background-color: yellow;
            min-width: 15rem;
            max-width: 15rem;
            margin: auto;
            border: 1px solid gray;
            flex-wrap: wrap;
            display: flex;


        }

        .ul {
            background-color: green;
        }
    </style>

<?php
    echo "<section>";
    if (is_array($produit)) {

        foreach ($produit as $index) {
            echo "<article>";

            if (array_key_exists("img", $index)) {

                echo "<img src='" . $index["img"] . " ' alt='img' >";
            }
            foreach ($index as $cle => $valeur) {

                if ($cle !== "img") {
                    echo "<div class='container_text'>";


                    if (is_array($valeur)) {
                        echo "<ul >";
                        echo " <li>" . $cle;
                        echo "<ul class='ul'>";

                        foreach ($valeur as $cles => $val) {

                            echo " <div class='list2'>";


                            echo "<li>";
                            echo $cles . " : " . $val;
                            echo "</li>";

                            echo "</div>";
                        }
                        echo "</ul>";
                        echo "</li>";
                        echo "</ul>";
                    } else {

                        echo " <ul>";
                        echo  "<li> " . $cle . " : " . $valeur . "</li>";

                        echo " </ul>";
                    }
                    echo "</div>"; //div container
                }
            }


            echo "</article>";
        }
    } else {
        echo "pas un tableau";
    }

    echo "</section>";
}

afficherProduit($tab2);

/*
* EXERCICE 9 — Total du panier
* -----------------------------
* À partir d’un tableau de produits (chacun avec 'nom' et 'prix'),
* calcule et affiche le total général avec une boucle.
*/
echo "<h2>9. Total d'un panier</h2>";

$tabSum = [];
foreach ($tab2 as $index) {

    $prix = $index["prix"];
    echo "prix unité : " . $prix . "<br>";

    $tabSum[] = $prix;
}
echo "total de votre commande : " . array_sum($tabSum) . "<br>";
var_dump($tabSum);

/*
* EXERCICE 10 — Appliquer une remise
* ----------------------------------
* Crée une fonction appliquerRemise($prix, $pourcentage)
* qui retourne le prix après réduction.
*/
echo "<h2>10. Prix avec remise</h2>";

function appliquerRemise($prix, $pourcentage)
{

    // calcul remise
    $remise = $prix * ($pourcentage / 100);

    return $prix - $remise;
}

//  remise sur chaise du tableau $tab2

echo $tab2[1]["prix"] . "<br>"; // 

$prixSansRemise = $tab2[1]["prix"];
$poucentage = 30;
echo $prixAvecRemise = appliquerRemise($prixSansRemise, $poucentage);
$tab2[1]["prix"] = $prixAvecRemise;
var_dump($tab2);



/*
* EXERCICE 11 — Ajouter au panier
* -------------------------------
* Crée une fonction ajouterAuPanier($panier, $produit)
* qui retourne un nouveau tableau avec le produit ajouté.
*/
echo "<h2>11. Ajouter un produit au panier</h2>";

function ajouterAuPanier($panier, $produit)
{
    // Ajoute le produit au tableau du panier
    $panier[] = $produit;

    // Retourne le panier mis à jour
    return $panier;
}

// Exemple de panier initial (peut être initialement vide ou contenant des produits)
$panier = [
    ['nom' => 'Stylo', 'prix' => 1.20, 'quantite' => 2],
    ['nom' => 'Cahier', 'prix' => 2.45, 'quantite' => 1]
];

// Nouveau produit à ajouter
$produit = ['nom' => 'Gomme', 'prix' => 0.50, 'quantite' => 3];

// Appel de la fonction pour ajouter le produit au panier
$panierMisAJour = ajouterAuPanier($panier, $produit);

//  le contenu du panier après l'ajout
var_dump($panierMisAJour);
$panier = $panierMisAJour;
var_dump($panier);
$countPanier = [];
foreach ($panier as $index) {

    $countPanier[] = $index["quantite"];
}

var_dump($countPanier);
echo array_sum($countPanier);

?>


<p>affichage du total des produits dans le DOM</p>

<button style="margin: auto;position:relative;padding:20px;">

    <div style="position: absolute; top:0; padding:2px; border:1px solid; right:0;color:red">
        <?php echo array_sum($countPanier);   ?>
    </div>

    voir mon panier
</button>





<?php

/*
* EXERCICE 12 — Afficher un panier vide ou non
* --------------------------------------------
* Vérifie si un tableau $panier est vide. S'il l’est, afficher un message,
* sinon, afficher les produits.
* ➕ Fonction utile : empty()
*/
echo "<h2>12. Vérification panier vide ou rempli</h2>";

/*
* EXERCICE 13 — Moyenne des notes
* -------------------------------
* Crée un tableau de notes (ex : [12, 14, 18]) et calcule la moyenne.
* ➕ Fonctions utiles : array_sum(), count()
*/
echo "<h2>13. Moyenne d'un tableau</h2>";

/*
* EXERCICE 14 — Trier un tableau
* -------------------------------
* Crée un tableau de prix, trie-le par ordre croissant.
* ➕ Fonction utile : sort()
*/
echo "<h2>14. Tri des prix croissants</h2>";

/*
* EXERCICE 15 — Filtrer produits à moins de 10 €
* ------------------------------------------------
* Crée une fonction qui retourne un tableau avec uniquement
* les produits à moins de 10€.
*/
echo "<h2>15. Filtrer les produits abordables</h2>";

/*
* EXERCICE 16 — Tableau d’utilisateurs
* -------------------------------------
* Crée un tableau avec plusieurs utilisateurs (nom, email, âge)
* et affiche-les dans des cartes HTML.
*/
echo "<h2>16. Fiches utilisateurs</h2>";

/*
* EXERCICE 17 — Table de multiplication
* --------------------------------------
* Crée une fonction tableMultiplication($n) qui affiche la table du nombre donné.
*/
echo "<h2>17. Table de multiplication</h2>";

/*
* EXERCICE 18 — Formater un prix
* -------------------------------
* Crée une fonction formaterPrix($prix) qui :
*  - affiche 2 chiffres après la virgule
*  - ajoute "€"
* ➕ Fonction utile : number_format()
*/
echo "<h2>18. Formater un prix</h2>";

/*
* EXERCICE 19 — Afficher les produits chers
* ------------------------------------------
* À partir d’un tableau de produits, affiche uniquement ceux
* dont le prix est > 50€.
*/
echo "<h2>19. Filtrer les produits chers</h2>";

/*
* EXERCICE 20 — Simuler un panier complet
* ----------------------------------------
* À partir d’un tableau de produits avec :
*  - nom
*  - prix unitaire
*  - quantité
* Affiche chaque ligne avec prix total (prix * quantité)
* puis affiche le total global du panier.
*/
echo "<h2>20. Panier complet (HTML + Calcul)</h2>";

?>