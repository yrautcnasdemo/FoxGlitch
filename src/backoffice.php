<!DOCTYPE html>
<html lang="en">
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
                            <span class="user-name">Judy Alvarez</span>
                            <span class="user-title">Space-Child</span>
                        </div>
                        <img src="assets/images/profiles/profiles_pictures/cute-anime-girl-R.jpg" width="300px" height="500px" alt="profile-pics">
                            <div class="user-btn-panel">
                            <a href="backoffice.php"><button>Add books</button></a>
                                <a href="user.php"><img class="booklist-icon" src="assets/images/icones/booklist.png" width="35px" alt=""></a>
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


                <section class="backoffice-panel">
                    
                    <article class="starter">
                        <div class="backoffice-intro">
                            <h1>Add Books</h1>
                            <div class="divider"></div>
                            <div class="add-books-panel">
                                <div class="option-book">
                                    <div>
                                        <span>Title:</span> <input type="text">
                                    </div>
                                    <div>
                                        <label for="dropdown">Category:</label>
                                            <select id="dropdown" name="options">
                                                <option value="option1">Manga</option>
                                                <option value="option2">Comics</option>
                                            </select>
                                    </div>
                                </div>
                                <div class="option-book">
                                    <div>
                                        <span>Number of published volumes:</span> <input type="number" min="1" max="300">
                                    </div>
                                    <div>
                                        <label for="dropdown">Publication:</label>
                                            <select id="dropdown" name="options">
                                                <option value="option1">Completed</option>
                                                <option value="option2">Ongoing...</option>
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
                                <div class="volumes-panel">
                                    <div class="vol">
                                        <div class="book-vol">
                                            <input type="checkbox" id="volume"><label for="volume">vol.001</label>
                                        </div>
                                    </div>
                                    <div class="vol">
                                        <div class="book-vol">
                                            <input type="checkbox" id="volume"><label for="volume">vol.002</label>
                                        </div>
                                    </div>
                                    <div class="vol">
                                        <div class="book-vol">
                                            <input type="checkbox" id="volume"><label for="volume">vol.003</label>
                                        </div>
                                    </div>
                                    <div class="vol">
                                        <div class="book-vol">
                                            <input type="checkbox" id="volume"><label for="volume">vol.004</label>
                                        </div>
                                    </div>
                                    <div class="vol">
                                        <div class="book-vol">
                                            <input type="checkbox" id="volume"><label for="volume">vol.005</label>
                                        </div>
                                    </div>
                                    <div class="vol">
                                        <div class="book-vol">
                                            <input type="checkbox" id="volume"><label for="volume">vol.006</label>
                                        </div>
                                    </div>
                                    <div class="vol">
                                        <div class="book-vol">
                                            <input type="checkbox" id="volume"><label for="volume">vol.007</label>
                                        </div>
                                    </div>
                                    <div class="vol">
                                        <div class="book-vol">
                                            <input type="checkbox" id="volume"><label for="volume">vol.008</label>
                                        </div>
                                    </div>
                                    <div class="vol">
                                        <div class="book-vol">
                                            <input type="checkbox" id="volume"><label for="volume">vol.009</label>
                                        </div>
                                    </div>
                                    <!-- <div class="vol">
                                        <div class="book-vol">
                                            <input type="checkbox" id="volume"><label for="volume">vol.010</label>
                                        </div>
                                    </div>
                                    <div class="vol">
                                        <div class="book-vol">
                                            <input type="checkbox" id="volume"><label for="volume">vol.011</label>
                                        </div>
                                    </div>
                                    <div class="vol">
                                        <div class="book-vol">
                                            <input type="checkbox" id="volume"><label for="volume">vol.012</label>
                                        </div>
                                    </div>
                                    <div class="vol">
                                        <div class="book-vol">
                                            <input type="checkbox" id="volume"><label for="volume">vol.013</label>
                                        </div>
                                    </div>
                                    <div class="vol">
                                        <div class="book-vol">
                                            <input type="checkbox" id="volume"><label for="volume">vol.014</label>
                                        </div>
                                    </div>
                                    <div class="vol">
                                        <div class="book-vol">
                                            <input type="checkbox" id="volume"><label for="volume">vol.015</label>
                                        </div>
                                    </div>
                                    <div class="vol">
                                        <div class="book-vol">
                                            <input type="checkbox" id="volume"><label for="volume">vol.016</label>
                                        </div>
                                    </div>
                                    <div class="vol">
                                        <div class="book-vol">
                                            <input type="checkbox" id="volume"><label for="volume">vol.017</label>
                                        </div>
                                    </div>
                                    <div class="vol">
                                        <div class="book-vol">
                                            <input type="checkbox" id="volume"><label for="volume">vol.018</label>
                                        </div>
                                    </div>
                                    <div class="vol">
                                        <div class="book-vol">
                                            <input type="checkbox" id="volume"><label for="volume">vol.019</label>
                                        </div>
                                    </div>
                                    <div class="vol">
                                        <div class="book-vol">
                                            <input type="checkbox" id="volume"><label for="volume">vol.020</label>
                                        </div>
                                    </div>
                                    <div class="vol">
                                        <div class="book-vol">
                                            <input type="checkbox" id="volume"><label for="volume">vol.021</label>
                                        </div>
                                    </div>
                                    <div class="vol">
                                        <div class="book-vol">
                                            <input type="checkbox" id="volume"><label for="volume">vol.022</label>
                                        </div>
                                    </div>
                                    <div class="vol">
                                        <div class="book-vol">
                                            <input type="checkbox" id="volume"><label for="volume">vol.023</label>
                                        </div>
                                    </div>
                                    <div class="vol">
                                        <div class="book-vol">
                                            <input type="checkbox" id="volume"><label for="volume">vol.024</label>
                                        </div>
                                    </div>
                                    <div class="vol">
                                        <div class="book-vol">
                                            <input type="checkbox" id="volume"><label for="volume">vol.025</label>
                                        </div>
                                    </div>
                                    <div class="vol">
                                        <div class="book-vol">
                                            <input type="checkbox" id="volume"><label for="volume">vol.026</label>
                                        </div>
                                    </div>
                                    <div class="vol">
                                        <div class="book-vol">
                                            <input type="checkbox" id="volume"><label for="volume">vol.027</label>
                                        </div>
                                    </div>
                                    <div class="vol">
                                        <div class="book-vol">
                                            <input type="checkbox" id="volume"><label for="volume">vol.028</label>
                                        </div>
                                    </div>
                                    <div class="vol">
                                        <div class="book-vol">
                                            <input type="checkbox" id="volume"><label for="volume">vol.029</label>
                                        </div>
                                    </div>
                                    <div class="vol">
                                        <div class="book-vol">
                                            <input type="checkbox" id="volume"><label for="volume">vol.030</label>
                                        </div>
                                    </div>
                                    <div class="vol">
                                        <div class="book-vol">
                                            <input type="checkbox" id="volume"><label for="volume">vol.031</label>
                                        </div>
                                    </div>
                                    <div class="vol">
                                        <div class="book-vol">
                                            <input type="checkbox" id="volume"><label for="volume">vol.032</label>
                                        </div>
                                    </div>
                                    <div class="vol">
                                        <div class="book-vol">
                                            <input type="checkbox" id="volume"><label for="volume">vol.033</label>
                                        </div>
                                    </div>
                                    <div class="vol">
                                        <div class="book-vol">
                                            <input type="checkbox" id="volume"><label for="volume">vol.034</label>
                                        </div>
                                    </div>
                                    <div class="vol">
                                        <div class="book-vol">
                                            <input type="checkbox" id="volume"><label for="volume">vol.035</label>
                                        </div>
                                    </div>
                                    <div class="vol">
                                        <div class="book-vol">
                                            <input type="checkbox" id="volume"><label for="volume">vol.000</label>
                                        </div>
                                    </div> -->
                                </div>
                                
                                <div>
                                    <button class="register-add-btn">Add to my List</button>
                                </div>
                            </div>

                        </div>
                    </article>

                    <div class="divider3"></div>

                    <div class="helper">
                        <div class="small-tv">
                            <video class="tv-grid" autoplay loop>
                                <source src="assets/images/backgrounds/Video/Cj4Q.mp4" type="video/mp4">
                            </video>
                            <img class="retro-cat" src="assets/images/profiles/cyberpunk-cat-head-sticker3.png" alt="cat-helper-layer">
                            <img class="retro-tv-back" src="assets/images/backgrounds/Retro-tv.png" alt="tv-layer">
                        </div>
                        <div class="help-txt">
                            <h4 class="bebop">Follow Bebop The cat for help</h4>
                            <p>Step 1 - Register your book's name</p>
                            <p>Step 2 - Select a category: Manga or Comics</p>
                            <p>Step 3 - Enter the number of published volumes to select the volumes in your possession later</p>
                            <p>Step 4 - Select the status of your collection: Completed (fully published) or Ongoing (in progress)</p>
                            <p class="last-step">After that, you can select all the volumes in your possession (or "select all" and unselect the volumes you're missing)</p>
                        </div>
                    </div>

                    <!-- <h1>AJOUTER BOUTON "DELETE SELECTION" ET SELECT MANGA - COMICS PUIS REGLER LIMAGE</h1> -->
                    <div class="backoffice-table-edit">
                        <div class="edit-help">
                            <div class="backoffice-edit-panel">
                                <h1>Edit books list</h1>
                                <div class="divider"></div>
                                <div>
                                    <button>Manga list</button>
                                    <button>Comics list</button>
                                    <button>Delete Selection</button>
                                </div>
                            </div>

                    <div class="divider3"></div>


                            <div class="helper">
                                <div class="small-tv">
                                    <video class="tv-grid2" autoplay loop>
                                        <source src="assets/images/backgrounds/Video/retrowave-car.mp4" type="video/mp4">
                                    </video>
                                    <img class="retro-cat" src="assets/images/profiles/cyberpunk-cat-head-sticker3.png" alt="cat-helper-layer">
                                    <img class="retro-tv-back" src="assets/images/backgrounds/Retro-tv.png" alt="tv-layer">
                                </div>
                                <div class="help-txt">
                                    <h4 class="bebop">Follow Bebop The cat for help</h4>
                                    <p>Here you can edit or delete a book. You can also delete multiple selections</p>
                                    </div>
                            </div>
                        </div>
                        <div class="divider4"></div>
                        <table>
                            <thead>
                                <tr>
                                    <th scope="col"></th>
                                    <th scope="col"></th>
                                    <th scope="col">Title</th>
                                    <th scope="col">Full</th>
                                    <th scope="col">Vol.</th>
                                    <th scope="col">Publication</th>
                                    <th scope="col"><input type="checkbox"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><a href=""><img src="assets/images/icones/trashbox.png" width="20px" alt="trashbox"></a></td>
                                    <td><a href=""><img src="assets/images/icones/edit.png" width="20px" alt="edit"></a></td>
                                    <th class="l-case" scope="row">Berserk</th>
                                    <td>N/f</td>
                                    <td>48</td>
                                    <td>Ongoing...</td>
                                    <td><input type="checkbox"></td>
                                </tr>
                                <tr>
                                    <td><a href=""><img src="assets/images/icones/trashbox.png" width="20px" alt="trashbox"></a></td>
                                    <td><a href=""><img src="assets/images/icones/edit.png" width="20px" alt="edit"></a></td>
                                    <th class="l-case" scope="row">Assassinassions classe room</th>
                                    <td>N/f</td>
                                    <td>48</td>
                                    <td>Ongoing...</td>
                                    <td><input type="checkbox"></td>
                                </tr>
                                <tr>
                                    <td><a href=""><img src="assets/images/icones/trashbox.png" width="20px" alt="trashbox"></a></td>
                                    <td><a href=""><img src="assets/images/icones/edit.png" width="20px" alt="edit"></a></td>
                                    <th class="l-case" scope="row">Gunnm</th>
                                    <td>Full</td>
                                    <td>24</td>
                                    <td>Completed</td>
                                    <td><input type="checkbox"></td>
                                </tr>
                                <tr>
                                    <td><a href=""><img src="assets/images/icones/trashbox.png" width="20px" alt="trashbox"></a></td>
                                    <td><a href=""><img src="assets/images/icones/edit.png" width="20px" alt="edit"></a></td>
                                    <th class="l-case" scope="row">Gunnm: Last order</th>
                                    <td>Full</td>
                                    <td>34</td>
                                    <td>Completed</td>
                                    <td><input type="checkbox"></td>
                                </tr>
                                <tr>
                                    <td><a href=""><img src="assets/images/icones/trashbox.png" width="20px" alt="trashbox"></a></td>
                                    <td><a href=""><img src="assets/images/icones/edit.png" width="20px" alt="edit"></a></td>
                                    <th class="l-case" scope="row">Gunnm: Mars Chronicle</th>
                                    <td>N/f</td>
                                    <td>12</td>
                                    <td>Ongoing...</td>
                                    <td><input type="checkbox"></td>
                                </tr>                                
                                <tr>
                                    <td><a href=""><img src="assets/images/icones/trashbox.png" width="20px" alt="trashbox"></a></td>
                                    <td><a href=""><img src="assets/images/icones/edit.png" width="20px" alt="edit"></a></td>
                                    <th class="l-case" scope="row">Dragon Ball</th>
                                    <td>Full</td>
                                    <td>48</td>
                                    <td>Completed</td>
                                    <td><input type="checkbox"></td>
                                </tr>                                
                                <tr>
                                    <td><a href=""><img src="assets/images/icones/trashbox.png" width="20px" alt="trashbox"></a></td>
                                    <td><a href=""><img src="assets/images/icones/edit.png" width="20px" alt="edit"></a></td>
                                    <th class="l-case" scope="row">Binbō-gami ga !</th>
                                    <td>N/f</td>
                                    <td>48</td>
                                    <td>Completed</td>
                                    <td><input type="checkbox"></td>
                                </tr>
                            </tbody>
                        </table>
                        <!-- <img src="assets/images/profiles/GutsBanner.png" alt=""> -->

                    </div>
                </section>
            </div>


        </section>
    </main>
    <footer>
            <p>© Copyright 2024 De Meyer Guilain. Tous droits réservés.</p>
            <p>Plan du site | Mentions légales | Politique de confidentialité</p>
            <p>Special thanks</p>
    </footer>
</body>
<script src="script.js"></script>
</html>