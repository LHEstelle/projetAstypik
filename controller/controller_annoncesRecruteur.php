<?php 


require_once '../config.php';
require_once '../models/database.php';
require_once '../models/annonces.php';

session_start();

$id=$_SESSION['id'];
$annoncesObj = new Annonce;
$annoncesArray = $annoncesObj -> getAllAnnoncesofOneRecrutor($id);

if(empty($_SESSION)){
    header('Location: pageErreur.php');
}