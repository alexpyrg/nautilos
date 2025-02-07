<!doctype html>
<html lang="{{ App::getLocale() }}">
<head>
    <!-- … your existing head markup … -->
    <style>
        div.gallery-container{
            max-width: 1350px;
            display: flex;
            flex-direction: row;
            flex-wrap: wrap;
            position: relative;
            height: auto;
            overflow: hidden;
            min-height: 100vh;
            margin: 0 auto;
            justify-content: center;
        }
        div.gallery {
            margin: 5px;
            border: 1px solid #ccc;
            float: left;
            width: 250px;
            display: block;
            height: 150px;
        }
        div.gallery:hover { border: 1px solid #777; }
        div.gallery img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            object-position: center;
        }
        .album-filters {
            text-align: center;
            margin-bottom: 20px;
        }
        .album-filters button {
            margin: 0 5px;
            padding: 5px 10px;
            cursor: pointer;
        }
        .album-filters button.active {
            background-color: #333;
            color: #fff;
        }
    </style>
    <title>@if($pageContent) {{ $pageContent->title }} @endif</title>
</head>
<body>
<livewire:top-bar />
<livewire:menu-bar />
<div class="divider"></div>
<livewire:inquiry-information />
<livewire:main-four-field-form />
<livewire:booking-options-client />

<!-- ALBUM FILTER BUTTONS (All first, then one per album) -->
<div class="album-filters">
    <button class="album-btn active" data-album="all">All</button>
    @if(isset($albums))
        @foreach($albums as $album)
            <button class="album-btn" data-album="{{ $album->code }}">{{ $album->name }}</button>
        @endforeach
    @endif
</div>

<div class="gallery-container">
    {!! html_entity_decode($pageContent->content) !!}

    @foreach($roomImages as $ri)
        @php
            // Assume that each image has an "album" attribute.
            // If not, default to "all"
            $albumCode = isset($ri->album) && !empty($ri->album) ? $ri->album : 'all';
        @endphp
        <div class="gallery" data-album="{{ $albumCode }}">
            <img data-fancybox="gallery" src="{{ asset('images/pageImages/' . $ri->image_path) }}" alt="{{ $ri->alt }}" width="600" height="400">
        </div>
    @endforeach
</div>

<div class="divider"></div>
<livewire:footer />

<!-- Scripts -->
<script src="{{ asset('js/flatpickr.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.umd.js"></script>
<script>
    Fancybox.bind('[data-fancybox]', {
        dragToClose: false,
        closeButton: "top",
    });
</script>
<!-- Your other scripts (e.g. Livewire, flatpickr, slideshow, etc.) go here -->

<!-- Album Filtering Script -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const albumButtons = document.querySelectorAll('.album-btn');
        albumButtons.forEach(function(button) {
            button.addEventListener('click', function() {
                // Remove active class from all buttons, then mark this as active
                albumButtons.forEach(btn => btn.classList.remove('active'));
                this.classList.add('active');

                // Get the selected album code from data attribute
                const album = this.getAttribute('data-album');
                // Loop through all gallery items and show/hide
                const galleries = document.querySelectorAll('.gallery');
                galleries.forEach(gallery => {
                    if (album === 'all' || gallery.getAttribute('data-album') === album) {
                        gallery.style.display = 'block';
                    } else {
                        gallery.style.display = 'none';
                    }
                });
            });
        });
    });
</script>
</body>
</html>
