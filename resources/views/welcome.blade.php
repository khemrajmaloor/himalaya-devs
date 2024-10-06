
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dev Gurpreet Kaur </title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/7.0.0/normalize.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css"
        integrity="sha256-46qynGAkLSFpVbEBog43gvNhfrOj+BmwXdxFgVK/Kvc=" crossorigin="anonymous" />

    <!-- Update these with your own fonts -->
    <link href="https://fonts.googleapis.com/css?family=Lora:400,700|Roboto+Slab:400,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href={{ url('css/app.css') }}>
   <style>
    *,
*::before,
*::after {
    box-sizing: border-box;
}

/* Custom Properties, update these for your own design */

:root {
    --ff-primary: 'Lora', serif;
    --ff-secondary: 'Roboto Slab', serif;

    --fw-reg: 400;
    --fw-bold: 700;

    --clr-light: #fff;
    --clr-dark: #303030;
    --clr-accent: #f8333c;

    --fs-h1: 3rem;
    --fs-h2: 2.25rem;
    --fs-h3: 1.25rem;
    --fs-body: 1rem;

    --bs: 0.25em 0.25em 0.75em rgba(0, 0, 0, .25),
        0.125em 0.125em 0.25em rgba(0, 0, 0, .15);
}

@media (min-width: 800px) {
    :root {
        --fs-h1: 4.5rem;
        --fs-h2: 3.75rem;
        --fs-h3: 1.5rem;
        --fs-body: 1.125rem;
    }
}

/* General styles */

/* endable this to add smooth scrolling */
/* html {
    scroll-behavior: smooth;
} */


body {
    background: var(--clr-light);
    color: var(--clr-dark);
    margin: 0;
    font-family: var(--ff-primary);
    font-size: var(--fs-body);
    line-height: 1.6;
}

section {
    padding: 5em 2em;
}

img {
    display: block;
    max-width: 100%;
}

strong {
    font-weight: var(--fw-bold)
}

:focus {
    outline: 3px solid var(--clr-accent);
    outline-offset: 3px;
}

/* Buttons */

.btn {
    display: inline-block;
    padding: .5em 2.5em;
    background: var(--clr-accent);
    color: var(--clr-dark);
    text-decoration: none;
    cursor: pointer;
    font-size: .8rem;
    text-transform: uppercase;
    letter-spacing: 2px;
    font-weight: var(--fw-bold);
    transition: transform 200ms ease-in-out;
}

.btn:hover {
    transform: scale(1.1);
}

/* Typography */

h1,
h2,
h3 {
    line-height: 1;
    margin: 0;
}

h1 {
    font-size: var(--fs-h1)
}

h2 {
    font-size: var(--fs-h2)
}

h3 {
    font-size: var(--fs-h3)
}


.section__title {
    margin-top: 4rem;
    margin-bottom: 3rem;
}

.section__title--intro {
    font-weight: var(--fw-reg);
}

.section__title--intro strong {
    display: block;
}

.section__subtitle {
    margin: 0;
    font-size: var(--fs-h3);
}

.section__subtitle--intro,
.section__subtitle--about {
    background: var(--clr-accent);
    padding: .25em 1em;
    font-family: var(--ff-secondary);
    margin-bottom: 1em;
}

.section__subtitle--work {
    color: var(--clr-accent);
    font-weight: var(--fw-bold);
    margin-bottom: 2em;
}

/* header */

header {
    display: flex;
    justify-content: space-between;
    padding: 1em;
}

.logo {
    max-width: 100px;
}

.nav {
    position: fixed;
    background: var(--clr-dark);
    color: var(--clr-light);
    top: 0;
    bottom: 0;
    left: 0;
    right: 0;
    z-index: 100;

    transform: translateX(100%);
    transition: transform 250ms cubic-bezier(.5, 0, .5, 1);
}

.nav__list {
    list-style: none;
    display: flex;
    height: 100%;
    flex-direction: column;
    justify-content: space-evenly;
    align-items: center;
    margin: 0;
    padding: 0;
}

.nav__link {
    color: inherit;
    font-weight: var(--fw-bold);
    font-size: var(--fs-h2);
    text-decoration: none;
}

.nav__link:hover {
    color: var(--clr-accent);
}

.nav-toggle {
    padding: .5em;
    background: transparent;
    border: 0;
    cursor: pointer;
    position: absolute;
    right: 1em;
    top: 1em;
    z-index: 1000;
}

.nav-open .nav {
    transform: translateX(0);
}

.nav-open .nav-toggle {
    position: fixed;
}

.nav-open .hamburger {
    transform: rotate(.625turn);
}

.nav-open .hamburger::before {
    transform: rotate(90deg) translateX(-6px);
}

.nav-open .hamburger::after {
    opacity: 0;
}






.hamburger {
    display: block;
    position: relative;
}

.hamburger,
.hamburger::before,
.hamburger::after {
    background: var(--clr-accent);
    width: 2em;
    height: 3px;
    border-radius: 1em;
    transition: transform 250ms ease-in-out;
}


.hamburger::before,
.hamburger::after {
    content: '';
    position: absolute;
    left: 0;
    right: 0;
}

.hamburger::before {
    top: 6px;
}

.hamburger::after {
    bottom: 6px;
}


/*  Intro section  */

.intro {
    position: relative;
}

.intro__img {
    box-shadow: var(--bs);
}

.section__subtitle--intro {
    display: inline-block;
}

@media (min-width: 600px) {
    .intro {
        display: grid;
        width: min-content;
        margin: 0 auto;
        grid-column-gap: 1em;
        grid-template-areas:
            "img title"
            "img subtitle";
        grid-template-columns: min-content max-content;
    }

    .intro__img {
        height:228px;
        grid-area: img;
        min-width: 294px;
        position: relative;
        z-index: -1;
    }

    .section__subtitle--intro {
        align-self: start;
        grid-column: -1 / 1;
        grid-row: 2;
        text-align: right;
        position: relative;
        left: -1.5em;
        width: calc(100% + 1.5em);
    }
}

.skillset {
    text-align: left;
    line-height: 3;
    margin-top: 1.5rem;
}

.service h3 {
    color: #f8333c
}

/*  My services section  */

.my-services {
    background-color: var(--clr-dark);
    background-image: url(../img/services-bg.jpg);
    background-size: cover;
    /* background-blend-mode: multiply; */
    color: var(--clr-light);
    text-align: center;
}

.section__title--services {
    color: white;
    position: relative;
}

.section__title--services::after {
    content: '';
    display: block;
    width: 2em;
    height: 1px;
    margin: 0.5em auto 1em;
    background: var(--clr-light);
    opacity: 0.25;
}

.services {
    margin-bottom: 4em;
}

.service {
    max-width: 500px;
    margin: 0 auto;
}

@media (min-width: 800px) {
    .services {
        display: flex;
        max-width: 1000px;
        margin-left: auto;
        margin-right: auto;
    }

    .service+.service {
        margin-left: 2em;
    }
}


.about-me {
    max-width: 1000px;
    margin: 0 auto;
}

.about-me__img {
    box-shadow: var(--bs);
}

@media (min-width: 600px) {
    .about-me {
        display: grid;
        grid-template-columns: 1fr 200px;
        grid-template-areas:
            "title img"
            "subtitle img"
            "text img";
        grid-column-gap: 2em;
    }

    .section__title--about {
        grid-area: title;
    }

    .section__subtitle--about {
        grid-column: 1 / -1;
        grid-row: 2;
        position: relative;
        left: -1em;
        width: calc(100% + 2em);
        padding-left: 1em;
        padding-right: calc(200px + 4em);
    }

    .about-me__img {
        grid-area: img;
        position: relative;
        z-index: 2;
        margin-top: 6rem;
        height: 65%;
    }
}

/* My Work */

.my-work {
    background-color: var(--clr-dark);
    color: var(--clr-light);
    text-align: center;
}

.portfolio {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
}

.portfolio__item {
    position: relative;
    /* background: var(--clr-accent); */
    overflow: hidden;
    box-shadow: -13px 18px 10px 4px #101010;
    margin:1rem;
}

.portfolio__img {
    height: 200px;
    transition:
        transform 750ms cubic-bezier(.5, 0, .5, 1),
        opacity 250ms linear;
}

.portfolio__item:focus {
    position: relative;
    z-index: 2;
}

.portfolio__img:hover,
.portfolio__item:focus .portfolio__img {
    transform: scale(1.2);
    opacity: .5;
}

@media (max-width: 800px) {
    .skillset {
        padding-left: 37%;
        margin-bottom: 2rem;
    }
}


.portfolio-item-caption{
    box-shadow: inset 0px 0px 2px 2px #eee;
    display: none;
    position: absolute;
    top: 45%;
    left:20%;
    width: 60%;
    text-align: center;
    color: white;
    z-index: 1;
}

/* footer */

.footer {
    background: #111;
    color: var(--clr-accent);
    text-align: center;
    padding: 2.5em 0;
    font-size: var(--fs-h3);

}

.footer a {
    color: inherit;
    text-decoration: none;
}

.footer__link.btn{
    color:black;
}

.footer__link {
    font-weight: var(--fw-bold);
}

.footer__link:hover,
.social-list__link:hover {
    opacity: .7;
}

.footer__link:hover {
    text-decoration: underline;
}

.social-list {
    list-style: none;
    display: flex;
    justify-content: center;
    margin: 2em 0 0;
    padding: 0;
}

.social-list__item {
    margin: 0 .5em;
}

.social-list__link {
    padding: .5em;
}


/* Individual portfolio item styles */

.portfolio-item-individual {
    padding: 0 2em 2em;
    max-width: 1000px;
    margin: 0 auto;
}

.portfolio-item-individual p {
    max-width: 600px;
    margin-left: auto;
    margin-right: auto;
}
div.portfolio-item-details{
    text-align:center;
    margin-top:6rem;
}
div.portfolio-item-details button{
    font-weight:600;
    width: 11rem;
    margin: 1rem;
    color: white;
    background: black;
    border-radius: 2rem;
    padding: 1rem;
}
@media (max-width:600px){
div.portfolio-item-details button{
    width: 9rem;
    margin: 0.5rem;
    padding: 0.5rem;
}
}
   </style>
</head>

<body>
    <header>
        <div class="logo">
            &lt;DevGurpreet&gt;
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
            Hi, I am <strong>Gurpreet Kaur</strong>
        </h1>
        <p class="section__subtitle section__subtitle--intro">FULLSTACK DEV</p>
        <img src="img/image0.png" alt="a picture" style="height: 325px; min-width: 250px;" class="intro__img">
    </section>


    <!-- My services -->
    <section class="my-services" id="services">
        <h2 class="section__title section__title--services">What I do</h2>
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

        <a href="#work" class="btn">My Work</a>
    </section>


    <!-- About me -->
    <section class="about-me" id="about">
        <h2 class="section__title section__title--about">Who I am</h2>
        <p class="section__subtitle section__subtitle--about">Designer & developer based out of Canada</p>

        <div class="about-me__body">
            <p>I developed a passion for coding while pursuing my Computer Applications degree in college,
             and since then it became a hobby. After graduating, I started working as a fullstack developer in a company. 
             I worked alongside senior developers with both frontend and backend technologies.</p>
            <p>Passionate about the work I do, I offer full attention, dedication, personalization and quality to the projects I build. 
            I believe that learning in the tech industry never really ends, and so, I am always looking for ways to expand my current skillset and gain new skills.</p>
            <a class="btn" style="margin-bottom:1rem" href="GurpreetKaurResume.pdf" target="blank">Check My Resume</a>
        </div>
        
        <img src="img/img1.png" alt="Jane leaning against a bus" class="about-me__img">
    </section>

    <!-- My Work -->
    <section class="my-work" id="work">
        <h2 class="section__title section__title--work">My work</h2>
        <p class="section__subtitle section__subtitle--work">A selection of my range of work</p>

        <div class="portfolio">
            <!-- Portfolio item 01 -->
            <a href="portfolio-item1.html" class="portfolio__item" onmouseover="showCaption(this)" onmouseout="hideCaption(this)">
                <div class="portfolio-item-caption">Ecommerce Site</div>
                <img src="img/book2.png" alt="" class="portfolio__img">
            </a>

            <!-- Portfolio item 02 -->
            <a href="portfolio-item2.html" class="portfolio__item" onmouseover="showCaption(this)" onmouseout="hideCaption(this)">
                <div class="portfolio-item-caption">Backend Panel</div>
                <img src="img/admin1.png" alt="" class="portfolio__img">
            </a>

            <!-- Portfolio item 03 -->
            <a href="portfolio-item3.html" class="portfolio__item" onmouseover="showCaption(this)" onmouseout="hideCaption(this)">
                <div class="portfolio-item-caption">React Game</div>
                <img src="img/tenzies.png" alt="" class="portfolio__img">
            </a>

            <!-- Portfolio item 04 -->
            <a href="portfolio-item4.html" class="portfolio__item" onmouseover="showCaption(this)" onmouseout="hideCaption(this)">
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