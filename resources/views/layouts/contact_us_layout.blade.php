<!doctype html>
<html lang="{{ App::getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=5.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="preload" href="{{ asset('css/cooltipz.min.css') }}" as="style">
    <link rel="stylesheet" href="{{ asset('css/new_styles.css') }}" />
    <link rel="sitemap" type="application/xml" title="Sitemap" href="/sitemap.xml">
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
        @if(strtolower(App::getLocale()) == 'gr')
           .contact-us-container > *:not(.fa-brands):not(.fa-facebook){
            font-family: "Times New Roman";
            font-size: 36px;
        }
        @endif
    </style>
    <title> @if($pageContent) {{ $pageContent->title }} @endif </title>
</head>
<body>
<livewire:top-bar />
<livewire:menu-bar />

<div class="divider"></div>
@if($hasCarousel && $hasCarouselImages)
    <div class="wrapper">
        <div id="carousel" class="carousel" style="@if($carousel->type == 1)max-height: 600px; @else max-height: 400px; @endif">
            @foreach($carouselImages as $ci)
                <div class="slide">
                    @if($ci->captions)
                        <h2>{{ $ci->captions->where('locale_id', $locale->id)->pluck('caption')->first() ?? ' ' }}</h2>
                    @endif
                    <picture>
                        <img decoding="async" loading="lazy" src="{{ asset('images/carouselImages/'.$ci->image_path) }}" alt="{{ $ci->alt }}">
                    </picture>
                </div>
            @endforeach

        </div>
    </div>

@endif
<livewire:inquiry-information />
<livewire:main-four-field-form />
<livewire:booking-options-client />
<img data-fancybox="gallery" style=" margin: 0; border:0px solid red;max-width: 100%; box-sizing: border-box; height: auto;" src="{{ asset('images/phone-contact.jpg') }}">
<div style="margin-top: -1rem; border:0px solid blue;" class="divider"></div>
<div class="plain-container" style="width: 1400px; max-width: 1400px;">

    <livewire:contact-us-form />

</div>


<div class="divider"> </div>
<livewire:footer />

<script src="{{ asset('js/flatpickr.js') }}" ></script>
</body>



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
