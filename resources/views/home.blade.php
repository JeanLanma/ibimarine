@extends('layout.template')

@section('title', 'Home')

@section('hero')
<!-- Hero -->
<div class="hero__content">
    <div class="hero-container padding-0">
        <img class="img-fluid" src="img/home/home-06.jpg" alt="Hero Image">
    </div>
</div>
@endsection

@section('content')
{{-- Contact Section --}}
<div class="contact__section d-lg">
    <p class="contact__text text-color-main">!Contacta con nosotros¡</p>
    <div class="contact__numbers">
        <div class="contact__number">
            <div class="contact__number_img"><img class="img-fluid" src="./img/lang_es.png" alt=""></div>
            <p class="contact__phone">+34 650 020 215</p>
        </div>
        <span>|</span>
        <div class="contact__number">
            <div class="contact__number_img"><img class="img-fluid" src="./img/lang_en.png" alt=""></div>
            <p class="contact__phone">+34 650 020 215</p>
        </div>
    </div>
</div>

<!-- Section Content -->
<div class="content">
    <div class="container home__grid">
        <!-- Main Card -->
        <a class="card" href="{{route('rent')}}">
        <div >
            <div class="card-head">
                <div class="card__img ">
                    <img class="img-fluid smooth-top-corners" src="img/home/home-04.jpg" alt="card image">
                </div>
                <div class="card__title">
                    <p class="text-center text-upper">Alquiler de yates</p>
                </div>
            </div>
            <div class="card-body-no-border d-lg">
                <div class="card__text text-center margin-bottom-1">
                    <p class="text-color-black margin-vertical-1 padding-horizontal-1">
                        Cras venenatis porta ligula sed suscipit.
                        Ut in vehicula ex. Vivamus fermentum nunc mi,
                        ac condimentum magna porttitor faucibus.
                        Vestibulum ante ipsum primis in faucibus
                        orci luctus et ultrices posuere cubila curae;
                        sed non lorem at felis tincidunt lacinia nec
                        id leo fermentum quam gravida ut.
                    </p>
                </div>
            </div>
        </div>
        </a>

        <a class="card" href="{{route('sale')}}">
        <div>
            <div class="card-head">
                <div class="card__img">
                    <img class="img-fluid smooth-top-corners" src="img/home/home-05.jpg" alt="card image">
                </div>
                <div class="card__title">
                    <p class="text-center text-upper">Venta de yates</p>
                </div>
            </div>
            <div class="card-body-no-border d-lg">
                <div class="card__text text-center margin-bottom-1">
                    <p class="text-color-black margin-vertical-1 padding-horizontal-1">
                        Cras venenatis porta ligula sed suscipit.
                        Ut in vehicula ex. Vivamus fermentum nunc mi,
                        ac condimentum magna porttitor faucibus.
                        Vestibulum ante ipsum primis in faucibus
                        orci luctus et ultrices posuere cubila curae;
                        sed non lorem at felis tincidunt lacinia nec
                        id leo fermentum quam gravida ut.
                    </p>
                </div>
            </div>
        </div>
        </a>

        <a class="card" href="{{route('toys')}}">
        <div>
            <div class="card-head">
                <div class="card__img">
                    <img class="img-fluid smooth-top-corners" src="img/home/home-03.jpg" alt="card image">
                </div>
                <div class="card__title">
                    <p class="text-center text-upper">Complementos Nauticos</p>
                </div>
            </div>
            <div class="card-body-no-border d-lg">
                <div class="card__text text-center margin-bottom-1">
                    <p class="text-color-black margin-vertical-1 padding-horizontal-1">
                        Cras venenatis porta ligula sed suscipit.
                        Ut in vehicula ex. Vivamus fermentum nunc mi,
                        ac condimentum magna porttitor faucibus.
                        Vestibulum ante ipsum primis in faucibus
                        orci luctus et ultrices posuere cubila curae;
                        sed non lorem at felis tincidunt lacinia nec
                        id leo fermentum quam gravida ut.
                    </p>
                </div>
            </div>
        </div>
        </a>

        <a class="card" href="{{route('events')}}">
        <div>
            <div class="card-head">
                <div class="card__img">
                    <img class="img-fluid smooth-top-corners" src="img/home/home-01.jpg" alt="card image">
                </div>
                <div class="card__title">
                    <p class="text-center text-upper">Eventos</p>
                </div>
            </div>
            <div class="card-body-no-border d-lg">
                <div class="card__text text-center margin-bottom-1">
                    <p class="text-color-black margin-vertical-1 padding-horizontal-1">
                        Cras venenatis porta ligula sed suscipit.
                        Ut in vehicula ex. Vivamus fermentum nunc mi,
                        ac condimentum magna porttitor faucibus.
                        Vestibulum ante ipsum primis in faucibus
                        orci luctus et ultrices posuere cubila curae;
                        sed non lorem at felis tincidunt lacinia nec
                        id leo fermentum quam gravida ut.
                    </p>
                </div>
            </div>
        </div>
        </a>

        <a class="card" href="{{route('news')}}">
        <div>
            <div class="card-head">
                <div class="card__img">
                    <img class="img-fluid smooth-top-corners" src="img/home/home-02.jpg" alt="card image">
                </div>
                <div class="card__title">
                    <p class="text-center text-upper">Noticias y LifeStyle</p>
                </div>
            </div>
            <div class="card-body-no-border d-lg">
                <div class="card__text text-center margin-bottom-1">
                    <p class="text-color-black margin-vertical-1 padding-horizontal-1">
                        Cras venenatis porta ligula sed suscipit.
                        Ut in vehicula ex. Vivamus fermentum nunc mi,
                        ac condimentum magna porttitor faucibus.
                        Vestibulum ante ipsum primis in faucibus
                        orci luctus et ultrices posuere cubila curae;
                        sed non lorem at felis tincidunt lacinia nec
                        id leo fermentum quam gravida ut.
                    </p>
                </div>
            </div>
        </div>
        </a>
        <a class="card" href="{{route('contact')}}">
        <div>
            <div class="card-head">
                <div class="card__img">
                    <img class="img-fluid smooth-top-corners" src="img/contact/contact.jpg" alt="card image">
                </div>
                <div class="card__title">
                    <p class="text-center text-upper">Contacto</p>
                </div>
            </div>
            <div class="card-body-no-border d-lg">
                <div class="card__text text-center margin-bottom-1">
                    <p class="text-color-black margin-vertical-1 padding-horizontal-1">
                        Cras venenatis porta ligula sed suscipit.
                        Ut in vehicula ex. Vivamus fermentum nunc mi,
                        ac condimentum magna porttitor faucibus.
                        Vestibulum ante ipsum primis in faucibus
                        orci luctus et ultrices posuere cubila curae;
                        sed non lorem at felis tincidunt lacinia nec
                        id leo fermentum quam gravida ut.
                    </p>
                </div>
            </div>
        </div>
        </a>
        <!-- /Cards -->
    </div>
</div>

@endsection