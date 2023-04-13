<?php

class Pokemon
{
    private $id_pokemon;
    private $nom;
    private $PV;
    private $PVmax;
    private $PC;
    private $type;
    private $potion = 3;

    public function __construct($i, $n, $pv, $pc, $t)
    {
        $this->id_pokemon = $i;
        $this->nom = $n;
        $this->PV = $pv;
        $this->PC = $pc;
        $this->type = $t;
        $this->PVmax = $pv;
    }

    public function __toString()
    {
        return $this->nom . " " . $this->PV . " " . $this->PC . $this->type;
    }

    public function EstVivant()
    {
        if ($this->PV <= 0) {
            return FALSE;
        } else {
            return TRUE;
        }
    }

    public function Attaque($pokemon)
    {
        switch ($this->type) {
            case 'FEU':
                if ($pokemon->type === 'PLANTE') {
                    $dmg = $this->PC * 2;
                } elseif ($pokemon->type === 'ELECTRIK') {
                    $dmg = $this->PC;
                } else {
                    $dmg = $this->PC * 0.5;
                }
                break;
            case 'EAU':
                if ($pokemon->type === 'FEU') {
                    $dmg = $this->PC * 2;
                } elseif ($pokemon->type === 'ELECTRIK') {
                    $dmg = $this->PC;
                } else {
                    $dmg = $this->PC * 0.5;
                }
                break;
            case 'PLANTE':
                if ($pokemon->type === 'EAU') {
                    $dmg = $this->PC * 2;
                } elseif ($pokemon->type === 'ELECTRIK') {
                    $dmg = $this->PC;
                } else {
                    $dmg = $this->PC * 0.5;
                }
                break;
            default:
                if ($pokemon->type === 'EAU') {
                    $dmg = $this->PC * 2;
                } elseif ($pokemon->type === 'FEU') {
                    $dmg = $this->PC;
                } else {
                    $dmg = $this->PC * 0.5;
                }
                break;
        }
        echo "<p style='color:#f1d784;'>" . $this->nom . " attaque " . $pokemon->getNom() . " .</p>";

        $pokemon->subPV($dmg);
        $pokemon->BoitPotion(rand(5, 20));

    }

    //Utilise une potion (3 max)
    public function BoitPotion($gain)
    {
        if ($this->PV < 15 && $this->PV > 0) {
            if ($this->potion != 0) {
                echo "<p style='color:#abebab;'>" . $this->nom . ' utilise une potion</p>';

                $this->addPV($gain);
                echo "<p style='color:#abebab;'>" . $this->nom . " regagne " . $gain . " PV ! Il lui reste désormais " . $this->PV . " PV et " . $this->potion . " potion(s).</p>";
            } else {
                ;
            }
        } else {
            ;
        }
    }

    //Ajoute des PV au pokémon 
    public function addPV($gain)
    {

        $this->PV += $gain;
        $this->potion--;
    }

    // Retire des PV au pokémon adverse
    public function subPV($dmg)
    {

        if ($this->EstVivant() === TRUE) {
            $this->PV -= $dmg;
            echo "<br>" . $this->nom . " subit " . $dmg . " dmg. <br>";
            if ($this->PV > 0) {
                echo  $this->nom . " a désormais " . $this->PV . " PV.";
                echo '<br>Le combat continue';
                return $this->PV;
            } else {
                echo "<p style='color:#ffb7b7;'>" . $this->nom . " est mort.</p>";
                return FALSE;
            }
        } else {
            ;
        }

    }


    //GETTERS
    public function getPVmax()
    {
        return $this->PVmax;
    }

    public function getPV()
    {
        return $this->PV . " PV.";
    }

    public function getPotion()
    {
        return $this->potion;
    }

    public function getNom()
    {
        return $this->nom;
    }
    public function getId()
    {
        return $this->id_pokemon;
    }


    //SETTERS 



    public function setPV($new)
    {
        $this->PV = $new;
    }


}