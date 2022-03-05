<?php

require_once '../config.php';
require_once '../models/dataBase.php';
require_once '../models/candidat.php';
require_once '../models/likes.php';

session_start();


var_dump($_POST);

if (isset($_POST["searchFilters"])) {
    if (isset($_POST['contractName'])) {
        $contract = '"'. implode('","', $_POST['contractName']) .'"';
        var_dump($contract);
    } else {
        $contract = '"CDI","CDD","contrat d'."'".'apprentissage","contrat de professionalisation","stage","indépendant"';
        var_dump($contract);
    }
    if (isset($_POST['domaineName'])) {
        $domaine = '"'. implode('","', $_POST['domaineName']) .'"';
        echo $domaine;
   
    } else {
        $domaine = '"Commercial","Marketing","Communication","Création","Direction d'."'".'entreprise","Etudes, Recherche et Développement","Gestion, Finance, Administration","Production Industrielle, Travaux, Chantiers","Ressources Humaines","Sanitaire, Social, Culture","Services Techniques","Informatique"';
        var_dump($domaine);
    }
    if (isset($_POST['profilName'])) {
        $profil = '"'. implode('","', $_POST['profilName']) .'"';
        var_dump($profil);
    } else {
        $profil = "'superCactus','peterPaon','spiderLutin','ironSpoke'";
        var_dump($profil);
    }
    if (isset($_POST['experienceYears'])) {

        $exp =  intval($_POST['experienceYears']);
        var_dump($exp);
        
    } else {
        $exp = '';
            var_dump($exp);
    }
    var_dump($profil);
    $candidates = new Candidat;
    $allCandidatesArray = $candidates->getAllCandidatesFilters($contract, $domaine, $profil, $exp);
    var_dump($allCandidatesArray);
    var_dump($profil);
    echo "SELECT candidat.id AS 'idCandidat', lastName, firstName, candidat.description AS 'candidateDescription', pseudo, date_format(birthDate, '%d/%m/%Y') AS 'birthDate', phone, mail, city, postalCode, adress, profilPicture, experienceYears, cvPicture, contract.id AS 'contractID', domaine.id AS 'domaineID',  profils.id AS 'profilid', contract.name AS 'contractName', domaine.name AS'domaineName', profils.name AS 'profilColor'
    FROM candidat
    INNER JOIN `profils` ON id_profils = profils.id
    INNER JOIN  `contract` ON id_contract = contract.id
    INNER JOIN  `domaine` ON id_domaine = domaine.id 
    WHERE contract.name IN (".$contract.") AND domaine.name IN (".$domaine.") AND profils.name IN (".$profil.") AND candidat.experienceYears >= ".$exp."
    ORDER BY candidat.id  DESC";
} else {
    $candidates = new Candidat;
    $allCandidatesArray = $candidates->getAllCandidates();
}

//  else {
//     $candidates = new Candidat;
//     $allCandidatesArray = $candidates->getAllCandidates();
// }

$likesObj = new Likes();
$likesRecrutorArray = $likesObj->getAllLikesFromOneRecrutor($_SESSION['id']);

if (empty($_SESSION)) {
    header('Location: pageErreur.php');
}
var_dump($_SESSION);
