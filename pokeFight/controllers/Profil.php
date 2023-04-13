<?php


class Profil extends controller
{
    public function index()
    {
        $joueur = new JoueurDAO;
        $results['results'] = $joueur->getJoueurById();
        $r['r'] = $joueur->getScoreById();
        $this->set($results);
        $this->set($r);
        $this->render('profil');
    }

    public function updateJoueur()
    {
        $joueur = new JoueurDAO;
        $joueur->updateMailPseudo($_POST);
        $retour['message'] = ['msg' => "Votre pseudo et votre email ont été mis à jour. Redirection dans quelques secondes."];
        $this->set($retour);
        $this->render('transition');
        ?>
        <meta http-equiv="refresh" content="3;url= /pokeFight/Profil">
        <? ;
        // echo "<script> window.location.href='/pokeFight/Profil'</script>";
    }
}