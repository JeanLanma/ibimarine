@extends('layout.template')

@section('title', 'Eventos')

@section('hero')
    <!-- Section Hero - Title -->
    <section class="my-5">
        <div class="lg:mt-16 mt-4 border-y-4 border-old-gold py-1  lg:px-16 lg:mx-auto lg:w-max">
           <p class="text-center text-old-black text-2xl uppercase font-bold">{{__('Events')}}</p>
        </div>
    </section>
@endsection

@section('content')
    <!-- Section Content -->
    <div class="container lg:mx-auto lg:flex lg:flex-wrap lg:columns-2 lg:justify-center lg:w-4/5 lg:border-b-4 lg:border-b-old-gold">

        <!-- Cards -->
        @foreach ($events as $event)

        
        {{-- <div class="w-4/5 mx-auto my-6 md:max-w-[340px] sm:max-w-[300px] lg:max-w-full lg:w-full">
            <!-- Card Head -->
            <div class="relative lg:h-56 xl:h-96">
                <div class="">
                    <img class="lg:w-full rounded-t-[12px] max-h-[200px] xl:max-h-96 xl:h-96 overflow-y-hidden object-cover"  src="/storage/{{$event->image}}" alt="Ibimarine Events">
                </div>
            </div>
            <!-- Card body -->
            <div class="p-4 lg:py-6 lg:px-32 text-center text-old-black">
                <div>
                    <p class="text-sm xl:text-xl">
                        {{$event->description}}
                    </p>
                </div>
            </div>
        </div> --}}
        <div class="w-4/5 mx-auto my-6 md:max-w-[340px] sm:max-w-[300px] lg:max-w-full lg:w-full @if(!$loop->first) lg:grid lg:grid-cols-2 items-center @endif">
            <!-- Card Head -->
            <div class="relative lg:h-56 xl:h-72  @if($loop->first) xl:h-96 @endif">
                <div class="">
                    <img class="w-full rounded-t-lg max-h-[200px] xl:max-h-64 @if($loop->first) xl:max-h-96 xl:h-96 @endif   overflow-y-hidden object-cover"  src="/storage/{{$event->image}}" alt="Ibimarine Events">
                </div>
            </div>
            <!-- Card body -->
            <div class="p-4 lg:py-8 lg:px-10 @if($loop->first) lg:px-32 @endif  text-center lg:text-justify text-old-black">
                <div>
                    <p class="text-sm xl:text-xl">
                        {{$event->description}}
                    </p>
                </div>
            </div>


        </div>
        @endforeach
</div>
@endsection

@section('footer')
        <!-- Section footer -->
        <footer class="text-old-black text-center mx-auto lg:flex lg:my-10 lg:w-4/5  lg:gap-4">
            <div class="lg:hidden">
                <p>Derechos Reservados</p>
            </div>
            <div>
                <p class="inline">Términos y condiciones</p> - <p class="inline">Política de Privacidad</p>
            </div>
            <div>
                <p class="inline">Política de cookies</p> - <p class="inline">Protección de datos</p>
            </div>
            <div class="lg:-order-1">
                <p> <b>IBIMARINE &copy;</b> </p>
            </div>
    
            <div class="ml-36 hidden lg:justify-self-end lg:flex">
                <p class="mr-5">Find us: </p>
                <a href="#" class="text-old-gold"><i class="fa-brands fa-facebook-square mr-3"></i></a>
                <a href="#" class="text-old-gold"><i class="fa-brands fa-instagram-square "></i></a>
            </div>
        </footer>
@endsection