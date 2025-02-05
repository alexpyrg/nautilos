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
    <!-- Swiper CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    <meta property="og:image" content="https://www.cretan-villa.com/images/carouselImages/hotels-ierapetra-1.jpg"/>
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
    @media only screen and (max-width: 1165px){
    .flatpickr-calendar{
        z-index: 99999!important;
        top: 1570px!important;
    }

    }
        .popup{
            display: block;
            position: fixed;
            width: 550px;
            height: 350px;
            min-height: fit-content;
            min-width: 550px;
            right: 0;
            overflow: hidden;
            top: 180px;
            z-index: 10000;
            animation: shown-popup 4.5s;
        }

        .popup-open-button{
            display: block;
            position: relative;
            background-color: gray;
            position: fixed;
            width: 31px;
            height: 120px;
            min-width: 0;
            right: 100%;
            overflow: hidden;
            padding:0;
            margin:0;
            z-index: 10000;

        }
        .popup-open-button.shown{
            right:0;
            background:url('../images/arrow_open_button.png') no-repeat;
        }

        .popup-close-button{
            display: block;
            position: absolute;
            border:1px solid red;
            cursor: pointer;
            left:0;

        }
        .popup-content{
            display: inline-block;
            position: relative;
            padding-left: 0rem;
            background-color: #000000c6;
            color: white;
            min-width: 100%;
            padding-right: 20px;
            max-width: 100%;


        }


    .swiper {
        width: 100%;
        min-height: 440px; /* Minimum height */
        height: auto; /* Adjust height dynamically */
    }

    .swiper-slide {
        display: flex;
        justify-content: center;
        align-items: center;
        font-size: 24px;
        background: #ccc;
    }
    /* Hide pagination dots */
    .swiper-pagination {
        display: none;
    }

    /* Hide navigation arrows */
    .swiper-button-next,
    .swiper-button-prev {
        display: none;
    }

    @keyframes hidden-popup {
            0%{
                right: 0;
            }
            100%{
                right: -100%;
            }
        }
        @keyframes shown-popup {
            0%{
                right: -100%;
            }
            100%{
                right: 0;
            }
        }
        @keyframes open-shown {
            0%{
                right: 100%;
            }
            100%{
                right:0;
            }
        }
        .close-slideout{
            right: -100%;
            animation: hidden-popup 4.5s;
        }
        .book_info_arrow { float:left; width:30px; margin-right:10px; height:150px; cursor:pointer; background:url('../images/arrow_close_button.png') no-repeat; }

        @media screen and (max-width: 560px) {
            .popup{
                display: none!important;
            }
        }
        .plain-container > .animated-title{
            text-align: center;
            padding-left: unset;
        }
    </style>
    <title> @if($pageContent) {{ $pageContent->title }} @endif </title>
</head>
<body>

@if($page->is_home)
    <div class="popup" id="slideout-popup">
    <div class="popup-open-button" id="popup-open-button"> </div>
    <div class="popup-content">
        <div class="book_info_arrow"  id="popup-close-button"> </div>
            {!! $popout_content !!}
    </div>
</div>

@endif
<livewire:top-bar />
<livewire:menu-bar />
<div class="divider"></div>

<div class="swiper">
    <div class="swiper-wrapper">
        <div class="swiper-slide">Slide 1</div>
        <div class="swiper-slide">Slide 2</div>
        <div class="swiper-slide">Slide 3</div>
    </div>
    <!-- Add pagination, navigation, etc. if needed -->
    <div class="swiper-pagination"></div>
    <div class="swiper-button-next"></div>
    <div class="swiper-button-prev"></div>
</div>
@if($hasCarousel && $hasCarouselImages)
    <div class="wrapper">
        <div id="carousel" class="carousel" style="@if($carousel->type == 1)max-height: 600px; @else max-height: 400px; @endif">
            @foreach($carouselImages as $ci)
            <div class="slide">
                @if($ci->captions)
                <h2>{!! $ci->captions->where('locale_id', $locale->id)->pluck('caption')->first() ?? '' !!}</h2>
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

    @if(session()->has("error") || !$errors->isEmpty())
        <div id="modal_main" class="form-modal-bg modal-open">
            <div class="form-modal">
                <span class="form-modal-title">
                    https://cretan-villa.com
                </span>
                <span class="form-modal-message">
                    <p>
                        {{ session('error') }}
                    </p>
                </span>

                <span class="bottom-line">
                    <button class="form-modal-button" onclick="closeModal()"> Ok </button>
                </span>
            </div>
        </div>
    @endif

 <div class="plain-container">
    {!! html_entity_decode($pageContent->content) !!}

<div class="room-content-side" id="right-side">
     @if($hasRoomImages)
         @foreach($roomImages as $ri)
             <img data-fancybox="gallery" style="max-width: 300px; max-height: 300px; object-fit: cover; object-position: center;" src="{{ asset('images/pageImages/'. $ri->image_path) }}">
         @endforeach
         @endif
</div>
 </div>

@if($page->is_home || $page->id == '125')
<livewire:frontend.components.rooms-showcase />
@endif

<div class="divider"> </div>
<livewire:footer />

<script src="{{ asset('js/flatpickr.js') }}" ></script>
</body>
@stack('bottom-scripts')
<script>
    Fancybox.bind('[data-fancybox]', {
        dragToClose: false, // Disable dragging to close
        closeButton: "top", // Position close button at the top
        // ... other options
    });
</script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script>

    const cin = document.querySelector('#check_in_date');
    const cout = document.querySelector('#check_out_date');
    console.log('miniform' + cin);
    const checkInPicker = flatpickr("#check_in_date", {
        // ... other check-in options here ...
        disableMobile: true,
        dateFormat: "d-m-Y",
        position: "auto center",
        // appendTo: cin,
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
        disableMobile: true,
        dateFormat: "d-m-Y",
        position: "below",
        // appendTo: miniFormContainer,
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


    $(document).ready(function(){
        // Show the popup when the page loads
        $("#slideout-popup").addClass("display");

        // Close the popup after a 3-second delay
        setTimeout(function() {
            $("#slideout-popup").addClass("close-slideout");
            $("#popup-open-button").addClass("shown");
        }, 10000); // 1000 milliseconds = 1 second

        // Close button click event
        $("#popup-close-button").click(function(event){
            event.preventDefault();
            console.log('test');
            $("#slideout-popup").addClass("close-slideout");
            $("#popup-open-button").addClass("shown");
        });

        // Re-open button click event
        $("#popup-open-button").click(function(){
            $("#slideout-popup").removeClass("close-slideout");
            $("#popup-open-button").removeClass("shown");
        });
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
    const swiper = new Swiper('.swiper', {
        // Enable fade effect
        effect: 'fade',
        fadeEffect: {
            crossFade: true, // Smooth cross-fade transition
        },
        autoplay: {
            delay: 5000, // 5 seconds
            disableOnInteraction: false, // Continue autoplay even after user interaction
        },
        // Optional parameters
        loop: true,
        speed: 1000, // Transition speed in milliseconds

        // If you need pagination
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
        allowTouchMove: true, // Enable touch gestures (default: true)
        simulateTouch: true, // Enable mouse drag on desktop (default: true)
        touchRatio: 1, // Sensitivity of touch gestures (default: 1)
        grabCursor: true, // Show grab cursor on hover (optional)
        // Navigation arrows
        navigation: {
            // nextEl: '.swiper-button-next',
            // prevEl: '.swiper-button-prev',
        },
    });
</script>

<script>
    function closeModal(){
        let modal = document.getElementById('modal_main');
        modal.classList.add('hide-modal');
    }
</script>

</html>
