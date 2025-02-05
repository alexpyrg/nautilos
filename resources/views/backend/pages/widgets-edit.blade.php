@extends('layouts.cms')
@section('content')


    @if($widget_num == 1)
        {{-- KARTES --}}

        <form method="post" class="mainBackEndForm" action="/admin/widgets/save/1">
            <h2 style=""> Επεξεργασία Κάρτας </h2>
            {{--                <input type="hidden" name="page_id" value="{{ $page->id }}">--}}
            {{--        <div class="input-group-block">--}}
            {{--            <label> Όνομα: </label>--}}
            {{--            <select class="" style="font-size: 18px;">--}}
            {{--                @if($filteredPages)--}}
            {{--                    @foreach($filteredPages as $page)--}}
            {{--                        <option value="{{ $page->id }}"> {{ $page->name }} </option>--}}
            {{--                    @endforeach--}}
            {{--                @endif--}}
            {{--            </select>--}}
            {{--        </div>--}}
            <div class="input-group-block" >
                <label> Αριθμός Κάρτας: {{ $card_number }} </label>

            </div>

            <div class="input-group-block" >
                <label> Σελίδα: </label>
                <select class="" name="page_id" style="font-size: 18px;">
                    @if($filteredPages)
                        @foreach($filteredPages as $page)
                            <option value="{{ $page->id }}"> {{ $page->name }} </option>
                        @endforeach
                    @endif
                </select>
            </div>
            <div class="input-group-block" >
                <label for="is_enabled" style="display: inline-block;"> Εμφάνιση: </label>
                <input type="checkbox" style="display: inline-block;" id="is_enabled" name="is_enabled">
            </div>
            <div class="input-group-block">
                <label> Τύπος Δωματίου: </label>
                <select name="roomType" style="font-size: 18px;">
                    @foreach($rooms as $room)
                        <option value="{{ $room->id }}"> {{ $room->name }} </option>
                    @endforeach
                </select>
            </div>
            <div class="input-group-block">
                {{--
                 More features soon.
                --}}
            </div>
            <button type="submit" style="">
                Αποθήκευση
            </button>
        </form>

    @elseif($widget_num == 2)
        {{-- Minima popup --}}

        <form method="post" class="mainBackEndForm" action="/admin/widgets/save/2">
            <h2 style=""> Επεξεργασία Popup </h2>
            {{--                <input type="hidden" name="page_id" value="{{ $page->id }}">--}}
            {{--        <div class="input-group-block">--}}
            {{--            <label> Όνομα: </label>--}}
            {{--            <select class="" style="font-size: 18px;">--}}
            {{--                @if($filteredPages)--}}
            {{--                    @foreach($filteredPages as $page)--}}
            {{--                        <option value="{{ $page->id }}"> {{ $page->name }} </option>--}}
            {{--                    @endforeach--}}
            {{--                @endif--}}
            {{--            </select>--}}
            {{--        </div>--}}
            <div class="input-group-block" >
                <label> Σελίδα: </label>
                <select class="" name="page_id" style="font-size: 18px;">
                    @if($filteredPages)
                        @foreach($filteredPages as $page)
                            <option value="{{ $page->id }}"> {{ $page->name }} </option>
                        @endforeach
                    @endif
                </select>
            </div>
            <div class="input-group-block" >
                <label for="is_enabled" style="display: inline-block;"> Εμφάνιση: </label>
                <input type="checkbox" style="display: inline-block;" id="is_enabled" name="is_enabled">
            </div>
            <div class="input-group-block">
                <label> Τύπος: </label>
                <select name="type" name="type" style="font-size: 18px;">
                    <option value="1">Μικρό | 400 pixels</option>
                    <option value="2">Μεγάλο | 600 pixels</option>
                </select>
            </div>
            <div class="input-group-block">
                {{--
                 More features soon.
                --}}
            </div>
            <button type="submit" style="">
                Αποθήκευση
            </button>
        </form>
    @endif


@endsection
