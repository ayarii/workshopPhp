<?php require_once __DIR__ . '/../models/Personne.php';
require_once __DIR__ . '/../controllers/PersonneC.php';
$error = "";
$personneC = new PersonneC();

if (isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['email']) && isset($_POST['tel'])) {
    if (!empty($_POST['nom']) && !empty($_POST['prenom']) && !empty($_POST['email']) && !empty($_POST['tel'])) {
        $personne = new Personne($_POST['nom'], $_POST['prenom'], $_POST['email'], $_POST['tel']);
        $personneC->ajouterPersonne($personne);
        header('Location: ListPersonne.php');
        exit;
    } else {
        $error = "Missing information";
    }
}
     
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-
scale=1.0">
<title>ajouter une personne</title>
</head>
<body>
<h1>Ajouter une personne</h1>
<form action="" method="POST">
<label >Nom:</label>
<input type="text" name="nom" id="nom" required><br><br>
<label >Prénom:</label>
<input type="text" name="prenom" id="prenom" required><br><br>
<label >Email:</label>
<input type="email" name="email" id="email" required><br><br>
<label >Téléphone:</label>
<input type="tel" name="tel" id="tel" required><br><br>
<input type="submit" value="Ajouter">
</form>
</body>
</html>