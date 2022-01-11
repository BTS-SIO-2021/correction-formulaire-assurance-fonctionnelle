<?php

// Précédemment, je vérifiais à chaque fois que les valeurs reçues via $_POST correspondaient bien à des integer et étaient "propres". Autant le faire une seule fois via une fonction que l'on va ensuite utiliser quand on en a besoin. 

// Ma fonction va prendre au minimum un paramètre et lui appliquer toute une série de vérifications.
//Je vais néanmoins lui rajouter une valeur par défaut. 

function getCleanNumericPostParam($index, $valeurParDefaut=0){
    // Dans un 1er temps, ma fonction va vérifier que mon index n'est pas vide et s'il est vide elle reverra ma valeur par défaut. 
    if(!isset($index)){
        return $valeurParDefaut;
    }

    // Dans un second temps, je veux que ma fonction vérifie que la valeur contenue dans ma super globale $_POST soit propre et la convertisse en integer.
    if (isset($_POST[$index])){
        $dataVerif = trim($_POST[$index]);
        $dataVerif = stripslashes($_POST[$index]);
        $dataVerif = htmlspecialchars($_POST[$index]);
        $dataVerif = filter_var($_POST[$index], FILTER_SANITIZE_NUMBER_INT);
        $dataVerif = intval($_POST[$index]);
        return $dataVerif;
    } else {
        return $valeurParDefaut;
    }
}

/* Je créé ma fonction qui va me permettre de calculer mon niveau de tarif. Pour fonctionner, ma fonction a besoin de 4 paramètres :
  1) l'age
  2) l'anciennete de permis
  3) le nombre d'accidents responsables 
  4) l'ancienneté d'assurance  
*/

function getTarif(int $age, int $anciennetePermis, int $accident, int $ancienneteAssurance){

    // Par défaut, tout le monde commence au tarif de niveau
    $tarif = 1;

    // le nombre d'accident réduit d'autant le nombre de niveau 
    $tarif-= $accident;

    // un permis de plus de 2 ans me permet d'augmenter d'un niveau
    if($anciennetePermis > 2){
        $tarif++;
    }

    // si j'ai + de 25 ans j'augmente d'un niveau 
    if($age > 25){
        $tarif++;
    }
    // Une ancienneté d'assurance de plus de 5 ans augmente le palier d'un niveau si le conducteur n'est pas déjà refusé. 
    if($ancienneteAssurance > 5 && $tarif > 0){
        $tarif++;
    };

    // Je capte que mon niveau ne soit pas inférieur à 0 ou supérieur à 4
    if($tarif < 0){
        $tarif = 0;
    }

    if($tarif > 4){
        $tarif = 4;
    }
    return $tarif;
}

?>