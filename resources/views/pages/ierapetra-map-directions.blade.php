@extends('layouts.main_blade_views')
@section('content')
    <div>
        <livewire:carousel-homepage />
        <livewire:inquiry-information />
        <livewire:main-four-field-form/>
        <livewire:booking-options-client />
        <div class="locations-container">
            <h1 class="animated-title" style="padding-left: 0; font-family: Geometria-Light; font-size: 36px;">Ierapetra Map and directions to Cretan Villa</h1>
    <a href="https://www.google.com/maps/dir/Eparchiaki+Odos+Ierapetras-Pachias+Ammou,+Greece/Cretan+Villa+Hotel+Ierapetra+Crete,+Oplarchigou+Lakerda,+Ιεράπετρα,+Greece/@35.0123604,25.7437908,17z/data=!4m19!4m18!1m10!1m1!1s0x14907d7562745489:0xc17f2f23588c5f0!2m2!1d25.7844862!2d35.0515314!3m4!1m2!1d25.7408962!2d35.0112437!3s0x14907969eb0165c7:0xfdd44d72e7ab31d1!1m5!1m1!1s0x1490796992c9712b:0xecc2a87124d4d09e!2m2!1d25.740506!2d35.011384!3e0?hl=en-US" target="_blank"><img alt="Ierapetra map and directions to Cretan Villa hotel" src="https://www.cretan-villa.com/images/ierapetra-map_parking.jpg" style="height:607px; width:672px"></a>
          <p>
              <a href="https://www.cretan-villa.com/ierapetra-map.pdf" style="color:#9D968D;" target="_blank">Print the map and directions to Cretan Villa&nbsp; hotel&nbsp; <img src="{{ asset('images/print.png') }}"></a>
          </p>
            <p>GPS coordinates: N 035° 0.668, E 25° 44.425</p>
            <p>Free public parking is possible at a location nearby (reservation is not needed).</p>
        </div>
    </div>
@endsection
