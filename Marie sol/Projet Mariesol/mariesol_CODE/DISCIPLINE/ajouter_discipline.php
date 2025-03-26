<?php
require_once "../connexion.php";

// Préparation de la requête d'insertion des discipline
$requete = "INSERT INTO discipline (CODE_DISCIPLINE, NOM_DISCIPLINE)
                VALUES (:codediscipline, :nom)";
$statement = $connexion->prepare($requete);

// Liaison des paramètres de la requête avec les valeurs du formulaire 
$statement->bindParam(':codediscipline', $_POST['codediscipline']);
$statement->bindParam(':nom', $_POST['nom']);

// Exécution de la requête
$statement->execute();

echo "La discipline a été ajouté avec succès !";
?>