<?php
namespace App;


trait GereSalaries
{
    protected array $salaries = [];

    public function ajouterSalarie(Salarie $salarie): void
    {
        $this->salaries[] = $salarie;
    }

    public function supprimerSalarieParNom(string $nom): void
    {
        $this->salaries = array_filter($this->salaries, fn($s) => $s->getNom() !== $nom);
        // On utilise array_filter pour parcourir le tableau des salariés
        // et ne garder que ceux dont le nom est différent du nom fourni.
        // C'est une manière simple de "supprimer" un salarié par son nom.
        //
        // La fonction fléchée (fn) signifie :
        // "Pour chaque salarié $s, je garde celui dont $s->getNom() n'est PAS égal à $nom"
        //
        // Résultat : tous les salariés avec ce nom seront exclus du tableau.
        //
        // Cela ne supprime qu'en mémoire : il faut réassigner le résultat à $this->salaries
        // array_filter() ne modifie pas le tableau original.
        // Il retourne un nouveau tableau filtré.
    }

    public function getSalaries(): array
    {
        return $this->salaries;
    }

    public function afficherSalaries(): void
    {
        echo "<h4>Salariés de {$this->getNom()} :</h4>";
        foreach ($this->salaries as $s) {
            echo "- " . $s->getNom() . " ({$s->getPoste()})<br>";
        }
    }
}



// Un trait en PHP est une sorte de bloc de code réutilisable.
// Il permet de partager des méthodes ou propriétés entre plusieurs classes,
// sans avoir à utiliser l'héritage (extends).
//
// Contrairement à une classe, un trait ne peut pas être instancié directement.
// On l’utilise dans une classe avec le mot-clé "use".
//
// C’est très utile quand plusieurs classes ont des comportements identiques,
// mais qu’elles n’ont pas de lien logique pour hériter d’une même classe.
//
// Exemple :
//
// trait Logger {
//     public function log($message) {
//         echo "[LOG] " . $message;
//     }
// }
//
// class Utilisateur {
//     use Logger;
// }
//
// $u = new Utilisateur();
// $u->log("Utilisateur connecté.");  // Affiche : [LOG] Utilisateur connecté.
//
// Ce système permet de factoriser du code sans casser la hiérarchie objet.
