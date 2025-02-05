<form class="step-1-form" wire:submit.prevent="next_step">
    <div class="form-group-block">
        <label for="room_type">{{ 'Room type' }}</label>

        <select name="room_type" wire:model.live="room_type"  id="room_type">
            <option value="0">Please choose..</option>
           @foreach($rooms as $room)
               @if($room->is_available === 1)
                   <option value="{{$room->id}}"> {{ $room->name }} </option>
                   @endif
            @endforeach
        </select>
    </div>
    <div class="form-group-block check_in_input">
        <label for="check_in_date">{{'Check-in'}}</label>
        <input type="text"  name="check_in_date" wire:model="check_in_date" id="check_in_date" placeholder="Pick Check-in date">
    </div>

    <span class="material-symbols-outlined">
                            arrow_right_alt
                        </span>

    <div class="form-group-block check_out_input">
        <label for="check_out_date">{{'Check out'}}</label>
        <input type="text" name="check_out_date" wire:model="check_out_date" placeholder="Pick Check-out date" id="check_out_date">
    </div>

    <div class="form-group-block">
        <label for="nr_rooms">Nr. Rooms</label>
        <select name="nr_rooms" wire:model="nr_rooms" id="nr_rooms" >
            <option value="0">Please choose..</option>
            @if($room_type != null && $room_type !=0)
                @for($i=1; $i<=$fetched_num; $i++)
            <option value="{{$i}}">{{$i}}</option>
                @endfor
                @endif
        </select>
    </div>

    <button type="submit"> {{'Next'}} </button>
</form>
