<?php
    require_once "connexion.php";
    
    // Préparation de la requête d'insertion des élèves
    $requete = "INSERT INTO eleve (CODE_ELEVE, NOM_ELEVE, PRENOM_ELEVE, DATE_NAISS, ADR1_ELEVE, CP_ELEVE, VILLE_ELEVE, TEL_ELEVE)
                VALUES (:codeeleve, :nom, :prenom, :date_naissance, :adresse, :code_postal, :ville, :telephone)";
    $statement = $connexion->prepare($requete);

    // Liaison des paramètres de la requête avec les valeurs du formulaire 
    $statement->bindParam(':codeeleve', $_POST['codeeleve']);
    $statement->bindParam(':nom', $_POST['nom']);
    $statement->bindParam(':prenom', $_POST['prenom']);
    $statement->bindParam(':date_naissance', $_POST['date_naissance']);
    $statement->bindParam(':adresse', $_POST['adresse']);
    $statement->bindParam(':code_postal', $_POST['code_postal']);
    $statement->bindParam(':ville', $_POST['ville']);
    $statement->bindParam(':telephone', $_POST['telephone']);

    // Exécution de la requête
    $statement->execute();

    echo "L'élève a été ajouté avec succès !";
?>
