<?php
require_once "../connexion.php";

// Préparation de la requête d'insertion des professeurs
$requete = "INSERT INTO professeur (CODE_PROF, CODE_DISCIPLINE, NOM_PROF, PRENOM_PROF, ADR1_PROF, ADR2_PROF, CP_PROF, VILLE_PROF, TEL_PROF)
                VALUES (:codeprof, :codediscipline, :nom, :prenom, :adresse1, :adresse2, :code_postal, :ville, :telephone)";
$statement = $connexion->prepare($requete);

// Liaison des paramètres de la requête avec les valeurs du formulaire 
$statement->bindParam(':codeprof', $_POST['codeprof']);
$statement->bindParam(':codediscipline', $_POST['codediscipline']);
$statement->bindParam(':nom', $_POST['nom']);
$statement->bindParam(':prenom', $_POST['prenom']);
$statement->bindParam(':adresse1', $_POST['adresse1']);
$statement->bindParam(':adresse2', $_POST['adresse2']);
$statement->bindParam(':code_postal', $_POST['code_postal']);
$statement->bindParam(':ville', $_POST['ville']);
$statement->bindParam(':telephone', $_POST['telephone']);

// Exécution de la requête
$statement->execute();

echo "Le professeur a été ajouté avec succès !";
?>