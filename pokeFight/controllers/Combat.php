<?php
class Combat extends controller
{
    public function fightPokemon()
    {
        $this->render('fight');
    }

    public function recordCombat()
    {
        $joueur = new JoueurDAO;
        $joueur->updateScore();
        $combat = new CombatDAO;
        $combat->insert_histo($_POST);
        echo "<script> window.location.href='/pokeFight'</script>";

    }
}