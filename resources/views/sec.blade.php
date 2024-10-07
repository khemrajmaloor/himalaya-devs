
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dev Gurpreet Kaur</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/7.0.0/normalize.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css"
        integrity="sha256-46qynGAkLSFpVbEBog43gvNhfrOj+BmwXdxFgVK/Kvc=" crossorigin="anonymous" />

    <!-- Update these with your own fonts -->
    <link href="https://fonts.googleapis.com/css?family=Lora:400,700|Roboto+Slab:400,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="css/style.css">
    @vite(['resources/css/app.css', 'resources/js/app.js']);
</head>

<body>
    <header>
        <div class="logo">
            &lt;DevGurpreet&gt;
        </div>
        <button class="nav-toggle" aria-label="toggle navigation">
            <span class="hamburger"></span>
        </button>
        <nav class="nav">
            <ul class="nav__list">
                <li class="nav__item"><a href="index.html" class="nav__link">Home</a></li>
                <li class="nav__item"><a href="index.html#services" class="nav__link">My Services</a></li>
                <li class="nav__item"><a href="index.html#about" class="nav__link">About me</a></li>
                <li class="nav__item"><a href="index.html#work" class="nav__link">My Work</a></li>
            </ul>
        </nav>
    </header>


    <section class="intro">
        <h1 class="section__title section__title--intro">
            Welcome <strong> to BookStore</strong>
        </h1>
        <p class="section__subtitle section__subtitle--intro">An Ecommerce Website</p>
        <img src="img/book1.png" alt="" class="intro__img">
    </section>

    <div class="portfolio-item-individual">
        <p>This is a fully functional ecommerce website for selling books built with PHP. It enables user to login and
            register, change profile, view products of different categories, add to cart and checkout, to name a few.</p>
   
            <!-- <img src="img/book2.png" alt=""> -->
        
        <iframe style="width: 100%; height: 35em;" src="https://bookstore.devgurpreet.com/"></iframe>

        <div class="portfolio-item-details">
            <div style="text-align:center" class="section__subtitle section__subtitle--intro">Technologies used</div><br>
           <button>HTML</button><button>Bootstrap</button><button>JQuery</button>
           <br/><button>Ajax</button><button>PHP</button><button>MySQL</button>
        </div>
    </div>


    <!-- Footer -->
    <footer class="footer">
        <a href="https://bookstore.devgurpreet.com/" target="_blank" class="footer__link">Check Live Site</a>
        <ul class="social-list">
            <li class="social-list__item">
                <a class="social-list__link" target="_blank" href="https://github.com/preetguraya/bookstore">
                    <i class="fab fa-github"></i>
                    Check Code
                </a>
            </li>
        </ul>
    </footer>


    <script src="js/index.js"></script>

</body>

</html>