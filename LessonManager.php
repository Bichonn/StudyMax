<?php

class LessonManager
{
    // Déclaration de la propriété privée $db
    private PDO $db;
       

    public function __construct()
    {
        // Définition des paramètres de connexion à la base de données
        $dbName = "projet-web";
        $port = "3306";
        $userName = "root";
        $password = "123kiwi78";
        try {
            $this->setDb(new PDO("mysql:host=localhost;dbname=$dbName;port=$port,charset=utf8mb4", $userName, $password));
        } catch (PDOException $error) {
            echo $error->getMessage();
        }
    }

    // Définition de la méthode setDb
    public function setDb(PDO $db) : self
    {
        $this->db = $db;
        return $this;
    }

    // Définition de la méthode createLesson pour ajouter une leçon
    public function createLesson(Lesson $lesson)
    {
        $req = $this->db->prepare("INSERT INTO lesson (name, media, category, user_id) VALUES (:name, :media, :category, :user_id)");

        $req->bindValue(":name", htmlspecialchars($lesson->getName()), PDO::PARAM_STR);
        $req->bindValue(":media", htmlspecialchars($lesson->getMedia()), PDO::PARAM_STR);
        $req->bindValue(":category", htmlspecialchars($lesson->getCategory()), PDO::PARAM_STR);
        $req->bindValue(":user_id", htmlspecialchars($lesson->getUser_id()), PDO::PARAM_INT);

        $req->execute();
    }


    // Définition de la méthode getLesson pour récupérer une leçon par son id
    public function getLesson(int $id) : Lesson
    {
        $req = $this->db->prepare("SELECT * FROM lesson WHERE id = :id");

        $req->bindValue("id", htmlspecialchars($id), PDO::PARAM_INT);
        $req->execute();
        $data = $req->fetch();
        return new Lesson($data);
    }

    // Définition de la méthode getAllLesson pour récupérer toutes les leçons
    public function getAllLesson()
    {
        $lessons = [];
        $req = $this->db->prepare("SELECT * FROM lesson ORDER BY name");
        $req->execute();
        $donnees = $req->fetchAll();
        if (is_array($donnees)) {
            foreach ($donnees as $donnee) {
                $lesson = new Lesson($donnee);
                $lessons[] = $lesson;
            }
        }
        return $lessons;
    }


    // Définition de la méthode updateLesson pour modifier une leçon
    public function updateLesson(Lesson $lesson)
    {
        $req = $this->db->prepare("UPDATE lesson SET name = :name, media = :media, category = :category, user_id = :user_id WHERE id = :id");

        $req->bindValue("id", htmlspecialchars($lesson->getId()), PDO::PARAM_INT);
        $req->bindValue(":name", htmlspecialchars($lesson->getName()), PDO::PARAM_STR);
        $req->bindValue(":media", htmlspecialchars($lesson->getMedia()), PDO::PARAM_STR);
        $req->bindValue(":category", htmlspecialchars($lesson->getCategory()), PDO::PARAM_STR);
        $req->bindValue(":user_id", htmlspecialchars($lesson->getUser_id()), PDO::PARAM_INT);

        $req->execute();
    }

    // Définition de la méthode deleteLesson pour supprimer une leçon
    public function deleteLesson(int $id)
    {
        $req = $this->db->prepare("DELETE FROM lesson WHERE id = :id");
        $req->bindValue(":id", htmlspecialchars($id), PDO::PARAM_INT);

        $req->execute();
    }
}
