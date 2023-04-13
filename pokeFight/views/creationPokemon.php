<?php
include('header.php');
?>
<section>
<div class="crea_form">
        <form method="POST" action="Creation/ajouterPokemon">
            <h3>Créer un nouveau pokémon</h3>
            <input type="text" name="nom" placeholder="Entre un nom" required><br>
            <input type="text" name="PV" placeholder="Entre ses PV" required><br>
            <input type="text" name="PC" placeholder="Entre ses PC" required><br>
            <input type="text" name="Type" placeholder="FEU,ELECTRIK,EAU,PLANTE" required><br>
            <button type="submit">Valider</button>
        </form>
    </div>    
    <a href="/pokeFight">Revenir à la page d'accueil</a>
    </section>
<?php
include('footer.php');
?>