<?php

require_once('database.php');


class CombatDAO
{

    public function insert_histo($data)
    {
        $db_connect = connectToDB();
        $joueur = $data['joueur'];
        $score = $data['score'];
        $pokemon = $data['pokemon'];

        $stmt = $db_connect->prepare("
        INSERT INTO Scores(id_joueur,id_pokemon,score) VALUES (:joueur, :pokemon, :score) 
        ");

        try {
            $stmt->execute(
                array(
                    ':joueur' => $joueur,
                    ':pokemon' => $pokemon,
                    ':score' => $score
                )
            );

            return $stmt;
        } catch (PDOException $e) {
            echo "Erreur : " . $e->getMessage();
        }
    }

}