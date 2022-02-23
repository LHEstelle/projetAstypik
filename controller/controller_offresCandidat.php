<?php 

require_once '../config.php';
require_once '../models/dataBase.php';
require_once '../models/annonces.php';

$offers = new Annonce;
$allOfferssArray = $offers -> getAllOffers();