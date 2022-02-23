<?php

class Annonce extends DataBase
{

    public function createAnnonce($job, $experienceYear, $publicationDate, $description, $startDate, $idRecruteur, $idDomaine, $idContract, $idProfils): void
    {


        $base = $this->connectDb();
        $sql = "INSERT INTO offre(job, experienceYear, publicationDate, startDate, id_recruteur, id_domaine, id_contract, description, id_profils)
        VALUES(:job, :experienceYear, :publicationDate, :startDate, :id_recruteur, :id_domaine, :id_contract, :description , :id_profils)";
        $resultQuery = $base->prepare($sql);
        $resultQuery->bindValue(':job', $job, PDO::PARAM_STR);
        $resultQuery->bindValue(':experienceYear', $experienceYear, PDO::PARAM_INT);
        $resultQuery->bindValue(':publicationDate', $publicationDate, PDO::PARAM_STR);
        $resultQuery->bindValue(':description', $description, PDO::PARAM_STR);
        $resultQuery->bindValue(':startDate', $startDate, PDO::PARAM_STR);
        $resultQuery->bindValue(':id_recruteur', $idRecruteur, PDO::PARAM_INT);
        $resultQuery->bindValue(':id_domaine', $idDomaine, PDO::PARAM_INT);
        $resultQuery->bindValue(':id_contract', $idContract, PDO::PARAM_INT);
        $resultQuery->bindValue(':id_profils', $idProfils, PDO::PARAM_INT);

        $resultQuery->execute();
    }
    public function getAllContract(): array
    {
        $base = $this->connectDb();
        $sql = "SELECT *  FROM `contract` ORDER BY `id`";
        $resultQuery = $base->query($sql);
        $resultQuery->execute();
        return $resultQuery->fetchAll();
    }
    public function getAllDomaines(): array
    {
        $base = $this->connectDb();
        $sql = "SELECT *  FROM `domaine` ORDER BY `id`";
        $resultQuery = $base->query($sql);
        $resultQuery->execute();
        return $resultQuery->fetchAll();
    }
    public function getAllProfils(): array
    {
        $base = $this->connectDb();
        $sql = "SELECT *  FROM `profils` ORDER BY `id`";
        $resultQuery = $base->query($sql);
        $resultQuery->execute();
        return $resultQuery->fetchAll();
    }
    public function getAllAnnoncesofOneRecrutor($mail): array
    {
        $base = $this->connectDb();
        $sql = "SELECT offre.id AS 'idAnnonce', job, experienceYear, publicationDate, startDate, id_recruteur, id_domaine, id_contract, description, contract.id AS 'contractID', contract.name AS 'contractName', recruteur.id AS 'recruteurID', recruteur.name AS 'recruteurName', siretNumber, phone, mail, city, postalCode, adress, password, pseudo, profilPicture
        FROM `offre`
       INNER JOIN `recruteur` ON id_recruteur = recruteur.id
       INNER JOIN  `contract` ON id_contract = contract.id
       WHERE `mail`=:mail
       GROUP BY offre.id";
        $resultQuery = $base->prepare($sql);
        $resultQuery->bindValue(':mail', $mail, PDO::PARAM_STR);
        $resultQuery->execute();
        return $resultQuery->fetchAll();
    }
    public function getOneAnnonce(int $id): array
    {
        $base = $this->connectDb();
        $sql = "SELECT offre.id AS 'idAnnonce', job, experienceYear, publicationDate, startDate, id_recruteur, id_domaine, id_contract, description
        FROM `offre`
       WHERE offre.id =:idAnnonce";
        $resultQuery = $base->prepare($sql);
        $resultQuery->bindValue(':idAnnonce', $id, PDO::PARAM_INT);
        $resultQuery->execute();
        return $resultQuery->fetch();
    }
    public function modifyAnnonce($job, $experienceYear, $publicationDate, $description, $startDate, $idRecruteur, $idDomaine, $idContract, $idAnnonce, $id_profils): void
    {


        $base = $this->connectDb();
        $sql = "UPDATE `offre` SET `job`=:job, `experienceYear`=:experienceYear, `publicationDate`=:publicationDate, `startDate`=:startDate, `id_recruteur`=:id_recruteur, `id_domaine`=:id_domaine, `id_contract`=:id_contract, `description`=:description, `id_profils`=:id_profils
          WHERE offre.id =:idAnnonce;
          ";
        $resultQuery = $base->prepare($sql);
        $resultQuery->bindValue(':job', $job, PDO::PARAM_STR);
        $resultQuery->bindValue(':experienceYear', $experienceYear, PDO::PARAM_INT);
        $resultQuery->bindValue(':publicationDate', $publicationDate, PDO::PARAM_STR);
        $resultQuery->bindValue(':description', $description, PDO::PARAM_STR);
        $resultQuery->bindValue(':startDate', $startDate, PDO::PARAM_STR);
        $resultQuery->bindValue(':id_recruteur', $idRecruteur, PDO::PARAM_INT);
        $resultQuery->bindValue(':id_domaine', $idDomaine, PDO::PARAM_INT);
        $resultQuery->bindValue(':id_contract', $idContract, PDO::PARAM_INT);
        $resultQuery->bindValue(':idAnnonce', $idAnnonce, PDO::PARAM_INT);
        $resultQuery->bindValue(':id_profils', $id_profils, PDO::PARAM_INT);
        $resultQuery->execute();
    }
    public function deleteAnnonce($id): void
    {
        $base = $this->connectDb();
        $sql = "DELETE FROM `offre`
        WHERE id=:idAnnonce;";
        $resultQuery = $base->prepare($sql);
        $resultQuery->bindValue(':idAnnonce', $id, PDO::PARAM_INT);
        $resultQuery->execute();
    }
    public function getAllOffers(): array
    {
        $base = $this->connectDb();
        $sql = "SELECT offre.id AS 'idAnnonce', job, experienceYear, publicationDate, startDate, id_recruteur, id_domaine, id_contract, offre.description AS 'offerDescription', contract.id AS 'contractID', contract.name AS 'contractName', recruteur.id AS 'recruteurID', recruteur.name AS 'recruteurName', siretNumber, phone, mail, city, postalCode, adress, password, pseudo, profilPicture, contract.name AS 'contractName', domaine.name AS 'domaine.name'
        FROM `offre`
       INNER JOIN `recruteur` ON id_recruteur = recruteur.id
       INNER JOIN  `contract` ON id_contract = contract.id
       INNER JOIN  `domaine` ON id_domaine = domaine.id 
        ORDER BY offre.id  DESC;";
        $resultQuery = $base->query($sql);
        $resultQuery->execute();
        return $resultQuery->fetchAll();
    }
}
