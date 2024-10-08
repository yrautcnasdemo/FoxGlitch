<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="fonts.css">
    <title>FoxGlitch your library</title>
</head>
<body class="homepage">
    <div class="blackfilter">
        <header>
            <a class="btn-project" href="project.php"><button>This project</button></a>
            <a class="btn-login" role="button" data-target="#modal" data-toggle="modal" href=""><button>Log/Register</button></a>
        </header>

        <main>
            <section class="presentation">
                <article>
                    <div class="title">
                        <p class="prev">Welcome to</p> 
                        <h1 class="glitch"><span aria-hidden="true">FoxGlitch</span>FoxGlitch<span aria-hidden="true">FoxGlitch</span></h1>
                    </div>
                        <p>Your personal library dedicated to manga and comic book enthusiasts. Here, you can create, organize, and share your collection in a simple and intuitive way. Whether you're a seasoned collector or a casual reader, FoxGlitch helps you keep track of your readings, discover new series, and share your favorites with friends. Dive into the world of graphic stories and turn your collection into a true digital treasure. Explore, organize, and let your passion for manga and comics shine!</p>
                </article>
                <div>
                    <div class="storyboards">
                        <img class="storyboard1" src="assets/images/backgrounds/homepage_storyboard1bis.jpg" height="550px" alt="">
                        <img class="storyboard2" src="assets/images/backgrounds/homepage_storyboard2.jpg" height="200px" alt="">
                        <img class="homepage-img1" src="assets/images/backgrounds/homepage_img1.jpg" width="400px" alt="">
                        <img class="homepage-img2" src="assets/images/backgrounds/homepage_img2.jpg" width="400px" alt="">
                        <img class="homepage-img3" src="assets/images/backgrounds/homepage_img3.jpg" width="400px" alt="">
                    </div>
                </div>
            </section>
        </main>

        <!-- Modal Login -->
        <section class="modal" id="modal" role="form">
            <article class="register-modal">
                <div class="banner-line">
                    <button class="close-modal" data-dismiss="form">X</button>
                </div>
                <h2>Login Station</h2>
                <form action="">
                    <div class="input-wrapper">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75" />
                    </svg>

                        <input type="email" class="login-input" placeholder="YourMail@Adress.com" require>
                    </div>
                    <div class="input-wrapper">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 5.25a3 3 0 0 1 3 3m3 0a6 6 0 0 1-7.029 5.912c-.563-.097-1.159.026-1.563.43L10.5 17.25H8.25v2.25H6v2.25H2.25v-2.818c0-.597.237-1.17.659-1.591l6.499-6.499c.404-.404.527-1 .43-1.563A6 6 0 1 1 21.75 8.25Z" />
                    </svg>

                        <input type="password" placeholder="Enter password" class="login-input">
                    </div>
                    <div class="rem-for">
                        <label for="remember-me">
                            <input type="checkbox" id="remember-me">
                            Remember me
                        </label>
                        <p><a href="">Forgot password ?</a></p>
                    </div>

                    <button class="btn-modal">Login</button>
                        <p>Not registered ? <a class="create-acc" role="button" data-target="#modal2" data-toggle="modal" href="">Create account</a></p>
                </form>
            </article>
        </section>

        <!-- Modal register -->
        <section class="modal2" id="modal2" role="form">
            <article class="register-modal">
                <div class="banner-line">
                    <button class="close-modal" data-dismiss="form">X</button>
                </div>
                <h2>Register Station</h2>
                <form action="">
                    <div class="input-wrapper">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                    </svg>
                        <input type="text" class="login-input" placeholder="Enter Pseudo" require>
                    </div>

                    <div class="input-wrapper">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75" />
                    </svg>
                        <input type="email" class="login-input" placeholder="YourMail@Adress.com" require>
                    </div>

                    <div class="input-wrapper">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 5.25a3 3 0 0 1 3 3m3 0a6 6 0 0 1-7.029 5.912c-.563-.097-1.159.026-1.563.43L10.5 17.25H8.25v2.25H6v2.25H2.25v-2.818c0-.597.237-1.17.659-1.591l6.499-6.499c.404-.404.527-1 .43-1.563A6 6 0 1 1 21.75 8.25Z" />
                    </svg>
                        <input type="password" placeholder="Enter password" class="login-input" require>
                    </div>

                    <div class="input-wrapper">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 5.25a3 3 0 0 1 3 3m3 0a6 6 0 0 1-7.029 5.912c-.563-.097-1.159.026-1.563.43L10.5 17.25H8.25v2.25H6v2.25H2.25v-2.818c0-.597.237-1.17.659-1.591l6.499-6.499c.404-.404.527-1 .43-1.563A6 6 0 1 1 21.75 8.25Z" />
                    </svg>
                        <input type="password" placeholder="Confirm password" class="login-input" require>
                    </div>

                    <div class="rem-for">
                        <label for="remember-me2">
                            <input type="checkbox" id="remember-me2">
                            Remember me
                        </label>
                    </div>

                    <button class="btn-modal">Create Account</button>
                        <p>Already registered ? <a class="loged-modal" role="button" data-target="#modal" data-toggle="modal" href="">Login</a></p>
                </form>
            </article>
        </section>

        <footer>
            <p>© Copyright 2024 De Meyer Guilain. All rights reserved.</p>
            <p><a href="index.php">homepage</a> | <a href="project.php">About Site</a> | <a href="">Privacy Policy</a></p>
        </footer>
    </div>

    <script src="script.js"></script>
</body>
</html>