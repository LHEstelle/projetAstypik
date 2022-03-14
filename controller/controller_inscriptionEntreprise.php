<?php

require_once '../config.php';
require_once '../models/database.php';
require_once '../models/entreprise.php';
$regexSiret = "/^\d{14}$/";
$regexMail = "/^([a-z.-]+)@([a-z]+).([a-z]){2,4}$/";
$regexPhone = "/^0[1-98][0-9]{8}$/";
$regexCity = "/^[a-zA-Z]+(?:[\s-][a-zA-Z]+)*$/";
$regexPostalCode = "/\d{5}$/";
$arrayErrors = [];

$addCandidatOk = false;

if (!empty($_POST)) {



    if (isset($_POST["name"])) {
        if (empty($_POST["name"])) {
            $arrayErrors["name"] = "Veuillez saisir votre nom d'entreprise";
        }
    }

    if (isset($_POST["siretNumber"])) {
        if (empty($_POST["siretNumber"])) {
            $arrayErrors["siretNumber"] = "Veuillez saisir votre numéro de SIRET";
        } elseif (!preg_match($regexSiret, $_POST["siretNumber"])) {
            $arrayErrors["siretNumber"] = "Format invalide";
        }
    }

    if (isset($_POST["phone"])) {
        if (empty($_POST["phone"])) {
            $arrayErrors["phone"] = "Veuillez saisir votre numéro de telephone";
        } elseif (!preg_match($regexPhone, $_POST["phone"])) {
            $arrayErrors["phone"] = "Format invalide";
        }
    }

    $patientMail = new Entreprise();
    if (isset($_POST["mail"])) {
        if (empty($_POST["mail"])) {
            $arrayErrors["mail"] = "Veuillez saisir votre Mail";
        } elseif (!filter_var($_POST["mail"], FILTER_VALIDATE_EMAIL)) {
            $arrayErrors["mail"] = "Le format de votre mail est invalide";
        } elseif (!$patientMail->checkFreeMail($_POST['mail'])) {
            $arrayErrors["mail"] = "Cette adresse mail est déjà utilisée";
        }
    }
    var_dump($_POST);
    if (isset($_POST["city"])) {
        if (empty($_POST["city"])) {
            $arrayErrors["city"] = "Veuillez saisir votre ville";
        }
     elseif (!preg_match($regexCity, $_POST["city"])) {
        $arrayErrors["city"] = "Format invalide";
    }
}
    
    

    if (isset($_POST["postalCode"])) {
        if (empty($_POST["postalCode"])) {
            $arrayErrors["postalCode"] = "Veuillez saisir votre code postal";
        
    } elseif (!preg_match($regexPostalCode, $_POST["postalCode"])) {
        $arrayErrors["postalCode"] = "Format invalide";
    }}
    

    if (isset($_POST["adress"])) {
        if (empty($_POST["adress"])) {
            $arrayErrors["adress"] = "Veuillez saisir votre adresse";
        }
    }

    if (isset($_POST["password"]) && isset($_POST["passwordOk"])) {
        if (empty($_POST["password"])) {
            $arrayErrors["password"] = "Veuillez indiquer votre mot de passe";
        } else if ($_POST["password"] != $_POST["passwordOk"]) {
            $arrayErrors["passwordOk"] = "Les mots de passe ne sont pas identiques";
        }
    }
    $secretKey = "6LcVRNweAAAAAOVoCQpKFs4egqwLHj3dexyTOVH_";
    $ip = $_SERVER['REMOTE_ADDR'];
    
    $url = 'https://www.google.com/recaptcha/api/siteverify?secret=' . urlencode($secretKey) .  '&response=' . urlencode($captcha ?? "");
    $response = file_get_contents($url);
    $responseKeys = json_decode($response, true);
   
    if ($responseKeys["success"]) {
    } elseif (isset($_POST['g-recaptcha-response']) && empty($_POST['g-recaptcha-response'])) {
        $arrayErrors['captcha'] = "Veuillez prouver que vous n'êtes pas un robot";
    }

    if (count($arrayErrors) == 0) {
        // strtoupper = en majuscule / ucwords = 1ere lettre en majuscule
        $profilPicture = htmlspecialchars(trim($_POST['profilPicture']));
        $name = htmlspecialchars(strtoupper(trim($_POST['name'])));
        $siretNumber = htmlspecialchars(trim($_POST['siretNumber']));
        $phone = htmlspecialchars(trim($_POST['phone']));
        $mail = htmlspecialchars(trim($_POST['mail']));
        $city = htmlspecialchars(strtoupper(trim($_POST['city'])));
        $postalCode = htmlspecialchars(intval(trim($_POST['postalCode'])));
        $adress = htmlspecialchars(trim($_POST['adress']));
        $password = htmlspecialchars(trim($_POST['password']));
        $entreprise = new Entreprise();
        $entreprise->addEntreprise($profilPicture, $name, $siretNumber, $phone, $mail,  $city,  $postalCode,  $adress, $password);

        header('Location: connexionRecruteur.php');
    }
}
