@extends('layout.main')
@section('page-container')
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
            <br /><button>Ajax</button><button>PHP</button><button>MySQL</button>
        </div>
    </div>
    
@endsection
