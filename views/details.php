<?php
require_once '../controller/controller_details.php';
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- cdn -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../assets/css/style.css" />
    <title>Les bons plans de guigui</title>
</head>

<body>
    <h1 class="text-center">Les bons plans de guigui</h1>
    <?php foreach ($arrayEstelle as $event) { 
        if ($event["id"]== $_GET["id"]){?>
        <div class="container d-flex justify-content-center">
        <div class="card text-center shadow-lg p-3 mb-5 bg-body rounded">
            <h2 class=""><?= $event["name"] ?></h2>
            <img src="<?= "../" . $event["picture"] ?>">
                <p class="mt-3"><b>Début : </b> <?= $event["startDate"] ?></p>
                <p class="mt-3"><b>Fin : </b><?= $event["endDate"] ?></p>

                <p class=""><?= $event["summary"] ?></p>
                <p><b>Lieu :</b> </p>
                <p class=""><?= $event["place"] ?></p>
         <div class="justify-content-center">
                    <a class="btn btn-dark col-lg-6 mb-2" type="button" href="../index.php">Retour</a>
              </div>
            </div>
            </div>
    <?php }} ?>
</body>

</html>