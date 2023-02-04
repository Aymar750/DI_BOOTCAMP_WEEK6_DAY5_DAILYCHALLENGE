<?php

// Avoir le contenu du fichier mots.txt 
$wordsFile = file_get_contents("mots.txt");
$words = explode("\n", $wordsFile);

// Hmm je veux qu'il prenne un mot au hazard 
$word = rtrim($words[array_rand($words)]);

// Initialisation des mauvaises reponses
$incorrectGuesses = 0;

// initialiser mon mot choisi par "-"
$hiddenWord = str_repeat("-", strlen($word));

// hmm je vais boucler jusqu'à ce que le mot soit entièrement deviné ou que 5 devinettes incorrectes aient été faites.
while ($hiddenWord != $word && $incorrectGuesses < 5) {
    echo "Mot actuel: $hiddenWord\n";
    echo "Entrez une lettre: ";

// je vais utiliser la fonction trim(fgets(STDIN))pour lire l'entrée du clavier et supprimer tous les caractères d'espacement du début et de la fin de la chaîne.on sait jamais haha

    $letter = trim(fgets(STDIN));
    if (strpos($word, $letter) === false) {

        // Bon si la lettre n'a pas été trouvé incremente la variable des mauvaises reponses
        $incorrectGuesses++;
        echo "Incorrect.\n";
    } else {
        // Ici la lettre est trouvée
        for ($i = 0; $i < strlen($word); $i++) {
            if ($word[$i] == $letter) {
                $hiddenWord[$i] = $letter;
            }
        }
        echo "Correct!\n";
    }
}

// Verifier si le mot est trouvé
if ($hiddenWord == $word) {
    echo "Felicitations man, tu as trouvé le mot était  $word.\n";
} else {
    echo "Désolé man, tu as perdu le mot était  $word.\n";
}

?>
