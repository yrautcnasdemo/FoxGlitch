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
                                <a href=""><img class="hov-pro" src="assets/images/icones/GearWhite-Small-icon01.png" width="35px" alt="edit profile"></a>
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


                <section class="edit-panel">
                    <article class="Myprofil">
                        <div class="edit-pics">
                            <div class="pics">
                                <img src="assets/images/profiles/profiles_pictures/profile-anime-girl-eating-ramen.jpg" alt="">
                            </div>
                            <div class="btn-dl-pics">
                                <button>Download</button>
                            </div>
                        </div>
                        <div class="edit-description">
                            <span>
                                Pseudo: <input type="text">
                            </span>
                            <span>
                                Title: <input type="text">
                            </span>

                        </div>
                    </article>
                </section>




        </section>
    </main>
    <footer>
        <p>© Copyright 2024 De Meyer Guilain. All rights reserved.</p>
        <p><a href="index.php">homepage</a> | <a href="project.php">About Site</a> | <a href="">Privacy Policy</a></p>
    </footer>



</body>
<script src="script.js"></script>
</html>