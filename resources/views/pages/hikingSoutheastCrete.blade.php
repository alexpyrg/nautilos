@extends('layouts.main_blade_views')
@section('content')
    <div>
        <div class="wrapper">
            <div id="carousel" class="carousel" style="">
                <div class="slide">
                    <h2>We walk together...</h2>
                    <picture>
                        <img decoding="async" loading="lazy" src="{{ asset('images/hiking_n1.jpg') }}" alt="Hiking in ierapetra all together">
                    </picture>
                </div>
                <div class="slide">
                    <h2>
                        in the beautiful mountains with breathtaking views of land and sea...
                    </h2>
                    <picture>
                        <img decoding="async" src="{{ asset('images/hiking_n2.jpg') }}" alt="{{ 'Hiking in ierapetra' }}">
                    </picture>
                </div>
                <div class="slide"> <h2>relax and enjoy the nature</h2>
                    <img decoding="async" src="{{ asset('images/hiking_n3.jpg') }}" alt="{{ 'relax and enjoy the nature' }}">
                </div>

            </div>
        </div>
        <livewire:inquiry-information />
        <livewire:main-four-field-form/>
        <livewire:booking-options-client />
        <div class="locations-container">
            <h1 class="animated-title" style="padding-left: 0; font-family: Geometria-Light; font-size: 35px;"> "To get to know the heart of Crete, you should definitely go hiking in nature!" </h1>

            <div class="location">
                <p>In south east Crete, we walk together in the beautiful mountains with breathtaking views of land and sea. Olive groves, chapels and villages turns up in the rich and varied landscape. Peace and quiet in a tranquillity where all you hear is the wind and the goat bells.</p>
                <img src="{{ asset('images/hiking-southeast-crete.jpg') }}">
                <p>We might have different preferences. Some like to walk with hiking poles, others stop now and then to photograph and some want to immerse themselves in thoughts. We spend time in nature, take in greenery and views, enjoy the present. Both body and soul get rest and recovery, new energy and power. We walk together with room for everyone.</p>
                <p>The hikes begins and ends in Ierapetra, in southeast Crete and they are of various length and difficulty. The hiking period is from 15 of March until 15 of June and from 15 of September till 15 of December.</p>

                <h2>There are two alternatives:   </h2>
                <h2 style="color: gray;">
                    1st: 4 nights accommodation (double occupancy) in Cretan Villa or Akrolithos apartments with 3 days hiking.
                  </h2>

                <p> <b>First day:</b> Arrival to hotel. Relaxation… settle in.</p>
                <p> <b>Second day: </b>  Half Day Hike. Taxi to a mountain village where we walk up to a chapel and a magnificent view, followed by a walk over the mountains to another village where we have lunch and a taxi will take us back to Ierapetra. This hike gives us the opportunity to get to know each other and get used to the landscape and the climate. Dinner together in the evening (optional).</p>
                <p> <b>Third day: </b>  Full Day Hike. Today we are going to cross Crete! We leave Ierapetra in the morning, walking through olive groves to the first village. Small mountain roads and village streets will take us through villages up north to Pachia Ammos at Mirabello Bay where we have a bite to eat at a tavern down by the seaside. Return to Ierapetra by bus or taxi.</p>
                <p> <b>Fourth day:</b> Full Day Hike. Taxi up to a mountain village where the hike starts. We pass by a church and a monastery on the way to a chapel at the lookout point where, again, a magnificent view awaits. Along a winding mountain road, we walk down to a village where a taxi is waiting to take us back to Ierapetra where we will have lunch.</p>
                <p> <b>Fifth day:</b>  Day of departure.</p>
                <p>The programme may be altered due to weather conditions or other unforeseeable events.</p>
                <p> <b>Price: </b> 3 days hiking 500 € for 2 people.</p>
                <p>
                    <b>Included in the price:</b> Hiking leader and in connection with the hikes transport and lunch.
                <br>
                <b>Not included:</b> Flight fares and transfers, accommodation, other meals and drinks.
                <br>
                You can find the rates and book the type of accommodation from our booking form.
                </p>
            </div>

            <div class="location">
                <img src="{{ asset('images/hiking-southeast-crete-2.jpg') }}">
                <h2 style="color: gray;">
                    1st: 4 nights accommodation (double occupancy) in Cretan Villa or Akrolithos apartments with 3 days hiking.
                </h2>

                <p> <b>Day one:</b> Arrival to hotel. Relaxation… settle in.</p>
                <p> <b>Second day: </b>  Half Day Hike. Taxi to a mountain village where we walk up to a chapel and a magnificent view, followed by a walk over the mountains to another village where we have lunch and a taxi will take us back to Ierapetra. This hike gives us the opportunity to get to know each other and get used to the landscape and the climate. Dinner together in the evening (optional).</p>
                <p> <b>Third day: </b> Full Day Hike. Today we are going to cross Crete! We leave Ierapetra in the morning, walking through olive groves to the first village. Small mountain roads and village streets will take us through villages up north to Pachia Ammos at Mirabello Bay where we have a bite to eat at a tavern down by the seaside. Return to Ierapetra by bus or taxi.</p>
                <p> <b>Fourth day:</b>  No scheduled activities. Please feel free to ask if you want suggestions or ideas for things to do and see!</p>
                <p> <b>Fifth day:</b>    Full Day Hike. Taxi up to a mountain village where the hike starts. We pass by a church and a monastery on the way to a chapel at the lookout point where, again, a magnificent view awaits. Along a winding mountain road, we walk down to a village where a taxi is waiting to take us back to Ierapetra where we will have lunch.</p>
                <p> <b>Sixth day:</b>  No scheduled activities.</p>
                <p> <b>Seventh day:</b> Full Day Hike. We go by taxi to today’s starting point. We will walk the same path as pilgrims up to a monastery. After a short rest, we continue up into the mountains, down into a valley and across the lower mountain crest down to the village and lunch. Many nice views remain on the retina! Taxi bring us back to Ierapetra. Dinner together in the evening (optional).</p>
                <p> <b>Eighth day:</b>  Day of departure.</p>

                <p>The programme may be altered due to weather conditions or other unforeseeable events.</p>

                <p>
                    <b>Price:</b> 4 days hiking 700 € for 2 people.<br>
                    <b>Included in the price:</b>  Hiking leader and in connection with the hikes transport and lunch.<br>
                    <b>Not included:</b>  Flight fares and transfers, accommodation, other meals and drinks.<br>
                    You can find the rates and book the type of accommodation from our <a href="/">booking form.</a><br>

                </p>

            </div>

            <div class="location">
                <img src="{{ asset('images/hiking-southeast-crete.jpg') }}">
                <h2>Important / Basics</h2>
                <p>
                    A half day hike is about 4 hours, a full day hike is about 6 hours. We begin as early as possible to avoid the warmest time of the day,
                </p>
                <p>Each one brings their own beverage and food on the hike.</p>
                <p> The hiking leader speaks Swedish and English. </p>
                <p> Hiking in the mountains means walking uphill and downhill, which mainly put a strain on feet and knees. The warmer climate can be tiring. You need good health and fitness. You do not need to be an advanced hiker, but it is good if you are accustomed of being in motion for a some hours, for example by having been hiking before.</p>
                <p>
                    Equipment:<br>
                    Hiking shoes. (used). <br>
                    Special socks for hiking (if desired). <br>
                    Hiking clothes (comfortable clothes). <br>
                    Backpack for day hiking. <br>
                    Sun protection: headdress, sunglasses, waterproof sunscreen. <br>
                    Rainwear (and rain cover for your backpack). <br>
                    Extra sweater. <br>
                    Travel pharmacy, personal medicines, mosquito repellent. <br>
                    What you need and desire for your provisions, for example, mug, water bottle, thermos bottle, plastic box. <br>
                    Sit pad (if desired). <br>
                    European Health Insurance card (EHIC). <br>
                </p>
                        <h2>
                            Hiking activity confirmation and cancellation policy
                        </h2>
                <h3>Activity Confirmation</h3>
                <p>
                    Upon confirmation you pay 30 % of the price as a registration fee.<br>
                    14 days prior to the starting date of the hiking week you make the final payment. <br>
                    Booking will be valid when you have paid your registration fee. <br>
                </p>

               <h3> Activity Payment: </h3>
                <p>
                Contact us for information about payment methods.
                </p>

                <h3> Activity cancellation policy: </h3>
                <p>
                    If cancelled more than 14 days before the starting date of the hiking week you will be charged the registration fee.
                    <br>If cancelled later than 14 days before the starting date of the hiking week you will be charged full price.
                    <br>In case of illness, as evidenced by a medical certificate, all will be refunded except the registration fee.
                </p>
            </div>


        </div>
    </div>
@endsection

