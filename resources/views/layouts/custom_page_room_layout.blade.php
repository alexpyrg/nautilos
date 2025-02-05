<!doctype html>
<html lang="{{ App::getLocale() }}">
{{--<head>--}}
{{--    <meta charset="UTF-8">--}}
{{--    <meta name="og:title" content="{{ $pageContent->title }}">--}}
{{--    <meta name="og:description" content="{{ $pageContent->description }}">--}}
{{--    <meta name="description" content="{{ $pageContent->description }}">--}}
{{--    <meta name="keywords" content="{{ $pageContent->keywords }}">--}}
{{--    <meta name="viewport"--}}
{{--          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">--}}
{{--    <meta http-equiv="X-UA-Compatible" content="ie=edge">--}}
{{--    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">--}}
{{--    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>--}}
{{--    <link rel="stylesheet" href="https://unpkg.com/cooltipz-css/cooltipz.min.css">--}}
{{--    <link rel="preload" href="{{ asset('js/flatpickr.js') }}" as="script" />--}}
{{--    <link rel="stylesheet" href="{{ asset('css/new_styles.css') }}">--}}
{{--    <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.umd.js"></script>--}}
{{--    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" >--}}
{{--    <link--}}
{{--        rel="stylesheet"--}}
{{--        href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.css"--}}
{{--    />--}}
{{--    --}}{{--    <link rel="stylesheet" href="{{ asset('css/new_styles.min.css') }}" />--}}
{{--    --}}{{--    <link href="https://db.onlinewebfonts.com/c/139d47c9e42d96a553b466c5b16b338b?family=Geometria-Light" rel="stylesheet">--}}
{{--    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />--}}
{{--    @vite(['resources/js/app.js'])--}}
{{--    @livewireScripts--}}
{{--    @livewireStyles--}}
{{--    <title>{{ $pageContent->title }}</title>--}}
{{--</head>--}}
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=5.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="preload" href="{{ asset('css/cooltipz.min.css') }}" as="style">
    <link rel="stylesheet" href="{{ asset('css/new_styles.css') }}" />
    <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.umd.js"></script>
    <link rel="icon" type="image/x-icon" href="{{ asset('images/0.jpg') }}">
    <link rel="sitemap" type="application/xml" title="Sitemap" href="/sitemap.xml">

    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.css"
    />
    @if($pageContent)
        <meta name="description" content="{{ $pageContent->description != null ? $pageContent->description : ' ' }}">
        <meta name="keywords" content="{{ $pageContent->keywords  != null ? $pageContent->keywords : ' '  }}">
        <meta name="og:title" content="{{ $pageContent->title != null ? $pageContent->title : ' '  }}">
        <meta name="og:description" content="{{ $pageContent->description != null ? $pageContent->description : ' ' }}">
        <link rel="preload" href="{{ asset('js/flatpickr.js') }}" as="script" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" >
    @endif

    {{--    @livewireStyles--}}
    <style>

    </style>
    <title> @if($pageContent) {{ $pageContent->title }} @endif </title>
</head>

<body>
<livewire:top-bar />
<livewire:menu-bar/>
<div class="divider"></div>

@if($hasCarousel && $hasCarouselImages)

    <div class="wrapper">
        <div id="carousel" class="carousel" style="@if($carousel->type == 1)max-height: 600px; @else max-height: 400px; @endif">
            @foreach($carouselImages as $ci)

                <div class="slide">
                    <picture>
                        <img src="{{ asset('images/carouselImages/'.$ci->image_path) }}" decoding="async" loading="lazy"  alt="{{ $ci->alt }}">
                    </picture>
                    <h2>{!! $ci->captions->where('locale_id', $locale->id)->pluck('caption')->first() ?? '' !!}</h2>

                </div>
            @endforeach

        </div>
    </div>

@endif

<livewire:inquiry-information />
<livewire:main-four-field-form />
<livewire:booking-options-client />
<div class="room-content">

    <div class="room-content-flex-rows">
              {!! html_entity_decode($pageContent->content) !!}

        <div class="room-content-side" id="right-side">
            @if($hasRoomImages)


            <div class="room-pictures-gallery">
                @foreach($roomImages as $ri)
                    <img data-fancybox="gallery" src="{{ asset('images/pageImages/' . $ri->image_path) }}" alt="{{ $ri->alt }}">
                @endforeach
            </div>
            @endif
        </div>

    </div>


</div>

<div class="divider"> </div>


<livewire:footer />
</body>
<script src="{{ asset('js/flatpickr.js') }}" ></script>
<script>
    Fancybox.bind('[data-fancybox]', {
        dragToClose: false, // Disable dragging to close
        closeButton: "top", // Position close button at the top
        // ... other options
    });

</script>
<script>

    document.addEventListener( 'DOMContentLoaded', function () {
        new Splide( '#room-slider', {
            type   : 'fade', // Make the slider loop infinitely
            perPage: 1,       // Show one slide at a time
            autoplay: true,  // Enable autoplay
            pauseOnHover: false, // Pause autoplay on hover
            interval: 5000,  // Time between slides in ms
            speed   : 1000, // speed
            arrows: false,     // Hide arrow buttons
            pagination: false,  // Disable pagination
            heightRatio: 0.35,   // Adjust as needed to control the height
            cover: true,
            // Fill the container with each slide
        } ).mount();
    } );
</script>
<script>
    document.addEventListener( 'DOMContentLoaded', function () {
        var main = new Splide( '#main-carousel', {
            fixedHeight: 630,
            fixedWidth: 1200,
            type      : 'fade',
            speed     : 2000,
            rewind    : true,
            pagination: false,
            arrows    : false,
            cover     : true,
            autoplay  : true,
            interval  : 5000,
        } );

        var thumbnail = new Splide('#thumbnail-carousel', {
            fixedWidth: 150,
            fixedHeight: 100,
            gap: 10,
            rewind: true,
            pagination: false,
            focus: 'center',
            isNavigation: true,
            breakpoints: {
                600: {
                    fixedWidth: 100,
                    fixedHeight: 80,
                },
            },
        });

        main.sync( thumbnail );
        main.mount();
        thumbnail.mount();

    });


</script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        Livewire.on('formError', function (errorMessages) {
            alert(errorMessages.join('\n'));
        });
    });
</script> {{-- LISTENING FOR FORMERRORS IN MFFF --}}
<script>
    // const checkInPicker = flatpickr("#check_in_date", {
    //     // ... other check-in options here ...
    //     dateFormat: "d-m-Y",
    //     placeholder: "Check-in date",
    //     onReady: function(){
    //         this.set('minDate', "today");
    //         console.log(this.config.maxDate);
    //     },
    //     onChange: function(selectedDates) {
    //         const checkInDate = selectedDates[0];
    //         if(selectedDates.length !== 0){
    //             checkOutPicker.set('minDate', checkInDate.fp_incr(1));
    //         }else{
    //             checkOutPicker.set('minDate', undefined);
    //         }
    //         // Minimum check-out date is one day after check-in
    //     },
    //     onClose: function(selectedDates){
    //         if(selectedDates.length === 0){
    //             checkOutPicker.clear();
    //             checkOutPicker.set('minDate', null);
    //         }
    //     }
    // });
    //
    // const checkOutPicker = flatpickr("#check_out_date", {
    //     // ... other check-out options here ...
    //     dateFormat: "d-m-Y",
    //     placeholder: "Check-out date",
    //     onReady: function(){
    //         this.set('minDate', "today");
    //     },
    //     onChange: function(selectedDates) {
    //         const checkOutDate = selectedDates[0];
    //         if(selectedDates.length !== 0) {
    //             checkInPicker.set('maxDate', checkOutDate.fp_incr(-1)); // Maximum check-in date is one day before check-out
    //         }else{
    //             checkOutPicker.set('maxDate', undefined);
    //         }
    //     },
    //     onClose: function(selectedDates){
    //         if(selectedDates.length === 0){
    //             checkInPicker.clear();
    //             this.clear();
    //             checkInPicker.set('maxDate', null);
    //         }
    //     }
    //
    // });
    const checkInPicker = flatpickr("#check_in_date", {
        // ... other check-in options here ...
        dateFormat: "d-m-Y",
        placeholder: "Check-in date",
        onReady: function(){
            this.set('minDate', "today");
        },
        onChange: function(selectedDates) {
            const checkInDate = selectedDates[0];
            if(selectedDates.length !== 0){
                checkOutPicker.set('minDate', checkInDate.fp_incr(1));
            } else {
                checkOutPicker.set('minDate', undefined);
            }
        },
        onClose: function(){
            if(!this.selectedDates.length){
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
                checkInPicker.set('maxDate', checkOutDate.fp_incr(-1));
            } else {
                checkInPicker.set('maxDate', undefined);
            }
        },
        onClose: function(){
            if(!this.selectedDates.length){
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
