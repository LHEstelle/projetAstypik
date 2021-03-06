<?php

class Likes extends DataBase
{
    public function getLikesOfOneRecrutor($mail): array
    {
        $base = $this->connectDb();
        $sql = "SELECT likerecrutor.id AS 'idCandidateLiked', id_recruteur, candidat.id AS 'idCandidat', lastName, firstName, candidat.description AS 'candidateDescription', candidat.pseudo AS 'candidatePseudo', birthDate, candidat.phone AS 'canditePhone', candidat.mail AS 'candidateMail', candidat.city AS 'candidateCity', candidat.postalCode AS 'candidatePostalCode', candidat.adress AS 'candidateAdress', candidat.profilPicture AS 'candidateProfilPicture', experienceYears, cvPicture, contract.id AS 'contractID', contract.name AS 'contractName', domaine.id AS 'domaineID', domaine.name AS 'domaineName', profils.nameStruct AS 'profilName', profils.name AS 'profilColor', profils.talents AS 'profilTalents', recruteur.name AS 'recrutorName'
        FROM `candidat`
        INNER JOIN `likerecrutor` ON candidat.id = likerecrutor.id
	   INNER JOIN `recruteur` ON recruteur.id = likerecrutor.id_recruteur
       INNER JOIN `profils` ON candidat.id_profils = profils.id
       INNER JOIN  `contract` ON candidat.id_contract = contract.id
       INNER JOIN  `domaine` ON candidat.id_domaine = domaine.id 
       WHERE recruteur.mail = :mail
       ORDER BY candidat.id DESC";
        $resultQuery = $base->prepare($sql);
        $resultQuery->bindValue(':mail', $mail, PDO::PARAM_STR);
        $resultQuery->execute();
        return $resultQuery->fetchAll();
    }
    public function getLikesOfOneCandidate($mail): array
    {
        $base = $this->connectDb();
        $sql = "SELECT likecandidates.id AS 'idOfferLiked', id_candidat, candidat.id AS 'idCandidat', recruteur.id AS 'idRecrutor', recruteur.name AS 'recrutorName', recruteur.phone AS 'recrutorPhone', recruteur.mail AS 'recrutorMail', recruteur.city AS 'recrutorCity', recruteur.postalCode AS 'recrutorPostalCode', recruteur.adress AS 'recrutorAdress', recruteur.pseudo AS 'recrutorPseudo', recruteur.profilPicture AS 'recrutorProfilPicture', contract.id AS 'contractID', contract.name AS 'contractName', domaine.id AS 'domaineID', domaine.name AS 'domaineName', profils.nameStruct AS 'profilName', profils.name AS 'profilColor', profils.talents AS 'profilTalents', recruteur.name AS 'recrutorName', offre.job, offre.experienceYear AS 'experienceYearForJob', publicationDate, startDate, offre.description AS 'offerDescription'
        FROM `offre`
        INNER JOIN `likecandidates` ON offre.id = likecandidates.id
	   INNER JOIN `candidat` ON candidat.id = likecandidates.id_candidat
       INNER JOIN `recruteur` ON recruteur.id = id_recruteur
       INNER JOIN `profils` ON offre.id_profils = profils.id
       INNER JOIN  `contract` ON offre.id_contract = contract.id
       INNER JOIN  `domaine` ON offre.id_domaine = domaine.id 
       WHERE candidat.mail = :mail
       ORDER BY offre.id DESC";
        $resultQuery = $base->prepare($sql);
        $resultQuery->bindValue(':mail', $mail, PDO::PARAM_STR);
        $resultQuery->execute();
        return $resultQuery->fetchAll();
    }
    public function getMatchsOfCandidate($mail): void
    {
        $base = $this->connectDb();
        $sql = "SELECT likerecrutor.id AS 'idCandidateLiked', likerecrutor.id_recruteur AS 'recrutorLike' , likecandidates.id AS 'idOfferLiked', id_candidat, candidat.id AS 'idCandidat', offre.job, recruteur.name
        FROM `likecandidates`
        LEFT JOIN offre ON offre.id = likecandidates.id
        LEFT JOIN recruteur ON offre.id_recruteur = recruteur.id
        LEFT JOIN likerecrutor ON likerecrutor.id_recruteur = recruteur.id
        LEFT JOIN candidat ON likerecrutor.id = candidat.id
        WHERE candidat.mail =:mail";

        $resultQuery = $base->prepare($sql);
        $resultQuery->bindValue(':mail', $mail, PDO::PARAM_STR);
        $resultQuery->execute();
    }

    public function getLikesOfAllRecrutorForOneCandidate($mail): array
    {
        $base = $this->connectDb();
        $sql = "SELECT likerecrutor.id AS 'idCandidat', likerecrutor.id_recruteur, candidat.mail FROM astypikrecrutment.likerecrutor
        INNER JOIN candidat ON candidat.id = likerecrutor.id
        WHERE candidat.mail=:mail";

        $resultQuery = $base->prepare($sql);
        $resultQuery->bindValue(':mail', $mail, PDO::PARAM_STR);
        $resultQuery->execute();
        return $resultQuery->fetchAll();
    }
    public function getLikesOfAllCandidateForOneRecrutor($mail): array
    {
        $base = $this->connectDb();
        $sql = "SELECT likecandidates.id AS 'idOffer', recruteur.id as 'recrutorId', likecandidates.id_candidat, candidat.mail FROM astypikrecrutment.likecandidates
        INNER JOIN candidat ON candidat.id = likecandidates.id_candidat
        INNER JOIN offre ON likecandidates.id = offre.id
        INNER JOIN recruteur ON offre.id_recruteur = recruteur.id
        WHERE recruteur.mail=:mail
        GROUP BY candidat.mail";

        $resultQuery = $base->prepare($sql);
        $resultQuery->bindValue(':mail', $mail, PDO::PARAM_STR);
        $resultQuery->execute();
        return $resultQuery->fetchAll();
    }
    public function getAllLikesFromOneRecrutor($id_recruteur): array
    {
        $base = $this->connectDb();
        $sql = "SELECT id_recruteur, GROUP_CONCAT(likerecrutor.id) AS 'candidats' FROM likerecrutor
        WHERE id_recruteur = :id_recruteur";

        $resultQuery = $base->prepare($sql);
        $resultQuery->bindValue(':id_recruteur', $id_recruteur, PDO::PARAM_STR);
        $resultQuery->execute();
        $myArray = $resultQuery->fetch();
        $candidats = explode(",", $myArray['candidats']);
        return $candidats;
    }
    public function getAllLikesFromOneCandidate($id_candidat): array
    {
        $base = $this->connectDb();
        $sql = "SELECT id_candidat, GROUP_CONCAT(likecandidates.id) AS 'recrutor' FROM likecandidates
        WHERE id_candidat = :id_candidat";

        $resultQuery = $base->prepare($sql);
        $resultQuery->bindValue(':id_candidat', $id_candidat, PDO::PARAM_STR);
        $resultQuery->execute();
        $myArray = $resultQuery->fetch();
        $candidats = explode(",", $myArray['recrutor']);
        return $candidats;
    }
    public function getAllCandidatesLikesFilters(string $mail, string $contract, string $domaine, string $profil, int $exp, string $terme): array
    {
        $base = $this->connectDb();
        $sql = "SELECT likecandidates.id AS 'idOfferLiked', id_candidat, candidat.id AS 'idCandidat', recruteur.id AS 'idRecrutor', recruteur.name AS 'recrutorName', recruteur.phone AS 'recrutorPhone', recruteur.mail AS 'mail', recruteur.city AS 'recrutorCity', recruteur.postalCode AS 'recrutorPostalCode', recruteur.adress AS 'recrutorAdress', recruteur.pseudo AS 'recrutorPseudo', recruteur.profilPicture AS 'recrutorProfilPicture', contract.id AS 'contractID', contract.name AS 'contractName', domaine.id AS 'domaineID', domaine.name AS 'domaineName', profils.nameStruct AS 'profilName', profils.name AS 'profilColor', profils.talents AS 'profilTalents', recruteur.name AS 'recrutorName', offre.job, offre.experienceYear AS 'exp', publicationDate, startDate, offre.description AS 'offerDescription'
    FROM `offre`
    INNER JOIN `likecandidates` ON offre.id = likecandidates.id
   INNER JOIN `candidat` ON candidat.id = likecandidates.id_candidat
   INNER JOIN `recruteur` ON recruteur.id = id_recruteur
   INNER JOIN `profils` ON offre.id_profils = profils.id
   INNER JOIN  `contract` ON offre.id_contract = contract.id
   INNER JOIN  `domaine` ON offre.id_domaine = domaine.id 
    WHERE candidat.mail=" . $mail . " AND (recruteur.city LIKE " . $terme . " OR offre.description LIKE " . $terme . " OR offre.job LIKE " . $terme . " OR recruteur.name LIKE " . $terme . " OR recruteur.pseudo LIKE " . $terme . " OR profils.name LIKE " . $terme . " OR profils.talents LIKE " . $terme . " OR domaine.name LIKE " . $terme . " OR contract.name LIKE " . $terme . ") AND contract.name IN (" . $contract . ") AND domaine.name IN (" . $domaine . ") AND profils.name IN (" . $profil . ") AND offre.experienceYear >= " . $exp . "";
        $resultQuery = $base->prepare($sql);
        $resultQuery->bindValue(':mail', $mail, PDO::PARAM_STR);
        $resultQuery->bindValue(':contract', $contract, PDO::PARAM_STR);
        $resultQuery->bindValue(':domaine', $domaine, PDO::PARAM_STR);
        $resultQuery->bindValue(':profil', $profil, PDO::PARAM_STR);
        $resultQuery->bindValue(':exp', $exp, PDO::PARAM_INT);
        $resultQuery->bindValue(':terme', $terme, PDO::PARAM_STR);
        $resultQuery->execute();
        return $resultQuery->fetchAll();
    }
    public function getAllRecrutorsLikesFilters(string $mail, string $contract, string $domaine, string $profil, int $exp, string $terme): array
    {
        $base = $this->connectDb();
        $sql = "SELECT likerecrutor.id AS 'idCandidateLiked', id_recruteur, candidat.id AS 'idCandidat', lastName, firstName, candidat.description AS 'candidateDescription', candidat.pseudo AS 'candidatePseudo', birthDate, candidat.phone AS 'canditePhone', candidat.mail AS 'candidateMail', candidat.city AS 'candidateCity', candidat.postalCode AS 'candidatePostalCode', candidat.adress AS 'candidateAdress', candidat.profilPicture AS 'candidateProfilPicture', experienceYears, cvPicture, contract.id AS 'contractID', contract.name AS 'contractName', domaine.id AS 'domaineID', domaine.name AS 'domaineName', profils.nameStruct AS 'profilName', profils.name AS 'profilColor', profils.talents AS 'profilTalents', recruteur.name AS 'recrutorName'
    FROM `candidat`
    INNER JOIN `likerecrutor` ON candidat.id = likerecrutor.id
   INNER JOIN `recruteur` ON recruteur.id = likerecrutor.id_recruteur
   INNER JOIN `profils` ON candidat.id_profils = profils.id
   INNER JOIN  `contract` ON candidat.id_contract = contract.id
   INNER JOIN  `domaine` ON candidat.id_domaine = domaine.id 
    WHERE recruteur.mail=" . $mail . " AND (candidat.city LIKE " . $terme . " OR candidat.description LIKE " . $terme . " OR candidat.firstName LIKE " . $terme . " OR candidat.lastName LIKE " . $terme . " OR profils.name LIKE " . $terme . " OR profils.talents LIKE " . $terme . " OR domaine.name LIKE " . $terme . " OR contract.name LIKE " . $terme . ") AND contract.name IN (" . $contract . ") AND domaine.name IN (" . $domaine . ") AND profils.name IN (" . $profil . ") AND candidat.experienceYears >= " . $exp . "";
        $resultQuery = $base->prepare($sql);
        $resultQuery->bindValue(':mail', $mail, PDO::PARAM_STR);
        $resultQuery->bindValue(':contract', $contract, PDO::PARAM_STR);
        $resultQuery->bindValue(':domaine', $domaine, PDO::PARAM_STR);
        $resultQuery->bindValue(':profil', $profil, PDO::PARAM_STR);
        $resultQuery->bindValue(':exp', $exp, PDO::PARAM_INT);
        $resultQuery->bindValue(':terme', $terme, PDO::PARAM_STR);
        $resultQuery->execute();
        return $resultQuery->fetchAll();
    }
    public function addLikeRecrutor(int $idCandidate, int $idRecrutor): void
    {
        $db = $this->connectDb();
        $sql = "SET FOREIGN_KEY_CHECKS=0;
        INSERT INTO `likerecrutor` (`id`, `id_recruteur`) VALUES (:idCandidate, :idRecrutor);
        SET FOREIGN_KEY_CHECKS=1;";
        $query = $db->prepare($sql);
        $query->bindValue(':idCandidate', $idCandidate, PDO::PARAM_INT);
        $query->bindValue(':idRecrutor', $idRecrutor, PDO::PARAM_INT);
        $query->execute();
    }
    public function deleteLikeRecrutor(int $idCandidate, int $idRecrutor): void
    {
        $db = $this->connectDb();
        $sql = "SET FOREIGN_KEY_CHECKS=0;
        DELETE FROM `likerecrutor`
        WHERE `id`=:idCandidate AND `id_recruteur`=:idRecrutor;
        SET FOREIGN_KEY_CHECKS=1;";
        $query = $db->prepare($sql);
        $query->bindValue(':idCandidate', $idCandidate, PDO::PARAM_INT);
        $query->bindValue(':idRecrutor', $idRecrutor, PDO::PARAM_INT);
        $query->execute();
    }
    public function addLikeCandidate(int $idOffer, int $idCandidate): void
    {
        $db = $this->connectDb();
        $sql = "INSERT INTO `likecandidates` (`id`, `id_candidat`) VALUES (:idOffer, :idCandidate)";
        $query = $db->prepare($sql);
        $query->bindValue(':idOffer', $idOffer, PDO::PARAM_INT);
        $query->bindValue(':idCandidate', $idCandidate, PDO::PARAM_INT);

        $query->execute();
    }
    public function deleteLikeCandidate(int $idOffer, int $idCandidate): void
    {
        $db = $this->connectDb();
        $sql = "DELETE FROM `likecandidates`
        WHERE `id`=:idOffer AND `id_candidat`=:idCandidate";
        $query = $db->prepare($sql);
        $query->bindValue(':idOffer', $idOffer, PDO::PARAM_INT);
        $query->bindValue(':idCandidate', $idCandidate, PDO::PARAM_INT);
        $query->execute();
    }
}
