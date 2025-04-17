<?php
/**
 * SUPERGLOBALES PHP : Définitions détaillées
 *
 * ➤ $_GET :
 *   Permet de récupérer les données envoyées par l'URL (ex : page.php?nom=Jean).
 *   Les données sont visibles dans l’URL, donc non confidentielles.
 *   Utilisé pour les recherches, les liens rapides, ou les filtres.
 *
 * ➤ $_POST :
 *   Permet de récupérer les données envoyées par un formulaire avec method="POST".
 *   Les données ne sont pas visibles dans l’URL. Convient pour les données sensibles (ex : mot de passe).
 *   Utilisé pour créer, modifier ou supprimer des données.
 *
 * ➤ $_SESSION :
 *   Sert à stocker des données côté serveur pour un utilisateur donné.
 *   Les données restent disponibles d’une page à l’autre tant que la session n’est pas détruite ou expirée.
 *   Idéal pour conserver un panier, un état de connexion, ou un compteur de visites.
 *   Nécessite un appel à session_start() au début du script.
 *
 * ➤ $_COOKIE :
 *   Stocke des informations côté client (navigateur) sous forme de petits fichiers.
 *   Utile pour garder des préférences (ex : pseudo, thème, dernier produit consulté).
 *   Peut être défini avec setcookie(nom, valeur, expiration).
 *   Attention : le cookie n’est disponible qu’à partir du prochain chargement de page.
 *
 * ➤ Toutes ces variables sont dites "superglobales" car elles sont disponibles dans tous les contextes PHP automatiquement.
 */
/**
 * Exercices sur les superglobales PHP
 *
 * Les superglobales $_GET, $_POST, $_SESSION et $_COOKIE permettent de manipuler
 * des données envoyées depuis des formulaires ou stockées côté client/serveur.
 *
 * Objectif : 20 exercices pratiques.
 *
 * ➤ 10 exercices avec $_GET et $_POST
 * ➤ 10 exercices avec $_SESSION et $_COOKIE 
 */

// -------------------------------------------
// EXERCICES 1 à 10 — $_GET et $_POST
// -------------------------------------------

/**
 * 1. Créer un formulaire qui demande le prénom en GET et l'affiche avec un message de bienvenue.
 * 2. Créer un formulaire avec méthode POST demandant nom et prénom, puis les afficher.
 * 3. Créer un formulaire qui demande un email et vérifier s’il est vide (POST).
 * 4. Créer un formulaire GET avec deux champs <input type="number">. Afficher la somme des deux après soumission.
 *    Utiliser la fonction intval() pour convertir les valeurs string en int. Exemple : intval($_GET['nombre1']).
 * 5. Créer un formulaire GET avec une liste <select> de couleurs. Afficher un texte dans la couleur choisie.
 * 6. Créer un formulaire POST avec une liste déroulante <select> contenant des pays (ex : France, Italie, Japon...).
 *    Une fois soumis, afficher un message du style "Vous avez choisi : [pays]".
 *    Utilisez <form method="post"> avec une balise <select name="pays"> et des <option>.
 * 7. Créer un formulaire POST avec plusieurs cases à cocher <input type="checkbox" name="fruits[]"> pour sélectionner des fruits (ex : pomme, banane, raisin).
 *    Afficher ensuite les fruits sélectionnés avec implode(', ', $_POST['fruits']). Cette fonction transforme un tableau en chaîne séparée par des virgules.
 * 8. Créer un formulaire simple (un champ <input>) avec méthode GET ou POST, puis afficher la méthode utilisée avec $_SERVER['REQUEST_METHOD'].
 *    Cela permet de savoir si l'utilisateur a utilisé un envoi GET ou POST.
 * 9. Formulaire POST avec boutons radio <input type="radio"> (homme/femme/autre). Afficher le choix sélectionné.
 * 10. Créer un formulaire GET avec plusieurs champs (nom, email, âge) puis afficher toutes les données
 *     reçues sous forme de tableau (utiliser print_r($_GET)). Ce formulaire permet de tester la récupération multiple.
 */

// -------------------------------------------
// EXERCICES 11 à 20 — $_SESSION et $_COOKIE
// -------------------------------------------

/**
 * 11. Créer un formulaire POST qui enregistre un nom dans une session.
 * 12. Afficher le nom stocké en session s’il existe.
 * 13. Ajouter un bouton pour détruire la session.
 * 14. Créer un formulaire qui stocke un pseudo dans un cookie pendant 1 heure.
 * 15. Afficher le pseudo stocké dans le cookie.
 * 16. Ajouter un lien pour supprimer le cookie.
 * 17. Créer un compteur de visites avec $_SESSION.
 *     Étapes :
 *     - Démarrer la session avec session_start();
 *     - Vérifier si $_SESSION['visites'] existe avec isset()
 *     - Si non, initialiser la variable à 0 : $_SESSION['visites'] = 0;
 *     - Ensuite, incrémenter à chaque chargement de page : $_SESSION['visites']++;
 *     - Afficher le nombre de visites avec echo
 *     => Ce compteur sera conservé tant que l'utilisateur garde la session active (ou jusqu'à fermeture du navigateur).
 * 18. Enregistrer le dernier produit consulté dans un cookie via un lien (GET).
 * 19. Simuler un panier d'achat en stockant les articles dans une session.
 *     Étapes :
 *     - Créez plusieurs liens (GET) ou boutons (POST) pour ajouter un article au panier (ex : ?add=banane).
 *     - Vérifiez avec isset($_GET['add']) si un produit est demandé.
 *     - Si oui, ajoutez-le à $_SESSION['panier'][] via un tableau.
 *     - Affichez la liste des produits du panier avec un foreach ou implode().
 *     => Le panier est conservé tant que la session est active (utilisateur connecté).
 *     Bonus : ajoutez un bouton pour vider le panier (unset($_SESSION['panier'])).
 * 20.  Créer un mini système de connexion avec login/password et session.
 */

// À vous de coder chaque exercice dans un fichier dédié ou dans un seul fichier avec des conditions !
