<?php

class Connect extends controller
{
    public function index()
    {
        $this->render('connect');
    }

    public function check()
    {

        $checkJoueur = new JoueurDAO;

        if ($checkJoueur->verify($_POST) === 1) 
        {
        
            echo "<script> window.location.href='/pokeFight'</script>";

        } elseif ($checkJoueur->verify($_POST) === 2) 
        {   
            echo "Ton mot de passe est incorrect <a href='/pokeFight/Connect'>Retour</a>";          

        } elseif ($checkJoueur->verify($_POST) === 3) 
        {
            echo "Ton pseudo est incorrect <a href='/pokeFight/Connect'>Retour</a>";           

        } else 
        {
            echo "Ton pseudo et ton MDP est incorrect <a href='/pokeFight/Connect'>Retour</a>";             
        }

    }

}