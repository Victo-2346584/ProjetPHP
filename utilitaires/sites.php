<?php
/**
 * user: hugon
 * date: 2024-01-23
 * Time: 16:18
 */
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>utilitaires</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
<h1>mon titre</h1>
</body>
<?php
// Code emprunté. Source :https://apical.xyz/fiches/exercice_2_005/page_utilitaire
$fichiers = [];
$dossierRacine = opendir("..");

while ($fichier = readdir($dossierRacine)) {
    if ($fichier != '.' && $fichier != '..' && $fichier != 'favicon.ico' && $fichier != 'cgi-bin') {
        $fichiers[] = $fichier;
    }
}

closedir($dossierRacine);
sort($fichiers);
if (!count($fichiers)) {
    $liste = "Il n'y a aucun site.";
}
else {
    foreach($fichiers as $fichier) {
        echo '<div><a href="../' . $fichier . '">' . $fichier . '</a></div>';
    }
}
// Fin du code emprunté
?>