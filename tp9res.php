<?php
// Connexion à la base de données
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "inscription";
// Créer une connexion à la base de données
$conn = new mysqli($servername, $username, $password, $dbname);
// Vérifier la connexion
if ($conn->connect_error) {
    die("La connexion a échoué : " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Récupérer les données du formulaire
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $groupe = $_POST['groupe'];
    $dqte = $_POST['dqte'];
    $dateDebut = $_POST['dateDebut'];
    $dateFin = $_POST['dateFin'];
    $encadrement = $_POST['encadrement'];

    // Préparer la requête d'insertion
    $stmt = $conn->prepare("INSERT INTO participants (nom, prenom, groupe, dqte, dateDebut, dateFin, encadrement) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssss", $nom, $prenom, $groupe, $dqte, $dateDebut, $dateFin, $encadrement);

    // Exécuter la requête
    if ($stmt->execute()) {
        $message = "Données enregistrées avec succès!";
    } else {
        $message = "Une erreur est survenue lors de l'enregistrement.";
    }

    // Fermer la préparation de la requête
    $stmt->close();
}

// Fermer la connexion à la base de données
$conn->close();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Formulaire d'inscription</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans leading-normal tracking-normal">

  <div class="container mx-auto p-6">
    <h2 class="text-2xl font-bold text-center text-gray-700 mb-6">Formulaire d'Inscription</h2>

    <!-- Affichage du message de succès ou erreur -->
    <?php if (isset($message)): ?>
      <div class="mt-6 p-4 bg-green-500 text-white rounded-md text-center">
        <?php echo $message; ?>
      </div>
    <?php endif; ?>

    <!-- Affichage des données -->
    <?php if ($_SERVER['REQUEST_METHOD'] == 'POST'): ?>
      <ul class="bg-white p-6 rounded-lg shadow-md max-w-lg mx-auto">
        <li class="py-2"><strong class="text-gray-700">Nom :</strong> <?php echo htmlspecialchars($nom); ?></li>
        <li class="py-2"><strong class="text-gray-700">Prénom :</strong> <?php echo htmlspecialchars($prenom); ?></li>
        <li class="py-2"><strong class="text-gray-700">Groupe :</strong> <?php echo htmlspecialchars($groupe); ?></li>
        <li class="py-2"><strong class="text-gray-700">DQTE débute :</strong> <?php echo htmlspecialchars($dqte); ?></li>
        <li class="py-2"><strong class="text-gray-700">Date de début :</strong> <?php echo htmlspecialchars($dateDebut); ?></li>
        <li class="py-2"><strong class="text-gray-700">Date de fin :</strong> <?php echo htmlspecialchars($dateFin); ?></li>
        <li class="py-2"><strong class="text-gray-700">Encadrement :</strong> <?php echo htmlspecialchars($encadrement); ?></li>
      </ul>
    <?php endif; ?>

  </div>

</body>
</html>
