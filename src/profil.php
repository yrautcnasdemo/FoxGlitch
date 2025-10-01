<?php 
    session_start();
    // On se connecte a la BDD
    require_once "pdo/connexionBDD.php";

    $sql = "SELECT * FROM user_books WHERE user_id = :user_id";
    $query = $db->prepare($sql);
    $query->bindValue(":user_id", $_SESSION["user"]["id"], PDO::PARAM_INT);
    $query->execute();
    $books = $query->fetchAll();

    // Séparer mangas et comics
    $mangas = array_filter($books, fn($b) => $b['category'] === 'Manga');
    $comics = array_filter($books, fn($b) => $b['category'] === 'Comics');

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
                <img src="assets/images/profiles/profiles_banner/cyberpunk-night-city2.jpg" alt="banner-user">
            </div>


            <div class="user-panel">
                <div class="user-profile">
                    <div class="user-pics">
                        <div class="user-info">
                            <span class="user-name">Welcome <?= $_SESSION["user"]["pseudo"]?></span>
                            <span class="user-title">Space-Child</span>
                        </div>
                        <img src="assets/images/profiles/profiles_pictures/cute-anime-girl-R.jpg" width="300px" height="500px" alt="profile-pics-user">
                            <div class="user-btn-panel">
                                <a href="backoffice.php"><button>Add books</button></a>
                                <a href="profil.php"><img class="booklist-icon" src="assets/images/icones/booklist.png" width="35px" alt="books list"></a>
                                <a href="friendslist.php"><img class="hov-pro" src="assets/images/icones/Friend List(1).png" width="35px" alt="Friends List"></a>
                                <a href="edit_profil.php"><img class="hov-pro" src="assets/images/icones/GearWhite-Small-icon01.png" width="35px" alt="edit profile"></a>
                                <a href="deconnexion.php"><img class="hov-pro" src="assets/images/icones/5001a46.png" width="35px" alt="disconnection"></a>
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
                </div>


                <div class="full-panel">
                    <!-- PANEL MANGA -->
                    <article class="user-manga-panel expanded">
                        <div class="banner-img">
                            <img src="assets/images/profiles/banner-manga2.jpg" alt="manga-banner">
                            <a class="btn-list" href="#">Manga List</a>
                        </div>
                        
                        <!-- Formulaire FILTER-SEARCH -->
                        <form class="books-filter" action="">
                            <div>
                                <span>Filter:</span><input type="text" placeholder="Title">
                            </div>
                            <div>
                                <input type="checkbox" id="collection"><label for="collection">incomplete collection</label>
                            </div>
                                <a class="btn-search" href="#">Search</a>
                        </form>
                        
                        <div class="bubble-line">
                            <div class="line">
                                <div class="bubble"></div>
                                <div class="bubble"></div>
                                <div class="bubble"></div>
                                <div class="bubble"></div>
                                <div class="bubble"></div>
                                <div class="bubble"></div>
                                <div class="bubble"></div>
                            </div>
                        </div>
                        <!-- TABLE MANGA -->
                        <div class="books-table">
                            <table>
                                <thead>
                                    <tr class="table-header">
                                        <th>Title</th>
                                        <th>Full</th>
                                        <th>Vol.</th>
                                        <th>Publication</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($mangas as $book): 
                                        $owned = !empty($book["owned_volumes"]) ? json_decode($book["owned_volumes"], true) : [];
                                        $owned = array_map('strval', $owned);
                                        $owned_json = htmlspecialchars(json_encode($owned), ENT_QUOTES);
                                        $volume_count = (int)$book["volume_count"];
                                    ?>
                                    <tr class="book-row"
                                        data-book-id="<?= (int)$book['id'] ?>"
                                        data-volume-count="<?= $volume_count ?>"
                                        data-owned="<?= $owned_json ?>"
                                        data-manga-name="<?= htmlspecialchars($book["title"], ENT_QUOTES) ?>">
                                        <td class="title-cell toggle-volumes" style="cursor:pointer;">
                                            <?= htmlspecialchars($book["title"]) ?>
                                        </td>
                                        <td><?= (count($owned) === $volume_count && $volume_count>0) ? "F" : "N" ?></td>
                                        <td><?= $volume_count ?></td>
                                        <td><?= htmlspecialchars($book["publication"]) ?></td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </article>



                    <!-- PANEL COMICS -->
                    <article class="user-comics-panel expanded">
                        <div class="banner-img">
                            <img src="assets/images/profiles/banner-comics3.webp" alt="comics-banner">
                            <a class="btn-list2" href="#">Comics List</a>
                        </div>

                        <!-- Formulaire FILTER-SEARCH -->
                        <form class="books-filter" action="">
                            <div>
                                <span>Filter:</span><input type="text" placeholder="Title">
                            </div>
                            <div>
                                <input type="checkbox" id="collection2"><label for="collection2">incomplete collection</label>
                            </div>
                                <a class="btn-search" href="#">Search</a>
                        </form>
                        
                        <div class="bubble-line">
                            <div class="line2">
                                <div class="bubble"></div>
                                <div class="bubble"></div>
                                <div class="bubble"></div>
                                <div class="bubble"></div>
                                <div class="bubble"></div>
                                <div class="bubble"></div>
                                <div class="bubble"></div>
                            </div>
                        </div>

                    <!-- TABLE COMICS -->
                        <div class="books-table">
                            <table class="comics-table">
                                <thead>
                                    <tr class="table-header">
                                        <th>Title</th>
                                        <th>Full</th>
                                        <th>Vol.</th>
                                        <th>Publication</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($comics as $book): 
                                        $owned = !empty($book["owned_volumes"]) ? json_decode($book["owned_volumes"], true) : [];
                                        $owned = array_map('strval', $owned);
                                        $owned_json = htmlspecialchars(json_encode($owned), ENT_QUOTES);
                                        $volume_count = (int)$book["volume_count"];
                                    ?>
                                    <tr class="book-row"
                                        data-book-id="<?= (int)$book['id'] ?>"
                                        data-volume-count="<?= $volume_count ?>"
                                        data-owned="<?= $owned_json ?>"
                                        data-manga-name="<?= htmlspecialchars($book["title"], ENT_QUOTES) ?>">
                                        <td class="title-cell toggle-volumes" style="cursor:pointer;">
                                            <?= htmlspecialchars($book["title"]) ?>
                                        </td>
                                        <td><?= (count($owned) === $volume_count && $volume_count>0) ? "F" : "N" ?></td>
                                        <td><?= $volume_count ?></td>
                                        <td><?= htmlspecialchars($book["publication"]) ?></td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </article>
                </div>
            </div>


            


        </section>
    </main>
    <footer>
        <p>© Copyright 2024 De Meyer Guilain. All rights reserved.</p>
        <p><a href="index.php">homepage</a> | <a href="project.php">About Site</a> | <a href="">Privacy Policy</a></p>
    </footer>



<!-- Popup volumes -->
<div id="volumesPopup" class="popup-volumes">
    <div class="popup-content">
        <span class="popup-close">&times;</span>
        <h2 id="popupTitle">Volumes du manga</h2>
        <div class="volume-books-profil">
            <div class="volumes-grid"></div>
        </div>
    </div>
</div>


</body>
<script src="script.js"></script>
</html>