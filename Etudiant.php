<?php
class Etudiant {
    private $nom;
    private $notes;
    public function __construct($nom, $notes) {
        $this->nom = $nom;
        $this->notes = $notes;
    }

    public function getNom() {
        return $this->nom;
    }

    public function getNotes() {
        return $this->notes;
    }

    public function calculerMoyenne() {
        $total = array_sum($this->notes);
        $count = count($this->notes);
        return $count > 0 ? $total / $count : 0;
    }

    public function estAdmis() {
        return $this->calculerMoyenne() >= 10 ? 'admis' : 'non admis';
    }
}
?>