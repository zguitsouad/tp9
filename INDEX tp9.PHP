<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Formulaire POST</title>
</head>
<link rel="stylesheet" href="style.css">
<body>
  <h2>Formulaire</h2>
  <form action="res.php" method="post">
    <label for="nom">Nom :</label>
    <input type="text" name="nom" required><br><br>

    <label for="prenom">Prénom :</label>
    <input type="text" name="prenom" required><br><br>

    <label for="groupe">Groupe :</label>
    <input type="text" name="groupe"><br><br>

    <label for="dqte">DQTE débute :</label>
    <input type="text" name="dqte"><br><br>

    <label for="dateDebut">Date de début :</label>
    <input type="date" name="dateDebut"><br><br>

    <label for="dateFin">Date de fin :</label>
    <input type="date" name="dateFin"><br><br>

    <label for="encadrement">Encadrement :</label>
    <input type="text" name="encadrement"><br><br>

    <button type="submit">Envoyer</button>
    <button type="reset">Annuler</button>
  </form>
</body>
</html>
