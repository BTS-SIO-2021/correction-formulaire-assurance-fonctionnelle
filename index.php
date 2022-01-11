<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="css/style.css" rel="stylesheet">
    <title>Assurance Formulaire devis</title>
</head>
<body>
    <?php

    include 'fonctions_utilitaires.php';

    $age = getCleanNumericPostParam('age', 17);
    $anciennetePermis = getCleanNumericPostParam('anciennetePermis');
    $accident = getCleanNumericPostParam('accident');
    $ancienneteAssurance = getCleanNumericPostParam('assurance');

    //var_dump($age, $ancienneteAssurance, $accident, $anciennetePermis);

    $tarif = getTarif($age, $anciennetePermis, $accident, $ancienneteAssurance);

    $message = getColorandMessage($tarif);

    ?>

<!-- La je suis sortie de mon code php je suis dans ma partie HTML, j'ai envie d'écrire du HTML en fonction d'un condition php. 
Pour cela et pour changer, plutôt que d'utiliser if (...) alors echo ... ; nous allons utiliser la syntaxe alternative : https://www.php.net/manual/fr/control-structures.alternative-syntax.php
-->
<?php if(!empty($_POST) && isset($message)) : ?>
    <p> Vous avez le droit au tarif : <strong style="color:<?=$message['css'];?>"><?=$message["message"];?></strong>
<?php endif ;?>

<form action="" method="post" >
    <div>
        <label for="name" class="form-label">Renseignez votre age: </label>
        <input type="number" min="18" name="age" id="name" required placeholder="chiffre en années" class="form-control">
    </div>
    <div>
        <label for="anciennete" class="form-label">Renseignez l'ancienneté de votre permis: </label>
        <input type="number" min="0" name="anciennetePermis" id="anciennete" required placeholder="xx années" class="form-control">
    </div>
    <div>
        <label for="assurance" class="form-label">Renseignez l'ancienneté de votre assurance: </label>
        <input type="number" min="0" name="assurance" id="ancienneteAssurance" required placeholder="format en chiffre" class="form-control">
    </div>
    <div>
        <label for="accident" class="form-label">Renseignez votre nombre d'accident responsable: </label>
        <input type="number" min="0" name="accident" id="accident" required placeholder="merci d'indiquer un nombre" class="form-control">
    </div>
    
    <div>
        <input type="submit" value="Enregistrer" class="btn btn-primary">
    </div>
</form>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>