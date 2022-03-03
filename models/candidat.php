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

    public function addCandidat(string $lastName, string $firstName, string $birthDate, string $phone, string $mail, string $city, int $postalCode, string $adress, string $password, $id_profils, $id_contract, $id_domaine, $cvPicture, $profilPicture): void
    {
        $db = $this->connectDb();
        $sql = "INSERT INTO `candidat` (`lastName`, `firstName`, `birthDate`, `phone`, `mail`, `city`, `postalCode`,`adress`, `password`, id_profils, id_contract, id_domaine, cvPicture, profilPicture) VALUES (:lastName, :firstName, :birthDate, :phone, :mail, :city, :postalCode, :adress, :password, :id_profils, :id_contract, :id_domaine, :cvPicture, :profilPicture)";
        $query = $db->prepare($sql);
        $query->bindValue(':lastName', $lastName, PDO::PARAM_STR);
        $query->bindValue(':firstName', $firstName, PDO::PARAM_STR);
        $query->bindValue(':birthDate', $birthDate, PDO::PARAM_STR);
        $query->bindValue(':phone', $phone, PDO::PARAM_STR);
        $query->bindValue(':mail', $mail, PDO::PARAM_STR);
        $query->bindValue(':city', $city, PDO::PARAM_STR);
        $query->bindValue(':postalCode', $postalCode, PDO::PARAM_INT);
        $query->bindValue(':adress', $adress, PDO::PARAM_STR);
        $query->bindValue(':id_profils', $id_profils, PDO::PARAM_INT);
        $query->bindValue(':id_contract', $id_contract, PDO::PARAM_INT);
        $query->bindValue(':id_domaine', $id_domaine, PDO::PARAM_INT);
        $query->bindValue(':cvPicture', $cvPicture, PDO::PARAM_STR);
        $query->bindValue(':profilPicture', $profilPicture, PDO::PARAM_STR);


        $query->bindValue(':password', password_hash($password, PASSWORD_DEFAULT), PDO::PARAM_STR);

        $query->execute();
    }
    public function modifyProfil(int $id_profils, string $mail): void
    {
        $base = $this->connectDb();
        $sql = "UPDATE `candidat` SET 
        `id_profils`= :id_profils
        WHERE `mail`= :mail";
        $resultQuery = $base->prepare($sql);
        $resultQuery->bindValue(':id_profils', $id_profils, PDO::PARAM_INT);
        $resultQuery->bindValue(':mail', $mail, PDO::PARAM_STR);
        $resultQuery->execute();
    }

    public function getOneCandidate(string $mail): array
    {
        $base = $this->connectDb();
        $sql = "SELECT  * 
        FROM `candidat`
         WHERE mail=:mail";
        $resultQuery = $base->prepare($sql);
        $resultQuery->bindValue(':mail', $mail, PDO::PARAM_STR);
        $resultQuery->execute();
        return $resultQuery->fetch();
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
    public function getCandidateProfil($mail): array
    {
        $base = $this->connectDb();
        $sql = "SELECT profils.id AS 'profilsId', profils.name,  profils.talents, profils.nameStruct
        FROM `profils`
       INNER JOIN `candidat` ON candidat.id_profils = profils.id
       WHERE `mail`=:mail";
        $resultQuery = $base->prepare($sql);
        $resultQuery->bindValue(':mail', $mail, PDO::PARAM_STR);
        $resultQuery->execute();
        return $resultQuery->fetch();
    }
    public function modifyprofilPicture(string $mail, string $profilPicture): void
    {
        $base = $this->connectDb();
        $sql = "UPDATE `candidat` SET 
          `profilPicture`=:profilPicture

          WHERE `mail`=:mail";
        $resultQuery = $base->prepare($sql);
        $resultQuery->bindValue(':mail', $mail, PDO::PARAM_STR);
        $resultQuery->bindValue(':profilPicture', $profilPicture, PDO::PARAM_STR);

        $resultQuery->execute();
    }
    public function modifyCvPicture(string $mail, string $cvPicture): void
    {
        $base = $this->connectDb();
        $sql = "UPDATE `candidat` SET 
          `cvPicture`=:cvPicture

          WHERE `mail`=:mail";
        $resultQuery = $base->prepare($sql);
        $resultQuery->bindValue(':mail', $mail, PDO::PARAM_STR);
        $resultQuery->bindValue(':cvPicture', $cvPicture, PDO::PARAM_STR);

        $resultQuery->execute();
    }
    public function modifyCandidate(string $lastName, string $firstName, string $description, string $pseudo, string $birthDate, string $phone, string $city, int $postalCode, string $adress, int $experienceYears, int $id_contract, int $id_domaine, $idCandidat): void
    {
        $base = $this->connectDb();
        $sql = "UPDATE `candidat` SET 
        `lastName`= :lastName,
        `firstName`= :firstName,
        `description`= :description,
        `pseudo`= :pseudo,
        `birthDate`= :birthDate,
        `phone`= :phone,
        `city`= :city,
        `postalCode`= :postalCode,
        `adress`= :adress,
        `experienceYears`= :experienceYears,
        `id_contract`= :id_contract,
        `id_domaine`= :id_domaine
        WHERE candidat.id = :idCandidat";
        $resultQuery = $base->prepare($sql);
        $resultQuery->bindValue(':lastName', $lastName, PDO::PARAM_STR);
        $resultQuery->bindValue(':firstName', $firstName, PDO::PARAM_STR);
        $resultQuery->bindValue(':description', $description, PDO::PARAM_STR);
        $resultQuery->bindValue(':pseudo', $pseudo, PDO::PARAM_STR);
        $resultQuery->bindValue(':birthDate', $birthDate, PDO::PARAM_STR);
        $resultQuery->bindValue(':phone', $phone, PDO::PARAM_STR);
        $resultQuery->bindValue(':city', $city, PDO::PARAM_STR);
        $resultQuery->bindValue(':postalCode', $postalCode, PDO::PARAM_INT);
        $resultQuery->bindValue(':adress', $adress, PDO::PARAM_STR);
        $resultQuery->bindValue(':experienceYears', $experienceYears, PDO::PARAM_INT);
        $resultQuery->bindValue(':id_contract', $id_contract, PDO::PARAM_INT);
        $resultQuery->bindValue(':id_domaine', $id_domaine, PDO::PARAM_INT);
        $resultQuery->bindValue(':idCandidat', $idCandidat, PDO::PARAM_INT);
        $resultQuery->execute();
    }
    public function deleteCandidat($mail): void
    {


        $base = $this->connectDb();
        $sql = "DELETE FROM candidat
        WHERE mail=:mail;";
        $resultQuery = $base->prepare($sql);
        $resultQuery->bindValue(':mail', $mail, PDO::PARAM_STR);
        $resultQuery->execute();
    }
    public function getAllCandidates(): array
    {
        $base = $this->connectDb();
        $sql = "SELECT candidat.id AS 'idCandidat', lastName, firstName, candidat.description AS 'candidateDescription', pseudo, birthDate, phone, mail, city, postalCode, adress, profilPicture, experienceYears, cvPicture, contract.id AS 'contractID', contract.name AS 'contractName', domaine.id AS 'domaineID', domaine.name AS 'domaineName', profils.nameStruct AS 'profilName', profils.name AS 'profilColor', profils.talents AS 'profilTalents', profils.id AS 'profilID'
        FROM `candidat`
       INNER JOIN `profils` ON id_profils = profils.id
       INNER JOIN  `contract` ON id_contract = contract.id
       INNER JOIN  `domaine` ON id_domaine = domaine.id 
        ORDER BY candidat.id  DESC;";
        $resultQuery = $base->query($sql);
        $resultQuery->execute();
        return $resultQuery->fetchAll();
    }
    public function getOneCandidateDetails(int $id): array
    {
        $base = $this->connectDb();
        $sql = "SELECT candidat.id AS 'idCandidat', lastName, firstName, candidat.description AS 'candidateDescription', pseudo, date_format(birthDate, '%d/%m/%Y') AS 'birthDate', phone, mail, city, postalCode, adress, profilPicture, experienceYears, cvPicture, contract.id AS 'contractID', contract.name AS 'contractName', domaine.id AS 'domaineID', domaine.name AS 'domaineName', profils.nameStruct AS 'profilName', profils.name AS 'profilColor', profils.talents AS 'profilTalents', profils.img
        FROM `candidat`
       INNER JOIN `profils` ON id_profils = profils.id
       INNER JOIN  `contract` ON id_contract = contract.id
       INNER JOIN  `domaine` ON id_domaine = domaine.id 
       WHERE candidat.id =:idCandidat";
        $resultQuery = $base->prepare($sql);
        $resultQuery->bindValue(':idCandidat', $id, PDO::PARAM_INT);
        $resultQuery->execute();
        return $resultQuery->fetch();
    }
    public function getAllCandidatesContractSearch(string $contractName): array
    {
        $base = $this->connectDb();
        $sql = "SELECT candidat.id AS 'idCandidat', lastName, firstName, candidat.description AS 'candidateDescription', pseudo, date_format(birthDate, '%d/%m/%Y') AS 'birthDate', phone, mail, city, postalCode, adress, profilPicture, experienceYears, cvPicture, contract.id AS 'contractID', contract.name AS 'contractName', domaine.id AS 'domaineID', domaine.name AS 'domaineName', profils.name AS 'profilColor', profils.talents AS 'profilTalents', profils.id AS 'profilID'
    FROM `candidat`
   INNER JOIN `profils` ON id_profils = profils.id
   INNER JOIN  `contract` ON id_contract = contract.id
   INNER JOIN  `domaine` ON id_domaine = domaine.id 
    WHERE contract.name = :contractName
    ORDER BY candidat.id  DESC";
        $resultQuery = $base->prepare($sql);
        $resultQuery->execute(array(
            'contractName' => $contractName,
        ));
        return $resultQuery->fetchAll();
    }
    public function getAllCandidatesDomaineSearch(string $domaineName): array
    {
        $base = $this->connectDb();
        $sql = "SELECT candidat.id AS 'idCandidat', lastName, firstName, candidat.description AS 'candidateDescription', pseudo, date_format(birthDate, '%d/%m/%Y') AS 'birthDate', phone, mail, city, postalCode, adress, profilPicture, experienceYears, cvPicture, contract.id AS 'contractID', contract.name AS 'contractName[]', domaine.id AS 'domaineID', domaine.name AS 'domaineName[]', profils.name AS 'profilColor', profils.talents AS 'profilTalents', profils.id AS 'profilID'
    FROM `candidat`
   INNER JOIN `profils` ON id_profils = profils.id
   INNER JOIN  `contract` ON id_contract = contract.id
   INNER JOIN  `domaine` ON id_domaine = domaine.id 
    WHERE domaine.name = :domaineName
    ORDER BY candidat.id  DESC";
        $resultQuery = $base->prepare($sql);
        $resultQuery->execute(array(
            'domaineName' => $domaineName,
        ));
        return $resultQuery->fetchAll();
    }
    public function getAllCandidatesProfilSearch(string $profilName): array
    {
        $base = $this->connectDb();
        $sql = "SELECT candidat.id AS 'idCandidat', lastName, firstName, candidat.description AS 'candidateDescription', pseudo, date_format(birthDate, '%d/%m/%Y') AS 'birthDate', phone, mail, city, postalCode, adress, profilPicture, experienceYears, cvPicture, contract.id AS 'contractID', contract.name AS 'contractName[]', domaine.id AS 'domaineID', domaine.name AS 'domaineName[]', profils.name AS 'profilColor', profils.talents AS 'profilTalents', profils.id AS 'profilID'
    FROM `candidat`
   INNER JOIN `profils` ON id_profils = profils.id
   INNER JOIN  `contract` ON id_contract = contract.id
   INNER JOIN  `domaine` ON id_domaine = domaine.id 
    WHERE profils.name = :profilName
    ORDER BY candidat.id  DESC";
        $resultQuery = $base->prepare($sql);
        $resultQuery->execute(array(

            'profilName' => $profilName,
        ));
        return $resultQuery->fetchAll();
    }
    public function getAllCandidatesExperienceYearsSearch(string $experience): array
    {
        $base = $this->connectDb();
        $sql = "SELECT candidat.id AS 'idCandidat', lastName, firstName, candidat.description AS 'candidateDescription', pseudo, date_format(birthDate, '%d/%m/%Y') AS 'birthDate', phone, mail, city, postalCode, adress, profilPicture, experienceYears, cvPicture, contract.id AS 'contractID', contract.name AS 'contractName[]', domaine.id AS 'domaineID', domaine.name AS 'domaineName[]', profils.name AS 'profilColor', profils.talents AS 'profilTalents', profils.id AS 'profilID'
    FROM `candidat`
   INNER JOIN `profils` ON id_profils = profils.id
   INNER JOIN  `contract` ON id_contract = contract.id
   INNER JOIN  `domaine` ON id_domaine = domaine.id 
    WHERE candidat.experienceYears >= :experience
    ORDER BY candidat.id  DESC";
        $resultQuery = $base->prepare($sql);
        $resultQuery->execute(array(

            'experience' => $experience,
        ));
        return $resultQuery->fetchAll();
    }
}
