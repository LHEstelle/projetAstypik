<?php 


require_once '../config.php';
require_once '../models/database.php';
require_once '../models/annonces.php';

session_start();

$mail=$_SESSION['mail'];
$annoncesObj = new Annonce;
$annoncesArray = $annoncesObj -> getAllAnnoncesofOneRecrutor($mail);

