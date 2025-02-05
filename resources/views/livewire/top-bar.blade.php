<div class="top-bar">
    <div class="sub-container">
        <img src="{{ asset('images/logo.png') }}" class="logo" width="51" height="82" alt="{{ 'logo_alt' }}">  {{-- LOGO ALT REMEMBER TO ADD DYNAMIC ALT!!!! --}}
        <div style="display: inline;">
        <h1 >Nautilos Cruises</h1>
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
