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
                <h2>No other place can delight the senses of smell and taste like Crete.</h2>
                <img decoding="async" src="{{ asset('images/places_n1.jpg') }}" alt="gournia"></div>
            <div class="slide">
                <h2>A perfect combination of mountains, sea, earth and sky</h2 >
                <img decoding="async" src="{{ asset('images/places_n2.jpg') }}" alt="Ha gorge"></div>
            <div class="slide">
                <h2>Live a unique Cretan experience</h2>
                <img src="{{ asset('images/places_n3.jpg') }}" decoding="async" alt="chrissi island beach">
            </div>
            <div class="slide">
                <h2>Feel the power of the Cretan nature</h2>
                <img src="{{ asset('images/places_n4.jpg') }}" decoding="async" alt="sarakina gorge">
            </div>
            <!-- Add as many slides as you need -->
        </div>

    </div>{{-- WRAPPER END--}}
    <livewire:inquiry-information />
    <livewire:main-four-field-form />
    <livewire:booking-options-client />
    <div class="locations-container">
        <h1 class="animated-title" style="padding-left: 0; font-family: Geometria-Light; font-size: 36px;">Day Trips & Excursions out of Ierapetra</h1>
        <p>
            The traveler can use Ierapetra as a point of departure to make trips to the beautiful villages of the region, by the sea or in the mountains.
            Several villages in the interior offer to <br>the visitor a traditional atmosphere and lifestyle, making Ierapetra a beautiful resort for your holidays on Crete. There you will experience the famous Cretan hospitality, taste <br>some of the local unique specialities like "staka", "mizithropites" and "dolmadakia".
            <br>
            <br>
            The villages of Episkopi, Anatoli, Myrtos, Ai Ghianni, Kalamafka, Kavousi are rich in monuments, monasteries, fortresses and remote beaches waiting for you to discover them.
        </p>
        <div class="location">
            <h2>Gournia</h2>
            <img src="{{ asset('images/gournia_ierapetra_crete.jpg') }}" alt="">
            <p>Gournia, is one of the most noteworthy archaeological sites in Crete and the best preserved of the Minoan settlements. It is located 15 km. north of Ierapetra. It appears to date from 1600 to 1400 B.C. The ruins, consist of a town overlooked by a small palace. The town of Gournia is a network of streets and stairways flanked by houses with walls up to 2m. height.</p>
        </div>
        <div class="location">
            <h2>The Gorge of HA</h2>
            <img src="{{ asset('images/ha_gorge_crete.jpg') }}">
            <p>
                The gorge of Ha is located 8 km. north of Ierapetra. Ha is a place where many species of Cretan flora and fauna exist. If you are lucky you might see eagles or vultures.You can also see an incredible number of wildflowers.
            </p>
        </div>
        <div class="location">
            <h2>Chrissi Island (Gaidouronisi)</h2>
            <img src="{{ asset('images/chrissi_island_crete.jpg') }}">
            <p>The southernmost natural park in Europe. One hour by boat from Ierapetra finds you on a tropical island. The island of Crissi is located 8 miles south of Ierapetra. The island is almost flat with colorful volcanic rocks covered in white sand and aquatic fossils. The shallow crystal blue-green waters,the sandy beaches , the millions of sea shells which are widely spread on the north beaches and the rare cedar forest are the most impressive features of the island.
                <h3>The island is protected by national and European legislations.(Natura 2000).</h3>
            </p>

        </div>
        <div class="location">
            <h2>Sarakina Gorge</h2>
            <img src="{{ asset('images/sarakina_gorge.jpg') }}">
            <p>The village of Mithi is located 20 km. west of Ierapetra. It is a sparkling charming village of whitewashed houses. Within a short distance from the village starts the wonderful gorge of Sarakina with plenty of water and vegetation.</p>
        </div>
        <div class="location">
            <h2>Boat Trip to Pseira island & Agriomandra beach</h2>
            <img src="{{ asset('images/psira.jpg') }}">
            <p>Take the boat from Tholos beach, 3 km from Kavousi  and you will have the chance to visit  the small Minoan town on the uninhabited  island of Pseira, a couple of nautical miles north off the coast of Ierapetra. The trip continues to the magical beach of Agriomandra where you can swim, relax and sunbathe in one of the most hidden beaches of Crete. For more Information and guidance you can apply in our reception office.</p>
        </div>
        <div class="location">
            <h2>Fournou Korfi</h2>
            <img src="{{ asset('images/fournou_korifi_ierapetra.jpg') }}">
            <p>West of Ierapetra and near Myrtos, on a low hill known as Fournou Korfi was found the prehistoric settlement of Myrtos,dating from the Early Minoan period. 90 rooms and other areas, designed for a variety of uses, have been excavated. One of the rooms served as a sanctuary. Among the ruins of the settlement a number of pots, stone seals, daggers, weaving implements and a statue of a goddess were found.</p>
        </div>
        <div class="location">
            <h2>The Monumental Olive tree in Kavousi</h2>
            <img src="{{ asset('images/olive-oil-tree-kavousi.jpg') }}">
            <p>The ancient olive tree is located in the village of Kavousi, on the site of "Azorias", about eleven kilometers north east of Ierapetra. The dimensions of the tree trunk measured at height of 0.8m and mainly its largest diameter is 4,90m and its perimeter at this height is 14,30m. According to the method with the annual growth rings the age of this tree is estimated at about 3450 years BP (is 3312 years old in 2012). This olive tree is a natural monument,  it is the oldest olive tree in the world! The olive tree has been declared by the Association of Cretan Olive Municipalities as a natural monument because of the large size of its trunk and because of its location near three ancient settlements: Vrondas, Kastro and Azorias, where several artifacts related to olive oil have been uncovered.</p>
        </div>
        <div class="location">
            <h2>Milonas Waterfalls</h2>
            <img src="{{ asset('images/gorge-milona.jpg') }}">
            <p>The Milonas Gorge is a gorge, situated near the village of Agios Ioannis, 7 kilometers east of Ierapetra. It has a large waterfall at the end of the walking path. The walking path is only a 30-minute walk from the road and it is quite easy to follow as it is well signed. At the end of the path, you will find the 40-meters height fall of Milonas. The best season to cross the path is in spring, since the waterfall has plenty of water, while in summer, although nice as well it can be much drier.</p>
        </div>
        <div class="location">
            <h2>Selakano Forest</h2>
            <img src="{{ asset('images/selakano-forest-crete.jpg') }}">
            <p>Selakano forest, popular for its wild beauty and one of the most important natural landmarks of Crete, is integrated in the network NATURA 2000. The mountainous pine forest starts 35 km northwest of Ierapetra and ends on the slopes, below the top “Master Christ” of Dikti mountain. It is mainly covered by the sturdy species of “trachea pine”, which is resistant to drought and the rocky soil of the area. Selakano ecosystem includes also tree oaks, cypresses, maples, sycamores, wild pear trees, sage, dwarf trees and birds of prey, flying over the steep slopes of Dikti. In Melissokipos region bees have their little kingdom. In spring, beekeepers from all over Crete bring their beehives here, making Selakano forest the most important apiculture point on the island. The forest is ideal for endless walks in a landscape that alternates steep slopes, ravines, gorges), springs, streams and clearings. A large part of it is crossed by the E4 path. You may access to the forest from the village Selakano or Kalamafka, and you may cross it through the paths of the forest.</p>
        </div>
        <div class="location">
            <h2>Boat Trip to Koufonisi Island</h2>
            <img src="{{ asset('images/koufonisi2.jpg') }}">
            <p>This little island is located across the village of Makrygialos and is also known as Lefki. In Minoan times Koufonisi was an important production center of Tyrian purple (a purple red natural dye) extracted from sea snails and a site for sponge fishing. It roughly six kilometres long and 5.5 kilometres across. The island has some pretty spectacular Hellenistic and Roman remains like a well preserved ancient theatre and some great white sand beaches. It is surrounded by many invisible reefs which make it a nice place for snorkeling. The trip usually takes an hour where you can experience the nature, and once you reach the island of Koufonisi, you can go ahead relaxing on beaches or walking through the tracks. Boats depart from Makrigialos port in the morning at 10.00.</p>
        </div>
    </div>
</div>
@endsection
