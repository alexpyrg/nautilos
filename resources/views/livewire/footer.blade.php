<footer style="display: flex!important; justify-content: center; flex-direction: row; align-items: center; background-image: url({{ asset('images/footer_bg.jpg') }}); background-size: cover; background-repeat: no-repeat; background-position: center; height: 200px;">


                {{-- Section 1: Contact Information --}}
                <div id="ft1" class="col-md-4 textBox" style="font-size:13px; color: white;" data-ninja-font="helvetica_regular_normal_sgvsd">
                    {{ $ft['cv_na_title'] ?? 'Nautilos Cruises Safe, Fast, Luxury Cruises' }}<br>
                    {{ $ft['foot_address'] ?? 'Ierapetra, Crete, Greece. PC: 72200' }}<br>
                    {{ $ft['mobile'] ?? 'Mob.:0030 6972894279' }}<br>
                    {{ $ft['front_desk'] ?? "We'd love to hear from you." }}<br>
                    {{ $ft['cem'] ?? 'Our aim is your safe entertainment and the provision of quality services.' }}<br>
                    {{ $ft['gps_coordinates'] ?? 'GPS coordinates: Latitude: 35.002775 | Longitude: 25.737147' }}
                </div>

                {{-- Section 2: Links --}}
                <div id="ft2" class="col-md-4 textBox text-center footer-links">
                    <div id="TA_cdsscrollingravenarrow342" class="TA_cdsscrollingravenarrow">
                        <div id="CDSSCROLLINGRAVE" class="white border narrow cx_brand_refresh1">
                            <div class="rightBorder">
                                <a target="_blank" href="https://www.tripadvisor.com/">
                                    <img src="https://static.tacdn.com/img2/brand_refresh/Tripadvisor_lockup_vertical.svg" alt="Tripadvisor" class="widEXCIMG" id="CDSWIDEXCLOGO">
                                </a>
                            </div>
                            <marquee behavior="scroll" scrollamount="3" direction="left" onmouseover="this.stop();" onmouseout="this.start();">
                                <div>
                                    <span>
                                        <span class="reviewTitle" data-ninja-font="arial_bold_normal_qxjpy">
                                            "If you really want to see Chrissy when she's deserted - a true bliss - choose Nautilos Cruise"
                                        </span>
                                        <span class="reviewContribution" data-ninja-font="arial_regular_normal_qxjpy">
                                            September 8, {{ now()->year }} - A Tripadvisor Traveler
                                        </span>
                                        <span class="link" data-ninja-font="arial_regular_normal_qxjpy">
                                            Read 311 reviews of
                                            <a target="_blank" href="{{ $ft['tripadvisor_url'] ?? '#' ?? '' }}" rel="nofollow" class="">
                                                {{ $ft['tripadvisor_reviews'] ?? 'Nautilos Cruises' }}
                                            </a>
                                        </span>
                                    </span>
                                </div>
                            </marquee>
                            <img src="https://www.tripadvisor.com/img/cdsi/partner/transparent_pixel-17198-2.gif" height="1" width="1">
                        </div>
                    </div>
                    <script src="https://www.jscache.com/wejs?wtype=cdsscrollingravenarrow&amp;uniq=342&amp;locationId=3300417&amp;lang=en_US&amp;border=true&amp;shadow=false&amp;backgroundColor=white&amp;display_version=2"></script>
                </div>

                {{-- Section 3: Social Media Links --}}
                <div id="ft3" class="col-md-2" style="margin-top: 30px;">
                    <div class="text-center" style="color: white;" data-ninja-font="helvetica_regular_normal_sgvsd">CONNECT WITH US</div>
                    <a class="social-icons" href="{{ $social_buttons['trip_advisor_link'] ?? '' }}" target="_blank">
                        <i class="fa fa-tripadvisor fa-2x fa-fw" style="color: green;"></i>
                        Find us at Tripadvisor
                    </a>
                    <br>
                    <a class="social-icons" href="{{ $social_buttons['facebook_link'] ?? '' }}" target="_blank">
                        <i class="fa fa-facebook-official fa-2x fa-fw" style="color: blue;"></i>
                        Find us at Facebook
                    </a>
                    <br>
                    <a class="social-icons" href="{{ $social_buttons['google_plus_link'] ?? '#' }}" target="_blank">
                        <i class="fa fa-google-plus-square fa-2x fa-fw" style="color: red;"></i>
                        Find us at Google+
                    </a>
                    <br>
                    <a class="social-icons" href="{{ $social_buttons['instagram_link'] ?? ''}}" target="_blank">
                        <i class="fa fa-instagram fa-2x fa-fw" style="color: hotpink;"></i>
                        Follow us at Instagram
                    </a>
                </div>

                {{-- Section 4: Weather Widget --}}
                <div id="ft4" class="col-md-2 textBox text-right footer-links">
                    <div id="cont_97949b05422e17ad21f8d77d5f4b72cf" style="width: 175px; color: rgb(255, 255, 255); background-color: transparent; border: 1px solid transparent; margin: 0px auto;">
                        <script type="text/javascript" async src="https://www.yourweather.co.uk/wid_loader/97949b05422e17ad21f8d77d5f4b72cf"></script>
{{--                        <iframe style="width: 175px; color: rgb(255, 255, 255); height: 201px;" id="97949b05422e17ad21f8d77d5f4b72cf" src="https://www.yourweather.co.uk/getwid/97949b05422e17ad21f8d77d5f4b72cf" frameborder="0" scrolling="no"></iframe>--}}
                    </div>
                </div>


    {{-- Include Required Scripts --}}
    <script src="/js/jquery.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <script src="/js/jquery-ui.js"></script>
    <script src="/libs/fancybox/jquery.fancybox.min.js"></script>
    <script src="/libs/owlcarousel/owl.carousel.min.js"></script>
    <script src="/js/scripts.js"></script>
    <script>
        $('#date').datepicker({ dateFormat: 'dd/mm/yy' });

        $(document).ready(function () {
            $("#gallery_link").fancybox({ arrows: true, protect: true });
        });
    </script>

    <style>
        #TA_cdsscrollingravenarrow342 { margin-right:auto !important; margin-left:auto !important; text-align:center !important; max-width:281px !important; margin-top:10px; }
        @media (max-width: 768px) {
            #TA_cdsscrollingravenarrow342 { margin-top:0; }
        }
    </style>
</footer>
