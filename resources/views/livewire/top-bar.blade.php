<div class="top-bar">
    <div class="sub-container">
        <div style="display: flex; flex-wrap: wrap;">
        <img style="display: block;" src="{{ asset('images/logo.png') }}" class="logo" width="51" height="82" alt="{{ 'logo_alt' }}">  {{-- LOGO ALT REMEMBER TO ADD DYNAMIC ALT!!!! --}}
        <div style="display: flex; flex-direction: column; margin-left: 3rem;">
        <h1 style="display:block; height: fit-content; padding:0;margin:0;margin-bottom: .6rem;" >Nautilos Cruises <br></h1>
            <h3 style=" padding:0; margin:0; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; color: #317273; "> Cruise Like no other</h3>
        </div>
        </div>
        <div class="language-and-info-container" id="languageAndInfo">
            <ul class="language-container">
                @foreach($locales as $loc)

                <li id="en" ><a href="/{{ strtolower($loc->code) }}/"   @if(app()->getLocale() == strtolower($loc->code)) class="selected" @endif hreflang="{{ $loc->code }}"> {{ $loc->code }} </a></li>

                @endforeach
            </ul>
            <div class="general-info">
               {!! $tb->line_1 !!}<br>
                {!! $tb->line_2 !!}<br>
                {!! $tb->line_3 !!}
            </div>
        </div>
    </div>
</div>
