<?php

class Candidat extends DataBase
{
    /**
     * fonction permettant d'ajouter un patient
     * 
     * @param string $lastname: nom du patient
     * @param string $firstname: prénom du patient
     * @param string $birthdate: date de naissance du patient Ex: 1992-12-31
     * @param string $phone : N° de telephone du patient
     * @param string $mail: Adresse Mail du patient
     * 
     * @return void
     */

    public function checkFreeMail(string $mail): bool
    {
        $db = $this->connectDb();
        $sql = "SELECT `mail`FROM `candidat` WHERE `mail` = :mail";
        $query = $db->prepare($sql);
        $query->bindValue(':mail', $mail, PDO::PARAM_STR);
        $query->execute();
        $result = $query->fetchAll();

        if (count($result) == 0) {
            return true;
        } else {
            return false;
        }
    }

    public function verifyPassword(string $mail, string $password): bool
    {
        $db = $this->connectDb();
        $sql = "SELECT `password` FROM `candidat` WHERE `mail` = :mail";
        $query = $db->prepare($sql);
        $query->bindValue(':mail', $mail, PDO::PARAM_STR);
        $query->execute();

        if (!$this->checkFreeMail($mail)) {
            return password_verify(($password), $query->fetch()['password']);
        } 
            return false;
        
    }

    public function addCandidat(string $lastName, string $firstName, string $birthDate, string $phone, string $mail, string $city, int $postalCode, string $adress, string $password): void
    {
        $db = $this->connectDb();
        $sql = "INSERT INTO `candidat` (`lastName`, `firstName`, `birthDate`, `phone`, `mail`, `city`, `postalCode`,`adress`, `password`) VALUES (:lastName, :firstName, :birthDate, :phone, :mail, :city, :postalCode, :adress, :password)";
        $query = $db->prepare($sql);
        $query->bindValue(':lastName', $lastName, PDO::PARAM_STR);
        $query->bindValue(':firstName', $firstName, PDO::PARAM_STR);
        $query->bindValue(':birthDate', $birthDate, PDO::PARAM_STR);
        $query->bindValue(':phone', $phone, PDO::PARAM_STR);
        $query->bindValue(':mail', $mail, PDO::PARAM_STR);
        $query->bindValue(':city', $city, PDO::PARAM_STR);
        $query->bindValue(':postalCode', $postalCode, PDO::PARAM_INT);
        $query->bindValue(':adress', $adress, PDO::PARAM_STR);

        $query->bindValue(':password', password_hash($password, PASSWORD_DEFAULT), PDO::PARAM_STR);

        $query->execute();
    }
}