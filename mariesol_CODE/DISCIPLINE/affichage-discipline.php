<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des discipline enseignée</title>
    <link rel="stylesheet" href="../style.css">
      <!-- Chargement asynchrone du menu -->
      <script>
        var menuRequest = new XMLHttpRequest();
        menuRequest.onreadystatechange = function () {
            if (menuRequest.readyState == 4 && menuRequest.status == 200) {
                // Insérer le menu après le titre dans le header
                document.querySelector('header').insertAdjacentHTML('beforeend', menuRequest.responseText);
            }
        };
        menuRequest.open('GET', 'menuDISCIPLINE.html', true);
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
        footerRequest.open('GET', '../footerMS.html', true);
        footerRequest.send();
    </script>
</head>

<body>
    <header>
        <h1>Liste des discipline enseignée</h1>
    </header>

       <section>
        <h2>Liste des discipline enseignée</h2>
        <main>
        <?php
            require_once "../connexion.php";

            // Requête SQL pour sélectionner toute les discipline
            $requete = "SELECT * FROM discipline";
            // Préparation de la requête
            $statement = $connexion->prepare($requete);
            // Exécution de la requête
            $statement->execute();
            // Récupération des résultats de la requête sous forme de tableau associatif
            $eleves = $statement->fetchAll(PDO::FETCH_ASSOC);

            // Affichage des disciplines si elles existent
            if ($eleves) {
                echo "<table>";
                echo "<tr><th>Code de la discipline</th><th>Nom de la discipline</th></tr>";
                foreach ($eleves as $eleve) {
                    echo "<tr>";
                    echo "<td>" . $eleve['CODE_DISCIPLINE'] . "</td>";
                    echo "<td>" . $eleve['NOM_DISCIPLINE'] . "</td>";
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
