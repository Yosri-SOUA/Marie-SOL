<?php
// Connexion à la base de données
require_once "../connexion.php";

// Récupérer la liste des élèves
$elevesQuery = "SELECT CODE_ELEVE, NOM_ELEVE FROM eleve";
$elevesStmt = $connexion->query($elevesQuery);
$eleves = $elevesStmt->fetchAll(PDO::FETCH_ASSOC);

// Récupérer la liste des professeurs
$professeursQuery = "SELECT CODE_PROF, NOM_PROF FROM professeur";
$professeursStmt = $connexion->query($professeursQuery);
$professeurs = $professeursStmt->fetchAll(PDO::FETCH_ASSOC);

// Récupérer la liste des salles
$sallesQuery = "SELECT CODE_SALLE, NOM_SALLE FROM salle_cours";
$sallesStmt = $connexion->query($sallesQuery);
$salles = $sallesStmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un Cours</title>
    <link rel="stylesheet" href="../style.css">
    <!-- Chargement asynchrone du menu -->
    <script>
        var menuRequest = new XMLHttpRequest();
        menuRequest.onreadystatechange = function () {
            if (menuRequest.readyState == 4 && menuRequest.status == 200) {
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
        <h1>Ajouter un Cours</h1>
    </header>

    <section>
        <h2>Formulaire d'ajout de cours</h2>
        <main>
            <form action="ajouter-cours.php" method="POST">
                <label for="jour_semaine">Jour de la semaine:</label>
                <select name="jour_semaine" id="jour_semaine" required>
                    <option value="Lundi">Lundi</option>
                    <option value="Mardi">Mardi</option>
                    <option value="Mercredi">Mercredi</option>
                    <option value="Jeudi">Jeudi</option>
                    <option value="Vendredi">Vendredi</option>
                    <option value="Samedi">Samedi</option>
                    <option value="Dimanche">Dimanche</option>
                </select><br><br>

                <label for="heure_cours">Heure du cours:</label>
                <input type="time" name="heure_cours" id="heure_cours" required><br><br>

                <label for="code_eleve">Élève:</label>
                <select name="code_eleve" id="code_eleve" required>
                    <?php foreach ($eleves as $eleve) { ?>
                        <option value="<?= $eleve['CODE_ELEVE'] ?>"><?= $eleve['NOM_ELEVE'] ?></option>
                    <?php } ?>
                </select><br><br>

                <label for="code_prof">Professeur:</label>
                <select name="code_prof" id="code_prof" required>
                    <?php foreach ($professeurs as $professeur) { ?>
                        <option value="<?= $professeur['CODE_PROF'] ?>"><?= $professeur['NOM_PROF'] ?></option>
                    <?php } ?>
                </select><br><br>

                <label for="code_salle">Salle:</label>
                <select name="code_salle" id="code_salle" required>
                    <?php foreach ($salles as $salle) { ?>
                        <option value="<?= $salle['CODE_SALLE'] ?>"><?= $salle['NOM_SALLE'] ?></option>
                    <?php } ?>
                </select><br><br>


                <button type="submit">Ajouter le Cours</button>
            </form>
        </main>
    </section>

</body>

</html>