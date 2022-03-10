<?php

require_once '../config.php';
require_once '../models/database.php';
require_once '../models/candidat.php';



$regexNom = "/^[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]{2,30}$/";
$regexMail = "/^([a-z.-]+)@([a-z]+).([a-z]){2,4}$/";
// $regexDate = "/^[0-9\-]+$/";
$regexPhone = "/^0[1-98][0-9]{8}$/";
$regexCity = "/^[^0-9]$/";
$regexPostalCode = "/\d{5}$/";
$arrayErrors = [];

$addCandidatOk = false;

if (!empty($_POST)) {

    if (isset($_POST["lastname"])) {
        if (empty($_POST["lastname"])) {
            $arrayErrors["lastname"] = "Veuillez saisir votre nom";
        } elseif (!preg_match($regexNom, $_POST["lastname"])) {
            $arrayErrors["lastname"] = "Format invalide";
        }
    }

    if (isset($_POST["firstname"])) {
        if (empty($_POST["firstname"])) {
            $arrayErrors["firstname"] = "Veuillez saisir votre prénom";
        } elseif (!preg_match($regexNom, $_POST["firstname"])) {
            $arrayErrors["firstname"] = "Format invalide";
        }
    }

    if (isset($_POST["birthdate"])) {
        if (empty($_POST["birthdate"])) {
            $arrayErrors["birthdate"] = "Veuillez saisir la date de naissance";
        } else {
            $dateNaissance = $_POST['birthdate'];
            $aujourdhui = date("Y-m-d");
            $diff = date_diff(date_create($dateNaissance), date_create($aujourdhui));
            $age = $diff->format('%y');
            if($age<'16'){
                $arrayErrors["birthdate"] = "Vous devez avoir 16ans minimum pour vous inscrire";
            }else if($age > '100'){
                $arrayErrors["birthdate"] = "Vous ne pouvez pas avoir plus de 100 ans";
            }
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
        } elseif (!$candidatMail->checkFreeMail($_POST['mail'])) {
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

        if (isset($_POST["password"]) && isset($_POST["passwordOk"])) {
            if (empty($_POST["password"])) {
                $arrayErrors["password"] = "Veuillez indiquer votre mot de passe";
            } else if ($_POST["password"] != $_POST["passwordOk"]) {
                $arrayErrors["passwordOk"] = "Les mots de passe ne sont pas identiques";
            }
        }

        if (count($arrayErrors) == 0) {
            // strtoupper = en majuscule / ucwords = 1ere lettre en majuscule

            $lastName = htmlspecialchars(strtoupper(trim($_POST['lastname'])));
            $firstName = htmlspecialchars(ucwords(trim($_POST['firstname'])));
            $description = 'en attente de description...';
            $birthDate = htmlspecialchars(trim($_POST['birthdate']));
            $phone = htmlspecialchars(trim($_POST['phone']));
            $mail = htmlspecialchars(trim($_POST['mail']));
            $city = htmlspecialchars(trim($_POST['city']));
            $postalCode = htmlspecialchars(trim($_POST['postalCode']));
            $adress = htmlspecialchars(trim($_POST['adress']));
            $password = htmlspecialchars(trim($_POST['password']));
            $id_profils = htmlspecialchars(trim($_POST['id_profils']));
            $id_contract = htmlspecialchars(trim($_POST['id_contract']));
            $id_domaine = htmlspecialchars(trim($_POST['id_domaine']));
            $experienceYears = 0;
            $cvPicture = htmlspecialchars(trim($_POST['cvPicture']));
            $profilPicture = htmlspecialchars(trim($_POST['profilPicture']));
            $candidatObj = new Candidat();
            $addCandidat = $candidatObj->addCandidat($lastName, $firstName, $description, $birthDate, $phone, $mail, $city, $postalCode, $adress, $password, $id_profils, $id_contract, $id_domaine, $experienceYears, $cvPicture, $profilPicture);
            $addCandidatOk = true;
            session_start();
            $sessionObj = new Candidat;
            $_SESSION = $sessionObj->getOneCandidate($_POST['mail']);
          

            header('location: testCandidat.php');
        }
    }
}
