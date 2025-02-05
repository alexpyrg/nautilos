<div class="login-div">
    <img src="{{ asset('images/flexibuild/login.svg') }}" alt="">

    <form  action="/easyupdate/authenticate" method="POST">
        <h2> Σύνδεση </h2>
        @csrf
        <div class="input_group block">
            <label for="username">Username:</label>
            @error('username')
            <span class="error"> {{ $message }} </span>
            @enderror
            <input type="text" placeholder="Username..?">
        </div>
        <div class="input_group block">
            <label for="username">Password:</label>
            @error('password')
            <span class="error"> {{ $message }} </span>
            @enderror
            <input type="password" placeholder="Password..?">
        </div> {{-- TEST COMMENT --}}

        <div class="input_group inline">
            <input type="submit" value="Σύνδεση" >
            <button href="#" class="cancel-button" wire:click.prevent="cancelSub" id="cancelLoginButton" type="test">Ακύρωση</button>
        </div>
    </form>
</div>
