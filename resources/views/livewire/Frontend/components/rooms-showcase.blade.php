<div class="card-wrapper">
    {{-- Dynamically populate cards from $cards --}}
    @foreach($cards as $card)
        @php
            // Localized content for the card
            $content = $card->contents->where('locale_id', $selected_locale->id)->first();

            // Fetch the minimum rate for the room
            $minRate = $monthlyRates[$card->roomType_id]->min_rate ?? null;
        @endphp

        <div class="card">
            {{-- Image --}}
            <img src="{{ asset('images/cardImages/' . $card->image_path) }}" alt="{{ $content->title ?? 'Cruise Image' }}" class="card-img">

            {{-- Card Content --}}
            <div class="card-content">
                {{-- Title --}}
                <h3 class="card-title">{!! $content->title ?? $card->title !!}</h3>

                {{-- Location --}}
                <p class="card-location">📍 {{ $content->location ?? 'Location not available' }}</p>

                {{-- Capacity --}}
                <p class="card-capacity">{{ __('Capacity:') }} {{ $content->capacity ?? 'N/A' }} {{ __('Guests') }}</p>

                {{-- Price --}}
                <p class="card-price">{{ $gt['price_label'] ?? 'Price:' }} {{ $minRate ?? __('Price not available') }} €</p>

                {{-- Details --}}
                <ul class="card-details">
                    <li>{{ $content->feature_1 ?? 'Feature 1 not available' }}</li>
                    <li>{{ $content->feature_2 ?? 'Feature 2 not available' }}</li>
                    <li>{{ $content->feature_3 ?? 'Feature 3 not available' }}</li>
                </ul>

                {{-- Actions --}}
                <div class="card-actions">
                    <button class="btn btn-details" onclick="window.location.href='{{ $content->view_more_link ?? '#' }}'">
                        {{ $gt['view_more'] ?? 'More Details' }}
                    </button>
                    <button class="btn btn-book" data-room="{{ $card->roomType->id }}">
                        {{ $gt['book_now'] ?? 'Book Now' }}
                    </button>
                </div>
            </div>
        </div>
    @endforeach

    <script>
        document.querySelectorAll('.btn-book').forEach(button => {
            button.addEventListener('click', function () {
                const roomId = this.getAttribute('data-room');
                const form = document.getElementById(`form-${roomId}`);

                if (form) {
                    // Open the form modal or toggle its visibility
                    form.classList.toggle('active');
                } else {
                    alert('Form not found for the selected room.');
                }
            });
        });

    </script>
</div>
