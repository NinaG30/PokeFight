<?php

class Accueil extends controller {
    public function index(){   
        // $joueur = new JoueurDAO;
        $pokemon = new PokemonDAO;
        // $res['res'] = $joueur->getJoueurById();
        $results['results'] = $pokemon->getAllPokemon(); 
        // $this->set($res);   
       
        $this->set($results);
        $this->render('accueil'); 
       
    }
    
}