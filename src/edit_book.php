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
    <main class="user-body">
        <section class="user-space">
            <div class="user-banner">
                <img src="assets/images/profiles/profiles_banner/cyberpunk-night-city2.jpg" alt="">
            </div>


            <div class="user-panel">
                <article class="user-profile">
                    <div class="user-pics">
                        <div class="user-info">
                            <span class="user-name"><?= $_SESSION["user"]["pseudo"]?></span>
                            <span class="user-title">Space-Child</span>
                        </div>
                        <img src="assets/images/profiles/profiles_pictures/cute-anime-girl-R.jpg" width="300px" height="500px" alt="profile-pics">
                            <div class="user-btn-panel">
                            <a href="backoffice.php"><button>Add books</button></a>
                                <a href="profil.php"><img class="booklist-icon" src="assets/images/icones/booklist.png" width="35px" alt=""></a>
                                <a href="friendslist.php"><img class="hov-pro" src="assets/images/icones/Friend List(1).png" width="35px" alt=""></a>
                                <a href=""><img class="hov-pro" src="assets/images/icones/Wishlist.png" width="35px" alt=""></a>
                                <a href=""><img class="hov-pro" src="assets/images/icones/GearWhite-Small-icon01.png" width="35px" alt=""></a>
                            </div>                    
                    </div>
                    <div class="user-about">
                        <h3>About Me</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas id ex  felis. Ut sapien orci, dictum sed massa eu, euismod tincidunt tellus.  Curabitur eget ex cursus, hendrerit dui sed, auctor metus. Aliquam  blandit a nisi a auctor. In at ex nec nunc maximus consequat in ac  magna. Nunc diam magna, eleifend sed fermentum ut, iaculis id ante.  Mauris vel quam non mauris maximus fermentum. Quisque porta et mauris  quis sollicitudin. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas id ex  felis. Ut sapien orci, dictum sed massa eu, euismod tincidunt tellus.  Curabitur eget ex cursus, hendrerit dui sed, auctor metus. Aliquam  blandit a nisi a auctor. In at ex nec nunc maximus consequat in ac  magna. Nunc diam magna, eleifend sed fermentum ut, iaculis id ante.  Mauris vel quam non mauris maximus fermentum. Quisque porta et mauris  quis sollicitudin.</p>
                    </div>
                    <div class="user-social-media">
                        <a href="#"><img src="assets/images/icones/Mediainstagram.png" width="35px" alt="instagram-icon"></a>
                        <a href="#"><img src="assets/images/icones/Mediafacebook.png" width="35px" alt="facebook-icon"></a>
                        <a href="#"><img src="assets/images/icones/X-twitter.png" width="35px" alt="twitter-icon"></a>
                        <a href="#"><img src="assets/images/icones/steam.png" width="35px" alt="steam-icon"></a>
                        <a href="#"><img src="assets/images/icones/twitch.webp" width="35px" alt="twitch-icon"></a>
                        <a href="#"><img src="assets/images/icones/SL.png" width="35px" alt="SL-icon"></a>
                    </div>
                </article>



                <!-- CODE A REPRENDRE ICI -->

                <section class="backoffice-panel">
                  <form method="POST">
                    <article class="starter">
                        <div class="backoffice-intro">
                            <h1>Add Books</h1>
                            <div class="divider"></div>
                            <div class="add-books-panel">
                                <div class="option-book">
                                    <div>
                                        <span>Title:</span> 
                                        <input type="text" name="title" value="<?= htmlspecialchars($book['title']) ?>" required>
                                    </div>
                                    <div>
                                        <label for="categorySelect">Category:</label>
                                        <select name="category"  id="categorySelect">
                                            <option value="Manga" <?= $book['category'] === "Manga" ? "selected" : "" ?>>Manga</option>
                                            <option value="Comics" <?= $book['category'] === "Comics" ? "selected" : "" ?>>Comics</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="option-book">
                                    <div>
                                        <div>
                                            <label for="volumeCount">Number of published volumes:</label>
                                            <input type="number" id="volumeCount" name="volume_count" value="<?= (int)$book['volume_count'] ?>" min="1" max="300">
                                        </div>
                                    </div>
                                    <div>
                                        <label>Publication:</label>
                                        <select name="publication">
                                            <option value="Ongoing" <?= $book['publication'] === "Ongoing" ? "selected" : "" ?>>Ongoing</option>
                                            <option value="Completed" <?= $book['publication'] === "Completed" ? "selected" : "" ?>>Completed</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="divider2"></div>

                        <div class="backoffice-intro">
                            <div class="add-volumes">
                                <p>Select volumes in your possession:</p>
                                <div class="checkbox-select-all">
                                    <input type="checkbox" id="collection"><label for="collection">Select All</label>
                                </div>
                            </div>

                            <div class="select-add">
                                <div id="volumes-panel" class="volumes-panel">

                                <!-- ///////////// -->
                                <!-- PANEL VOLUMES -->
                                <!-- ///////////// -->

                                </div>
                                
                                <div>
                                    <button type="submit" class="register-add-btn">Add to my List</button>
                                </div>
                            </div>

                        </div>
                    </article>
                  
    </main>

    <footer>
        <p>© Copyright 2024 De Meyer Guilain. All rights reserved.</p>
        <p><a href="index.php">homepage</a> | <a href="project.php">About Site</a> | <a href="">Privacy Policy</a></p>
    </footer>
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

 