<?php
include('header.php');
?>

 <!-- Pour essayer : admin admin OU Yun yun -->
<section class="section_connect">
    <article class="crea_form">
        <h3>Se connecter</h3>
        <form method="post" action="Connect/check">
            <input type="text" name="pseudo" placeholder="nom">
            <input type="password" name="mdp" placeholder="mdp">
            <button type="submit">Se connecter</button>
        </form>
    </article>
    <a href="/pokeFight">Revenir à la page d'accueil</a>
</section>
<?php
include('footer.php');
?>