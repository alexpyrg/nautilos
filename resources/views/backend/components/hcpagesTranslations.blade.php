@extends('layouts.cms')
@section('content')
    <style>
        body {font-family: Arial;}

        /* Style the tab */
        .tab {
            overflow: hidden;
            border: 1px solid #ccc;
            background-color: #f1f1f1;
            min-height: 50px;
            max-width: 955px;
            width: 955px;
            margin: 0 auto;
        }

        /* Style the buttons inside the tab */
        .tab button {
            display: inline-block;
            background-color: inherit;
            float: left;
            border: none;
            outline: none;
            cursor: pointer;
            padding: 14px 16px;
            transition: 0.3s;
            font-size: 17px;
            max-width: fit-content;
        }

        /* Change background color of buttons on hover */
        .tab button:hover {
            background-color: #ddd;
        }

        /* Create an active/current tablink class */
        .tab button.active {
            background-color: #ccc;
        }

        /* Style the tab content */
        .tabcontent {
            display: none;
            padding: 6px 12px;
            -webkit-animation: fadeEffect 1s;
            animation: fadeEffect 1s;
        }

        /* Fade in tabs */
        @-webkit-keyframes fadeEffect {
            from {opacity: 0;}
            to {opacity: 1;}
        }

        @keyframes fadeEffect {
            from {opacity: 0;}
            to {opacity: 1;}
        }
    </style>
    <div>

        <div class="listedLocales" style="min-width: 800px;  display: block; position: relative; margin: 1rem auto;">
            @foreach($locales as $locale)
                @if($selected_locale->id == $locale->id)
                    <a style="padding: .6rem; margin-inline: .4rem; display: inline-block; text-align: center; font-size: 18px;min-width: 60px; background-color: #0e415e; color: white; text-decoration: none" href="/admin/pages/content/{{$page_id}}/{{$locale->code}}" class="locale_button">{{ $locale->code }}</a>
                @else
                    <a style="padding: .6rem; margin-inline: .4rem; display: inline-block; text-align: center; font-size: 18px;min-width: 60px; background-color: #1a9aef; color: white; text-decoration: none" href="/admin/pages/content/{{$page_id}}/{{$locale->code}}" class="locale_button">{{ $locale->code }}</a>
                @endif
            @endforeach
        </div>

        <div class="tab" >
            <button class="tablinks" onclick="openCity(event, 'Main')"> Παράμετροι </button>
            <button  class="tablinks" disabled onclick="openCity(event, 'Advanced')"> Για Προχωριμένους</button>
            {{--        <button class="tablinks" onclick="openCity(event, 'Tokyo')">Tokyo</button>--}}
        </div>

        <form method="post" style="max-height: 1000px; display: block; margin-top: 2rem; min-width: fit-content;  max-width: 1000px!important; box-sizing: border-box" action="/admin/page/content/save/{{$page->id}}/{{ $selected_locale['code'] }}">
            <div id="Advanced" class="tabcontent">
                {{--            <button type="submit" style="margin-left:0; margin-top: 1rem; padding: .5rem!important; overflow: hidden; ">Αποθήκευση</button>--}}
            </div>
            <div id="Main" class="tabcontent">

                @foreach($page_translations as $pt)
                    <div class="input_group block">
                        @error( $pt->name )
                        <span class="error"> {{ $message }} </span>
                        @enderror
                        <label for="mail_subject">
                            {{ $pt->name }}
                        </label>
                        <textarea type="text" name="body">
{{ $pt->content }}</textarea>
                    </div>
                @endforeach


                <button type="submit" style="margin-left:0; margin-top: 1rem; ">Αποθήκευση</button>

            </div>



        </form>


        <script>
            function openCity(evt, cityName) {
                var i, tabcontent, tablinks;
                tabcontent = document.getElementsByClassName("tabcontent");
                for (i = 0; i < tabcontent.length; i++) {
                    tabcontent[i].style.display = "none";
                }
                tablinks = document.getElementsByClassName("tablinks");
                for (i = 0; i < tablinks.length; i++) {
                    tablinks[i].className = tablinks[i].className.replace(" active", "");
                }
                document.getElementById(cityName).style.display = "block";
                evt.currentTarget.className += " active";
            }
        </script>
    </div>
@endsection
