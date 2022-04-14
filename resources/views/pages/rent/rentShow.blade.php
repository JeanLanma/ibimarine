@extends('layout.template')

@section('title', 'Rent Show')

@section('pre-css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/js/all.min.js" integrity="sha512-6PM0qYu5KExuNcKt5bURAoT6KCThUmHRewN3zUFNaoI6Di7XJPTMoT6K0nsagZKk2OB4L7E3q1uQKHNHd4stIQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<link rel="stylesheet" href="/vendor/swiper/swiper-bundle.min.css"/>

@endsection

@section('hero')
<section class="mt-5">
    <div class="border-y-4 border-old-gold py-2  lg:px-16 lg:mx-auto lg:w-max">
       <p class="lg:hidden text-center text-old-black text-2xl uppercase font-bold">Alquiler de Yates</p>
       <p class="hidden lg:block text-center text-old-black text-2xl uppercase font-bold">Sessa Marine c44</p>
    </div>
</section>
@endsection

@section('content')

{{-- OVERLAYS --}}
    <!-- Request - overlay -->
    <div id="request_overlay" class="hidden fixed top-0 left-0 z-10  bg-old-black/95  h-screen w-full">

        <!-- Overlay content -->
        <div class="h-screen flex flex-col items-center text-center">
            <div>
                <div class="w-56 mt-40 mx-auto">
                    <img src="/img/logoibimarine_2.png" alt="Logo Ibimarine">
                </div>
            </div>

            <div class="text-white text-center">
                <div class="w-4/5 mx-auto my-10">
                    <p class="font-bold text-2xl lg:text-3xl my-5 lg:my-8">¡Gracias por su Petición!</p>
                    <p class="text-xl lg:text-3xl lg:w-[50%] mx-auto">En menos de 12 horas,
                        nuestros comerciales
                        contactaran con Usted
                        para finalizar la reserva
                    </p>
                </div>

            </div>

            <div>
                <button id="request_close" class="btn-gold">Cerrar</button>
            </div>
        </div>

    </div>
    <!-- Photos - overlay -->
    <div id="photos_overlay" class="hidden fixed top-0 left-0 z-10  bg-old-black/95  h-screen w-full">

        <!-- Overlay content -->
        <div class="h-screen flex flex-col items-center text-center">
            <div>
                <div class="xl:w-3/5 mx-auto mt-32 lg:mt-16">
                    <div class="h-56 xl:h-[420px] overflow-y-hidden">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <img src="/img/home/home-04.jpg" alt="Hero Slider Image">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="text-white text-center">
                <div class="xl:w-3/5 xl:mx-auto p-5 grid grid-cols-3 lg:grid-cols-6 gap-2">
                    <div>
                        <img src="/img/rent/rent-01.jpg" alt="">
                    </div>
                    <div>
                        <img src="/img/rent/rent-01.jpg" alt="">
                    </div>
                    <div>
                        <img src="/img/rent/rent-01.jpg" alt="">
                    </div>
                    <div>
                        <img src="/img/rent/rent-01.jpg" alt="">
                    </div>
                    <div>
                        <img src="/img/rent/rent-01.jpg" alt="">
                    </div>
                    <div>
                        <img src="/img/rent/rent-01.jpg" alt="">
                    </div>
                </div>
            </div>

            <div>
                <button id="photos_close" class="btn-gold">Cerrar</button>
            </div>
        </div>

    </div>

    <div class="container md:mx-auto">

        <!-- Section Slides -->
        <div>

            <!-- Slider Hero Image -->
            <div id="photos_open" class="md:w-4/5 lg:md:w-4/5 mx-auto">
                <div class="swiper main_img h-56 lg:h-96 md:h-80 overflow-y-hidden md:rounded-t-xl">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <img src="/img/home/home-04.jpg" alt="Hero Slider Image">
                        </div>

                        <div class="swiper-slide">
                            <img  src="/img/rent/rent-02.jpeg" alt="">
                        </div>
                        <div class="swiper-slide">
                            <img  src="/img/rent/rent-03.jpeg" alt="">
                        </div>
                        <div class="swiper-slide">
                            <img  src="/img/rent/rent-01.jpg" alt="">
                        </div>
                        <div class="swiper-slide">
                            <img  src="/img/rent/rent-02.jpeg" alt="">
                        </div>
                        <div class="swiper-slide">
                            <img  src="/img/rent/rent-03.jpeg" alt="">
                        </div>
                    </div>
                </div>
            </div>

            <!-- Slider thumbnails Carousel -->
            <div class="md:w-[70%] flex mx-auto justify-center items-center my-2">
                <div class="arrow w-1/12 h-6 md:h-12" id="arrowPrev">
                    <svg class="w-full h-full" xmlns="http://www.w3.org/2000/svg" xmlns:bx="https://boxy-svg.com" viewBox="43.026 0 161.967 490" width="161.967" height="490">
                        <polyline style="stroke: rgb(60, 64, 69); fill: rgb(60, 64, 69);" points="204.993 0.285 204.993 490 43.026 244.36 204.72 0" bx:origin="0.525 0.496"/>
                    </svg>
                </div>
                <div class="swiper thumbnails-row mx-auto w-10/12" thumbsSlider="">
                    <div class="swiper-wrapper flex">
                        <div class="swiper-slide max-h-14 lg:max-h-[4.5rem] xl:max-h-[100px] overflow-y-hidden">
                            <img class="object-cover" src="/img/rent/rent-01.jpg" alt="thumbnail">
                        </div>
                        <div class="swiper-slide max-h-14 lg:max-h-[4.5rem] xl:max-h-[100px] overflow-y-hidden">
                            <img class="object-cover" src="/img/rent/rent-02.jpeg" alt="thumbnail">
                        </div>
                        <div class="swiper-slide max-h-14 lg:max-h-[4.5rem] xl:max-h-[100px] overflow-y-hidden">
                            <img class="object-cover" src="/img/rent/rent-03.jpeg" alt="thumbnail">
                        </div>
                        <div class="swiper-slide max-h-14 lg:max-h-[4.5rem] xl:max-h-[100px] overflow-y-hidden">
                            <img class="object-cover" src="/img/rent/rent-01.jpg" alt="thumbnail">
                        </div>
                        <div class="swiper-slide max-h-14 lg:max-h-[4.5rem] xl:max-h-[100px] overflow-y-hidden">
                            <img class="object-cover" src="/img/rent/rent-02.jpeg" alt="thumbnail">
                        </div>
                        <div class="swiper-slide max-h-14 lg:max-h-[4.5rem] xl:max-h-[100px] overflow-y-hidden">
                            <img class="object-cover" src="/img/rent/rent-03.jpeg" alt="thumbnail">
                        </div>
                    </div>
                </div>
                <div class="arrow w-1/12 h-6 xl:h-12" id="arrowNext">
                    <svg class="w-full h-full" xmlns="http://www.w3.org/2000/svg" xmlns:bx="https://boxy-svg.com" viewBox="51.124 -3.92 161.967 490" width="161.967" height="490">
                        <polyline style="stroke: rgb(60, 64, 69); fill: rgb(60, 64, 69);" points="204.993 0.285 204.993 490 43.026 244.36 204.72 0" transform="matrix(-1, 0, 0, -1, 256.117344, 486.079994)" bx:origin="0.525 0.496"/>
                      </svg>
                </div>
            </div>
        </div>

        <!-- Section Boat Title on Mobile -->

        <div class="lg:hidden">
            <div class="bg-old-gold text-center w-11/12 mx-auto py-1 mt-6">
                <h1 class="text-white text-xl font-bold">Sessa Marine c44</h1>
            </div>
        </div>

        <!-- Section Boat Features -->
        <div class="">

            <!-- yacht feauture icons -->
            <div class="flex justify-evenly xl:justify-center xl:gap-4 px-6 my-3 opacity-50">

                <div class="w-7 lg:w-14 flex flex-col justify-center items-center text-center">
                    <img class="" src="/img/yacht_icons/users.png" alt="feature icon">
                    <span class="yacht__icon-caption text-xs">11+1</span>
                </div>
                <div class="w-7 lg:w-14 flex flex-col justify-center items-center text-center">
                    <img class="" src="/img/yacht_icons/captain.png" alt="feature icon">
                    <span class="yacht__icon-caption text-xs">Captain</span>
                </div>
                <div class="w-7 lg:w-14 flex flex-col justify-center items-center text-center">
                    <img class="" src="/img/yacht_icons/air-conditioner.png" alt="feature icon">
                    <span class="yacht__icon-caption text-xs">Air</span>
                </div>
                <div class="w-7 lg:w-14 flex flex-col justify-center items-center text-center">
                    <img class="img-fluid" src="/img/yacht_icons/drinks.png" alt="feature icon">
                    <span class="yacht__icon-caption text-xs">Drink</span>
                </div>
                <div class="w-7 lg:w-14 flex flex-col justify-center items-center text-center">
                    <img class="img-fluid" src="/img/yacht_icons/sports.png" alt="feature icon">
                    <span class="yacht__icon-caption text-xs">Sports</span>
                </div>
                <div class="w-7 lg:w-14 flex flex-col justify-center items-center text-center">
                    <img class="img-fluid" src="/img/yacht_icons/shower.png" alt="feature icon">
                    <span class="yacht__icon-caption text-xs">Shower</span>
                </div>
                <div class="w-7 lg:w-14 flex flex-col justify-center items-center text-center">
                    <img class="img-fluid" src="/img/yacht_icons/music.png" alt="feature icon">
                    <span class="yacht__icon-caption text-xs">Music</span>
                </div>

            </div>
            
            <!-- yacht description -->
            <div class="mx-auto xl:text-xl xl:w-1/2 px-6 text-center text-old-black">
                <p> 
                    Cras Venenatis porta ligula ses suscipit.
                    Ut in vehicula ex. Vivamus fermentum
                    nunc mi, ac codimentum magna 
                    porttitor faucibus. Maecenas vel odio
                    nec arcu iaculis convallis.
                    <br>
                    <br>
                    Suspendisse in risus sem. Donec eu
                    dolor facilis, lacinia justo sit amet,
                    condimentum leo. integer aliquam
                    tempor rhoncus.
                </p>
            </div>
            <!-- yacht feature table -->
            <div class="mx-auto xl:w-1/2 px-6 ">
                <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                        <table class="min-w-full">
                        <tbody table class="min-w-full">

                            <tr class="even:bg-gray-1 flex justify-between w-full px-3">
                                <td class="xl:text-xl text-sm text-old-black font-light">
                                Length
                                </td>
                                <td class="xl:text-xl text-sm text-old-black font-light">
                                14 m
                                </td>
                            </tr>

                            <tr class="even:bg-gray-1 flex justify-between w-full px-3">
                                <td class="xl:text-xl text-sm text-old-black font-light">
                                Beam
                                </td>
                                <td class="xl:text-xl text-sm text-old-black font-light">
                                3,99 m
                                </td>
                            </tr>

                            <tr class="even:bg-gray-1 flex justify-between w-full px-3">
                                <td class="xl:text-xl text-sm text-old-black font-light">
                                Engines
                                </td>
                                <td class="xl:text-xl text-sm text-old-black font-light">
                                2 x 500 Hp Volvo IPS
                                </td>
                            </tr>

                            <tr class="even:bg-gray-1 flex justify-between w-full px-3">
                                <td class="xl:text-xl text-sm text-old-black font-light">
                                Cruising Velocity
                                </td>
                                <td class="xl:text-xl text-sm text-old-black font-light">
                                -
                                </td>
                            </tr>

                            <tr class="even:bg-gray-1 flex justify-between w-full px-3">
                                <td class="xl:text-xl text-sm text-old-black font-light">
                                Max Speed
                                </td>
                                <td class="xl:text-xl text-sm text-old-black font-light">
                                35 N
                                </td>
                            </tr>

                            <tr class="even:bg-gray-1 flex justify-between w-full px-3">
                                <td class="xl:text-xl text-sm text-old-black font-light">
                                Mark
                                </td>
                                <td class="xl:text-xl text-sm text-old-black font-light">
                                Otto
                                </td>
                            </tr>

                            <tr class="even:bg-gray-1 flex justify-between w-full px-3">
                                <td class="xl:text-xl text-sm text-old-black font-light">
                                Mark
                                </td>
                                <td class="xl:text-xl text-sm text-old-black font-light">
                                Otto
                                </td>
                            </tr>

                            <tr class="even:bg-gray-1 flex justify-between w-full px-3">
                                <td class="xl:text-xl text-sm text-old-black font-light">
                                Mark
                                </td>
                                <td class="xl:text-xl text-sm text-old-black font-light">
                                Otto
                                </td>
                            </tr>

                            <tr class="even:bg-gray-1 flex justify-between w-full px-3">
                                <td class="xl:text-xl text-sm text-old-black font-light">
                                Mark
                                </td>
                                <td class="xl:text-xl text-sm text-old-black font-light">
                                Otto
                                </td>
                            </tr>

                            <tr class="even:bg-gray-1 flex justify-between w-full px-3">
                                <td class="xl:text-xl text-sm text-old-black font-light">
                                Mark
                                </td>
                                <td class="xl:text-xl text-sm text-old-black font-light">
                                Otto
                                </td>
                            </tr>

                            <tr class="even:bg-gray-1 flex justify-between w-full px-3">
                                <td class="xl:text-xl text-sm text-old-black font-light">
                                Mark
                                </td>
                                <td class="xl:text-xl text-sm text-old-black font-light">
                                Otto
                                </td>
                            </tr>
                            
                        </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>

        <!-- Reservation calendar -->
        <div class="lg:grid lg:grid-cols-2 lg:justify-center lg:items-center">

            <!-- Calendar plugin -->
            <div class="lg:-mr-60">
                <div class="text-center"><h2 class="text-lg text-old-black font-bold uppercase">Fecha de reserva</h2></div>

                <div id="reservationCalendar">
                    <div data-month-id="${monthId}" class="max-w-xs w-4/5 mx-auto  ${UCalendar.getMonthCalendarInfo().monthName === monthName ? 'calendar-active': ''}">
                        <div class="bg-old-gold flex justify-center text-white h-11 items-center rounded-t-xl text-xl">
                          <div class="calendar-left-arrow cursor-pointer"><svg class="svg-inline--fa fa-chevron-left" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="chevron-left" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" data-fa-i2svg=""><path fill="currentColor" d="M224 480c-8.188 0-16.38-3.125-22.62-9.375l-192-192c-12.5-12.5-12.5-32.75 0-45.25l192-192c12.5-12.5 32.75-12.5 45.25 0s12.5 32.75 0 45.25L77.25 256l169.4 169.4c12.5 12.5 12.5 32.75 0 45.25C240.4 476.9 232.2 480 224 480z"></path></svg><!-- <i class="fa-solid fa-chevron-left"></i> Font Awesome fontawesome.com --></div>
                            <div class="calendar__month_year mx-10">
                              <span class="calendar__month text-capitalize">${monthName}</span>
                              <span class="calendar__year">${year}</span>
                            </div>
                          <div class="calendar-right-arrow cursor-pointer"><svg class="svg-inline--fa fa-chevron-right" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="chevron-right" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" data-fa-i2svg=""><path fill="currentColor" d="M96 480c-8.188 0-16.38-3.125-22.62-9.375c-12.5-12.5-12.5-32.75 0-45.25L242.8 256L73.38 86.63c-12.5-12.5-12.5-32.75 0-45.25s32.75-12.5 45.25 0l192 192c12.5 12.5 12.5 32.75 0 45.25l-192 192C112.4 476.9 104.2 480 96 480z"></path></svg></div>
                        </div>
                        <div class="calendar__days-container border-x-2 border-b-2 border-old-black/60 rounded-b-xl text-old-black">
                            <ol class="calendar__days text-center grid grid-cols-7 pb-3 px-0 text-xl text-old-black">
                                ${this.HtmlWeekDays.join('')}
                            </ol>
                            <ol class="calendar__days calendar__numberDay text-center grid grid-cols-7 pb-3 px-0 text-xl">
                              ${this.HtmlMonthDays.join('')}
                            </ol>
                        </div>
                    </div>
                </div>
            </div>


            <!-- Pricing accord to Date -->

            <div class="my-4 lg:-order-1 lg:col-span-2">
                <div class="bg-old-gold mx-auto text-center w-64 lg:w-96 lg:p-2 text-white mb-4">
                    <div><p class="text-xl lg:text-3xl">1.800&euro; / Dia  <span>(Jun o Sep)</span></p></div>
                    <div><p class="lg:text-xl"><span>+ 21% </span> IVA + Combustible</p></div>
                </div>

                <div class="bg-gray-1 mx-auto text-center w-64 lg:w-96 lg:p-2 text-white">
                    <div><p class="text-xl lg:text-3xl">1.800&euro; / Dia  <span>(Jun o Sep)</span></p></div>
                    <div><p class="lg:text-xl"><span>+ 21% </span> IVA + Combustible</p></div>
                </div>
            </div>

            <!-- Form -->
            <div class="lg:ml-10 lg:w-80 w-4/5 mx-auto">
                <form id="request_reservation_form" method="POST" action="{{ route('rent.show.reserve') }}" class="font-bold text-old-black">
                    @csrf
                    @method('post')
                    <input type="hidden" name="boat_id" value="1">
                    <div class="mb-4">
                        <label class="block" for="name"> Nombre </label>
                        <input class="w-full" type="text" name="name" id="">
                    </div>
                    <div class="mb-4">
                        <label class="block" for="email">Correo electronico</label>
                        <input class="w-full" type="text" name="email" id="">
                    </div>
                    <div class="mb-4">
                        <label class="block" for="phone">Teléfono</label>
                        <input class="w-full" type="text" name="phone" id="">
                    </div>

                    <div class="text-center">
                        <input id="request_open" class="btn-gold" type="submit" value="Enviar Petición">
                    </div>
                </form>
            </div>

        </div>

    </div>

        <!-- Section similar boats -->

        <section class="lg:w-4/5 lg:mx-auto mt-5">
            <div class="w-2xl border-y-4 border-old-gold py-2  lg:px-16 lg:mx-auto">
                <div>
                    <p class=" text-center text-old-black text-2xl uppercase font-bold">Embarcaciones Similares</p>
                </div>            <!-- Slider thumbnails Carousel -->
                <div class="flex mx-auto justify-center items-center my-2">
                    <div class="arrow w-1/12 h-6 xl:h-12" id="arrowPrev">
                        <svg class="w-full h-full" xmlns="http://www.w3.org/2000/svg" xmlns:bx="https://boxy-svg.com" viewBox="43.026 0 161.967 490" width="161.967" height="490">
                            <polyline style="stroke: rgb(60, 64, 69); fill: rgb(60, 64, 69);" points="204.993 0.285 204.993 490 43.026 244.36 204.72 0" bx:origin="0.525 0.496"/>
                        </svg>
                    </div>
                    <div class="swiper swiper-similar-boats mx-auto w-10/12" thumbsSlider="">
                        <div class="swiper-wrapper flex">
    
                            <div class="swiper-slide max-h-14 xl:max-h-48 overflow-y-hidden">
                                <div class="h-[100px] overflow-y-hidden">
                                    <img class="object-cover" src="/img/rent/rent-01.jpg" alt="thumbnail">
                                </div>
                                <p class="text-center uppercase mt-2">cranchi 41</p>
                            </div>
    
                            <div class="swiper-slide max-h-14 xl:max-h-48 overflow-y-hidden">
                                <div class="h-[100px] overflow-y-hidden">
                                    <img class="object-cover" src="/img/rent/rent-02.jpeg" alt="thumbnail">
                                </div>
                                <p class="text-center uppercase mt-2">cranchi 41</p>
                            </div>
    
                            <div class="swiper-slide max-h-14 xl:max-h-48 overflow-y-hidden">
                                <div class="h-[100px] overflow-y-hidden">
                                    <img class="object-cover" src="/img/rent/rent-03.jpeg" alt="thumbnail">
                                </div>
                                <p class="text-center uppercase mt-2">cranchi 41</p>
                            </div>
                            
                            <div class="swiper-slide max-h-14 xl:max-h-48 overflow-y-hidden">
                                <div class="h-[100px] overflow-y-hidden">
                                    <img class="object-cover" src="/img/rent/rent-01.jpg" alt="thumbnail">
                                </div>
                                <p class="text-center uppercase mt-2">cranchi 41</p>
                            </div>
    
                            <div class="swiper-slide max-h-14 xl:max-h-48 overflow-y-hidden">
                                <div class="h-[100px] overflow-y-hidden">
                                    <img class="object-cover" src="/img/rent/rent-02.jpeg" alt="thumbnail">
                                </div>
                                <p class="text-center uppercase mt-2">cranchi 41</p>
                            </div>
    
                            <div class="swiper-slide max-h-14 xl:max-h-48 overflow-y-hidden">
                                <div class="h-[100px] overflow-y-hidden">
                                    <img class="object-cover" src="/img/rent/rent-03.jpeg" alt="thumbnail">
                                </div>
                                <p class="text-center uppercase mt-2">cranchi 41</p>
                            </div>
    
                        </div>
                    </div>
                    <div class="arrow w-1/12 h-6 xl:h-12" id="arrowNext">
                        <svg class="w-full h-full" xmlns="http://www.w3.org/2000/svg" xmlns:bx="https://boxy-svg.com" viewBox="51.124 -3.92 161.967 490" width="161.967" height="490">
                            <polyline style="stroke: rgb(60, 64, 69); fill: rgb(60, 64, 69);" points="204.993 0.285 204.993 490 43.026 244.36 204.72 0" transform="matrix(-1, 0, 0, -1, 256.117344, 486.079994)" bx:origin="0.525 0.496"/>
                          </svg>
                    </div>
                </div>
            </div>
        </section>
@endsection

@section('footer')
    @include('partials.footerShow')
@endsection

@section('js')

    <!-- Calendar Script -->
    <script src="/js/calenMod.js"></script>
    <script src="/js/backOfficeCalendar.js"></script>

    <!-- Menu Script -->
    <script src="/vendor/swiper/swiper-bundle.min.js"></script>


    <script>

       // Main Slide
       const slideMainThumbs = new Swiper('.thumbnails-row', {
            slidesPerView: 3,
            spaceBetween: 5,
            breakpoints : {
                640: {
                    slidesPerView: 4,
                    spaceBetween: 10
                    }
            }
        })

        const slideMain = new Swiper('.main_img', {
            spaceBetween: 10,
            navigation: {
                nextEl: '#arrowNext',
                prevEl: '#arrowPrev'
            },
            thumbs: {
                    swiper: slideMainThumbs,
                    },
        })

        // Similar boats slide

        const slideSimilarBoats = new Swiper('.swiper-similar-boats' , {
            slidesPerView: 3,
            spaceBetween: 10,
            centeredSlidesBounds: true,
            breakpoints : {
                640: {
                    slidesPerView: 4,
                    spaceBetween: 10
                    },
        }})


                // Request Overlay 

                const closeOverlayRequest = document.getElementById('request_close');
        const openRequestBtn = document.getElementById('request_open');
        const requestOverlay = document.getElementById('request_overlay');

        closeOverlayRequest.addEventListener('click', closeRequest);
        openRequestBtn.addEventListener('click', openRequest)

        function closeRequest(e){
            requestOverlay.style.display = 'none';
        }
        
        function openRequest(e){
            requestOverlay.style.display = 'block';
        }

        // Phtos Overlay 

        const closePhotosBtn = document.getElementById('photos_close');
        const openPhotostBtn = document.getElementById('photos_open');
        const photostOverlay = document.getElementById('photos_overlay');

        closePhotosBtn.addEventListener('click', closePhotos);
        openPhotostBtn.addEventListener('click', openPhotos)

        function closePhotos(e){
            e.preventDefault()
            photostOverlay.style.display = 'none';
        }
        
        function openPhotos(e){
            e.preventDefault()
            photostOverlay.style.display = 'block';
        }

    </script>
@endsection