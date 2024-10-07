<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dev Wsshf GDsds </title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/7.0.0/normalize.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css"
        integrity="sha256-46qynGAkLSFpVbEBog43gvNhfrOj+BmwXdxFgVK/Kvc=" crossorigin="anonymous" />

    <!-- Update these with your own fonts -->
    <link href="https://fonts.googleapis.com/css?family=Lora:400,700|Roboto+Slab:400,700&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js']);
</head>

<body>
    <header>
        <div class="logo">
            &lt;SSSDSGG&gt;
            <!-- <img src="img/devjane.png" alt=""> -->
        </div>
        <button class="nav-toggle" aria-label="toggle navigation">
            <span class="hamburger"></span>
        </button>
        <nav class="nav">
            <ul class="nav__list">
                <li class="nav__item"><a href="#home" class="nav__link">Home</a></li>
                <li class="nav__item"><a href="#services" class="nav__link">My Services</a></li>
                <li class="nav__item"><a href="#about" class="nav__link">About me</a></li>
                <li class="nav__item"><a href="#work" class="nav__link">My Work</a></li>
            </ul>
        </nav>
    </header>


    <!-- Introduction -->
    <section class="intro" id="home">
        <h1 class="section__title section__title--intro">
            {{-- Hi, I am <strong>Gurpreet Kaur</strong> --}}
            DASF, SA SF <strong>ASDFSDA FAF</strong>
        </h1>
        {{-- <p class="section__subtitle section__subtitle--intro">FULLSTACK DEV</p> --}}
        <p class="section__subtitle section__subtitle--intro">AFNSDFSDFSDF</p>
        <img src="img/image0.png" alt="a picture" style="height: 325px; min-width: 250px;" class="intro__img">
    </section>


    <!-- My services -->
    <section class="my-services" id="services">
        {{-- <h2 class="section__title section__title--services">What I do</h2> --}}
        <h2 class="section__title section__title--services">FGH DFG do</h2>
        <div class="services">
            <div class="service">
                <h3>Frontend</h3>
                <div class="skillset">
                    <div>HTML5/CSS3</div>
                    <div>BOOTSTRAP </div>
                    <div>JAVASCRIPT</div>
                    <div>JQUERY</div>
                    <div>REACT.JS</div>

                </div>
            </div> <!-- / service -->

            <div class="service">
                <h3>Backend</h3>
                <div class="skillset">
                    <div>NODE.JS</div>
                    <div>EXPRESS.JS</div>
                    <div>MONGODB</div>
                    <div>PHP</div>
                    <div>MYSQL</div>

                </div>
            </div> <!-- / service -->

            <div class="service">
                <h3>Other</h3>
                <div class="skillset">
                    <div>GIT/GITHUB</div>
                    <div>REST API</div>
                    <div>AJAX</div>
                    <div>VSCODE</div>
                    <div>REDUX</div>

                </div>
            </div> <!-- / service -->
        </div> <!-- / services -->

        {{-- <a href="#work" class="btn">My Work</a> --}}
        <a href="#work" class="btn">MJGFJGFJy FJFGJ</a>
    </section>


    <!-- About me -->
    <section class="about-me" id="about">
        {{-- <h2 class="section__title section__title--about">Who I am</h2> --}}
        <h2 class="section__title section__title--about">FSHFGH IFDG HDHam</h2>
        <p class="section__subtitle section__subtitle--about">Designer & developer based out of Canada</p>

        <div class="about-me__body">
            <p>I developed a passion for coding while pursuing my Computer Applications degree in college,
                and since then it became a hobby. After graduating, I started working as a fullstack developer in a
                company.
                I worked alongside senior developers with both frontend and backend technologies.</p>
            <p>Passionate about the work I do, I offer full attention, dedication, personalization and quality to the
                projects I build.
                I believe that learning in the tech industry never really ends, and so, I am always looking for ways to
                expand my current skillset and gain new skills.</p>
            <a class="btn" style="margin-bottom:1rem" href="GurpreetKaurResume.pdf" target="blank">Check My
                Resume</a>
        </div>

        <img src="img/img1.png" alt="Jane leaning against a bus" class="about-me__img">
    </section>

    <!-- My Work -->
    <section class="my-work" id="work">
        <h2 class="section__title section__title--work">My work</h2>
        <p class="section__subtitle section__subtitle--work">A selection of my range of work</p>

        <div class="portfolio">
            <!-- Portfolio item 01 -->
            <a href="portfolio-item1" class="portfolio__item" onmouseover="showCaption(this)"
                onmouseout="hideCaption(this)">
                <div class="portfolio-item-caption">Ecommerce Site</div>
                <img src="img/book2.png" alt="" class="portfolio__img">
            </a>

            <!-- Portfolio item 02 -->
            <a href="portfolio-item2.html" class="portfolio__item" onmouseover="showCaption(this)"
                onmouseout="hideCaption(this)">
                <div class="portfolio-item-caption">Backend Panel</div>
                <img src="img/admin1.png" alt="" class="portfolio__img">
            </a>

            <!-- Portfolio item 03 -->
            <a href="portfolio-item3.html" class="portfolio__item" onmouseover="showCaption(this)"
                onmouseout="hideCaption(this)">
                <div class="portfolio-item-caption">React Game</div>
                <img src="img/tenzies.png" alt="" class="portfolio__img">
            </a>

            <!-- Portfolio item 04 -->
            <a href="portfolio-item4.html" class="portfolio__item" onmouseover="showCaption(this)"
                onmouseout="hideCaption(this)">
                <div class="portfolio-item-caption">Memes App</div>
                <img src="img/meme.png" alt="" class="portfolio__img">
            </a>
            <!--
            Portfolio item 05
            <a href="portfolio-item.html" class="portfolio__item">
                <img src="img/tenzies.png" alt="" class="portfolio__img">
            </a>

            Portfolio item 06
            <a href="portfolio-item.html" class="portfolio__item">
                <img src="img/tenzies.png" alt="" class="portfolio__img">
            </a>

            Portfolio item 07
            <a href="portfolio-item.html" class="portfolio__item">
                <img src="img/tenzies.png" alt="" class="portfolio__img">
            </a>

            Portfolio item 08
            <a href="#" class="portfolio__item">
                <img src="img/tenzies.png" alt="" class="portfolio__img">
            </a> -->


        </div>
    </section>


    <!-- Footer -->
    <footer class="footer">
        <a href="mailto:gurpreet@devgurpreet.com" class="footer__link btn">Contact Me</a>
        <ul class="social-list">

            <li class="social-list__item">
                <a class="social-list__link" href="https://github.com/preetguraya">
                    <i class="fab fa-github"></i>
                    Github
                </a>
                <a class="social-list__link" href="https://discord.com/users/Gurpreet#4001">
                    <i class="fab fa-discord"></i>
                    Discord
                </a>
                <a class="social-list__link" href="https://www.linkedin.com/in/dev-gurpreet/">
                    <i class="fab fa-linkedin"></i>
                    Linkedin
                </a>
            </li>

        </ul>
    </footer>



    <script src="js/index.js"></script>
</body>

</html>
