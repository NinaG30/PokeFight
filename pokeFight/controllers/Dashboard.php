<?php

class Dashboard extends controller
{
    public function index()
    {  $joueur = new JoueurDAO;
        $results['results'] = $joueur->getJoueurs();               
        $this->set($results);        
        $this->render('panneauAdmin');
    }
}