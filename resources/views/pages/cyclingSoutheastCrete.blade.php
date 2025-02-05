@extends('layouts.main_blade_views')
@section('content')
    <div>
        <div class="wrapper">
            <div id="carousel" class="carousel" style="">
                <div class="slide">
                    <h2>The best journeys happen on two wheels</h2>
                    <picture>
                        <img decoding="async" loading="lazy" src="{{ asset('images/cycling_1.webp') }}" alt="less-rain-dummy-01">
                    </picture>
                </div>
                <div class="slide">
                    <h2>
                        Living experiences will allow you to experience the territory.
                    </h2>
                    <picture>
                        <img decoding="async" src="{{ asset('images/cycling_2.webp') }}" alt="{{ 'hotel_test_alt_change_later' }}">
                    </picture>
                </div>
                <div class="slide"> <h2>You never finish exploring a place until you’ve seen it from the seat of a bicycle</h2>
                    <img decoding="async" src="{{ asset('images/cycling_3.jpg') }}" alt="{{ 'hotel_test_alt_change_later' }}">
                </div>

            </div>
        </div>

        <livewire:inquiry-information />
        <livewire:main-four-field-form/>
        <livewire:booking-options-client />
        <div class="locations-container">
            <h1 class="animated-title" style="padding-left: 0; font-family: Geometria-Light; font-size: 36px;"> Ierapetra area by Bike </h1>
            <p>Cycling vacation: What better way to take in everything that south east Crete has to offer by discovering its nature on a bike? Connecting with Cretan nature and getting into road biking.
                Are you a nature lover, a fan of seaside resorts or a mountain goat ? There’s a cycling trip in south east Crete for every traveller.</p>


            <div class="location">
                {{--                <h2>Gournia</h2>--}}
                <img src="{{ asset('images/cycling_1.webp') }}" alt="">
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. '
                    <br><br>
                    Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit.
                </p>
            </div>

            <div class="location">
                {{--                <h2>Gournia</h2>--}}
                <img src="{{ asset('images/cycling_2.webp') }}" alt="">
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. '
                    <br><br>
                    Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit.
                </p>
            </div>


            <div class="location">
                {{--                <h2>Gournia</h2>--}}
                <img src="{{ asset('images/cycling_3.jpg') }}" alt="">
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. '
                    <br><br>
                    Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit.
                </p>
            </div>
        </div>
    </div>
@endsection

