<?php


class Entreprise extends DataBase
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
        $sql = "SELECT `mail`FROM `recruteur` WHERE `mail` = :mail";
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
        $sql = "SELECT `password` FROM `recruteur` WHERE `mail` = :mail";
        $query = $db->prepare($sql);
        $query->bindValue(':mail', $mail, PDO::PARAM_STR);
        $query->execute();

        if (!$this->checkFreeMail($mail)) {
            return password_verify(($password), $query->fetch()['password']);
        } 
            return false;
        
    }

    public function addEntreprise(string $name, string $siretNumber, string $phone, string $mail, string $city, int $postalCode, string $adress, string $password): void
    {
        $db = $this->connectDb();
        $sql = "INSERT INTO `recruteur` (`name`, `siretNumber`, `phone`, `mail`, `city`, `postalCode`,`adress`, `password`) VALUES (:name, :siretNumber, :phone, :mail, :city, :postalCode, :adress, :password)";
        $query = $db->prepare($sql);
        $query->bindValue(':name', $name, PDO::PARAM_STR);
        $query->bindValue(':siretNumber', $siretNumber, PDO::PARAM_STR);
        $query->bindValue(':phone', $phone, PDO::PARAM_STR);
        $query->bindValue(':mail', $mail, PDO::PARAM_STR);
        $query->bindValue(':city', $city, PDO::PARAM_STR);
        $query->bindValue(':postalCode', $postalCode, PDO::PARAM_INT);
        $query->bindValue(':adress', $adress, PDO::PARAM_STR);
        $query->bindValue(':password', password_hash($password, PASSWORD_DEFAULT), PDO::PARAM_STR);

        $query->execute();
    }

    public function getOneRecrutor(string $mail): array
    {
        $base = $this->connectDb();
        $sql = "SELECT  * 
        FROM `recruteur`
         WHERE mail=:mail";
        $resultQuery = $base->prepare($sql);
        $resultQuery->bindValue(':mail', $mail, PDO::PARAM_STR);
        $resultQuery->execute();
        return $resultQuery->fetch();
    }

    public function modifyprofilPictureEnterprise(string $mail,string $profilPicture): void
    {


        $base = $this->connectDb();
        $sql = "UPDATE `recruteur` SET 
          `profilPicture`=:profilPicture
          WHERE `mail`=:mail";
        $resultQuery = $base->prepare($sql);
        $resultQuery->bindValue(':mail', $mail, PDO::PARAM_STR);
        $resultQuery->bindValue(':profilPicture', $profilPicture, PDO::PARAM_STR);
        $resultQuery->execute();
    }

    public function modifyInfosEnterprise(string $pseudo,string $city,int $postalCode,string $adress,string $mail,string $phone, int $id): void
    {


        $base = $this->connectDb();
        $sql = "UPDATE `recruteur` SET `pseudo`=:pseudo,
        `city`=:city,
        `postalCode`=:postalCode,
          `adress`=:adress,
          `mail`=:mail,
          `phone`=:phone
 
          WHERE `id`=:id";
        $resultQuery = $base->prepare($sql);
        $resultQuery->bindValue(':pseudo', $pseudo, PDO::PARAM_STR);
        $resultQuery->bindValue(':city', $city, PDO::PARAM_STR);
        $resultQuery->bindValue(':postalCode', $postalCode, PDO::PARAM_INT);
        $resultQuery->bindValue(':adress', $adress, PDO::PARAM_STR);
        $resultQuery->bindValue(':mail', $mail, PDO::PARAM_STR);
        $resultQuery->bindValue(':phone', $phone, PDO::PARAM_STR);
        $resultQuery->bindValue(':id', $id, PDO::PARAM_INT);

        $resultQuery->execute();
    }
    public function deleteEnterprise(int $id): void
    {


        $base = $this->connectDb();
        $sql = "SET FOREIGN_KEY_CHECKS=0;
        DELETE  likerecrutor, likecandidates, offre, recruteur FROM likerecrutor
       INNER JOIN recruteur ON likerecrutor.id_recruteur = recruteur.id
        INNER JOIN offre ON offre.id_recruteur = recruteur.id
        INNER JOIN likecandidates ON likecandidates.id = offre.id
        WHERE recruteur.id=:id;
        SET FOREIGN_KEY_CHECKS=1;";
        $resultQuery = $base->prepare($sql);
        $resultQuery->bindValue(':id', $id, PDO::PARAM_INT);
        $resultQuery->execute();
    }
}
