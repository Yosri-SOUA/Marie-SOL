<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des élèves de l'école</title>
    <link rel="stylesheet" href="style.css">
      <!-- Chargement asynchrone du menu -->
      <script>
        var menuRequest = new XMLHttpRequest();
        menuRequest.onreadystatechange = function () {
            if (menuRequest.readyState == 4 && menuRequest.status == 200) {
                // Insérer le menu après le titre dans le header
                document.querySelector('header').insertAdjacentHTML('beforeend', menuRequest.responseText);
            }
        };
        menuRequest.open('GET', 'menuMS.html', true);
        menuRequest.send();
    </script>
      <!-- Chargement asynchrone du footer -->
      <script>
        var footerRequest = new XMLHttpRequest();
        footerRequest.onreadystatechange = function () {
            if (footerRequest.readyState == 4 && footerRequest.status == 200) {
                document.body.insertAdjacentHTML('beforeend', footerRequest.responseText);
            }
        };
        footerRequest.open('GET', 'footerMS.html', true);
        footerRequest.send();
    </script>
</head>

<body>
    <header>
        <h1>Liste des élèves de l'école</h1>
    </header>

       <section>
        <h2>Liste des élèves de l'école</h2>
        <main>
        <?php
            require_once "connexion.php";

            // Requête SQL pour sélectionner tous les élèves
            $requete = "SELECT * FROM eleve";
            // Préparation de la requête
            $statement = $connexion->prepare($requete);
            // Exécution de la requête
            $statement->execute();
            // Récupération des résultats de la requête sous forme de tableau associatif
            $eleves = $statement->fetchAll(PDO::FETCH_ASSOC);

            // Affichage des élèves s'ils existent
            if ($eleves) {
                echo "<table>";
                echo "<tr><th>Code</th><th>Nom</th><th>Prénom</th><th>Date de naissance</th><th>Adresse</th><th>Code postal</th><th>Ville</th><th>Téléphone</th></tr>";
                foreach ($eleves as $eleve) {
                    echo "<tr>";
                    echo "<td>" . $eleve['CODE_ELEVE'] . "</td>";
                    echo "<td>" . $eleve['NOM_ELEVE'] . "</td>";
                    echo "<td>" . $eleve['PRENOM_ELEVE'] . "</td>";
                    echo "<td>" . $eleve['DATE_NAISS'] . "</td>";
                    echo "<td>" . $eleve['ADR1_ELEVE'] . " " . $eleve['ADR2_ELEVE'] . "</td>";
                    echo "<td>" . $eleve['CP_ELEVE'] . "</td>";
                    echo "<td>" . $eleve['VILLE_ELEVE'] . "</td>";
                    echo "<td>" . $eleve['TEL_ELEVE'] . "</td>";
                    echo "</tr>";
                }
                echo "</table>";
            } else { // S'il n'y en a pas
                echo "Aucun élève trouvé."; 
            }
        ?>
        </main>
    </section>


</body>

</html>
