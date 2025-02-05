@extends('layouts.main_blade_views')
@section('content')
<div>
    <div class="wrapper">
        <div id="carousel" class="carousel">

            <div class="slide">
                <h2>Feel the sea breeze and watch the sun set</h2>
                <img decoding="async" src="{{ asset('images/beaches_n1.jpg') }}" alt="gournia"></div>
            <div class="slide">
                <h2>Feel the Greek summer</h2 >
                <img decoding="async" src="{{ asset('images/beaches_n2.jpg') }}" alt="Ha gorge"></div>
            <div class="slide">
                <h2>Relax to the sound of the waves</h2>
                <img src="{{ asset('images/beaches_n3.jpg') }}" decoding="async" alt="chrissi island beach">
            </div>
            <div class="slide">
                <h2>Let's play happily along the shore</h2>
                <img src="{{ asset('images/beaches_n4.jpg') }}" decoding="async" alt="sarakina gorge">
            </div>

            <!-- Add as many slides as you need -->
        </div>

    </div> {{-- WRAPPER END --}}
    <livewire:inquiry-information />
    <livewire:main-four-field-form />
    <livewire:booking-options-client />
    <div class="locations-container">
        <h1 class="animated-title" style="padding-left: 0; font-family: Geometria-Light; font-size: 35px;">Here are some beaches you should visit while in Ierapetra, Crete</h1>
        <p>
            Ierapetra is built on the longest beach in Crete offering an endless choice of
            golden beaches with deep crystal blue waters far away from industrial areas and
            ships passing
            <br>
            by. All major beaches of Ierapetra from east to west are awarded
            with the European Committee's BLUE FLAGS each single year.
            The Blue Flag is an eco-label awarded to
            <br>
            beaches and marinas with good standards
            for water quality, safety, environmental education and information.
            Ierapetra coasts have also received the the golden prize awarded
            <br>
            by the Coastal &
            Marine Union – EUCC Quality Coast programme and they are among Europe’s top 10 regions
            ever receiving the distinction which constitutes a certification
            <br>
            of their high environmental quality, the rich cultural heritage and the
            preservation of local traditions.
        </p>

        <div class="location">
            <h2>
                West Beach of Ierapetra (Apovathra)
            </h2>
            <img src="{{ asset('images/west-Ierapetra-beach.jpg') }}">
            <p>
                A beautiful beach with small pebbles and sand and sparkling waters which attracts many tourist in the summer. There is access to a seatrac system for people with special needs. (Water sports are available). Along the beach there are many tamarisk trees where you can rest under their shade.
            </p>
        </div>
        <div class="location">
            <h2>
                East Beach of Ierapetra (Agios Andreas)
            </h2>
            <img src="{{ asset('images/east-ierapetra-agio-andreas.jpg') }}">
            <p>
                Beautiful rocky coastlines with deep blue waters. (Scuba diving is available).
           </p>
        </div>
        <div class="location">
            <h2>
                Beach of Chrissi Island
            </h2>
            <img src="{{ asset('images/chrissi-beach.jpg') }}">
            <p>
                One of the loveliest of Crete, with beautiful white sandy beach and crystal clear green-blue waters. 8 miles south of Ierapetra. (Frequent daily boat services).
            </p>
        </div>
        <div class="location">
            <h2>
                Beach of Koutsounari (Long Beach)
            </h2>
            <img src="{{ asset('images/megali-paralia-koutsounari.jpg') }}">
            <p>
                A picturesque long gray pepply and sandy beach at the village of Koutsounari, located 7 km. east of Ierapetra. There are a couple of taverns where you will enjoy a wide variety of freshly prepared Greek food. It's perfect for diving and snorkeling since the waters are deep. (Water sports are available)
            </p>
        </div>
        <div class="location">
            <h2>
                Beach of Ferma
            </h2>
            <img src="{{ asset('images/ferma.jpg') }}">
            <p>
                A small sandy beach with crystal-clear waters located 8 km east of Ierapetra.
            </p>
        </div>
        <div class="location">
            <h2>
                Beach of Agia Fotia
            </h2>
            <img src="{{ asset('images/agia-fotia.jpg') }}">
            <p>
                A beautiful sandy bay, situated before the village of Agia Fotia, 10 km.east of Ierapetra.
            </p>
        </div>
        <div class="location">
            <h2>
                Beach of Kalamaki
            </h2>
            <img src="{{ asset('images/kalamaki.jpg') }}">
            <p>
                It is a peaceful beach with thin sand and pebbles near the village of Nea Anatoli, 6 km.west of Ierapetra.
            </p>
        </div>
        <div class="location">
            <h2>
                Beach of Myrtos
            </h2>
            <img src="{{ asset('images/myrtos.jpg') }}">
            <p>
                A small sandy beach, located 10 km.west of Ierapetra.
            </p>
        </div>
    </div>
</div>

@endsection
