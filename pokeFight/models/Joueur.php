<?php

class Joueur
{

    private $id_joueur;
    private $pseudo;
    private $score; 
    private $compta;
    private $pokemon;
    // (3 points en cas de victoire, 1 point 
    // en cas d’égalité, 0 point en cas de défaite)

    public function __construct($i, $p, $s)
    {
       
        $this->id_joueur = $i;
        $this->pseudo = $p;
        $this->score = $s;
    }

    //SETTERS
    public function setPokemon($pokemon) {
        $this->pokemon = $pokemon;
      }

      public function setScore($gain) {
        $this->score += $gain;
      }
    
    public function setCompta($compta) {
      $this->compta = $compta;
    }
    //GETTERS

    public function getPokemon() {
        return $this->pokemon;
      }

      public function getScore() {
        return $this->score;
      }

      public function getCompta() {
        return $this->compta;
      }


}