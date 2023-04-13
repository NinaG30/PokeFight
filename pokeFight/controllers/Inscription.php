<?php


class Inscription extends controller
{
    public function index()
    {
        $this->render('inscription');
    }

    public function ajouterJoueur(){

        $joueur = new JoueurDAO;           
        if ($joueur->joueurCreation($_POST)){ 
            $retour['message'] = ['msg' => "Nous vous remerçions pour votre inscription. Redirection vers la page d'accueil dans quelques instants..."];
            $this->set($retour);        
            $this->render('transition');
            ?><meta http-equiv="refresh" content="2;url= /pokeFight"> <?;
        }
        
    }
}