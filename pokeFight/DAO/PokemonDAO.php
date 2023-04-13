<?php

require_once('database.php');

class PokemonDAO
{

    public function randPokemon($data)
    {
        $db_connect = connectToDB();
        $sql = "SELECT * FROM Pokemons WHERE id_pokemon <> '$data' ORDER BY RAND() LIMIT 1";
        $stmt = $db_connect->query($sql);
        $randPokemon = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $randPokemon;
    }
    public function getPokemonById($data)
    {
        
        $db_connect = connectToDB();
        $sql = "SELECT * FROM Pokemons WHERE id_pokemon = $data";
        $stmt = $db_connect->query($sql);
        $resultat = $stmt->fetchAll(PDO::FETCH_ASSOC);        
        return $resultat;
    }
    public function getAllPokemon()
    {

        $db_connect = connectToDB();
        $sql = "SELECT * FROM Pokemons";
        $stmt = $db_connect->query($sql);
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        // $pokemonList = array();
        // foreach ($results as $row) {
        //     $pokemon = new Pokemon($row['id_pokemon'], $row['nom'], $row['PV'], $row['PC'],  $row['Type']);
        //     $pokemonList[] = $pokemon;
        // }
        return $results;
    }

    public function pokemonCreation($data)
    {
        $db_connect = connectToDB();
        $nom = $data['nom'];
        $PV = $data['PV'];
        $PC = $data['PC'];
        $type = $data['Type'];
        $stmt = $db_connect->prepare("
        INSERT INTO Pokemons(nom,PV,PC,Type) VALUES (:nom, :pv, :pc, :type) 
        ");

        try {
            $stmt->execute(
                array(
                    ':nom' => $nom,
                    ':pv' => $PV,
                    ':pc' => $PC,
                    ':type' => $type

                )
            );

            return $stmt;
        } catch (PDOException $e) {
            echo "Erreur : " . $e->getMessage();
        }
    }
}