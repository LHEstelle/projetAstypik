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
        $sql = "SELECT `mail`FROM `candidats` WHERE `mail` = :mail";
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
     
    public function addCandidat(string $lastname, string $firstname, string $birthdate, string $phone, string $mail, string $adress): void
    {
        $db = $this->connectDb();
        $sql = "INSERT INTO `candidats` (`lastname`, `firstname`, `birthdate`, `phone`, `mail`, `adress`) VALUES (:lastname, :firstname, :birthdate, :phone, :mail, :adress)";
        $query = $db->prepare($sql);
        $query->bindValue(':lastname', $lastname, PDO::PARAM_STR);
        $query->bindValue(':firstname', $firstname, PDO::PARAM_STR);
        $query->bindValue(':birthdate', $birthdate, PDO::PARAM_STR);
        $query->bindValue(':phone', $phone, PDO::PARAM_STR);
        $query->bindValue(':mail', $mail, PDO::PARAM_STR);
        $query->bindValue(':adress', $adress, PDO::PARAM_STR);

        $query->execute();
    }
}