<?php
  class Etudiant {

    public $nom;
    private $note;

    public function __construct($a, $b) {
      $this->nom = $a;
      $this->note = $b;
    }

    public function getNote() {
      return $this->note;
    }

    public function setNote($a) {
      if ($a >= 0 && $a <= 20) {
        $this->note = $a;
      } else {
        echo "Note invalide";
      }
    }

    public function afficherMention() {
      if ($this->note >= 16) {
        echo "mention : très bien";
      } elseif ($this->note >= 14) {
        echo "mention : bien";
      } elseif ($this->note >= 12) {
        echo "mention : assez bien";
      } elseif ($this->note >= 10) {
        echo "mention : passable";
      } else {
        echo "mention : à réviser";
      }
    }
  }

  $etudiant = new Etudiant("Mathieu", 8);
  echo $etudiant->getNote();
  $etudiant->setNote(10);
  echo $etudiant->getNote();