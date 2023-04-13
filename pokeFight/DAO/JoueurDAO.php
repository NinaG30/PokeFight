<?php

require_once('database.php');


class JoueurDAO
{
    public function getScoreById()
    {
        $id = $_SESSION['id_joueur'];
        $db_connect = connectToDB();
        $sql = "SELECT * FROM Scores INNER JOIN Pokemons ON Scores.id_pokemon = Pokemons.id_pokemon        
        WHERE id_joueur = $id";
        $stmt = $db_connect->query($sql);
        $r = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $r;
    }

    public function getJoueurById()
    {
        $id = $_SESSION['id_joueur'];
        $db_connect = connectToDB();
        $sql = "SELECT * FROM Joueurs WHERE id_joueur = $id";
        $stmt = $db_connect->query($sql);
        $res = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $res;
    }
    public function getJoueurs()
    {

        $db_connect = connectToDB();
        $sql = "SELECT * FROM Joueurs";
        $stmt = $db_connect->query($sql);
        $joueurs = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $joueurs;
    }

    public function joueurCreation($data)
    {
        $db_connect = connectToDB();
        $pseudo = $data['pseudo'];
        $email = $data['email'];
        $mdp = $data['mdp'];
        $password = hash("sha256", $mdp);
        $stmt = $db_connect->prepare("INSERT INTO Joueurs(pseudo,email,mdp) VALUES (:pseudo, :email, :mdp) ");

        try {
            $stmt->execute(
                array(
                    ':pseudo' => $pseudo,
                    ':email' => $email,
                    ':mdp' => $password
                )
            );

            return $stmt;
        } catch (PDOException $e) {
            echo "Erreur : " . $e->getMessage();
        }
    }

    public function updateScore()
    {

        echo $score = $_SESSION['score'];
        echo $id = $_SESSION['id_joueur'];
        $db_connect = connectToDB();
        $sql = "UPDATE Joueurs
        SET score = '$score'
           WHERE id_joueur = $id";
        $stmt = $db_connect->query($sql);


    }

    public function updateMailPseudo($data)
    {
        $id = $_SESSION['id_joueur'];      
        $email = $data['email'];        
        $pseudo = $data['pseudo'];     
        
        $db_connect = connectToDB();
        $sql = "UPDATE Joueurs SET pseudo = :pseudo, email = :email WHERE id_joueur = :id_joueur";
        $stmt = $db_connect->prepare($sql);
        $stmt->bindParam(':pseudo', $pseudo);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':id_joueur', $id);
        $stmt->execute();
    }

    public function verify($data)
    {

        $db_connect = connectToDB();
        $pseudo = $data['pseudo'];
        $mdp = $data['mdp'];
        $password = hash("sha256", $mdp);

        $sth = $db_connect->prepare("
        SELECT pseudo,mdp,id_joueur,score
        FROM Joueurs
        WHERE pseudo = :pseudo
    ");
        $sth->execute(
            array(
                ':pseudo' => $pseudo,
            )
        );

        $result = $sth->fetch(PDO::FETCH_ASSOC);
        if ($result != FALSE) {
            if ($result['mdp'] == $password) {
                $_SESSION['pseudo'] = $pseudo;
                $_SESSION['id_joueur'] = $result['id_joueur'];
                $_SESSION['score'] = $result['score'];
                return 1;
            } else {
                return 2;
            }

        } else {
            return 3;
        }
    }


}