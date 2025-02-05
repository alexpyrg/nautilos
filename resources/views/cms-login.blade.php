@extends('layouts.cms_auth')
@section('content')
    <div class="login-div">
        <img src="{{ asset('images/flexibuild/login.svg') }}" alt="">

        <form  action="/admin/authenticate" method="POST">
            <h2> Σύνδεση </h2>
            @csrf
            <div class="input_group block">
                <label for="username">Username:</label>
                @error('username')
                <span class="error"> {{ $message }} </span>
                @enderror
                <input type="text" name="username" placeholder="Username..?">
            </div>
            <div class="input_group block">
                <label for="username">Password:</label>
                @error('password')
                <span class="error"> {{ $message }} </span>
                @enderror
                <input type="password" name="password" placeholder="Password..?">
            </div> {{-- TEST COMMENT --}}

            <div class="input_group inline">

                <input type="submit" value="Σύνδεση" class="subton" style=" color: white;">
                <a class="button"  id="cancelLoginButton" href="{{ App::getLocale() == 'en' ? '/' : '/'.App::getLocale() }}" type="test">Ακύρωση</a>
            </div>
        </form>
    </div>
@endsection
