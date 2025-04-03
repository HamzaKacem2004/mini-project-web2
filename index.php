<?php
require_once 'gerer_session.php';
$session = new Session();
// Vérifier si le bouton de réinitialisation de la session a été cliqué
if (isset($_POST['reset'])) {
    $session->reinitialiserSession();
}
// incrementer le nombre de visites
$session->incrementerVisite();
$nombreVisites = $session->getNombreVisites();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Sessions</title>
</head>
<body>
<h1>
    <?php 
        if ($nombreVisites === 1) {
            echo "Bienvenue à notre plateforme.";
        } else {
            echo "Merci pour votre fidélité, c’est votre $nombreVisites ème visite.";
        }
    ?>
</h1>
<form method="post">
    <button type="submit" name="reset">Réinitialiser la session</button>
</form>
</body>
</html>