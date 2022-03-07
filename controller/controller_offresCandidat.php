<?php 
require_once '../config.php';
require_once '../models/dataBase.php';
require_once '../models/annonces.php';
require_once '../models/likes.php';

session_start();


$likesObj = new Likes();
$likesCandidateArray = $likesObj->getAllLikesFromOneCandidate($_SESSION['id']);

if (isset($_POST["searchFilters"])) {
    if (isset($_POST['contractName'])) {
        $contract = '"'. implode('","', $_POST['contractName']) .'"';
        echo $contract;
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
    }if (isset($_POST['inputSearch'])) {

        $terme = '"%'. htmlspecialchars(trim(strip_tags($_POST['inputSearch']))) . '%"';
        var_dump($terme);
    }
    var_dump($profil);
    $offers = new Annonce;
    $allOfferssArray = $offers->getAlloffersFilters($contract, $domaine, $profil, $exp, $terme);
    var_dump($contract, $offers, $profil, $exp, $terme);
} else {
    $offers = new Annonce;
    $allOfferssArray = $offers -> getAllOffers();
}




if(empty($_SESSION)){
    header('Location: pageErreur.php');
}