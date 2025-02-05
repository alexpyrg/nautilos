@extends('layouts.main_blade_views')
@section('content')
<div>

    <div class="wrapper">
        <div id="carousel" class="carousel">

            <div class="slide">
                <h2>Enjoy the delight of sipping a raki...</h2>
                <img decoding="async" src="{{ asset('images/activities_n1.jpg') }}" alt="gournia"></div>
            <div class="slide">
                <h2>"fly" underwater</h2 >
                <img decoding="async" src="{{ asset('images/activities_n2.jpg') }}" alt="Ha gorge"></div>
            <div class="slide">
                <h2>tasteful colours of Crete</h2>
                <img src="{{ asset('images/activities_n3.jpg') }}" decoding="async" alt="chrissi island beach">
            </div>
            <div class="slide">
                <h2>let loose and dance!</h2>
                <img src="{{ asset('images/activities_n4.jpg') }}" decoding="async" alt="sarakina gorge">
            </div>

            <!-- Add as many slides as you need -->
        </div>

    </div> {{-- WRAPPER END --}}
    <livewire:inquiry-information  />
    <livewire:main-four-field-form />
    <livewire:booking-options-client />

       <div class="locations-container">
           <h1 class="animated-title" style="padding-left: 0; font-family: Geometria-Light; font-size: 36px;">Activities to do in Ierapetra</h1>


           <div class="location">
               <h2>
                   Kirvia Festival at Ierapetra
               </h2>
               <img src="{{ asset('images/kirvia_festival_crete_ierapetra.jpg') }}">
               <p>
                   Every summer, from the middle of July to the end of
                   August the traditional festival of "Kyrvia" takes place. It is a program of various
                   culture activities including : nights of singing and dancing by local folk and popular groups,
                   special concerts by famous artists, theater performances, exhibitions of Cretan handicrafts,
                   beach parties, etc. Most of the activities take place either in the fortress of Kales or in
                   open arias. A number of them are free for the public.
                   Traditional festivals also take place all year round in various villages of the area.
               </p>
           </div>
           <div class="location">
               <h2>
                   The Street Market of Ierapetra with local fruits and vegetables
               </h2>
               <img src="{{ asset('images/grocery_market_ierapetra.jpg') }}">
               <p>
                   If you find yourself in town on a Saturday morning,
                   be sure to check out the street market on Psilinaki str. Be sure to go
                   early as the market is only open from 7am to 13.30 pm. The local farmers,
                   shepherds and fishermen sell their own goods and products in low prices.
                   You can find any kind of fresh vegetable (cucumbers, tomatoes, pepers),
                   fruits (oranges, melons, bananas, grapes), many types of cheese (graviera,feta),
                   and different types of honey, olives, nuts and Cretan sausages (Lasithiotika).
                   You can also find a large variety of clothes, tools and flowers.
              </p>
           </div>
           <div class="location">
               <h2>
                   Scuba diving & Dive excursions
               </h2>
               <img src="{{ asset('images/ierapetra_scuba_diving.jpg') }}">
               <p>
                   The "Ierapetra diving center"  is just 1 Km. east of Ierapetra. The visitor can discover the fascinating under sea world of Ierapetra. Boat dive trips are in progress throughout the entire season with experienced dive guides. Jump into 2 - hours programme and get the feeling of flying in a weightless environment with all the colorful marine life around you. It is a unique and exhilarating experience not to be missed. </p>
           </div>

           <div class="location">
               <h2>
                   Horse riding school
               </h2>
               <img src="{{ asset('images/ierapetra_horse_riding.jpg') }}">
               <p>
                   Horse riding school of Ierapetra is a professional riding establishment were
                   top level riding instruction as well as other horse centered activities are
                   offered. The establishment is located at a private estate, very well looked
                   after full of flowers and beautiful sitting areas.
               </p>
           </div>
           <div class="location">
               <h2>
                   Panigiria
               </h2>
               <img src="{{ asset('images/panigiri-ierapetra-crete.jpg') }}">
               <p>
                   If you like local feasts (“panighyria”), several ones take place in the area: on the 21 st of May in honor of Aghios Constantinos and Eleni, at Gra Lyghia, on the 27 th of July, in honor of Aghios Panteleimonas at Vainia, on the Pentecost at Kentri, on the 15 th of July, in honor of Aghios Kerykos at Stavros, on the 20 th of July, in honor of Prophet Elijah at Kato Chorio. </p>
           </div>
           <div class="location">
               <h2>
                   Shopping
               </h2>
               <img src="{{ asset('images/ierapetra_crete_market.jpg') }}">
               <p>
                   Visitor can take a leisurely walk in the vivid center of the town and discover a large variety of different kinds of shops. Taste the Cretan sweets, such as "xerodigana and kalitsounia"which you can find in all the pastry shops of the town. You can also try the famous hard dry Cretan bread (paximadi) of Veterano pastry shop at Eleftherias sq. Search for the famous handmade Cretan knives, and worry beats (kompoloi). At Kothry street you can find small shops with local healthy organic products such as herbs (oricano, thyme, rosemary) honey, pure olive oil etc. In the cellars of the town you can find a big variety of the famous Cretan wines, the traditional spirit"raki" and different kinds of ouzo and retsina.</p>
           </div>
           <div class="location">
               <h2>
                   Water Sports
               </h2>
               <img src="{{ asset('images/watersports_ierapetra_crete.jpg') }}">
               <p>
                   Waterskiing, jet-skiing, banana, pedal boating, and windsurfing are available on Ierapetra. On the south east coast you will find "Waikiki" water-sport center.

               </p>
           </div>
           <div class="location">
               <h2>
                   Kafeneion
               </h2>
               <img src="{{ asset('images/ierapetra_cafenio.jpg') }}">
               <p>
                   Kafeneion is the traditional simple coffee house where the locals (usually men) share conversation coffee, raki and mezedes (appetizers). It's the ideal place for tavli (backgammon), and cards. Try the small plates with the mezedes, such as dolmades, keftedes, tsatziki and enjoy the exciting sounds of the busy Cretan life.</p>
           </div>
       </div>
</div>
@endsection
