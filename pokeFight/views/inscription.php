<?php
include('header.php');
?>
<section>
    <!-- Besoin de verifier si le pseudo est déjà pris -->
    <div class="crea_form">
        <form method="POST" action="Inscription/ajouterJoueur">
            <h3>Créer un nouveau compte</h3>
            <input type="text" name="pseudo" placeholder="Entre un pseudo" required><br>
            <input type="email" name="email" placeholder="Entre un email" required><br>
            <input type="password" name="mdp" placeholder="Entre un password" required><br>
            <button type="submit">S'enregistrer</button>
        </form>
    </div>    
    <a href="/pokeFight">Revenir à la page d'accueil</a>
    </section>
    <?php
include('footer.php');
?>