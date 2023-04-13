<?php
include('header.php');
?>
<!-- //! ne prends pas en compte le lien style.css mis dans le header.php : je ne sais pas pourquoi -->
<style>
    @import url("https://fonts.googleapis.com/css2?family=Inter&family=Montserrat+Alternates&display=swap");

    body {
        margin: 0;
        padding: 0;
        background: whitesmoke;
        font-family: "Montserrat Alternates", sans-serif;
        box-sizing: border-box;
    }


    header {

        background-image: url("https://zupimages.net/up/23/14/tuen.png");
        background-size: cover;
        background-position: bottom;
        height: 40vh;
        display: flex;
        align-items: center;
    }

    header div {
        width: 100%;
        color: white;
    }

    header div h1 {
        background: #19245cb3;
        padding: 5px;
        text-shadow: 1px 1px 2px black;
        font-size: 2.5em;
    }

    header div p {
        margin: 0 10px;
        width: 50%;
        background: #19245cb3;
        font-size: 0.8em;
        padding: 5px;
    }

    .flex {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-around;
        align-items: center;
    }

    h2 {
        text-align: center;
    }

    article {
        width: 80%;
        margin: 10px auto;
        background-image: url('https://zupimages.net/up/23/15/qn46.jpg');
        background-size: cover;
        background-position: center;
        background: #19245CB3;

        padding: 10px;
        color: white;

    }

    a {
        display: block;
        text-align: center;
        width: 200px;
        text-decoration: none;
        margin: 10px auto;
        padding: 10px;
        background: #19245c;
        color: white;
        font-size: 0.8em;
        border-radius: 10px;
    }

    a:hover,
    button:hover {
        background: #aeb8ec;
        color: black;
    }

    button {
        display: block;
        background: #19245c;
        color: white;
        padding: 10px;
        border: none;
        margin: 10px auto;
        font-family: "Montserrat Alternates", sans-serif;
    }
</style>

<section>

    <h2>Que le combat commence !</h2>
    <article>
        <?php

        //J'instancie un objet Joueur de la classe JoueurDAO
        $joueur = new JoueurDAO;

        //Je ramène de la BDD et stocke les données du joueur connecté dans une variable
        $result = $joueur->getJoueurById();

        //J'instancie un objet de la classe Joueur avec les données rapportées de la BDD
        $joueur1 = new Joueur(
            $result[0]['id_joueur'],
            $result[0]['pseudo'],
            $result[0]['score']
        );

        // Pour voir l'objet :
        // var_dump($joueur1);
        

        //J'instancie un objet pokemon de la classe PokemonDAO
        $pokemon = new PokemonDAO;

        // Si le joueur a choisi l'option 'solo' sur la page d'accueil :
        if ($_POST['jeu'] == 'solo') {

            // Ramène et stocke dans res les infos du pokémon sélectionné sur la page d'accueil
            $res = $pokemon->getPokemonById($_POST['pokemon']);

            //Instancie un pokémon avec les données du pokemon sélectionné
            $pokemon1 = new Pokemon(
                $res[0]['id_pokemon'],
                $res[0]['nom'],
                $res[0]['PV'],
                $res[0]['PC'],
                $res[0]['Type']
            );

            //Associe le pokémon sélectionné au joueur1 
            $joueur1->setPokemon($pokemon1->getNom());

            // Si le retour de rangPokemon est TRUE, j'instancie un objet avec un pokémon aléatoirement 
            // choisi dans ma table Pokemons
            if ($result = $pokemon->randPokemon($_POST['pokemon'])) {

                $pokemon2 = new Pokemon(
                    $result[0]['id_pokemon'],
                    $result[0]['nom'],
                    $result[0]['PV'],
                    $result[0]['PC'],
                    $result[0]['Type']
                );


                //Pokémon choisi
                echo $pokemon1->getNom() . " : " . $pokemon1->getPV() . "<br>";
                //Pokémon adverse
                echo $pokemon2->getNom() . " : " . $pokemon2->getPV() . "<br>";

            }

            // Dans le cas où le joueur à choisi une partie à 2 :
        } elseif ($_POST['jeu'] == 'duo') {

            //Ramène le pokémon choisi dans le 1er select
            $res = $pokemon->getPokemonById($_POST['pokemon']);
            //Instancie un objet de la classe Pokemon 
            $pokemon1 = new Pokemon(
                $res[0]['id_pokemon'],
                $res[0]['nom'],
                $res[0]['PV'],
                $res[0]['PC'],
                $res[0]['Type']
            );

            // Ramène le pokémon choisi dans le 2nd select
            $res2 = $pokemon->getPokemonById($_POST['pokemon2']);
            //Instancie un objet de la classe Pokemon 
            $pokemon2 = new Pokemon(
                $res2[0]['id_pokemon'],
                $res2[0]['nom'],
                $res2[0]['PV'],
                $res2[0]['PC'],
                $res2[0]['Type']
            );

            //Pokémon choisi
            echo $pokemon1->getNom() . " : " . $pokemon1->getPV() . "<br>";
            //Pokémon adverse
            echo $pokemon2->getNom() . " : " . $pokemon2->getPV() . "<br>";
        }


        //Boucle pour le combat. Tant que pokemon1 et pokemon2 sont en vie, ils combattent
        while ($pokemon2->EstVivant() != FALSE && $pokemon1->EstVivant() != FALSE) {
            flush();
            $pokemon1->Attaque($pokemon2);
            sleep(2);
            flush();
            // Condition pour vérifier si le pokemon adverse est en vie avant de lancer
            // la seconde méthode
            if ($pokemon2->EstVivant() != FALSE) {
                $pokemon2->Attaque($pokemon1);
            } else {
                ;
            }
            sleep(2);

        }

        //Si pokemon1 est mort 
        if ($pokemon1->EstVivant() === FALSE) {
            echo "<p style='text-align:center;font-size:2em;'><strong>" . $pokemon2->getNom() . " est 
        le grand vainqueur !</strong></p>";
            //Ajoute à la variable de session 'score' le résulat (pour score total)
            $_SESSION['score'] = $_SESSION['score'] + 0;
            //Ajoute à l'objet joueur1 le résulat du combat actuel
            $joueur1->setCompta(0);

            //Si pokemon2 est mort
        } else {
            echo "<p style='text-align:center;font-size:2em;'><strong>" . $pokemon1->getNom() . " est 
        le grand vainqueur !</strong></p>";
            $_SESSION['score'] = $_SESSION['score'] + 3;
            $joueur1->setCompta(3);
        }
        ?>

    </article>

    <!-- form pour envoyer les données du score du combat + id du joueur + id du pokemon -->
    <form action="recordCombat" method="POST">
        <input name="joueur" type="hidden" value="<?= $_SESSION['id_joueur']; ?>">
        <input type="hidden" name="score" value="<?= $joueur1->getCompta(); ?>">
        <input type="hidden" name="pokemon" value="<?= $pokemon1->getId(); ?>">

        <button type='submit'>Suivant</button>
    </form>

</section>