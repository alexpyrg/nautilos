<div class="menu-bar" style="background-image: url('{{ asset('images/footer_bg.jpg') }}); background-size: cover; background-position: center; background-repeat: no-repeat;">
    <ul class="menu">
{{--        @foreach($pages as $page)--}}

{{--            @if(!$page->is_subpage)--}}
{{--                <a href="#home"> Accomodation </a>--}}
{{--            @endif--}}
{{--        @endforeach--}}

{{--        <li><a href="/" class="selected"> Home </a></li>--}}
{{--        <li class="dropdown">--}}
{{--            <a href="#home"> Accomodation </a>--}}
{{--            <div class="dropdown-content">--}}
{{--                <a href="/en/single-room-accommodation-greece-crete-lassithi-ierapetra-hotels">Single Room</a> --}}{{-- ADD CUSTOM URLS --}}
{{--                <a href="/en/double-room-accommodation-greece-crete-lassithi-ierapetra-hotels">Double / Twin Room</a> --}}{{-- ADD CUSTOM URLS --}}
{{--                <a href="/en/triple-room-accommodation-greece-crete-lassithi-ierapetra-hotels"> Triple Room </a>--}}
{{--                <a href="/en/crete-akrolithos-apartments"> Akrolithos Apartments </a>--}}
{{--            </div>--}}
{{--        </li>--}}
{{--        <li><a href="/en/rates"> Rates </a></li>--}}
{{--        <li class="dropdown">--}}
{{--            <a href="/en/ierapetra-town-crete-holidays-guide"> Ierapetra </a>--}}
{{--            <div class="dropdown-content">--}}
{{--                <a href="/en/excursions-sightseeing"> Places to see</a> --}}{{-- ADD CUSTOM URLS --}}
{{--                <a href="/en/crete-sports-activities"> Things to do </a>--}}
{{--                <a href="/en/ierapetra-crete-beaches"> Beaches </a>--}}
{{--                <a href="/en/ierapetra-crete-chrissi-island"> Chrissi Island </a>--}}
{{--                <a href="/en/hiking-southeast-crete"> Hiking </a>--}}
{{--                <a href="/en/cycling-southeast-crete"> Cycling </a>--}}
{{--            </div>--}}
{{--        </li>--}}
{{--        <li><a href="#home"> Gallery </a></li>--}}
{{--        <li><a href="/en/contact-us"> Contact Us </a></li>--}}
{{--    </ul> {{-- END OF MENU DELETE IF UNCOMMENTED! --}}

{{--    @foreach($pages as $page)--}}
{{--        @if($page->is_published && !$page->is_subpage)--}}
{{--            <li class="dropdown"> <a  href="@if(!$page->is_home)/{{ \Illuminate\Support\Facades\App::getLocale() }}/{{ $pageContent->where('page_id', $page->id)->pluck('url')->first() }}@else {{ $pageContent->where('page_id', $page->id)->pluck('url')->first() }} @endif">{{ $pageContent->where('page_id', $page->id)->pluck('display_name')->first() }}</a>--}}
{{--                <div class="dropdown-content">--}}
{{--                    @foreach($subpages as $sub)--}}
{{--                        @if($sub->is_subpage && $sub->parent_page == $page->id && $sub->is_published)--}}
{{--                            --}}{{--                                    {{ \App\Models\PageContent::where('page_id', $sub->id)->first()->slug }} --}}

{{--                            <a href="/{{ \Illuminate\Support\Facades\App::getLocale() }}/{{ $pageContent->where('page_id', $sub->id)->pluck('url')->first() }}">--}}
{{--                                {{ $pageContent->where('page_id', $sub->id)->pluck('display_name')->first() }}</a>--}}
{{--                        @endif--}}
{{--                    @endforeach--}}
{{--                </div>--}}
{{--            </li>--}}

{{--        @endif--}}
{{--    @endforeach--}}

        @foreach($pages as $page)
            @php
                // Try to get the content in the current locale, fallback to English
                $localeContent = $pageContent->where('page_id', $page->id)->first();
                $defaultContent = $pageContentFB->where('page_id', $page->id)->first();
                $displayContent = $localeContent ?? $defaultContent;
            @endphp

            @if($displayContent && $page->is_published && !$page->is_hardCoded)
                <li class="dropdown">
                    <a href="{{ !$page->is_home ? '/' . strtolower($currentLocale) . '/' . $displayContent->url : $displayContent->url }}">
                        {{ $displayContent->display_name }}
                    </a>
                    <div class="dropdown-content">
                        @foreach($subpages as $sub)
                            @php
                                // Try to get the content in the current locale, fallback to English for subpages
                                $subLocaleContent = $pageContent->where('page_id', $sub->id)->first();
                                $subDefaultContent = $pageContentFB->where('page_id', $sub->id)->first();
                                $subDisplayContent = $subLocaleContent ?? $subDefaultContent;
                            @endphp

                            @if($subDisplayContent && $sub->is_published && $sub->parent_page == $page->id && !$sub->is_hardCoded)
                                <a href="/{{ strtolower($currentLocale) }}/{{ $subDisplayContent->url }}">
                                    {{ $subDisplayContent->display_name }}
                                </a>
                            @endif
                        @endforeach
                    </div>
                </li>
            @endif
        @endforeach

    </ul>

</div>
