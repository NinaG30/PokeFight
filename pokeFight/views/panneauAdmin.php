<?php
include('header.php');
?>
 <!-- PAGE NOS JOUEURS -->
<style>
    td {
        padding:5px;
        text-align:center;
    }
    th {
        background:#19245c;
        color:white;
        padding:10px;
    }
</style>
<section>
<article class="table">
    <table>
        <thead>
            <th>Pseudo</th>
            <th>Score</th>
        </thead>

        <?php foreach ($results as $result): ?>
            <tr>
                <td>
                    <?php echo $result['pseudo']; ?>
                </td>
                <td>
                    <?php echo $result['score']; ?>
                </td>
            </tr>
        <?php endforeach; ?>

    </table>

</article>
<a href="/pokeFight">Revenir à la page d'accueil</a>
</section>

<?php

include('footer.php');
?>