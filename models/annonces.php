<?php 

class Annonce extends DataBase
{

    public function createAnnonce($job, $experienceYear, $publicationDate , $startDate , $idRecruteur , $idDomaine ,$idContract): void
    {


        $base = $this->connectDb();
        $sql = "INSERT INTO offre(job, experienceYear, publicationDate, startDate, id_recruteur, id_domaine, id_contract)
        VALUES(:job, :experienceYear, :publicationDate, :startDate, :id_recruteur, :id_domaine, :id_contract)";
        $resultQuery = $base->prepare($sql);
        $resultQuery->bindValue(':job', $job, PDO::PARAM_STR);
        $resultQuery->bindValue(':experienceYear', $experienceYear, PDO::PARAM_INT);
        $resultQuery->bindValue(':publicationDate', $publicationDate, PDO::PARAM_STR);
        $resultQuery->bindValue(':startDate', $startDate, PDO::PARAM_STR);
        $resultQuery->bindValue(':id_recruteur', $idRecruteur, PDO::PARAM_INT);
        $resultQuery->bindValue(':id_domaine', $idDomaine, PDO::PARAM_INT);
        $resultQuery->bindValue(':id_contract', $idContract, PDO::PARAM_INT);

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
}