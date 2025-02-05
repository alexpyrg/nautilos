<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="og:title" content="Triple room in Ierapetra Crete">
    <meta name="og:description" content="desc">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
{{--    <link rel="stylesheet" href="{{ asset('node_modules/@splidejs/splide/dist/css/splide.min.css') }}">--}}
    <link rel="stylesheet" href="{{ asset('css/new_styles.css') }}">
    <script async src=" https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/js/splide.min.js "></script>
    <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.umd.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" >
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.css"
    />
{{--    <script src="{{ asset('node_modules/@splidejs/splide/dist/js/splide.min.js') }}"></script>--}}
    <script async src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <link async rel="stylesheet" href="https://unpkg.com/cooltipz-css/cooltipz.min.css">
    <link async href=" https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/css/splide.min.css " rel="stylesheet">
    <link async rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    @vite(['resources/js/app.js'])
    @livewireScripts
    @livewireStyles
    <title>Akrolithos Apartments</title>
</head>
<body>
<livewire:top-bar />
<livewire:menu-bar/>
<div class="divider"></div>
<livewire:carousel-small-height />
<livewire:inquiry-information />
<livewire:main-four-field-form />
<livewire:booking-options-client />
<div class="room-content">
    <h1 class="animated-title"> Akrolithos Apartments </h1>
    <div class="room-content-flex-rows">
        <div class="room-content-side">


            <p class="description-paragraph">

                    Akrolithos self catering apartments are traditionally furnished and have one double bed, bedroom with in
                    build wardrobe and a separate living room. The kitchen has an electric hob, oven, fridge, sink, all cooking
                    utensils, a kettle, filter coffee machine, espresso coffee machine, electric Juicer, a toaster and complete set
                    of dishes and glasses. Facilities include air conditioning, TV, free Wi-Fi and a private bathroom with
                    shower cubicle, washing machine and  hairdryer. The apartments open to the court yard. There is no
                    better place to enjoy your breakfast. Akrolithos apts. offer the comfort, privacy and flexibility of a self-
                    catering property, together with the added benefits of hotel-type services - such as cleaning and change of
                    bed linen service (every three days), and reception service (in close by Cretan Villa Hotel). Each
                    apartment can accommodate 2 people.
                    <br><br>
                    The area is well provided with cafes, taverns and restaurants within minute walk. 100 meters is the parallel
                    to the beach pedestrian street with plenty of eating places (taverns and restaurants), there are banks,
                    bakery, hairdressers, mini market. In a walking distance of 150 – 200 meters is the town center, plenty of
                    town attractions (the Kales fortress, the archaeological museum), taxi station, tourist information office,
                    the port for Chrissi island, the post and lots of shopping places.
                    <br><br>
                    In our cozy establishment, you will be offered the comfort you deserve during your summer holidays,
                    coupled with a friendly and hospitable atmosphere. You will be enthused to discover: the unparalleled
                    Mediterranean flair of the city of Ierapetra, the tranquil, luscious green surroundings of the area, the
                    amazing, crystal-clear beaches, and the intense nightlife of Ierapetra that bustles with evening activity and
                    is noted for its plethora of restaurants, traditional raki places, bars, and clubs.<br>

                Minimum stay of 3 nights.
                <br>
                Do you prefer to request information via email?
                <br> Do you have particular needs that our on line booking system can not satisfy?
                <br>
                Fill in the <a href="#contact_us" class="request-form-link">request form</a> and you will receive all the answers you need directly by email!

            </p>
            <div class="room-features-large">

                <ul>
                    <li><span class="material-symbols-outlined"> oven_gen </span> Equipped Kitchen </li>
                    <li><span class="material-symbols-outlined"> mode_fan </span> Individually controlled air conditioning </li>
                    <li><span class="material-symbols-outlined"> wifi </span> Free fast WiFi </li>
                    <li><span class="material-symbols-outlined"> kitchen </span> Mini Bar </li>
                    <li><span class="material-symbols-outlined"> live_tv </span> 32 inch flat-screen Television </li>
                    <li><span class="material-symbols-outlined"> language </span> International Channels </li>
                    <li><span class="material-symbols-outlined"> smoke_free </span> Non smoking! </li>
                    <li><span class="material-symbols-outlined"> deskphone </span> In apartment phone connected with Cretan Villa reception </li>

                </ul>
                <ul>
                    <li><span class="material-symbols-outlined"> dishwasher_gen </span> Washing Machine </li>
                    <li><span class="material-symbols-outlined"> window </span> Double glazing windows </li>
                    <li><span class="material-symbols-outlined"> lock </span> Safety deposit box </li>
                    <li><span class="material-symbols-outlined"> wc </span> Private bathroom </li>
                    <li><span class="material-symbols-outlined"> shower </span> Bathroom with shower cubicle </li>
                    <li><span class="material-symbols-outlined"> dry </span> Hairdryer </li>
                    <li><span class="material-symbols-outlined"> water_bottle </span> Bathroom toiletries </li>
               </ul>


            </div>
        </div>
        <div class="room-content-side" id="right-side">

{{--            <section--}}
{{--                id="main-carousel"--}}
{{--                class="splide"--}}
{{--                aria-label="The carousel with thumbnails. Selecting a thumbnail will change the Beautiful Gallery carousel."--}}
{{--            >--}}
{{--                <div class="splide__track">--}}
{{--                    <ul class="splide__list">--}}
{{--                        <li class="splide__slide">--}}
{{--                            <img src="{{ asset('images/triple-room-1.jpg') }}" alt="Double room bed">--}}
{{--                        </li>--}}
{{--                        <li class="splide__slide">--}}
{{--                            <img src="{{ asset('images/triple-room-2.jpg') }}" alt="Double room bath">--}}
{{--                        </li>--}}
{{--                        <li class="splide__slide">--}}
{{--                            <img src="{{ asset('images/triple-room-3.jpg') }}" alt="Double room nice beds">--}}
{{--                        </li>--}}
{{--                        <li class="splide__slide">--}}
{{--                            <img src="{{ asset('images/triple-room-4.jpg') }}" alt="Double asdasd">--}}
{{--                        </li>--}}
{{--                        <li class="splide__slide">--}}
{{--                            <img src="{{ asset('images/triple-room-5.jpg') }}" alt="Double asdasd">--}}
{{--                        </li>--}}
{{--                        <li class="splide__slide">--}}
{{--                            <img src="{{ asset('images/triple-room-6.jpg') }}" alt="Double asdasd">--}}
{{--                        </li>--}}
{{--                        <li class="splide__slide">--}}
{{--                            <img src="{{ asset('images/triple-room-7.jpg') }}" alt="Double asdasd">--}}
{{--                        </li>--}}
{{--                        <li class="splide__slide">--}}
{{--                            <img src="{{ asset('images/triple-room-8.jpg') }}" alt="Double asdasd">--}}
{{--                        </li>--}}
{{--                    </ul>--}}
{{--                </div>--}}
{{--            </section>--}}
{{--            <section--}}
{{--                id="thumbnail-carousel"--}}
{{--                class="splide"--}}
{{--                aria-label="The carousel with thumbnails. Selecting a thumbnail will change the Beautiful Gallery carousel."--}}
{{--            >--}}
{{--                <div class="splide__track">--}}
{{--                    <ul class="splide__list">--}}
{{--                        <li class="splide__slide">--}}
{{--                            <img src="{{ asset('images/triple-room-1.jpg') }}" alt="Double room bed">--}}
{{--                        </li>--}}
{{--                        <li class="splide__slide">--}}
{{--                            <img src="{{ asset('images/triple-room-2.jpg') }}" alt="Double room bath">--}}
{{--                        </li>--}}
{{--                        <li class="splide__slide">--}}
{{--                            <img src="{{ asset('images/triple-room-3.jpg') }}" alt="Double room nice beds">--}}
{{--                        </li>--}}
{{--                        <li class="splide__slide">--}}
{{--                            <img src="{{ asset('images/triple-room-4.jpg') }}" alt="Double asdasd">--}}
{{--                        </li>--}}
{{--                        <li class="splide__slide">--}}
{{--                            <img src="{{ asset('images/triple-room-5.jpg') }}" alt="Double asdasd">--}}
{{--                        </li>--}}
{{--                        <li class="splide__slide">--}}
{{--                            <img src="{{ asset('images/triple-room-6.jpg') }}" alt="Double asdasd">--}}
{{--                        </li>--}}
{{--                        <li class="splide__slide">--}}
{{--                            <img src="{{ asset('images/triple-room-7.jpg') }}" alt="Double asdasd">--}}
{{--                        </li>--}}
{{--                        <li class="splide__slide">--}}
{{--                            <img src="{{ asset('images/triple-room-8.jpg') }}" alt="Double asdasd">--}}
{{--                        </li>--}}
{{--                    </ul>--}}
{{--                </div>--}}
{{--            </section>--}}
            <div class="room-pictures-gallery" style="">

                <img data-fancybox="gallery" src="{{ asset('images/triple-room-1.jpg') }}">
                <img data-fancybox="gallery" src="{{ asset('images/triple-room-2.jpg') }}">
                <img data-fancybox="gallery" src="{{ asset('images/triple-room-3.jpg') }}">
                <img data-fancybox="gallery" src="{{ asset('images/triple-room-4.jpg') }}">
                <img data-fancybox="gallery" src="{{ asset('images/triple-room-5.jpg') }}">
                <img data-fancybox="gallery" src="{{ asset('images/triple-room-6.jpg') }}">
                <img data-fancybox="gallery" src="{{ asset('images/triple-room-7.jpg') }}">

            </div>
        </div>

    </div>


</div>

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
</html>
