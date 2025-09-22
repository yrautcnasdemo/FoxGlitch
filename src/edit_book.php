<?php
session_start();
require_once "pdo/connexionBDD.php";

if (!isset($_GET["id"])) {
    die("❌ No book ID provided.");
}

$book_id = (int) $_GET["id"];
$user_id = $_SESSION["user"]["id"];

// Vérifier que le livre existe et appartient à ce user
$sql = "SELECT * FROM user_books WHERE id = :id AND user_id = :user_id";
$query = $db->prepare($sql);
$query->bindValue(":id", $book_id, PDO::PARAM_INT);
$query->bindValue(":user_id", $user_id, PDO::PARAM_INT);
$query->execute();
$book = $query->fetch(PDO::FETCH_ASSOC);

if (!$book) {
    die("⚠️ Book not found or unauthorized.");
}

// Décoder les volumes possédés
$owned = !empty($book["owned_volumes"]) ? json_decode($book["owned_volumes"], true) : [];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit <?= htmlspecialchars($book["title"]) ?></title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Edit <?= htmlspecialchars($book["title"]) ?></h1>

    <form method="post" action="update_book.php">
        <input type="hidden" name="id" value="<?= $book['id'] ?>">

        <label>Title:</label>
        <input type="text" name="title" value="<?= htmlspecialchars($book['title']) ?>" required><br><br>

        <label>Category:</label>
        <select name="category">
            <option value="Manga" <?= $book['category'] === "Manga" ? "selected" : "" ?>>Manga</option>
            <option value="Comics" <?= $book['category'] === "Comics" ? "selected" : "" ?>>Comics</option>
        </select><br><br>

        <label>Number of published volumes:</label>
        <input type="number" name="volume_count" value="<?= (int)$book['volume_count'] ?>" min="1" max="300"><br><br>

        <label>Publication:</label>
        <select name="publication">
            <option value="Completed" <?= $book['publication'] === "Completed" ? "selected" : "" ?>>Completed</option>
            <option value="Ongoing" <?= $book['publication'] === "Ongoing" ? "selected" : "" ?>>Ongoing</option>
        </select><br><br>

        <h3>Owned Volumes</h3>
        <div class="volumes-panel">
            <?php for ($i = 1; $i <= (int)$book['volume_count']; $i++): ?>
                <?php $checked = in_array($i, $owned) ? "checked" : ""; ?>
                <label>
                    <input type="checkbox" name="volumes[]" value="<?= $i ?>" <?= $checked ?>>
                    vol.<?= str_pad($i, 3, "0", STR_PAD_LEFT) ?>
                </label>
            <?php endfor; ?>
        </div>
        <br>

        <button type="submit">💾 Update</button>
        <a href="backoffice.php">Cancel</a>
    </form>
</body>
</html>
