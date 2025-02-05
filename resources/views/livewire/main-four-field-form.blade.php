<div class="mfff-container">
    {{-- Livewire Form --}}
    <form class="reservation-form-mini" wire:submit.prevent="next_step">
        <div class="sub-container-60">
            {{-- Trip Type Selection --}}
            <div class="form-group">
                <label for="trip_type">{{ __('Select Trip Type') }}</label>
                <select wire:model="trip_type" id="trip_type" @error('trip_type') class="error-border" @enderror>
                    <option value="0">{{ __('---') }}</option>
                    <option value="1">{{ __('Classic Cruise') }}</option>
                    <option value="2">{{ __('Private Cruise') }}</option>
                    <option value="3">{{ __('Semi-Private Cruise') }}</option>
                </select>
                @error('trip_type') <span class="error">{{ $message }}</span> @enderror
            </div>

            {{-- Trip Date --}}
            <div class="form-group">
                <label for="trip_date">{{ __('Select Trip Date') }}</label>
                <input type="text" id="trip_date" class="tripdate" wire:model="trip_date" name="trip_date" placeholder="{{ __('Trip Date') }}" @error('trip_date') class="error-border" @enderror>
                @error('trip_date') <span class="error">{{ $message }}</span> @enderror
            </div>

            {{-- Next Step Button --}}
            <div class="form-group text-center">
                <label> &nbsp; </label>
                <button type="submit" class="custom-form-button">
                    <span class="custom-form-button-a">{{ __('Next') }}</span>
                </button>
            </div>
        </div>
    </form>
</div>

@push('bottom-scripts')

@endpush


