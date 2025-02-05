<!doctype html>
<html lang="{{ App::getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=5.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="preload" href="{{ asset('css/cooltipz.min.css') }}" as="style">
    <link rel="stylesheet" href="{{ asset('css/new_styles.css') }}" />
    <link rel="icon" type="image/x-icon" href="{{ asset('images/0.jpg') }}">
    <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.umd.js"></script>
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
        <link rel="sitemap" type="application/xml" title="Sitemap" href="/sitemap.xml">
    @endif

    {{--    @livewireStyles--}}
    <style>
        div.gallery-container{
            max-width: 1350px;
            display: flex;
            flex-direction: row;
            flex-wrap: wrap;
            position: relative;
            height: auto;
            overflow: hidden ;
            min-height: 100vh;
            margin: 0 auto;
            justify-content: center;

        }
        div.gallery {
            margin: 5px;
            border: 1px solid #ccc;
            float: left;
            width: 250px;
            display: block;
            height: 150px;

        }

        div.gallery:hover {
            border: 1px solid #777;
        }

        div.gallery img {
            width: 100%;
            height: auto;
            height: 100%;
            object-fit: cover;
            object-position: center;
        }

        div.desc {
            padding: 15px;
            text-align: center;
        }

        .gallery-container > .animated-title{
            text-align: center;
            padding-left:0;
        }
        .gallery-container > p {
            margin: 0 auto;
            width: 100%;
        }
    </style>
    <title> @if($pageContent) {{ $pageContent->title }} @endif </title>
</head>
<body>
<livewire:top-bar />
<livewire:menu-bar />
<div class="divider"></div>

<livewire:inquiry-information />
<livewire:main-four-field-form />
<livewire:booking-options-client />

<div class="gallery-container">
    {!! html_entity_decode($pageContent->content) !!}

    @foreach($roomImages as $ri)
        <div class="gallery">

            <img data-fancybox="gallery"  src="{{ asset('images/pageImages/'. $ri->image_path) }}" alt="{{ $ri->alt }}" width="600" height="400">

        </div>
    @endforeach
</div>

<div class="divider"> </div>
<livewire:footer />

<script src="{{ asset('js/flatpickr.js') }}" ></script>
</body>

<script>
    Fancybox.bind('[data-fancybox]', {
        dragToClose: false, // Disable dragging to close
        closeButton: "top", // Position close button at the top
        // ... other options
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
