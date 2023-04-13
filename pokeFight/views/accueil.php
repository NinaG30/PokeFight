<?php
include('header.php');
?>

<style>
    body {
        display: flex;
  flex-direction: column;
    }
    div img {
  width: 300px;
}

.flex {
    height: 55vh;
}

select{
    width:100%;
    margin:10px 0;
}

option {
    background:#19245c;
    color:white;
}

select {
    padding:5px;
    border:none;
}

form {
    animation: pulse 2s infinite;
}

@keyframes pulse {
	0% {		
		box-shadow: 0 0 0 0 #19245cb3;
	}

	70% {		
		box-shadow: 0 0 0 10px rgba(0, 0, 0, 0);
	}

	100% {		
		box-shadow: 0 0 0 0 rgba(0, 0, 0, 0);
	}
}

</style>


<section>
    <div class="flex">
        <div>
            <img src="views\assets\src\sfsfsg.png">
        </div>
        <div>

            <?php if (isset($_SESSION['id_joueur'])) { ?>
                <a href="Profil">Profil</a>
                <a href="Deconnect/logOut">Se déconnecter</a>

                <?php if ($_SESSION['pseudo'] == 'admin') { ?>

                    <a href="Creation">Creer un pokemon</a>

                <?php } else { ?>

                <?php }
            } else { ?>
                <a href="Connect">Se connecter</a>
                <a href="Inscription">S'inscrire</a>
            <?php } ?>



            <a href="Dashboard">Nos joueurs</a>
        </div>
        <?php if (isset($_SESSION['id_joueur'])) { ?>
        <form method="POST" action="Combat/fightPokemon">

            <label for="pokemon_select">Choisis ton pokemon</label>
            <select name="pokemon" id="pokemon_select">
                <?php foreach ($results as $result): ?>
                    <option value="<?php echo $result['id_pokemon']; ?>"><?php echo $result['nom']; ?></option>
                <?php endforeach; ?>
            </select>

            <label for="partie_select">Choisis ton mode de jeu</label>
            <select name="jeu" id="partie_select" onchange="createSecondSelect()">
                <option value="solo">Partie solo</option>
                <option value="duo">Partie à 2</option>
            </select>

            <div id='monselect'></div> 
              
            <script>
                //permet d'afficher le second select si partie à 2 est choisi
                function createSecondSelect() {
                   let choix = document.getElementById("partie_select").value;               
                   let div = document.getElementById("monselect");

                    if (choix == "duo") {
                        let a = '<label for="adversaire_select">Choisis ton adversaire</label><select name="pokemon2" id="adversaire_select">';
                        <?php foreach ($results as $result): ?>                       
                        a += '<option value="<?php echo $result['id_pokemon']; ?>"><?php echo $result['nom']; ?></option>';
                        <?php endforeach; ?>
                        a += '</select>';
                        div.innerHTML = a;
                    } else {
                        div.innerHTML = "";
                    }
                }
            </script>

            <button type='submit'>Lancer une partie</button>
        </form>

        <?php } ?>

    </div>
</section>

<?php
include('footer.php');
?>