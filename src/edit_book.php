<?php
session_start();
require_once "pdo/connexionBDD.php";

// Vérifier si un ID est passé
if (!isset($_GET['id']) || empty($_GET['id'])) {
    die("⚠️ Aucun livre spécifié.");
}

$book_id = (int)$_GET['id'];
$user_id = $_SESSION['user']['id'];

// Récupérer les infos du livre
$sql = "SELECT * FROM user_books WHERE id = :id AND user_id = :user_id";
$query = $db->prepare($sql);
$query->bindValue(":id", $book_id, PDO::PARAM_INT);
$query->bindValue(":user_id", $user_id, PDO::PARAM_INT);
$query->execute();
$book = $query->fetch(PDO::FETCH_ASSOC);

if (!$book) {
    die("⚠️ Livre introuvable.");
}

// Récupérer les volumes possédés (JSON → array)
$owned = !empty($book['owned_volumes']) ? json_decode($book['owned_volumes'], true) : [];

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $title = strip_tags($_POST["title"]);
    $category = $_POST["category"];
    $volumeCount = (int)$_POST["volume_count"];
    $publication = $_POST["publication"];
    $owned_volumes = !empty($_POST['volumes']) ? $_POST['volumes'] : [];
    $owned_volumes_json = json_encode($owned_volumes);

    $sql = "UPDATE user_books 
            SET title = :title, category = :category, volume_count = :volume_count, 
                publication = :publication, owned_volumes = :owned_volumes
            WHERE id = :id AND user_id = :user_id";

    $query = $db->prepare($sql);
    $query->bindValue(":title", $title, PDO::PARAM_STR);
    $query->bindValue(":category", $category, PDO::PARAM_STR);
    $query->bindValue(":volume_count", $volumeCount, PDO::PARAM_INT);
    $query->bindValue(":publication", $publication, PDO::PARAM_STR);
    $query->bindValue(":owned_volumes", $owned_volumes_json, PDO::PARAM_STR);
    $query->bindValue(":id", $book_id, PDO::PARAM_INT);
    $query->bindValue(":user_id", $user_id, PDO::PARAM_INT);

    $query->execute();

    // Recharge les nouvelles données
    header("Location: backoffice.php?id=" . $book_id);
    exit;
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="fonts.css">
    <title>userName</title>
</head>
<body>
    <h2>Edit book</h2>

    <form method="post">
        <label>Title:</label>
        <input type="text" name="title" value="<?= htmlspecialchars($book['title']) ?>" required><br><br>

        <label>Category:</label>
        <select name="category">
            <option value="Manga" <?= $book['category'] === "Manga" ? "selected" : "" ?>>Manga</option>
            <option value="Comics" <?= $book['category'] === "Comics" ? "selected" : "" ?>>Comics</option>
        </select><br><br>

        <label>Number of published volumes:</label>
        <input type="number" id="volumeCount" name="volume_count" 
            value="<?= (int)$book['volume_count'] ?>" min="1" max="300"><br><br>

        <label>Publication:</label>
        <select name="publication">
            <option value="Ongoing" <?= $book['publication'] === "Ongoing" ? "selected" : "" ?>>Ongoing</option>
            <option value="Completed" <?= $book['publication'] === "Completed" ? "selected" : "" ?>>Completed</option>
        </select><br><br>

        <h3>Owned Volumes</h3>
        <div id="volumes-panel" class="volumes-panel"></div>

        <button type="submit">💾 Save</button>
    </form>
</body>


<script>
// On récupère les volumes déjà possédés (PHP → JS)
let owned = <?= json_encode($owned) ?>;

// Générer les cases dynamiquement
function generateCheckboxes(count) {
    let panel = document.getElementById("volumes-panel");
    panel.innerHTML = ""; // reset
    for (let i = 1; i <= count; i++) {
        let checked = owned.includes(String(i)) || owned.includes(i) ? "checked" : "";
        panel.innerHTML += `
            <label style="display:inline-block; margin-right:10px;">
                <input type="checkbox" name="volumes[]" value="${i}" ${checked}>
                vol.${String(i).padStart(3, "0")}
            </label>
        `;
    }
}

// Quand on change le nombre → regen
document.getElementById("volumeCount").addEventListener("input", function() {
    generateCheckboxes(this.value);
});

// Initialisation
generateCheckboxes(document.getElementById("volumeCount").value);
</script>

</html>

 