{{--<div id="image-slider" class="splide">--}}
{{--    <div class="splide__track">--}}
{{--        <ul class="splide__list">--}}
{{--            <li class="splide__slide">--}}
{{--                <img src="{{ asset('images/hotels-ierapetra-1.jpg') }}" loading="lazy" alt="{{ 'Outside cretan villa' }}">--}}
{{--                <h2> Welcome to ierapetra </h2>--}}
{{--            </li>--}}
{{--            <li class="splide__slide">--}}
{{--                <img src="{{ asset('images/ierapetra-kreta-hotels.jpg') }}" loading="lazy" alt="{{ 'hotel_test_alt_change_later' }}">--}}
{{--                <h2> Test text 2</h2>--}}
{{--            </li>--}}
{{--            <li class="splide__slide">--}}
{{--                <img src="{{ asset('images/ierapetra-crete-hotels.jpg') }}" loading="lazy" alt="{{ 'hotel_test_alt_change_later' }}">--}}
{{--                <h2> Test text 1</h2>--}}
{{--            </li>--}}
{{--            <li class="splide__slide">--}}
{{--                <img src="{{ asset('images/ierapetra-crete.jpg') }}" loading="lazy" alt="{{ 'hotel_test_alt_change_later' }}">--}}
{{--                <h2> Test text 1</h2>--}}
{{--            </li>--}}

{{--        </ul>--}}
{{--    </div>--}}
{{--</div>--}}
<div class="wrapper">
    <div id="carousel" class="carousel" style="max-height: 600px;">
        <div class="slide">
            <h2>A charming century family hotel of historical value, in the town of Ierapetra...</h2>
            <picture>
                <img decoding="async" loading="lazy" src="{{ asset('images/hotels-ierapetra-1.jpg') }}" alt="less-rain-dummy-01">
            </picture>
        </div>
        <div class="slide">
            <h2>the interior decoration together with the furnishing and the architectural
            <br>
                structure combine  to create a time reminiscent of days gone by...
            </h2>
            <picture>
            <img decoding="async" src="{{ asset('images/ierapetra-kreta-hotels.jpg') }}" alt="{{ 'hotel_test_alt_change_later' }}">
            </picture>
        </div>
        <div class="slide"> <h2>your home away from home</h2>
            <img decoding="async" src="{{ asset('images/ierapetra-crete-hotels.jpg') }}" alt="{{ 'hotel_test_alt_change_later' }}">
        </div>
        <div class="slide">
            <h2>The holdays you've been looking for in...</h2>
            <img decoding="async" src="{{ asset('images/cretan-villa-hotels-ierapetra-creta.jpg') }}" alt="{{ 'hotel_test_alt_change_later' }}">
        </div>
        <div class="slide">
            <h2>Ierapetra, the perfect all year round holiday destination.</h2>
            <img decoding="async" src="{{ asset('images/ierapetra-crete.jpg') }}" alt="{{ 'hotel_test_alt_change_later' }}">
        </div>
    </div>
</div>

