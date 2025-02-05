<!doctype html>
<html lang="{{ App::getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=5.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="preload" href="{{ asset('css/cooltipz.min.css') }}" as="style">
    <link rel="stylesheet" href="{{ asset('css/new_styles.css') }}" />

{{--    <link rel="stylesheet" href="{{ asset('css/new_styles.min.css') }}" />--}}
{{--    <link rel="preload" as="font" href="{{asset('fonts/google_material_icons.woff2')}}" />--}}
{{--    <link rel="preload" href="{{ asset('js/splide.min.js') }}" as="script" />--}}
    <link rel="preload" href="{{ asset('js/flatpickr.js') }}" as="script" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" >
    <link rel="sitemap" type="application/xml" title="Sitemap" href="/sitemap.xml">

{{--    <link rel="prefetch" href="{{ asset('images/hotels-ierapetra-1.jpg') }}">--}}

{{--    <link async rel="stylesheet" href="https://unpkg.com/cooltipz-css/cooltipz.min.css">--}}
{{--    <link async rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />--}}
{{--    @vite(['resources/js/app.js'])--}}

{{--    @livewireStyles--}}
    <style>
        /*.splide { display: none; } !* Initially hide the slider *!*/
    </style>
    <title>Welcome to Cretan Villa</title>
</head>
<body>
   <livewire:top-bar />
    <livewire:menu-bar />
   <div class="divider"></div>
<livewire:carousel-homepage />
<livewire:inquiry-information />
<livewire:main-four-field-form />
<livewire:booking-options-client />
{{-- @if(session()->has('error'))--}}
{{--     <div class="alert alert-error">--}}
{{--         {{ $message }}--}}
{{--     </div>--}}
{{-- @endif--}}

{{--   @if(session()->has('success'))--}}
{{--       <div class="alert alert-success">--}}
{{--           {{ $message }}--}}
{{--       </div>--}}
{{--   @endif--}}
<div class="main-content">
    <h2 class="title"> Cretan Villa Hotel in Ierapetra city welcomes its guests </h2>

    <p>
        You are welcome to Crete, the birth place of Xenios Zeus.
        The god of hospitality. Welcome to Lasithi, the magical tapestry of splendid beaches,
        ancient treasures and <br>
        landscapes. Welcome to <b>Ierapetra</b>, the most southern town in Europe,
        a friendly place enjoying an average of 300 days of sunshine all year long.<br>
    <br>
        Welcome to our hotel.<br>
    <br>

        Cretan Villa Hotel in Ierapetra is a charming small, family hotel,
        built in 18th century which still travels through the passing of the years.
        The house was first restored in 1970´s
        to a traditional settlement and since then
        it became the first hotel of the town. It hides a cool green patio surrounded by traditionally
        furnished high ceilinged rooms and a
        friendly atmosphere.It is located 1 minute walking approximately from both  beaches of Ierapetra,
        in a quiet
        pedestrian street, away from biggest noisy streets. In this lovely pedestrian street,
        as well as in the surrounding area, visitors will find numerous stores, café,
        traditional taverns and restaurants. Our desk office provides any information and
        tips
        you need and also, free internet access, rental cars services with special offers for our
        guests and organize private  cruise to fabulous national park of Chrissi island.
        <br>
        <br>
        We are looking forward to extend a warm Cretan Welcome to you!
        <br>
    </p>

    <div class="custom-button">
        <a  href="#inside-tour" class="custom-button-a">
            &nbsp;&nbsp;&nbsp;Inside Tour
            <span class="material-symbols-outlined custom-button-abs">
            east
        </span>
        </a>

    </div>

   <h2 style="font-weight: 500!important; font-family: Geometria-Bold;">Choose your accommodation in Cretan Villa Hotel in Ierapetra Crete</h2>
    <br>
</div>

   <livewire:frontend.components.rooms-showcase />


    <div class="divider"> </div>
<livewire:footer />

{{--   <script src="{{ asset('js/splide.min.js') }} "></script>--}}
   <script src="{{ asset('js/flatpickr.js') }}" ></script>
</body>
{{--@livewireScripts--}}

{{--<script>--}}

{{--    document.addEventListener( 'DOMContentLoaded', function () {--}}
{{--        new Splide( '#image-slider', {--}}
{{--            lazyload: 'nearby',--}}
{{--            type   : 'loop',     // Make the slider loop infinitely--}}
{{--            perPage: 1,          // Show one slide at a time--}}
{{--            autoplay: true,      // Enable autoplay--}}
{{--            pauseOnHover: false, // Pause autoplay on hover--}}
{{--            interval: 5000,      // Time between slides in ms--}}
{{--            arrows: false,       // Hide arrow buttons--}}
{{--            pagination: false,   // Disable pagination--}}
{{--            heightRatio: 0.35,   // Adjust as needed to control the height--}}
{{--            cover: true,         // Fill the container with each slide--}}
{{--        }).mount();--}}
{{--    });--}}


{{--</script>--}}
{{--<script>--}}
{{--    document.addEventListener('DOMContentLoaded', function () {--}}

{{--        new Splide('#room-carousel', {--}}
{{--            lazyload: 'sequential',--}}
{{--            focus: 'none',--}}
{{--            type: 'slide', // Allow slides to move one by one--}}
{{--            perPage: 3,   // Start with 3 items per page (adjust for responsiveness)--}}
{{--            perMove: 1,   // Move one slide at a time--}}
{{--            gap: '0.5rem',   // Add spacing between slides--}}
{{--            arrows: true,    // Enable arrows--}}
{{--            pagination: false,--}}
{{--            drag: false,--}}
{{--            breakpoints: {  // Responsive adjustments--}}
{{--                640: {--}}
{{--                    perPage: 1, // Show 1 item per page on smaller screens--}}
{{--                },--}}
{{--                768: {--}}
{{--                    perPage: 2, // Show 2 items per page on medium screens--}}
{{--                }--}}
{{--            },--}}
{{--            classes:{--}}
{{--                // arrows: 'splide__arrows custom-arrows',--}}
{{--                // arrow: 'splide_arrow custom_arrow',--}}
{{--                // prev  : 'splide__arrow--prev custom-prev',--}}
{{--                // next  : 'splide__arrow--next custom-next',--}}

{{--            }--}}
{{--        }).mount();--}}
{{--    });--}}
{{--</script>--}}
{{--<script>--}}
{{--    document.addEventListener('DOMContentLoaded', function () {--}}
{{--        setTimeout( function(){--}}
{{--        document.querySelector('.splide').style.display = 'block'; // Show the slider after initialization--}}
{{--        }, 4000);--}}
{{--    });--}}
{{--</script>--}}


<script>
    const checkInPicker = flatpickr("#check_in_date", {
        // ... other check-in options here ...
        dateFormat: "d-m-Y",
        placeholder: "Check-in date",
        onReady: function(){
            this.set('minDate', "today");
            console.log(this.config.maxDate);
        },
        onChange: function(selectedDates) {
            const checkInDate = selectedDates[0];
            if(selectedDates.length !== 0){
                checkOutPicker.set('minDate', checkInDate.fp_incr(1));
            }else{
                checkOutPicker.set('minDate', undefined);
            }
            // Minimum check-out date is one day after check-in
        },
        onClose: function(selectedDates){
            if(selectedDates.length === 0){
                checkOutPicker.clear();
                checkOutPicker.set('minDate', null);
            }
        }
    });

    const checkOutPicker = flatpickr("#check_out_date", {
        // ... other check-out options here ...
        dateFormat: "d-m-Y",
        placeholder: "Check-out date",
        onReady: function(){
            this.set('minDate', "today");
        },
        onChange: function(selectedDates) {
            const checkOutDate = selectedDates[0];
            if(selectedDates.length !== 0) {
                checkInPicker.set('maxDate', checkOutDate.fp_incr(-1)); // Maximum check-in date is one day before check-out
            }else{
                checkOutPicker.set('maxDate', undefined);
            }
        },
        onClose: function(selectedDates){
            if(selectedDates.length === 0){
                checkInPicker.clear();
                this.clear();
                checkInPicker.set('maxDate', null);
            }
        }

    });
</script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        var currentIndex = 0;
        var slides = document.querySelectorAll('.slide');
        // Assume each slide is shown for 8 seconds total
        var slideInterval = 8000;

        function showSlide(index) {
            slides.forEach(function(slide) {
                slide.style.opacity = '0';
            });

            var currentSlide = slides[index];
            currentSlide.style.opacity = '1';

            // Reapply the animation to ensure it starts from the beginning for each slide
            var img = currentSlide.querySelector('img');
            img.style.animation = 'none'; // Reset the animation
            // Trigger reflow to apply the reset
            void img.offsetWidth;
            // Re-apply the correct animation based on the slide index
            switch (index % 4) {
                case 0:
                    img.style.animation = 'panRight 10s ease-in-out infinite';
                    break;
                case 1:
                    img.style.animation = 'panDown 10s ease-in-out infinite';
                    break;
                case 2:
                    img.style.animation = 'panLeft 10s ease-in-out infinite';
                    break;
                case 3:
                    img.style.animation = 'panUp 10s ease-in-out infinite';
                    break;
            }
        }

        function nextSlide() {
            currentIndex = (currentIndex + 1) % slides.length;
            showSlide(currentIndex);
        }

        // Initially display the first slide
        showSlide(currentIndex);
        // Set the interval for changing slides, adjusted to match the CSS transition
        setInterval(nextSlide, slideInterval);
    });

</script>
</html>
