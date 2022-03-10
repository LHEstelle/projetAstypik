<?php

require_once '../config.php';
require_once '../models/dataBase.php';
require_once '../models/candidat.php';


$regexNom = "/^[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]{2,30}$/";
$regexMail = "/^([a-z.-]+)@([a-z]+).([a-z]){2,4}$/";

$regexPhone = "/^0[1-98][0-9]{8}$/";
$regexCity = "/^[^0-9]$/";
$regexPostalCode = "/\d{5}$/";
$arrayErrors = [];

session_start();
if (empty($_SESSION)) {
    header('Location: pageErreur.php');
}

$candidatInfo = new Candidat;
$candidatInfoArray = $candidatInfo->getOneCandidate($_SESSION['mail']);
$dateNaissance = $candidatInfoArray['birthDate'];
$aujourdhui = date("Y-m-d");
$diff = date_diff(date_create($dateNaissance), date_create($aujourdhui));
$age = $diff->format('%y');



$contractObj = new Candidat;
$contractArray = $contractObj->getAllContract();

$domainObj = new Candidat;
$domainArray = $domainObj->getAllDomaines();


$candidatObj = new Candidat;
$candidatProfilArray = $candidatObj->getCandidateProfil($_SESSION['mail']);

$modifyCandidatOk = false;


if (isset($_POST['modifyButton'])) {

    if (isset($_POST["lastName"])) {
        if (empty($_POST["lastName"])) {
            $arrayErrors["lastName"] = "Veuillez saisir votre nom";
        } elseif (!preg_match($regexNom, $_POST["lastName"])) {
            $arrayErrors["lastName"] = "Format invalide";
        }
    }

    if (isset($_POST["firstName"])) {
        if (empty($_POST["firstName"])) {
            $arrayErrors["firstName"] = "Veuillez saisir votre prénom";
        } elseif (!preg_match($regexNom, $_POST["firstName"])) {
            $arrayErrors["firstName"] = "Format invalide";
        }
    }

    if (isset($_POST["birthDate"])) {
        if (empty($_POST["birthDate"])) {
            $arrayErrors["birthDate"] = "Veuillez saisir la date de naissance";
        }
    }


    if (isset($_POST["phone"])) {
        if (empty($_POST["phone"])) {
            $arrayErrors["phone"] = "Veuillez saisir votre numéro de telephone";
        } elseif (!preg_match($regexPhone, $_POST["phone"])) {
            $arrayErrors["phone"] = "Format invalide";
        }
    }

    $candidatMail = new Candidat();
    if (isset($_POST["mail"])) {
        if (empty($_POST["mail"])) {
            $arrayErrors["mail"] = "Veuillez saisir votre Mail";
        } elseif (!filter_var($_POST["mail"], FILTER_VALIDATE_EMAIL)) {
            $arrayErrors["mail"] = "Le format de votre mail est invalide";
        } elseif (!$candidatMail->checkFreeMail($_POST['mail']) && $_POST['mail'] != $_SESSION['mail']) {
            $arrayErrors["mail"] = "Cette adresse mail est déjà utilisée";
        }
    }

    if (isset($_POST["city"])) {
        if (empty($_POST["city"])) {
            $arrayErrors["city"] = "Veuillez saisir votre ville";
        }
    } elseif (!preg_match($regexCity, $_POST["city"])) {
        $arrayErrors["city"] = "Format invalide";
    }



    if (isset($_POST["postalCode"])) {
        if (empty($_POST["postalCode"])) {
            $arrayErrors["postalCode"] = "Veuillez saisir votre code postal";
        }
    } elseif (!preg_match($regexPostalCode, $_POST["postalCode"])) {
        $arrayErrors["postalCode"] = "Format invalide";
    }

    if (isset($_POST["adress"])) {
        if (empty($_POST["adress"])) {
            $arrayErrors["adress"] = "Veuillez saisir votre adresse";
        }
    }

    if (isset($_POST["id_contract"])) {
        if (empty($_POST["id_contract"])) {
            $arrayErrors["id_contract"] = "Veuillez saisir le type de contrat recherché";
        }
    }
    if (isset($_POST["id_domaine"])) {
        if (empty($_POST["id_domaine"])) {
            $arrayErrors["id_domaine"] = "Veuillez saisir le type de domaine recherché";
        }
    }
    if (isset($_POST["pseudo"]) && strlen($_POST['pseudo']) > 35) {
        $arrayErrors["pseudo"] = "35 caractères maximum";
    }

    if (count($arrayErrors) == 0) {

        // strtoupper = en majuscule / ucwords = 1ere lettre en majuscule
        $lastName = htmlspecialchars(strtoupper(trim($_POST['lastName'])));
        $firstName = htmlspecialchars(ucwords(trim($_POST['firstName'])));
        $description = trim($_POST['description']);
        $pseudo = htmlspecialchars(trim($_POST['pseudo']));
        $birthDate = htmlspecialchars(trim($_POST['birthDate']));
        $phone = htmlspecialchars(trim($_POST['phone']));
        $city = htmlspecialchars(trim($_POST['city']));
        $postalCode = htmlspecialchars(intval(trim($_POST['postalCode'])));
        $adress = htmlspecialchars(trim($_POST['adress']));
        $experienceYears = htmlspecialchars(intval(trim($_POST['experienceYears'])));
        $id_contract = htmlspecialchars(intval(trim($_POST['id_contract'])));
        $id_domaine = htmlspecialchars(intval(trim($_POST['id_domaine'])));
        $idCandidat = $_SESSION['id'];
        $candidatObj = new Candidat();
        $modifyCandidat = $candidatObj->modifyCandidate($lastName,  $firstName,  $description,  $pseudo,  $birthDate,  $phone,  $city,  $postalCode,  $adress,  $experienceYears, $id_contract, $id_domaine, $idCandidat);

        echo '<script type="text/javascript">'
            . 'alert("Votre profil a bien été modifié");'
            . '</script>';
    }
}

if (!empty($_POST['submitButtonProfilPicture'])) {
    if ($_FILES['fileToUpload']['type'] == '') {
        $arrayErrors["mime"] = "Veuillez télécharger une photo";
    } else if (mime_content_type($_FILES['fileToUpload']['tmp_name']) != 'image/jpeg' && mime_content_type($_FILES['fileToUpload']['tmp_name']) != 'image/jpg' && mime_content_type($_FILES['fileToUpload']['tmp_name']) != 'image/png') {
        $arrayErrors["mime"] = "Votre téléchargement n'est pas une image";
    } else if ($_FILES['fileToUpload']['size'] > 1000000) {
        $arrayErrors["size"] = "Désolé, votre fichier ne doit pas dépasser 1MO.Votre fichier n'a pas été téléchargé";
    } else if ($_FILES['fileToUpload']['type'] != 'image/png' &&  $_FILES['fileToUpload']['type'] != 'image/jpg' && $_FILES['fileToUpload']['type'] != 'image/jpeg') {
        $arrayErrors["extension"] = "L'extension n'est pas une image";
    } else {

        $uploaddir = 'C:\wamp\www\projet\PROJETRECRUTEMENT\assets\img/';
        $_FILES['fileToUpload']['name'] = uniqid() . basename($_FILES['fileToUpload']['name']);
        $uploadfile = $uploaddir . $_FILES['fileToUpload']['name'];
        move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $uploadfile);
        $mail = htmlspecialchars(trim($_SESSION["mail"]));
        $profilPicture = htmlspecialchars(trim($_FILES['fileToUpload']["name"]));
        $candidatObj = new Candidat();
        $candidatModifyArray = $candidatObj->modifyprofilPicture($mail, $profilPicture);
        header('Location: profilCandidat.php');
    }
}

if (!empty($_POST['submitButtonCvPicture'])) {

    if ($_FILES['cvToUpload']['type'] == '') {
        $arrayErrors["mimeCV"] = "Veuillez télécharger un CV";
    } else if (mime_content_type($_FILES['cvToUpload']['tmp_name']) != 'image/jpeg' && mime_content_type($_FILES['cvToUpload']['tmp_name']) != 'image/jpg' && mime_content_type($_FILES['cvToUpload']['tmp_name']) != 'image/png' && mime_content_type($_FILES['cvToUpload']['tmp_name']) != 'image/png' && mime_content_type($_FILES['cvToUpload']['tmp_name']) != 'application/pdf') {
        $arrayErrors["mimeCV"] = "Mauvais format";
    } else if ($_FILES['cvToUpload']['size'] > 20000000) {
        $arrayErrors["sizeCV"] = "Désolé, votre fichier ne doit pas dépasser 1MO.Votre fichier n'a pas été téléchargé";
    } else if ($_FILES['cvToUpload']['type'] != 'image/png' &&  $_FILES['cvToUpload']['type'] != 'image/jpg' && $_FILES['cvToUpload']['type'] != 'image/jpeg' && $_FILES['cvToUpload']['type'] != 'application/pdf') {
        $arrayErrors["extensionCV"] = "Mauvais format";
    } else {

        $uploaddir = 'C:\wamp\www\projet\PROJETRECRUTEMENT\assets\img/';
        $_FILES['cvToUpload']['name'] = uniqid() . basename($_FILES['cvToUpload']['name']);

        $uploadfile = $uploaddir . $_FILES['cvToUpload']['name'];
        move_uploaded_file($_FILES['cvToUpload']['tmp_name'], $uploadfile);
        $mail = htmlspecialchars(trim($_SESSION["mail"]));

        $cvPicture = htmlspecialchars(trim($_FILES['cvToUpload']["name"]));
        $candidat = new Candidat();
        $candidatModifyArray = $candidat->modifyCvPicture($mail, $cvPicture);
        header('Location: profilCandidat.php');
    }
}


if (isset($_POST["deleteButton"])) {
    $mail = htmlspecialchars(trim($_POST["mail"]));
    $candidat = new Candidat();
    $candidatDeleteArray = $candidat->deleteCandidat($mail);
    session_unset();
    session_destroy();
    header('Location: ../views/index.php');
    exit();
}
if (isset($_POST['deconnectButton'])) {
    session_unset();
    session_destroy();
    header('Location: ../views/index.php');
}
