<?php

require_once('Pokemon.php');

?>

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
        cursor:pointer;
    }
</style>

<section>

    <h2>Que le combat commence !</h2>
    <article>
        <?php

$pokemon1 = new Pokemon (1,'salameche', 40,10,'FEU');
$pokemon2 = new Pokemon (2,'ponyta', 40,10,'FEU');

?>
<form method="POST">
    <input type="hidden" name="boitpotion" value="Boire une potion">
    <button type='submit' id='btn_pots'>Prendre potion</button>
</form>



<?php
if (isset($_POST['boitpotion'])) {
    echo 'coucou';
    $pokemon1->boitpotion(rand(5,20));
}
        //Boucle pour le combat. Tant que pokemon1 et pokemon2 sont en vie, ils combattent
        // while ($pokemon2->EstVivant() != FALSE && $pokemon1->EstVivant() != FALSE) {
        //     flush();
        //     $pokemon1->Attaque($pokemon2);
        //     sleep(2);
        //     flush();
        //     // Condition pour vérifier si le pokemon adverse est en vie avant de lancer
        //     // la seconde méthode
        //     if ($pokemon2->EstVivant() != FALSE) {
        //         $pokemon2->Attaque($pokemon1);
        //     } else {
        //         ;
        //     }
        //     sleep(2);

        // }

        //Si pokemon1 est mort 
        if ($pokemon1->EstVivant() === FALSE) {
            echo "<p style='text-align:center;font-size:2em;'><strong>" . $pokemon2->getNom() . " est 
        le grand vainqueur !</strong></p>";

            //Si pokemon2 est mort
        } else {
            echo "<p style='text-align:center;font-size:2em;'><strong>" . $pokemon1->getNom() . " est 
        le grand vainqueur !</strong></p>";
           
        }
        ?>

    </article>

  
</section>