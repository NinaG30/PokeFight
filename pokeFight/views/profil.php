<?php
include('header.php');
?>
<style>
    p {
        background: #19245c;
        width: 50%;
        margin: 10px auto;
        padding: 5px;
        box-sizing: border-box;
        color: white;
        text-align:center;
    }

    td {
        padding:5px;
        text-align:center;
    }
    th {
        background:#19245c;
        color:white;
        padding:10px;
    }

    button {
        display:block;
        margin:10px auto;
    }

    form {
        margin:10px auto;
        text-align:center;
        width:200px;
    }
</style>

<!-- Manque la possibilité d'update -->
<section>
    <article class="profil">
        <?php foreach ($results as $result): ?>

            <p>Votre pseudo :
                <?php echo $result['pseudo']; ?>
            </p>
            <p>Votre email :
                <?php echo $result['email']; ?>
            </p>
            <p>Votre score total :
                <?php echo $result['score']; ?>
            </p>
        </article>
<button id='btn_modif'>Modifier mon profil</button>
<div id="modif"></div>
<script>
    btn_modif.addEventListener('click', function(){

        let a = "<form method='POST' action='Profil/updateJoueur'><label for='pseudo'>Ton nouveau pseudo</label>";
         a += "<input type='text' name='pseudo'>";
         a += "<label for='email'>Ton nouveau email</label><input type='email' name='email'>";
         a += "<br><button type='submit'>Valider</button></form>";
        modif.innerHTML = a;
    })
</script>
    <?php endforeach; ?>
    <article class="table">
        <table >
            <thead>
                <th>Pokemon</th>
                <th>Score</th>
            </thead>

            <?php foreach ($r as $r): ?>
                <tr>
                    <td>
                        <?php echo $r['nom']; ?>
                    </td>
                    <td>
                        <?php echo $r['score']; ?>
                    </td>
                </tr>
            <?php endforeach; ?>

        </table>

    </article>
    <a href="/pokeFight">Revenir à la page d'accueil</a>
</section>