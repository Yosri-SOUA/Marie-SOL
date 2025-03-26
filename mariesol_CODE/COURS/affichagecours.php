<?php
$jour_semaine = isset($_GET['jour_semaine']) ? $_GET['jour_semaine'] : '';
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des disciplines enseignées</title>
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
        menuRequest.open('GET', 'menuCOURS.html', true);
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
        <h1>Liste du planning</h1>
    </header>

    <section>
        <h2>Liste du planning le <?php echo $jour_semaine; ?> </h2>
        <main>
            <?php
            // Connexion à la base de données
            require_once "../connexion.php";

            // Vérification si un jour a été sélectionné
            $jour_semaine = isset($_GET['jour_semaine']) ? $_GET['jour_semaine'] : '';

            // Requête SQL avec filtre
            $query = "SELECT c.CODE_COURS, e.NOM_ELEVE, p.NOM_PROF, s.NOM_SALLE, s.SITUATION_SALLE, c.HEURE_COURS, c.JOUR_SEMAINE
                      FROM cours c
                      JOIN eleve e ON c.CODE_ELEVE = e.CODE_ELEVE
                      JOIN professeur p ON c.CODE_PROF = p.CODE_PROF
                      JOIN salle_cours s ON c.CODE_SALLE = s.CODE_SALLE
                      WHERE (:jour_semaine = '' OR c.JOUR_SEMAINE = :jour_semaine)
                      ORDER BY c.JOUR_SEMAINE, c.HEURE_COURS";

            $stmt = $connexion->prepare($query);

            // Si un jour a été sélectionné, on l'ajoute à la requête
            $stmt->bindParam(':jour_semaine', $jour_semaine);

            // Exécution de la requête
            $stmt->execute();

            // Affichage des résultats
            $planning = $stmt->fetchAll(PDO::FETCH_ASSOC);

            echo "<table>";
            echo "<tr><th>Code Cours</th><th>Jour</th><th>Horaire</th><th>Élève</th><th>Professeur</th><th>Salle</th><th>Situation</th></tr>";

            foreach ($planning as $cours) {
                echo "<tr>";
                echo "<td>" . $cours['CODE_COURS'] . "</td>";  // Affichage du code du cours
                echo "<td>" . $cours['JOUR_SEMAINE'] . "</td>";
                echo "<td>" . $cours['HEURE_COURS'] . "</td>";
                echo "<td>" . $cours['NOM_ELEVE'] . "</td>";
                echo "<td>" . $cours['NOM_PROF'] . "</td>";
                echo "<td>" . $cours['NOM_SALLE'] . "</td>";
                echo "<td>" . $cours['SITUATION_SALLE'] . "</td>";
                echo "</tr>";
            }

            echo "</table>";
            ?>
        </main>
    </section>
</body>

</html>