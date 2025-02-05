<!DOCTYPE html>
<html lang="{{ App::getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="keywords" content="{{'custom keywords'}}">
    <meta name="description" content="{{'custom description'}}">
    <link rel="stylesheet" href="{{ asset('css/client.css')}}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link rel="stylesheet" href="{{ asset('node_modules/@splidejs/splide/dist/css/splide.min.css') }}">
    <script async src="https://www.googletagmanager.com/gtag/js?id={{ 'YOUR_TRACKING_ID' }}"></script>

    <script src="{{ asset('js/credit-card-from.js') }}"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
        gtag('config', '{{'YOUR_TRACKING_ID'}}');
    </script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <title>{{'custom title '}}</title>
</head>
<body>
<div class="top-bar">
    <div class="top-bar-wrapper">
    <div class="group">
        <span class="telephone">{{ '📞 +30 2842085255' }}</span>
        <a class="email" href="mailto:cretan-villa@cretan-villa.com">{{'📧 cretan-villa@cretan-villa.com'}}</a>
        <span class="address">{{'📍 Oplarhigou Lakerda 16, 72200, Ierapetra, Crete, Greece'}}</span>
    </div>
    <select name="locale" id="locale" wire:model='locale'>
        <option value="el" > 🇬🇷 GR</option>
        <option value="en"> 🇬🇧 EN</option>
        <option value="de"> 🇩🇪 DE</option>
        <option value="sv"> 🇸🇪 DE</option> {{-- load dynamically the locales--}}
    </select>
    </div>{{-- top-bar-wrapper --}}
</div> {{-- top-bar --}}

<nav>
    <div class="nav-wrapper">
    <img src="{{ asset('images/cretan-villa-logo.png')}}" alt="Cretan Villa" class="logo" />
        <ul class="nav-group">
{{--        <li> <a href="#home">Home</a> </li>--}}
{{--        <li class="dd">--}}
{{--            <a href="#accomodation" >Accommodation</a>--}}
{{--            --}}{{-- <ul class="dropdown-menu">--}}
{{--                <li><a href="#sublink1">Test 1</a></li>--}}
{{--                <li><a href="#sublink1">Test 2</a></li>--}}
{{--                <li><a href="#sublink1">Test 3</a></li>--}}
{{--            </ul> --}}
{{--        </li>--}}

            @foreach($pages as $page)
                @if($page->is_published && !$page->is_subpage)
                    <li> <a href="{{ $page->slug }}">{{ $page->name }}</a>
                        <ul class="sub">
                            @foreach($pages as $sub)
                                @if($sub->is_subpage && $sub->parent_page === $page->id)
{{--                                    {{ \App\Models\PageContent::where('page_id', $sub->id)->first()->slug }} --}}
                            <li><a href="#">{{ $sub->name }}</a></li>
                                @endif
                            @endforeach
                        </ul>
                    </li>

                @endif
            @endforeach
{{--        <li> <a href="#home">Ierapetra</a></li>--}}
{{--        <li> <a href="#home">Rates</a></li>--}}
{{--        <li> <a href="#home">Ikia Apartment</a></li>--}}
{{--        <li> <a href="#home">Gallery</a></li>--}}
{{--        <li> <a href="#home">Contact Us</a></li>--}}
{{--        <li>  <a href="#home">Covid-19</a></li>--}}
        </ul>
    <div class="spacer"> &nbsp; </div>
</div>
</nav>

    <div class="container">
        {{-- REMOVE BELOW --}}
        @error('general_errors')
        <h4 style="color: red;"> {{ $message }}</h4>
        @enderror
        @error('general_error')
        <h4 style="color: red;"> {{ $message }}</h4>
        @enderror

        {{-- REMOVE ABOVE --}}
        <h1> Cretan Villa a traditional hotel in Ierapetra</h1>

        <div class="images">
            <div class="form-wrapper">
                Inquiry for reservation | Check availability & request a reservation. We will come back to you shortly.
             <livewire:step_1_form />
                <a class="sub-form-actions" href="#asd"> Reservation & Cancellation Policy </a> |  <a class="sub-form-actions" href="#asd"> Modify / Cancel </a> | <a class="sub-form-actions" href="#asd"> Check your reservation </a>
                </div>
            <img src="{{asset('images/cretan-villa-bg-2-resized.jpg')}}" alt="">
        </div>

            <div class="page-content">
                {{ 'content' }}
{{--                @yield('content')--}}

           </div>

            <div class="card-wrapper">
                <div class="room-card">
                    <span class="title">
                       {{ 'Double // Twin Room' }}
                    </span>
                    <img src="{{ asset('images/double_room.jpg') }}" alt="">
                    <span class="description">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Quasi repellat voluptatum optio nulla illo molestias, ratione ipsam commodi eveniet delectus labore totam officiis assumenda maiores voluptatem, excepturi, facilis aliquid distinctio.
                    </span>
                    <div class="details">

                    </div>
                    <div class="buttons">
                        <a href="{{'load-locales-from-file-here'}}" class="view-more">
                            View More
                        </a>

                        <button class="book-now-button"> Book Now From 55,00$ </button>
                    </div>
                </div> {{--Room card--}}
                <div class="room-card">
                    <span class="title">
                        Triple Room
                    </span>
                    <img src="{{ asset('images/triple_room.jpg') }}" alt="">
                    <span class="description">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Quasi repellat voluptatum optio nulla illo molestias, ratione ipsam commodi eveniet delectus labore totam officiis assumenda maiores voluptatem, excepturi, facilis aliquid distinctio.
                    </span>
                    <div class="details">
                        <div class="group-block">

                        </div>
                    </div>
                    <div class="buttons">
                        <a href="{{'load-locales-from-file-here'}}" class="view-more">
                            View More
                        </a>

                        <button class="book-now-button"> Book Now </button>
                    </div>
                </div>{{--Room card--}}
                <div class="room-card">
                    <span class="title">
                        Ikia Apartment
                    </span>
                    <img src="{{ asset('images/double_room.jpg') }}" alt="">
                    <span class="description">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Quasi repellat voluptatum optio nulla illo molestias, ratione ipsam commodi eveniet delectus labore totam officiis assumenda maiores voluptatem, excepturi, facilis aliquid distinctio.
                    </span>
                    <div class="details">

                    </div>
                    <div class="buttons">
                        <a href="{{'load-locales-from-file-here'}}" class="view-more">
                            View More
                        </a>

                        <button class="book-now-button"> Book Now </button>
                    </div>
                </div>{{--Room card--}}
                <div class="room-card">
                    <span class="title">
                        Akrolithos Apartments
                    </span>
                    <img src="{{ asset('images/akrolithos.jpg') }}" alt="">
                    <span class="description">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Quasi repellat voluptatum optio nulla illo molestias, ratione ipsam commodi eveniet delectus labore totam officiis assumenda maiores voluptatem, excepturi, facilis aliquid distinctio.
                    </span>
                    <div class="details">

                    </div>
                    <div class="buttons">
                        <a href="{{'load-locales-from-file-here'}}" class="view-more">
                            View More
                        </a>

                        <button class="book-now-button"> Book Now </button>
                    </div>
                </div>{{--Room card--}}
            </div>{{--Card-wrappers--}}

            <div class="footer">
                <div class=".flex-footer-container">
                    <ul>
                        <li> <a class="footer-link"> Link 1 </a> </li>
                    </ul>
                </div>
                <div class="footer-lower-container"> Copyrights © Cretan-Villa.com</div>
                    {{ htmlspecialchars('<a href="#"> TEST </a>') }}
{{--                {!! html_entity_decode('<a href="#"> TEST </a>') !!}--}}

                    {!!  html_entity_decode('&lt;a href=&quot;#&quot;&gt; TEST &lt;/a&gt;') !!}

            </div>

        </div>{{-- Container --}}



</body>

    <script>
        public function carousel(){
            while(true){

            }
        }
    </script>

<script>
    public function toggleLocales(){
        var loc = document.getElementById('locale-dd');
        if(loc.classList.toggle('show'));
    }
</script>

<script>
    const button = document.getElementById('submit');

    button.addEventListener('click', function(event) {
        event.target.disabled = true;
    });
</script> {{-- multiple form submission prevention --}}

<script>
    const checkInPicker = flatpickr("#check_in_date", {
    // ... other check-in options here ...
    dateFormat: "d-m-Y",
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
