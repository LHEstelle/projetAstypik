<?php

require_once '../config.php';
require_once '../models/database.php';
require_once '../models/annonces.php';
require_once '../models/entreprise.php';

session_start();
if (empty($_SESSION) || empty($_SESSION['siretNumber'])) {
    header('Location: pageErreur.php');
}
$arrayErrors = [];

$modifyAnnonceOk = false;




if (isset($_GET["id"])) {
    $id = htmlspecialchars(trim($_GET["id"]));
    $annonceObj = new Annonce();
    $annonceInfo = $annonceObj->getOneAnnonce($id);
    $entrepriseInfo = new Entreprise;
    $entrepriseInfoArray = $entrepriseInfo->getOneRecrutor($_SESSION['mail']);
    $contractObj = new Annonce;
    $contractArray = $contractObj->getAllContract();

    $domainObj = new Annonce;
    $domainArray = $domainObj->getAllDomaines();

    $profilsObj = new Annonce;
    $profilsArray = $profilsObj->getAllProfils();


    if (isset($_POST["modifyAnnonce"])) {



        if (isset($_POST["job"])) {
            if (empty($_POST["job"])) {
                $arrayErrors["job"] = "Veuillez saisir votre intitulé de poste";
            }
        }

        if (isset($_POST["id_domaine"])) {
            if (empty($_POST["id_domaine"])) {
                $arrayErrors["id_domaine"] = "Veuillez saisir votre domaine";
            }
        } else {
            $arrayErrors["id_domaine"] = "Veuillez saisir votre domaine";
        }

        if (isset($_POST["id_contract"])) {
            if (empty($_POST["id_contract"])) {
                $arrayErrors["id_contract"] = "Veuillez saisir un contrat";
            }
        } else {
            $arrayErrors["id_contract"] = "Veuillez saisir un contrat";
        }

        if (isset($_POST["startDate"])) {
            if (empty($_POST["startDate"])) {
                $arrayErrors["startDate"] = "Veuillez saisir une date de début";
            } else {
                $startDate = $_POST['startDate'];
                $aujourdhui = date("Y-m-d");
                if ($startDate < $aujourdhui) {
                    $arrayErrors["startDate"] = "La date de début ne doit pas être antérieure ou égale à aujourd'hui";
                }
            }
        }
        if (isset($_POST["id_profils"])) {
            if (empty($_POST["id_profils"])) {
                $arrayErrors["id_profils"] = "Veuillez saisir des compétences préférentielles";
            }
        }

        if (isset($_POST["description"])) {
            if (empty($_POST["description"])) {
                $arrayErrors["description"] = "Veuillez saisir une description de l'offre";
            }
        }

        var_dump(count($arrayErrors));
        if (count($arrayErrors) == 0) {
            var_dump($_POST);
            $job = htmlspecialchars(trim($_POST['job']));
            $experienceYear = htmlspecialchars(intval(trim($_POST['experienceYear'])));
            $publicationDate = htmlspecialchars((trim($_POST['publicationDate'])));
            $description = htmlspecialchars((trim($_POST['description'])));
            $startDate = htmlspecialchars((trim($_POST['startDate'])));
            $idRecruteur = htmlspecialchars(trim($_POST['id_recruteur']));
            $idDomaine = htmlspecialchars(trim($_POST['id_domaine']));
            $idContract = htmlspecialchars(trim($_POST['id_contract']));
            $description = (trim($_POST['description']));
            $idAnnonce = htmlspecialchars(trim($_POST["idAnnonce"]));
            $idProfils = htmlspecialchars(trim($_POST['id_profils']));
            $annonce = new Annonce();
            $annonceArray = $annonce->modifyAnnonce($job, $experienceYear, $publicationDate, $description, $startDate, $idRecruteur, $idDomaine, $idContract, $idAnnonce, $idProfils);
            $modifyAnnonceOk = true;
            header('Location: annoncesRecruteur.php');
        }
    }
}
if (isset($_POST['idDeletePatient'])) {
    var_dump($_POST);
    $id = htmlspecialchars(trim($_POST["idDeletePatient"]));
    $annonceObj = new Annonce;
    $annonceDelete = $annonceObj->deleteAnnonce($id);
    header('location: annoncesRecruteur.php');
}


