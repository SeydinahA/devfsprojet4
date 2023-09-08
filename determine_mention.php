<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Afficher la Mention</title>
    <link rel="stylesheet" type="text/css" href="./assets/bootstrap/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Entrez votre moyenne :</h2>
        <form class="well col-md-6 col-md-offset-3" method="post" action="">
            <div class="mb-3">
                <label for="moyenne" class="form-label">Moyenne :</label>
                <input type="number" step="0.01" class="form-control" id="moyenne" name="moyenne" required>
            </div>
            <button type="submit" class="btn btn-primary">Afficher la Mention</button>
        </form>

        <?php

            $moyenne = "";
            $decision = "Admis, Eliminé";
            $mention = "";

            if ($_SERVER["REQUEST_METHOD"] === "POST") {
            // Récupération la moyenne saisie par l'utilisateur
                $moyenne = $_POST["moyenne"];

            // Détermination de la decision en fonction de la moyenne
                if($moyenne >= 10) {
                    $decision = "Admis";
                }else {
                    $decision = "Eliminé";
                }
            
            // Détermination de la mention en fonction de la moyenne
                if ($moyenne >= 17) {
                    $mention = "Excellent";
                    $mentionClass = "text-success";
                } elseif ($moyenne >= 16) {
                    $mention = "Très Bien";
                    $mentionClass = "text-primary";
                } elseif ($moyenne >= 14) {
                    $mention = "Bien";
                    $mentionClass = "text-info";
                } elseif ($moyenne >= 12) {
                    $mention = "Assez Bien";
                    $mentionClass = "text-warning";
                } elseif ($moyenne >= 10) {
                    $mention = "Passable";
                    $mentionClass = "text-muted";
                } else {
                    $mention = "Non Obtenu";
                    $mentionClass = "text-danger";
                }

                // Affichage de la decision et de la mention
                echo "<p><strong>Decision :</strong> <span>$decision</span></p>";
                echo "<p><strong>Mention :</strong> <span class=\"$mentionClass\">$mention </span></p>";
            }
        ?>
    </div>
</body>
</html>