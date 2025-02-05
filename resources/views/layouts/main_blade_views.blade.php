<!doctype html>
<html lang="{{ App::getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link rel="stylesheet" href="{{ asset('node_modules/@splidejs/splide/dist/css/splide.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/new_styles.css') }}">
    <script src=" https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/js/splide.min.js "></script>
    <script src="{{ asset('node_modules/@splidejs/splide/dist/js/splide.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <link rel="stylesheet" href="https://unpkg.com/cooltipz-css/cooltipz.min.css">
    <link href=" https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/css/splide.min.css " rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" >
    <link rel="icon" type="image/x-icon" href="{{ asset('images/cretan-villa-logo-shield-cropped.png') }}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.umd.js"></script>
    <link rel="sitemap" type="application/xml" title="Sitemap" href="/sitemap.xml">
    <link rel="stylesheet" href="{{ asset('css/style4.css') }}">
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.css"
    />

    @vite(['resources/js/app.js'])
    @livewireScripts
    @livewireStyles
    <title> {{ 'Cretan Villa hotel' }} </title>
</head>
<body>
<livewire:top-bar />
<livewire:menu-bar />
<div class="divider"></div>
{{--<livewire:carousel-homepage />--}}
{{--<livewire:inquiry-information />--}}
{{--<livewire:main-four-field-form />--}}
{{--<livewire:booking-options-client />--}}

@yield('content')


<div class="divider"> </div>
<livewire:footer />
</body>
<script>
    Fancybox.bind('[data-fancybox]', {
        dragToClose: false, // Disable dragging to close
        closeButton: "top", // Position close button at the top
        // ... other options
    });
</script>
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
