<?php
require_once __DIR__ . '/../models/Personne.php';
require_once __DIR__ . '/../controllers/PersonneC.php';

$error = "";
$personneC = new PersonneC();
// 1. Récupération et vérification de l'id (présent dans l'URL)
$id = filter_var($_GET['id'] ?? null, FILTER_VALIDATE_INT);

if ($id === false || $id === null) {
    header('Location: ListPersonne.php');
    exit;
}

// 2. Chargement de la personne existante
$data = $personneC->recupererPersonne($id);
if ($data === false) {
  // id inexistant en base
    header('Location: ListPersonne.php');
    exit;
}
// 3. Traitement du formulaire
if (isset($_POST['nom'], $_POST['prenom'], $_POST['email'], $_POST['tel'])) {
    if (!empty($_POST['nom']) && !empty($_POST['prenom']) && !empty($_POST['email']) && !empty($_POST['tel'])) {
        $personne = new Personne($_POST['nom'], $_POST['prenom'], $_POST['email'], $_POST['tel']);
        $personneC->modifierPersonne($personne, $id);
        header('Location: ListPersonne.php');
        exit;
    } else {
        $error = "Missing information";
        // On réaffiche ce que l'utilisateur vient de saisir
        $data = [
            'nom'    => $_POST['nom'],
            'prenom' => $_POST['prenom'],
            'email'  => $_POST['email'],
            'tel'    => $_POST['tel'],
        ];
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier une personne</title>
</head>
<body>
    <h1>Modifier une personne</h1>

    <?php if ($error !== ""): ?>
        <p style="color:red"><?= htmlspecialchars($error) ?></p>
    <?php endif; ?>

    <form action="" method="POST">
        <label for="nom">Nom:</label>
        <input type="text" name="nom" id="nom"
               value="<?= htmlspecialchars($data['nom']) ?>" required><br><br>

        <label for="prenom">Prénom:</label>
        <input type="text" name="prenom" id="prenom"
               value="<?= htmlspecialchars($data['prenom']) ?>" required><br><br>

        <label for="email">Email:</label>
        <input type="email" name="email" id="email"
               value="<?= htmlspecialchars($data['email']) ?>" required><br><br>

        <label for="tel">Téléphone:</label>
        <input type="tel" name="tel" id="tel"
               value="<?= htmlspecialchars($data['tel']) ?>" required><br><br>

        <input type="submit" value="Modifier">
        <a href="ListPersonne.php">Annuler</a>
    </form>
</body>
</html>