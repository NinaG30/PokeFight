<?php

class Creation extends controller
{
    public function index()
    {
        $this->render('creationPokemon');
    }

    
    public function ajouterPokemon()
    {
        $pokemon = new PokemonDAO;  
      
        if ($pokemon->pokemonCreation($_POST)){ 
            $retour['message'] = ['msg' => "Pokemon ajouté. Redirection vers la page d'accueil dans quelques instants..."];
            $this->set($retour);        
            $this->render('transition');
            ?><meta http-equiv="refresh" content="1;url= /pokeFight"> <?;
        }
    }

}