<?php

class UserManager   
{

    // Déclaration de la propriété privée $db
    private $db;

    
    public function __construct()
    {
        // Définition des paramètres de connexion à la base de données
        $dbName = "projet-web";
        $port = "3306";
        $userName = "root";
        $password = "123kiwi78";

        // Connexion à la base de données
        try {
            $this->setDb(new PDO("mysql:host=localhost;dbname=$dbName;port=$port,charset=utf8mb4", $userName, $password));
        } catch (PDOException $error) {
            echo $error->getMessage();
        }
    }

    // Définition de la méthode setDb
    public function setDb($db)
    {
        $this->db = $db;
    }


    // Définition de la méthode create pour ajouter un utilisateur
    public function create(User $user)
    {
        $req = $this->db->prepare("INSERT INTO user (firstName, lastName, password, pseudo) VALUES (:firstName, :lastName, :password, :pseudo)");

        $req->bindValue(":firstName", htmlspecialchars($user->getFirstName()), PDO::PARAM_STR);
        $req->bindValue(":lastName", htmlspecialchars($user->getLastName()), PDO::PARAM_STR);
        $req->bindValue(":pseudo", htmlspecialchars($user->getPseudo()), PDO::PARAM_STR);
        $req->bindValue(":password", htmlspecialchars($user->getPassword()), PDO::PARAM_STR);

        $req->execute();
    }

    // Définition de la méthode getById pour récupérer un utilisateur par son id
    public function getByPseudo(string $pseudo)
    {
        $req = $this->db->prepare("SELECT * FROM user WHERE pseudo = :pseudo");

        $req->bindValue("pseudo", $pseudo, PDO::PARAM_STR);
        $req->execute();
        $donnees = $req->fetch();
        $user = new User($donnees);
        return $user;
    }

    // Définition de la méthode getALL pour récupérer tous les utilisateurs
    public function getALL()
    {
        $users = [];
        $req = $this->db->prepare("SELECT * FROM user ORDER BY name");
        $req->execute();
        $donnees = $req->fetch();
        foreach ($donnees as $donnee) {
            $user = new User($donnee);
            $users[] = $user;
        }
        return $users;
    }

    // Définition de la méthode update pour modifier un utilisateur
    public function update(User $user)
    {
        $req = $this->db->prepare("UPDATE user SET firstName = :firstName, lastName = :lastName, password = :password, pseudo = :pseudo WHERE id = :id");

        $req->bindValue("id", $user->getId(), PDO::PARAM_INT);
        $req->bindValue(":firstName", htmlspecialchars($user->getFirstName()), PDO::PARAM_STR);
        $req->bindValue(":lastName", htmlspecialchars($user->getlastName()), PDO::PARAM_STR);
        $req->bindValue(":password", htmlspecialchars($user->getPassword()), PDO::PARAM_STR);
        $req->bindValue(":pseudo", htmlspecialchars($user->getPseudo()), PDO::PARAM_STR);

        $req->execute();
    }

    // Définition de la méthode delete pour supprimer un utilisateur
    public function delete(int $id)
    {
        $req = $this->db->prepare("DELETE FROM user WHERE id = :id");
        $req->bindValue(":id", htmlspecialchars($id), PDO::PARAM_INT);

        $req->execute();
    }
}
