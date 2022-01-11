<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
        <label for="name">Renseignez votre age: </label>
        <input type="number" min="18" name="age" id="name" required placeholder="chiffre en années">
    </div>
    <div>
        <label for="anciennete">Renseignez l'ancienneté de votre permis: </label>
        <input type="number" min="0" name="anciennetePermis" id="anciennete" required placeholder="xx années">
    </div>
    <div>
        <label for="assurance">Renseignez l'ancienneté de votre assurance: </label>
        <input type="number" min="0" name="assurance" id="ancienneteAssurance" required placeholder="format en chiffre">
    </div>
    <div>
        <label for="accident">Renseignez votre nombre d'accident responsable: </label>
        <input type="number" min="0" name="accident" id="accident" required placeholder="merci d'indiquer un nombre">
    </div>
    
    <div>
        <input type="submit" value="Enregistrer">
    </div>
</form> 
</body>
</html>