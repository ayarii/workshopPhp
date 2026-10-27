<?php


require_once __DIR__ . '/../config.php';

class PersonneC
{
    // Liste des personnes
    public function listePersonne(): array
    {
        $db = config::getConnexion();

        try {
            $query = $db->query('SELECT * FROM personne');
            return $query->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die('Error: ' . $e->getMessage());
        }
    }

    // Ajouter une personne
    public function ajouterPersonne($personne): void
    {
        $db = config::getConnexion();
        $sql = 'INSERT INTO personne (nom, prenom, email, tel) VALUES (:nom, :prenom, :email, :tel)';
        try {
            $query = $db->prepare($sql);
            $query->execute([
                ':nom'    => $personne->getNom(),
                ':prenom' => $personne->getPrenom(),
                ':email'  => $personne->getEmail(),
                ':tel'    => $personne->getTel(),
            ]);
         header('Location: ../Views/ListPersonne.php', true, 303);
         exit;
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    // Supprimer une personne
    public function supprimerPersonne($id): void
    {
        $db = config::getConnexion();
        $sql = 'DELETE FROM personne WHERE id = :id';
        try {
            $query = $db->prepare($sql);
            $query->execute([':id' => $id]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    // Récupérer une personne par id
     public function recupererPersonne(int $id) {
        $sql = "SELECT * FROM personne WHERE id = :id";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute(['id' => $id]);
            return $query->fetch(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            echo 'Error ' . $e->getMessage();
            return null;
        }
    }
    
    // Modifier une personne
    public function modifierPersonne($personne, $id): void
    {
        $db = config::getConnexion();

        try {
            $query = $db->prepare(
                'UPDATE personne
                 SET nom = :nom, prenom = :prenom, email = :email, tel = :tel
                 WHERE id = :id'
            );
            $query->execute([
                ':nom'    => $personne->getNom(),
                ':prenom' => $personne->getPrenom(),
                ':email'  => $personne->getEmail(),
                ':tel'    => $personne->getTel(),
                ':id'     => $id,
            ]);
        } catch (PDOException $e) {
            die('Error: ' . $e->getMessage());
        }
    }
}
