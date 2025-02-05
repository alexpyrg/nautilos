@extends('layouts.main_blade_views')
@section('content')
    <div>
        <div class="wrapper">
            <div id="carousel" class="carousel">
                {{--            <div class="slide">--}}
                {{--                <h2>Ierapetra, the perfect all year round holiday destination</h2>--}}
                {{--                <picture>--}}
                {{--                    <img decoding="async" loading="lazy" src="{{ asset('images/dimos-ierapetras-top.jpg') }}" alt="">--}}
                {{--                </picture>--}}
                {{--            </div>--}}
                <div class="slide">
                    <h2>Thousands of shells that make the sand pinkish</h2>
                    <img decoding="async" src="{{ asset('images/chrissi_n1.jpg') }}" alt="gournia"></div>
                <div class="slide">
                    <h2>A lost tropical paradise</h2 >
                    <img decoding="async" src="{{ asset('images/chrissi_n2.jpg') }}" alt="Ha gorge"></div>
                <div class="slide">
                    <h2>Become a Robinson for one day</h2>
                    <img src="{{ asset('images/chrissi_n3.jpg') }}" decoding="async" alt="chrissi island beach">
                </div>
                <div class="slide">
                    <h2>All shades of blue</h2>
                    <img src="{{ asset('images/chrissi_n4.jpg') }}" decoding="async" alt="sarakina gorge">
                </div>
                <!-- Add as many slides as you need -->
            </div>

        </div>{{-- WRAPPER END--}}
        <livewire:inquiry-information />
        <livewire:main-four-field-form />
        <livewire:booking-options-client />
        <div class="locations-container">
            <h1 class="animated-title" style="padding-left: 0; font-family: Geometria-Light; font-size: 36px;">Chrissi Island. A lost tropical paradise.</h1>
            <p>
                One of the 81 uninhabited islands of Crete is Chrissi island or Gaidouronisi (donkey) island. The residents of Ierapetra call it "the Island" as there is a special relationship between them. Chrissi  lies 8 miles away from Ierapetra's coasts, in the Libyan sea.
            </p>
            <div class="location">
{{--                <h2>Gournia</h2>--}}
                <img src="{{ asset('images/chrissi1.jpg') }}" alt="">
                <p>
                    Chrissi island is almost flat with colorful volcanic rocks covered in gold sand, purple shells and sand dunes. It is 5 km long and has an average width of 1 km and an average height of 10m. The highest hill is on the east part and is called "Kefala" 31 m high. From over there the visitor can have an impressive view of the Libanon cedar forest, probably the last existing in Europe. The density of these trees is approximately 28 trees per hectare and in an average age of 200 years old.
                    <br><br>
                    On the west part of the island the visitor can see the well-preserved old chapel of Agios Nikolaos (possibly built in the 13th century), the salt pan which still gathers salt, the old port, the Minoan ruins, some Roman carved graves and the light house. At the Byzantine era the main source of income was fishing, salt export and the export of "porfira" a scarlet dye produced from shells for the cloaks of Europe's royalty.

                </p> </div>
            <div class="location">
{{--                <h2>The Gorge of HA</h2>--}}
                <img src="{{ asset('images/chrissi_island_crete.jpg') }}">
                <p>Later pirates forced the inhabitants to flee Chrissi for safety in Crete and used the island as a hide-out. Many pirate and merchant ships have sunk in the area. In the sea around the island the variety of the marine species is impressive. Around 54 different species of fossils were set on the volcanic rocks 350000 to 70000 years ago, when Chrissi was covered by water. A number of them still live in the sea around.
                    <br>
                    <br>
                    As a result all the northern costs (Belegrina, Hatzivolakas& Kataprosopo bays) are full of shells. The turquoise waters around the island are shallow. Up to 1 Km north and south, the depth does not exceed 10 m. This makes Chrissi the best place for snorkeling. Chrissi looks like the last paradise on Earth. A place to dream, swim and go walking.
                    <br>
                    <br>
                    About 700 m east of Chrissi is a small rocky island " Mikronisi". On Mikronisi hundreds of herring seagulls make their nests. For the well-preserved rare ecosystem and its beauty, Chrissi is protected as an "Area of Intense Natural Beauty".
                </p>

            </div>
            <div class="location">
{{--                <h2>Chrissi Island (Gaidouronisi)</h2>--}}
                <img src="{{ asset('images/Capturechriss3.JPG') }}">
                <p>
                    From the middle of May till late October there are daily excursions to the island. The departure is from Ierapetra at 10.30 a.m. and the return is around 16.00 p.m. The duration of the voyage is about one 50 min. (depending on the weather). Passengers disembark at "Vougiou Mati" on the south part, where there is a tavern. From the tavern there is a path along the southern beach. Turning north, it leads to the eastern side of "Belegrina" bay (shells beach). Within a day trip the visitor has enough time to walk around, bath in its turquoise waters and have a snack at the tavern. In Chrissi's unspoiled and fragile environment visitors must act with utmost respect towards nature.
<br><br>
                    It is not allowed to litter, to collect rocks, shells, plants, to light fires, to walk outside the designated paths and to camp.
            </div>
            <div class="location">
                <h2>How to get to Chrissi island.</h2>
                <p>To get to Chrissi island you must take the boat from Ierapetra and Chrissi Island boat terminal next to the police station. Boats depart from Ierapetra in the morning at 10.30, 11.00, 11.30 and 12.00. The trip takes about 45-55 minutes to reach the island.  Boats ranging in various sizes, capacities and styles to satisfy even the most demanding guests.</p>
                <img src="{{ asset('images/Nautilos ierapetra chrissi island.jpg') }}">
                <p>
                    From the fishing port next to the castle, you can take Nautilos luxury motor yacht. The trip with Nautilos is shorter, it takes about 20 minutes. Apart from the trip to Chrissi Island, Nautilos offer lunch on board and the opportunity for a swim and snorkeling in the beaches arount the island, before returning to Ierapetra in the afternoon. For more infomation click on the link: <a href="https://www.nautiloscruises.com/">https://www.nautiloscruises.com</a>
                </p>
            </div>

        </div>
    </div>
@endsection
