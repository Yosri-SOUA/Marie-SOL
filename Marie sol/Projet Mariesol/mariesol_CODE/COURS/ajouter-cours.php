<?php
// Connexion à la base de données
require_once "../connexion.php";

// Récupérer la dernière valeur utilisée pour CODE_COURS
$requete_derniere_valeur_code = "SELECT MAX(CODE_COURS) AS dernier_code FROM cours";
$statement_derniere_valeur_code = $connexion->query($requete_derniere_valeur_code);
$dernier_code = $statement_derniere_valeur_code->fetch(PDO::FETCH_ASSOC)['dernier_code'];

// Si aucune valeur n'existe, on commence à partir de 1
$nouveau_code_cours = $dernier_code ? $dernier_code + 1 : 1;

// Récupérer les données du formulaire
$jour_de_semaine = $_POST['jour_semaine'];
$heure_du_cours = $_POST['heure_cours'];
$code_eleve = $_POST['code_eleve'];
$code_professeur = $_POST['code_prof'];
$code_salle = $_POST['code_salle'];

// Insertion du cours dans la table `cours` avec le nouveau CODE_COURS
$requete_insertion_cours = "INSERT INTO cours (CODE_COURS, JOUR_SEMAINE, HEURE_COURS, CODE_ELEVE, CODE_PROF, CODE_SALLE) 
                            VALUES (:code_cours, :jour_semaine, :heure_cours, :code_eleve, :code_prof, :code_salle)";
$statement_insertion_cours = $connexion->prepare($requete_insertion_cours);
$statement_insertion_cours->bindParam(':code_cours', $nouveau_code_cours); // Utiliser le nouveau CODE_COURS
$statement_insertion_cours->bindParam(':jour_semaine', $jour_de_semaine);
$statement_insertion_cours->bindParam(':heure_cours', $heure_du_cours);
$statement_insertion_cours->bindParam(':code_eleve', $code_eleve);
$statement_insertion_cours->bindParam(':code_prof', $code_professeur);
$statement_insertion_cours->bindParam(':code_salle', $code_salle);
$statement_insertion_cours->execute();



// Confirmer l'insertion
echo "Le cours a été ajouté.";
?>