<?php

// ================================================================
//  Définitions PHP Orienté Objet
// ================================================================

/**
 * ➡️ CLASS
 * 
 * Une class est un modèle (un plan) qui définit des propriétés (attributs) et des méthodes (comportements).
 * Elle sert à fabriquer des objets.
 * Exemple :
 * class Voiture { ... }
 */

/**
 * ➡️ OBJET
 * 
 * Un objet est une instance concrète d'une classe.
 * C'est une variable basée sur un modèle défini par une class.
 * Exemple :
 * $voiture1 = new Voiture();
 */

/**
 * ➡️ CONSTANTE
 * 
 * Une constante est une valeur qui ne change pas pendant l'exécution du programme.
 * Elle se déclare avec `const` dans une classe.
 * Exemple :
 * public const TYPE = "Vehicule";
 */

/**
 * ➡️ HERITAGE
 * 
 * L'héritage permet à une classe d'hériter des propriétés et des méthodes d'une autre classe.
 * Cela évite de dupliquer du code.
 * Exemple :
 * class Moto extends Vehicule { ... }
 */

/**
 * ➡️ INSTANCIATION
 * 
 * L'instanciation est le fait de créer un objet basé sur une classe.
 * Cela se fait avec `new`.
 * Exemple :
 * $moto = new Moto();
 */

/**
 * ➡️ METHODE
 * 
 * Une méthode est une fonction définie à l'intérieur d'une classe.
 * Elle représente un comportement ou une action sur l'objet.
 * Exemple :
 * public function demarrer() { ... }
 */

/**
 * ➡️ METHODE MAGIQUE
 * 
 * Les méthodes magiques sont des méthodes spéciales prédéfinies en PHP.
 * Elles commencent et finissent par deux underscores __.
 * Elles sont appelées automatiquement dans certaines situations (création, accès, appel de méthode inconnue, etc.)
 * Exemples :
 * - __construct()  ➔ appelée à la création de l'objet
 * - __destruct()   ➔ appelée à la destruction de l'objet
 * - __get(), __set(), __call(), __clone(), __invoke(), etc.
 */

/**
 * ➡️ PUBLIC
 * 
 * Le mot-clé public rend la propriété ou la méthode accessible de partout (dans et hors de la classe).
 * Exemple :
 * public $marque;
 */

/**
 * ➡️ PRIVATE
 * 
 * Le mot-clé private rend la propriété ou la méthode accessible uniquement à l'intérieur de la classe où elle est définie.
 * Exemple :
 * private $moteur;
 */

/**
 * ➡️ PROTECTED
 * 
 * Le mot-clé protected rend la propriété ou la méthode accessible uniquement à l'intérieur de la classe 
 * et des classes qui héritent de cette classe (héritage).
 * Exemple :
 * protected $vitesse;
 */

// ================================================================
//
// ================================================================

?>
