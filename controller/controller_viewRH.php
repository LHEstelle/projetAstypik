<?php

require_once '../config.php';
require_once '../models/dataBase.php';
require_once '../models/candidat.php';
require_once '../models/likes.php';

session_start();


if (isset($_GET["searchFilters"])) {
    if (isset($_GET['contractName'])) {
        $contract = '"'. implode('","', $_GET['contractName']) .'"';

    } else {
        $contract = '"CDI","CDD","contrat d'."'".'apprentissage","contrat de professionalisation","stage","indépendant"';
      
    }
    if (isset($_GET['domaineName'])) {
        $domaine = '"'. implode('","', $_GET['domaineName']) .'"';
      
   
    } else {
        $domaine = '"Commercial","Marketing","Communication","Création","Direction d'."'".'entreprise","Etudes, Recherche et Développement","Gestion, Finance, Administration","Production Industrielle, Travaux, Chantiers","Ressources Humaines","Sanitaire, Social, Culture","Services Techniques","Informatique"';
    
    }
    if (isset($_GET['profilName'])) {
        $profil = '"'. implode('","', $_GET['profilName']) .'"';
    
    } else {
        $profil = "'superCactus','peterPaon','spiderLutin','ironSpoke'";
      
    }
    if (isset($_GET['experienceYears'])) {

        $exp =  intval($_GET['experienceYears']);
  

        
    } else {
        $exp = '';
    
    }if (isset($_GET['inputSearch'])) {

        $terme = '"%'. htmlspecialchars(trim(strip_tags($_GET['inputSearch']))) . '%"';

    }
   
    $candidates = new Candidat;
    $allCandidatesArray = $candidates->getAllCandidatesFilters($contract, $domaine, $profil, $exp, $terme);

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
