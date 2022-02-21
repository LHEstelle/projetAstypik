<?php 


require_once '../config.php';
require_once '../models/database.php';
require_once '../models/annonces.php';

session_start();

$mail=$_SESSION['mail'];
$annoncesObj = new Annonce;
$annoncesArray = $annoncesObj -> getAllAnnoncesofOneRecrutor($mail);

if(isset($_POST['deleteButton'])){
    var_dump($_POST);
    $id = htmlspecialchars(trim($_POST["idAnnonce"]));
    $annonceObj = new Annonce;
    $annonceDelete = $annonceObj -> deleteAnnonce($id);
    header('location: annoncesRecruteur.php');
}