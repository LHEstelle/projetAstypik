    <?php


    class Candidat extends DataBase
    {
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
    /**
     * Permet d'ajouter un candidat
     * @param array (information du nouveau candidat)
     * @return bool
     * 
     */
        public function addCandidat(array $infoUsers): bool
        {
            $db = $this->connectDb();

            $sql = "INSERT INTO `candidat` (`lastName`, `firstName`, `description`, `birthDate`, `phone`, `mail`, `city`, 
            `postalCode`,`adress`, `password`, id_profils, id_contract, id_domaine, experienceYears, cvPicture, profilPicture) 
            VALUES (:lastName, :firstName, :description, :birthDate, :phone, :mail, :city, :postalCode, :adress, :password, 
            :id_profils, :id_contract, :id_domaine, :experienceYears, :cvPicture, :profilPicture)";

            $query = $db->prepare($sql);

            $query->bindValue(':lastName', htmlspecialchars(strtoupper(trim($infoUsers['lastname']))), PDO::PARAM_STR);
            $query->bindValue(':firstName', htmlspecialchars(ucwords(trim($infoUsers['firstname']))), PDO::PARAM_STR);
            $query->bindValue(':description', 'en attente de description...', PDO::PARAM_STR);
            $query->bindValue(':birthDate', htmlspecialchars(trim($infoUsers['birthdate'])), PDO::PARAM_STR);
            $query->bindValue(':phone', htmlspecialchars(trim($infoUsers['phone'])), PDO::PARAM_STR);
            $query->bindValue(':mail', htmlspecialchars(trim($infoUsers['mail'])), PDO::PARAM_STR);
            $query->bindValue(':city',  htmlspecialchars(trim($infoUsers['city'])), PDO::PARAM_STR);
            $query->bindValue(':postalCode', htmlspecialchars(trim($infoUsers['postalCode'])), PDO::PARAM_INT);
            $query->bindValue(':adress', htmlspecialchars(trim($infoUsers['adress'])), PDO::PARAM_STR);
            $query->bindValue(':id_profils', htmlspecialchars(trim($infoUsers['id_profils'])), PDO::PARAM_INT);
            $query->bindValue(':id_contract', htmlspecialchars(trim($infoUsers['id_contract'])), PDO::PARAM_INT);
            $query->bindValue(':id_domaine', htmlspecialchars(trim($infoUsers['id_domaine'])), PDO::PARAM_INT);
            $query->bindValue(':experienceYears', 0, PDO::PARAM_INT);
            $query->bindValue(':cvPicture', htmlspecialchars(trim($infoUsers['cvPicture'])), PDO::PARAM_STR);
            $query->bindValue(':profilPicture', htmlspecialchars(trim($infoUsers['profilPicture'])), PDO::PARAM_STR);

            $query->bindValue(':password', password_hash($infoUsers['password'], PASSWORD_DEFAULT), PDO::PARAM_STR);

            return $query->execute();
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


        /**
     * Permet d'afficher les donn??es d'un candidat
     * @param string (mail du candidat)
     * @return array
     * 
     */

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

            /**
     * Permet de modifier les donn??es d'un candidat
     * @param string (nom de famille du candidat)
     * @param string (pr??nom du candidat)
     * @param string (auto-description du candidat)
     * @param string (pseudo du candidat)
     * @param string (date de naissance du candidat)
     * @param string (num??ro de t??l??phone du candidat)
     * @param string (ville du candidat)
     * @param string (code postal du candidat)
     * @param string (adresse du candidat)
     * @param int (ann??es d'exp??rience dans le domaine recherch?? du candidat)
     * @param int (contrat recherch?? par le candidat)
     * @param int (domaine recherch?? par le candidat)
     * @param int (id du candidat)
     * @return void
     * 
     */
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

                /**
     * Permet de modifier les donn??es d'un candidat
     * @param int (id du candidat)
     * @return array
     * 
     */
        public function deleteCandidat(int $id): void
        {


            $base = $this->connectDb();
            $sql = " DELETE FROM candidat
            WHERE candidat.id=:id;";
            $resultQuery = $base->prepare($sql);
            $resultQuery->bindValue(':id', $id, PDO::PARAM_INT);
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
            $sql = "SELECT candidat.id AS 'idCandidat', lastName, firstName, candidat.description AS 'candidateDescription', pseudo, birthDate, phone, mail, city, postalCode, adress, profilPicture, experienceYears, cvPicture, contract.id AS 'contractID', contract.name AS 'contractName', domaine.id AS 'domaineID', domaine.name AS 'domaineName', profils.nameStruct AS 'profilName', profils.name AS 'profilColor', profils.talents AS 'profilTalents', profils.img
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

        public function getAllCandidatesFilters(string $contract, string $domaine, string $profil, int $exp, string $terme): array
        {
            $base = $this->connectDb();
            $sql = "SELECT candidat.id AS 'idCandidat', lastName, firstName, candidat.description AS 'candidateDescription', pseudo, birthDate, phone, mail, city, postalCode, adress, profilPicture, experienceYears, cvPicture, contract.id AS 'contractID', domaine.id AS 'domaineID',  profils.id AS 'profilid', contract.name AS 'contractName', domaine.name AS'domaineName', profils.name AS 'profilColor'
            FROM candidat
            INNER JOIN `profils` ON id_profils = profils.id
            INNER JOIN  `contract` ON id_contract = contract.id
            INNER JOIN  `domaine` ON id_domaine = domaine.id 
            WHERE (candidat.city LIKE " . $terme . " OR candidat.description LIKE " . $terme . " OR candidat.lastname LIKE " . $terme . " OR candidat.firstname LIKE " . $terme . " OR candidat.pseudo LIKE " . $terme . " OR profils.name LIKE " . $terme . " OR profils.talents LIKE " . $terme . " OR domaine.name LIKE " . $terme . " OR contract.name LIKE " . $terme . ") AND contract.name IN (".$contract.") AND domaine.name IN (".$domaine.") AND profils.name IN (".$profil.") AND candidat.experienceYears >= ".$exp."
            ORDER BY candidat.id  DESC";
            $resultQuery = $base->prepare($sql);
            $resultQuery->bindValue(':contract', $contract, PDO::PARAM_STR);
            $resultQuery->bindValue(':domaine', $domaine, PDO::PARAM_STR);
            $resultQuery->bindValue(':profil', $profil, PDO::PARAM_STR);
            $resultQuery->bindValue(':exp', $exp, PDO::PARAM_INT);
            $resultQuery->bindValue(':terme', $terme, PDO::PARAM_STR);
            $resultQuery->execute();
        return $resultQuery->fetchAll();
        }
        public function UpdateActivities($activityId, $id): void
    {
        $base = $this->connectDb();
        $query = "INSERT INTO  pro_destination_cat(des_id,act_id)
        values ($activityId, $id)
        WHERE act_id = :activityId))";

        $resultQuery = $base->prepare($query);
        $resultQuery->bindValue(':activityId', $activityId, PDO::PARAM_STR);
        $resultQuery->bindValue(':id', $id, PDO::PARAM_STR);

        $resultQuery->execute();
    }
    }
