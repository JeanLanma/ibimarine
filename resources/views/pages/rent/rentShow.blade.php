@extends('layout.template')

@section('pre-css')
        <!-- Slide -->
        <link rel="stylesheet" href="./vendor/swiper/swiper-bundle.min.css"/>
        <!-- Calendar theme -->
        <link rel="stylesheet" href="{{ asset('css/calendar.css') }}">
@endsection

@section('title', 'Rent Show')

@section('hero')
    
    <!-- Hero -->
    <div class="hero__content">
        <div class="hero-container hero-container-text">
            <h1 class="margin-1 text-title text-center text-upper text-bold text-color-black">Alquiler de Yates</h1>
        </div>
    </div>
    <!-- Dark Overlay container-->
    <div id="overlay__request_container"></div>
    <div id="overlay__photos_container"></div>
@endsection

@section('content')
    <!-- Content -->
    <div class="container">
        <div class="slide_show">
            <div class="swiper main_img" id="mainSlideImg">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <img class="img-fluid" src="./img/rent/rent-01.jpg" alt="">
                    </div>
                    
                    <div class="swiper-slide">
                        <img class="img-fluid" src="./img/rent/rent-02.jpeg" alt="">
                    </div>
                    <div class="swiper-slide">
                        <img class="img-fluid" src="./img/rent/rent-03.jpeg" alt="">
                    </div>
                    <div class="swiper-slide">
                        <img class="img-fluid" src="./img/rent/rent-01.jpg" alt="">
                    </div>
                    <div class="swiper-slide">
                        <img class="img-fluid" src="./img/rent/rent-02.jpeg" alt="">
                    </div>
                    <div class="swiper-slide">
                        <img class="img-fluid" src="./img/rent/rent-03.jpeg" alt="">
                    </div>
                </div>
            </div>

            <div class="slide_carousel">
                <div class="arrow" id="arrowPrev">
                    <svg style="width: 1rem; height: auto; margin: 0 5px" xmlns="http://www.w3.org/2000/svg" xmlns:bx="https://boxy-svg.com" viewBox="43.026 0 161.967 490" width="161.967" height="490">
                        <polyline style="stroke: rgb(60, 64, 69); fill: rgb(60, 64, 69);" points="204.993 0.285 204.993 490 43.026 244.36 204.72 0" bx:origin="0.525 0.496"/>
                    </svg>
                </div>
                <div class="swiper thumbnails-row" thumbsSlider="">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide thumbnails">
                            <img class="img-thumbnail " src="./img/rent/rent-01.jpg" alt="thumbnail">
                        </div>
                        <div class="swiper-slide thumbnails">
                            <img class="img-thumbnail " src="./img/rent/rent-02.jpeg" alt="thumbnail">
                        </div>
                        <div class="swiper-slide thumbnails">
                            <img class="img-thumbnail " src="./img/rent/rent-03.jpeg" alt="thumbnail">
                        </div>
                        <div class="swiper-slide thumbnails">
                            <img class="img-thumbnail " src="./img/rent/rent-01.jpg" alt="thumbnail">
                        </div>
                        <div class="swiper-slide thumbnails">
                            <img class="img-thumbnail " src="./img/rent/rent-02.jpeg" alt="thumbnail">
                        </div>
                        <div class="swiper-slide thumbnails">
                            <img class="img-thumbnail " src="./img/rent/rent-03.jpeg" alt="thumbnail">
                        </div>
                    </div>
                </div>
                <div class="arrow" id="arrowNext">
                    <svg style="width: 1rem; height: auto; margin: 0 5px" xmlns="http://www.w3.org/2000/svg" xmlns:bx="https://boxy-svg.com" viewBox="51.124 -3.92 161.967 490" width="161.967" height="490">
                        <polyline style="stroke: rgb(60, 64, 69); fill: rgb(60, 64, 69);" points="204.993 0.285 204.993 490 43.026 244.36 204.72 0" transform="matrix(-1, 0, 0, -1, 256.117344, 486.079994)" bx:origin="0.525 0.496"/>
                      </svg>
                </div>
            </div>
        </div>
        
        <div class="yacht__info container-sm">
            <div class="yacht__title">
                <h2 class="bg-golden text-upper text-center">SESSA MARINE C44</h2>
            </div>

            <div class="yacht__icons">
                <div class="yacht__feature_icon text-center">
                    <img class="img-fluid" src="./img/yacht_icons/users.png" alt="feature icon">
                    <span class="yacht__icon-caption text-muted">11 + 1</span>
                </div>
                <div class="yacht__feature_icon text-center">
                    <img class="img-fluid" src="./img/yacht_icons/captain.png" alt="feature icon">
                    <span class="yacht__icon-caption text-muted">Captain</span>
                </div>
                <div class="yacht__feature_icon text-center">
                    <img class="img-fluid" src="./img/yacht_icons/air-conditioner.png" alt="feature icon">
                    <span class="yacht__icon-caption text-muted">Air</span>
                </div>
                <div class="yacht__feature_icon text-center">
                    <img class="img-fluid" src="./img/yacht_icons/drinks.png" alt="feature icon">
                    <span class="yacht__icon-caption text-muted">Drink</span>
                </div>
                <div class="yacht__feature_icon text-center">
                    <img class="img-fluid" src="./img/yacht_icons/sports.png" alt="feature icon">
                    <span class="yacht__icon-caption text-muted">Sports</span>
                </div>
                <div class="yacht__feature_icon text-center">
                    <img class="img-fluid" src="./img/yacht_icons/shower.png" alt="feature icon">
                    <span class="yacht__icon-caption text-muted">Shower</span>
                </div>
                <div class="yacht__feature_icon text-center">
                    <img class="img-fluid" src="./img/yacht_icons/music.png" alt="feature icon">
                    <span class="yacht__icon-caption text-muted">Music</span>
                </div>
            </div>

            <div class="yacht__description text-center text-color-black">
                <p>
                    Cras Venenatis porta ligula ses suscipit.
                    Ut in vehicula ex. Vivamus fermentum
                    nunc mi, ac codimentum magna 
                    porttitor faucibus. Maecenas vel odio
                    nec arcu iaculis convallis.
                </p>
                <p>
                    Suspendisse in risus sem. Donec eu
                    dolor facilis, lacinia justo sit amet,
                    condimentum leo. integer aliquam
                    tempor rhoncus.
                </p>
            </div>

            <div class="yacht__features-table">
                <ul class="yacht__table">
                    <li class="yacht__item text-color-black">
                        <span>length</span>
                        <span>14 m</span>
                    </li>
                    <li class="yacht__item text-color-black">
                        <span>Beam</span>
                        <span>3,99 m</span>
                    </li>
                    <li class="yacht__item text-color-black">
                        <span>Engines</span>
                        <span>2 x 500 Hp Volvo IPS</span>
                    </li>
                    <li class="yacht__item text-color-black">
                        <span>Cruicing Velocity</span>
                        <span>-</span>
                    </li>
                    <li class="yacht__item text-color-black">
                        <span>Max Speed</span>
                        <span>35N</span>
                    </li>
                    <li class="yacht__item text-color-black">
                        <span>Fuel Consumption</span>
                        <span>200 	&euro; / H</span>
                    </li>
                    <li class="yacht__item text-color-black">
                        <span>Pax</span>
                        <span>11 + 1 Crew</span>
                    </li>
                    <li class="yacht__item text-color-black">
                        <span>Bathroom</span>
                        <span>2</span>
                    </li>
                    <li class="yacht__item text-color-black">
                        <span>Cabins</span>
                        <span>2</span>
                    </li>
                    <li class="yacht__item text-color-black">
                        <span>Year</span>
                        <span>2018</span>
                    </li>
                    <li class="yacht__item text-color-black">
                        <span>Port</span>
                        <span>Marina Botafoch</span>
                    </li>
                    <li class="yacht__item text-color-black">
                        <span>Model</span>
                        <span>Sessa Marine c44</span>
                    </li>
                </ul>
            </div>
        </div>

        <div class="reservation__calendar">

            <h2 class="text-center text-color-black-muted text-upper">Fecha de reserva</h2>

            <div id="reservationCalendar"></div>
            <div class="calendar__pricing text-color-white">
                <div class="price-per-day bg-golden">
                    <div class="price">1.800&euro; / Dia <span>(Jun o Sep)</span></div>
                    <div class="price-taxes"><span>+ 21%</span> IVA + Combustible</div>
                </div>
                <span class="hr-spacer"></span>
                <div class="price-per-day bg-gray">
                    <div class="price">1.800&euro; / Dia <span>(Jun o Sep)</span></div>
                    <div class="price-taxes"><span>+ 21%</span> IVA + Combustible</div>
                </div>
            </div>
        </div>

        <div class="reservation__form text-color-black">
            <form action="#">
                <div class="form__input">
                    <label for="name">Nombre</label>
                    <input type="text">
                </div>
                <div class="form__input">
                    <label for="email">Correo electrónico</label>
                    <input type="email">
                </div>
                <div class="form__input">
                    <label for="phone">Telefono</label>
                    <input type="text">
                </div>

                <div class="form__input text-center">
                    <input id="send_reservation_request" class="button button-golden" type="submit" value="Enviar Peticion">
                </div>
            </form>
        </div>
    </div>

    <!-- Similar Boats slide -->      
    <div class="hero__content similar__boats">
        <div class="hero-container">

            <h4 class="margin-1 text-title text-center text-upper text-bold text-color-black">Embarcaciones Similares</h4>
            
            <div class="swiper-similar-boats">
                <div class="swiper-wrapper">
                    <!-- similar boat card -->
                    <div class="swiper-slide similar-boat-card">
                        <a href="#">
                            <div class="similar-boat-thumbnails">
                                <img src="/img/rent/rent-02.jpeg" alt="yacht n">
                            </div>
                            <div class="similar-boat-title">
                                <p class="text-center text-color-black">Yacht 42</p>
                            </div>
                        </a>
                    </div>
                    <!-- similar boat card -->
                    <div class="swiper-slide similar-boat-card">
                        <a href="#">
                            <div class="similar-boat-thumbnails">
                                <img src="/img/rent/rent-04.jpeg" alt="">
                            </div>
                            <div class="similar-boat-title">
                                <p class="text-center text-color-black">Cranchi 41</p>
                            </div>
                        </a>
                    </div>
                    <!-- similar boat card -->
                    <div class="swiper-slide similar-boat-card">
                        <a href="#">
                            <div class="similar-boat-thumbnails">
                                <img src="/img/home/home-04.jpg" alt="">
                            </div>
                            <div class="similar-boat-title">
                                <p class="text-center text-color-black">Yacht 12</p>
                            </div>
                        </a>
                    </div>
                    <!-- similar boat card -->
                    <div class="swiper-slide similar-boat-card">
                        <a href="#">
                            <div class="similar-boat-thumbnails">
                                <img src="/img/rent/rent-01.jpg" alt="">
                            </div>
                            <div class="similar-boat-title">
                                <p class="text-center text-color-black">Yacht 12</p>
                            </div>
                        </a>
                    </div>
                    <!-- similar boat card -->
                    <div class="swiper-slide similar-boat-card">
                        <a href="#">
                            <div class="similar-boat-thumbnails">
                                <img src="/img/rent/rent-02.jpeg" alt="">
                            </div>
                            <div class="similar-boat-title">
                                <p class="text-center text-color-black">Yacht 12</p>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>    
@endsection

@section('js')
<script src="./vendor/swiper/swiper-bundle.min.js"></script>
<script src="./js/slides.js"></script>
<script src="./js/calendar.js"></script>

<script>

    // Global HTML Containers
    const DocumentBody = document.querySelector('body');
    const requestOverlay = document.querySelector('#overlay__request_container');
    const photosOverlay = document.querySelector('#overlay__photos_container');
    
    /*  Modal OVERLAY request */

    let overlayResuqest = `
        <div class="overlay__request__dark" id="overlay__request">
            <div class="overlay__dark_content">
                <div class="overlay__section">
                    <div class="head__logo_overlay-request">
                        <img class="img-fluid" src="./img/logoibimarine_2.png" alt="Logo Ibimarine">
                    </div>
                </div>
                <div class="overlay__section margin-vertical-2">
                    <div class="text-color-white text-center overlay__request_text">
                        <h4 class="margin-vertical-2 text-bold">¡Gracias por su petición!</h4>
                        <p>En menos de 12 horas,
                            nuestros comerciales
                            contactarán con Usted
                            para finalizar la reserva.
                        </p>
                    </div>
                </div>
                <div class="overlay__section margin-vertical-4">
                    <button id="close__overlay_dark" class="button button-golden button-lg">Cerrar</button>
                </div>
            </div>
        </div>
    `;

    requestOverlay.innerHTML = overlayResuqest;

    // Close request overlay
    document.querySelector('#close__overlay_dark').addEventListener('click', function(e){
        DocumentBody.style.overflow = 'visible';
        document.querySelector('#overlay__request').style.display = 'none'
    })

    // open request overlay 
    document.querySelector('#send_reservation_request').addEventListener('click', function(e){
        e.preventDefault();
        DocumentBody.style.overflow = 'hidden'
        document.querySelector('#overlay__request').style.display = 'block';
    })

    /*  Modal OVERLAY Photos */

    let overlayPhotos =`
    <div class="overlay__request__dark" id="overlay__photos">
        <div class="overlay__dark_content">
            <div class="overlay__section-fullwidth overlay__photo_hero margin-bottom-2 margin-top-4">
                <div class="overlay__photos_main margin-top-2">
                    <div class="arrow" id="photosArrowPrev">
                        <svg style="width: 1rem; height: auto; margin: 0 5px" xmlns="http://www.w3.org/2000/svg" xmlns:bx="https://boxy-svg.com" viewBox="43.026 0 161.967 490" width="161.967" height="490">
                            <polyline style="stroke: rgb(255, 255, 255); fill: rgb(255, 255, 255);" points="204.993 0.285 204.993 490 43.026 244.36 204.72 0" bx:origin="0.525 0.496"/>
                        </svg>
                    </div>
                    <div class="arrow" id="photosArrowNext">
                        <svg style="width: 1rem; height: auto; margin: 0 5px" xmlns="http://www.w3.org/2000/svg" xmlns:bx="https://boxy-svg.com" viewBox="51.124 -3.92 161.967 490" width="161.967" height="490">
                            <polyline style="stroke: rgb(255, 255, 255); fill: rgb(255, 255, 255);" points="204.993 0.285 204.993 490 43.026 244.36 204.72 0" transform="matrix(-1, 0, 0, -1, 256.117344, 486.079994)" bx:origin="0.525 0.496"/>
                        </svg>
                    </div>
                    <img id="overlay__photo_main-elment" src="./img/rent/rent-01.jpg" alt="">
                </div>
            </div>
            <div class="overlay__section">
                <div class="overlay__photos_thumbnails">
                    <img class="img-fluid" src="./img/rent/rent-01.jpg" alt="">
                    <img class="img-fluid" src="./img/rent/rent-02.jpeg" alt="">
                    <img class="img-fluid" src="./img/rent/rent-03.jpeg" alt="">
                    <img class="img-fluid" src="./img/rent/rent-01.jpg" alt="">
                    <img class="img-fluid" src="./img/rent/rent-02.jpeg" alt="">
                    <img class="img-fluid" src="./img/rent/rent-03.jpeg" alt="">
                    <img class="img-fluid" src="./img/rent/rent-02.jpeg" alt="">
                    <img class="img-fluid" src="./img/rent/rent-03.jpeg" alt="">
                </div>
            </div>
            <div class="overlay__section margin-vertical-4">
                <button id="close__overlay_dark_photos" class="button button-golden button-lg">Cerrar</button>
            </div>
        </div>
    </div>
    `;

    photosOverlay.innerHTML = overlayPhotos;
    
    const showPhotosBtn = document.querySelector('#mainSlideImg');
    
    showPhotosBtn.addEventListener('click', function(e){
        DocumentBody.style.overflow = 'hidden';
        document.querySelector('#overlay__photos').style.display = 'block';
    })
    document.querySelector('#close__overlay_dark_photos').addEventListener('click', function(e){
        DocumentBody.style.overflow = 'visible';
        document.querySelector('#overlay__photos').style.display = 'none';
    })

    const overlayPhotosMainImg = document.querySelector('#overlay__photo_main-elment');
    const overlayPhotosThumbnails = document.querySelector('.overlay__photos_thumbnails');

    overlayPhotosThumbnails.addEventListener('click', function(e){
        console.log(e.target);
        if(e.target.nodeName === 'IMG'){
            overlayPhotosMainImg.src = e.target.src;
        }
    });
</script>
@endsection