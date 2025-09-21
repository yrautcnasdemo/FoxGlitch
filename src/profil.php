<?php 
    session_start();
    // On se connecte a la BDD
    require_once "pdo/connexionBDD.php";

    $sql = "SELECT * FROM user_books WHERE user_id = :user_id";
    $query = $db->prepare($sql);
    $query->bindValue(":user_id", $_SESSION["user"]["id"], PDO::PARAM_INT);
    $query->execute();
    $books = $query->fetchAll();

?>

<!-- 20 BOOK PAR TABLE MAXIMUM -->

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
                                <a href="profil.php"><img class="booklist-icon" src="assets/images/icones/booklist.png" width="35px" alt=""></a>
                                <a href="friendslist.php"><img class="hov-pro" src="assets/images/icones/Friend List(1).png" width="35px" alt=""></a>
                                <a href=""><img class="hov-pro" src="assets/images/icones/Wishlist.png" width="35px" alt=""></a>
                                <a href="deconnexion.php"><img class="hov-pro" src="assets/images/icones/GearWhite-Small-icon01.png" width="35px" alt=""></a>
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
                    <article class="user-manga-panel expanded">
                        <div class="banner-img">
                            <img src="assets/images/profiles/banner-manga2.jpg" alt="manga-banner">
                            <a class="btn-list" href="#">Manga List</a>
                        </div>
                        
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
                                    <?php foreach ($books as $book) : ?>
                                    <tr>
                                        <td><?= htmlspecialchars($book["title"]) ?></td>
                                        <td>F</td>
                                        <td><?= htmlspecialchars($book["volume_count"]) ?></td>
                                        <td><?= htmlspecialchars($book["publication"]) ?></td>
                                    </tr>
                                    <!-- <tr>
                                        <td>Gunnm: Last order</td>
                                        <td>F</td>
                                        <td>26</td>
                                        <td>Completed</td>
                                    </tr>
                                    <tr>
                                        <td>Gunnm: Mars Chronicle</td>
                                        <td>N</td>
                                        <td>10</td>
                                        <td>Ongoing...</td>
                                    </tr>
                                    <tr>
                                        <td>Dragon Ball</td>
                                        <td>F</td>
                                        <td>51</td>
                                        <td>Completed</td>
                                    </tr>
                                    <tr>
                                        <td>Binbō-gami ga !</td>
                                        <td>F</td>
                                        <td>16</td>
                                        <td>Completed</td>
                                    </tr>
                                    <tr>
                                        <td>Claymore</td>
                                        <td>F</td>
                                        <td>64</td>
                                        <td>Completed</td>
                                    </tr>
                                    <tr>
                                        <td>I'm Hero</td>
                                        <td>N</td>
                                        <td>34</td>
                                        <td>Ongoing...</td>
                                    </tr>
                                    <tr>
                                        <td>Fruits basket</td>
                                        <td>F</td>
                                        <td>27</td>
                                        <td>Completed</td>
                                    </tr>
                                    <tr>
                                        <td>Goblin's Slayer</td>
                                        <td>N</td>
                                        <td>15</td>
                                        <td>Ongoing...</td>
                                    </tr>
                                    <tr>
                                        <td>Pretty Face</td>
                                        <td>F</td>
                                        <td>12</td>
                                        <td>Completed</td>
                                    </tr>
                                    <tr>
                                        <td>Great Teacher Onizuka</td>
                                        <td>F</td>
                                        <td>40</td>
                                        <td>Completed</td>
                                    </tr>
                                    <tr>
                                        <td>Tokyo Ghoul</td>
                                        <td>N</td>
                                        <td>40</td>
                                        <td>Ongoing...</td>
                                    </tr>
                                    <tr>
                                        <td>On-punch Man</td>
                                        <td>N</td>
                                        <td>14</td>
                                        <td>Ongoing...</td>
                                    </tr>
                                    <tr>
                                        <td>Monster</td>
                                        <td>N</td>
                                        <td>19</td>
                                        <td>Ongoing...</td>
                                    </tr>
                                    <tr>
                                        <td>Akira</td>
                                        <td>F</td>
                                        <td>21</td>
                                        <td>Completed</td>
                                    </tr>
                                    <tr>
                                        <td>Deatd Note</td>
                                        <td>F</td>
                                        <td>24</td>
                                        <td>Completed</td>
                                    </tr>
                                    <tr>
                                        <td>Assassinassions classe room</td>
                                        <td>F</td>
                                        <td>17</td>
                                        <td>Ongoing...</td>
                                    </tr>
                                    <tr>
                                        <td>Angel Sanctuary</td>
                                        <td>F</td>
                                        <td>23</td>
                                        <td>Completed</td>
                                    </tr>
                                    <tr>
                                        <td>You're under Arrest !</td>
                                        <td>F</td>
                                        <td>21</td>
                                        <td>Completed</td>
                                    </tr> -->
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </article>


                    <article class="user-comics-panel expanded">
                        <div class="banner-img">
                            <img src="assets/images/profiles/banner-comics3.webp" alt="comics-banner">
                            <a class="btn-list2" href="#">Comics List</a>
                        </div>
                        
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
                                    <tr>
                                        <td>Berserk</td>
                                        <td>N</td>
                                        <td>49</td>
                                        <td>Ongoing...</td>
                                    </tr>
                                    <tr>
                                        <td>Gunnm</td>
                                        <td>F</td>
                                        <td>21</td>
                                        <td>Completed</td>
                                    </tr>
                                    <tr>
                                        <td>Gunnm: Last order</td>
                                        <td>F</td>
                                        <td>26</td>
                                        <td>Completed</td>
                                    </tr>
                                    <tr>
                                        <td>Gunnm: Mars Chronicle</td>
                                        <td>N</td>
                                        <td>10</td>
                                        <td>Ongoing...</td>
                                    </tr>
                                    <tr>
                                        <td>Dragon Ball</td>
                                        <td>F</td>
                                        <td>51</td>
                                        <td>Completed</td>
                                    </tr>
                                    <tr>
                                        <td>Binbō-gami ga !</td>
                                        <td>F</td>
                                        <td>16</td>
                                        <td>Completed</td>
                                    </tr>
                                    <tr>
                                        <td>Claymore</td>
                                        <td>F</td>
                                        <td>64</td>
                                        <td>Completed</td>
                                    </tr>
                                    <tr>
                                        <td>I'm Hero</td>
                                        <td>N</td>
                                        <td>34</td>
                                        <td>Ongoing...</td>
                                    </tr>
                                    <tr>
                                        <td>Fruits basket</td>
                                        <td>F</td>
                                        <td>27</td>
                                        <td>Completed</td>
                                    </tr>
                                    <tr>
                                        <td>Goblin's Slayer</td>
                                        <td>N</td>
                                        <td>15</td>
                                        <td>Ongoing...</td>
                                    </tr>
                                    <tr>
                                        <td>Pretty Face</td>
                                        <td>F</td>
                                        <td>12</td>
                                        <td>Completed</td>
                                    </tr>
                                    <tr>
                                        <td>Great Teacher Onizuka</td>
                                        <td>F</td>
                                        <td>40</td>
                                        <td>Completed</td>
                                    </tr>
                                    <tr>
                                        <td>Tokyo Ghoul</td>
                                        <td>N</td>
                                        <td>40</td>
                                        <td>Ongoing...</td>
                                    </tr>
                                    <tr>
                                        <td>On-punch Man</td>
                                        <td>N</td>
                                        <td>14</td>
                                        <td>Ongoing...</td>
                                    </tr>
                                    <tr>
                                        <td>Monster</td>
                                        <td>N</td>
                                        <td>19</td>
                                        <td>Ongoing...</td>
                                    </tr>
                                    <tr>
                                        <td>Akira</td>
                                        <td>F</td>
                                        <td>21</td>
                                        <td>Completed</td>
                                    </tr>
                                    <tr>
                                        <td>Deatd Note</td>
                                        <td>F</td>
                                        <td>24</td>
                                        <td>Completed</td>
                                    </tr>
                                    <tr>
                                        <td>Assassinassions classe room</td>
                                        <td>F</td>
                                        <td>17</td>
                                        <td>Ongoing...</td>
                                    </tr>
                                    <tr>
                                        <td>Angel Sanctuary</td>
                                        <td>F</td>
                                        <td>23</td>
                                        <td>Completed</td>
                                    </tr>
                                    <tr>
                                        <td>You're under Arrest !</td>
                                        <td>F</td>
                                        <td>21</td>
                                        <td>Completed</td>
                                    </tr>
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
</body>
<script src="script.js"></script>
</html>