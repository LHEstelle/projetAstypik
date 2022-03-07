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
    public function getAllAnnoncesofOneRecrutor(int $id): array
    {
        $base = $this->connectDb();
        $sql = "SELECT offre.id AS 'idAnnonce', job, experienceYear,  date_format(startDate, '%d/%m/%Y') AS 'startDate', date_format(publicationDate, '%d/%m/%Y') AS 'publicationDate', id_recruteur, id_domaine, id_contract, offre.description, contract.id AS 'contractID', contract.name AS 'contractName', recruteur.id AS 'recruteurID', recruteur.name AS 'recruteurName', siretNumber, phone, mail, city, postalCode, adress, password, pseudo, profilPicture, profils.name AS 'profilColor'
        FROM `offre`
       INNER JOIN `recruteur` ON id_recruteur = recruteur.id
       INNER JOIN  `contract` ON id_contract = contract.id
       INNER JOIN  `profils` ON id_profils = profils.id
       WHERE recruteur.id=:id
       GROUP BY offre.id";
        $resultQuery = $base->prepare($sql);
        $resultQuery->bindValue(':id', $id, PDO::PARAM_INT);
        $resultQuery->execute();
        return $resultQuery->fetchAll();
    }
    public function getOneAnnonce(int $id): array
    {
        $base = $this->connectDb();
        $sql = "SELECT offre.id AS 'idAnnonce', job, experienceYear, publicationDate, startDate, id_recruteur, id_domaine, id_contract, description , id_profils
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
        $sql = "SELECT offre.id AS 'idAnnonce', job, experienceYear,  date_format(startDate, '%d/%m/%Y') AS 'startDate', date_format(publicationDate, '%d/%m/%Y') AS 'publicationDate', id_recruteur, id_domaine, id_contract, offre.description AS 'offerDescription', contract.id AS 'contractID', contract.name AS 'contractName', recruteur.id AS 'recruteurID', recruteur.name AS 'recruteurName', siretNumber, phone, mail, city, postalCode, adress, password, pseudo, profilPicture, contract.name AS 'contractName', domaine.name AS 'domaine.name', profils.id AS 'idProfil', profils.name AS 'profilColor'
        FROM `offre`
       INNER JOIN `recruteur` ON id_recruteur = recruteur.id
       INNER JOIN  `contract` ON id_contract = contract.id
       INNER JOIN  `domaine` ON id_domaine = domaine.id 
       INNER JOIN  `profils` ON id_profils = profils.id 
        ORDER BY offre.id  DESC;";
        $resultQuery = $base->query($sql);
        $resultQuery->execute();
        return $resultQuery->fetchAll();
    }
    public function getOneAnnonceDetails(int $id): array
    {
        $base = $this->connectDb();
        $sql = "SELECT offre.id AS 'idAnnonce', job, experienceYear, publicationDate, startDate, id_recruteur, id_domaine, id_contract, offre.description AS 'offerDescription', contract.id AS 'contractID', contract.name AS 'contractName', recruteur.id AS 'recruteurID', recruteur.name AS 'recruteurName', siretNumber, phone, mail, city, postalCode, adress, password, pseudo, profilPicture, contract.name AS 'contractName', domaine.name AS 'domaine.name', profils.id AS 'idProfil', profils.name AS 'profilColor', date_format(startDate, '%d/%m/%Y') AS 'startDate', date_format(publicationDate, '%d/%m/%Y') AS 'publicationDate'
        FROM `offre`
        INNER JOIN `recruteur` ON id_recruteur = recruteur.id
       INNER JOIN `profils` ON id_profils = profils.id
       INNER JOIN  `contract` ON id_contract = contract.id
       INNER JOIN  `domaine` ON id_domaine = domaine.id 
       WHERE offre.id =:idOffre";
        $resultQuery = $base->prepare($sql);
        $resultQuery->bindValue(':idOffre', $id, PDO::PARAM_INT);
        $resultQuery->execute();
        return $resultQuery->fetch();
}
public function getAlloffersFilters(string $contract, string $domaine, string $profil, int $exp, string $terme): array
{
    $base = $this->connectDb();
    $sql = "SELECT offre.id AS 'idAnnonce', job, experienceYear,  date_format(startDate, '%d/%m/%Y') AS 'startDate', date_format(publicationDate, '%d/%m/%Y') AS 'publicationDate', id_recruteur, id_domaine, id_contract, offre.description AS 'offerDescription', contract.id AS 'contractID', contract.name AS 'contractName', recruteur.id AS 'recruteurID', recruteur.name AS 'recruteurName', siretNumber, phone, mail, city, postalCode, adress, password, pseudo, profilPicture, contract.name AS 'contractName', domaine.name AS 'domaine.name', profils.id AS 'idProfil', profils.name AS 'profilColor'
    FROM `offre`
   INNER JOIN `recruteur` ON id_recruteur = recruteur.id
   INNER JOIN  `contract` ON id_contract = contract.id
   INNER JOIN  `domaine` ON id_domaine = domaine.id 
   INNER JOIN  `profils` ON id_profils = profils.id 
    WHERE (recruteur.city LIKE " . $terme . " OR offre.description LIKE " . $terme . " OR offre.job LIKE " . $terme . " OR recruteur.name LIKE " . $terme . " OR recruteur.pseudo LIKE " . $terme . " OR profils.name LIKE " . $terme . " OR profils.talents LIKE " . $terme . " OR domaine.name LIKE " . $terme . " OR contract.name LIKE " . $terme . ") AND contract.name IN (".$contract.") AND domaine.name IN (".$domaine.") AND profils.name IN (".$profil.") AND offre.experienceYear >= ".$exp."
    ORDER BY offre.id  DESC";
    $resultQuery = $base->prepare($sql);
    $resultQuery->bindValue(':contract', $contract, PDO::PARAM_STR);
    $resultQuery->bindValue(':domaine', $domaine, PDO::PARAM_STR);
    $resultQuery->bindValue(':profil', $profil, PDO::PARAM_STR);
    $resultQuery->bindValue(':exp', $exp, PDO::PARAM_INT);
    $resultQuery->bindValue(':terme', $terme, PDO::PARAM_STR);
    $resultQuery->execute();
   return $resultQuery->fetchAll();
}
}
