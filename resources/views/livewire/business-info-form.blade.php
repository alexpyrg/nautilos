@extends('layouts..cms')
@section('content')
<div class="container">

    <form wire:submit.prevent="save">
        <div class="form-title-and-info">
            <h2>
                Φόρμα αλλαγής γενικών πληροφοριών επιχείρησης!
            </h2>
            {{-- <p>
                Αν δεν είστε σίγουροι για το τι κάνετε εδώ θα ήταν καλό να συμβουλευτείτε τον Developer!
                <br>
                Οι αλλαγές εδώ επηρεάζουν άμεσα την ιστοσελίδα σας, πρέπει να είστε σίγουροι για ότι κάνετε εδώ!
            </p> --}}

            <div class="input_group block">
                <label for="address">Email:</label>
                <input class="" name="address" wire:model="address" placeholder="hello@example.com">
            </div>

            <div class="input_group block">
                <label for="telephone">Τηλέφωνο:</label>
                <input class="" name="telephone" wire:model="telephone" placeholder="2101234567">
            </div>

            <div class="input_group block">
                <label for="analytics_id">Google Analytics:</label>
                <input class="" name="analytics_id" wire:model="analytics_id" disabled placeholder="Error! No analytics script found!">
            </div>


        </div>
    </form>
<div>
@endsection
