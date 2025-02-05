<div>
    <aside class="" style="background-color: #0d0a0b; color: white;">
        <nav class="">
            <div class="sidebar_top">
                <h4 style="font-size: 18px; text-align: center; width: 100%; margin: .2rem; color: white; background-color: rgba(255,255,255,0.04); border: 1px solid white;"> EasyUpdate CMS</h4>
                {{--                    <button class="p-1.5 rounded-lg bg-gray-50 hover:bg-gray-100">--}}
                {{--                        X--}}
                {{--                    </button>--}}
            </div>
            <ul class="flex-1 px-3" style="color: white;">
                <li class="">
                    <a href="/admin/pages"  style="color: white;" onclick="togglePages()">
                        Σελίδες </a></li>
                <li >
                    <a href="/admin/hcpages"  style="color: white;" > Δεδομένα </a></li>
                <li class="">
                    <a href="/admin/carousels"  style="color: white;" > Carousel </a></li>
                <li class="">
                    <a href="/admin/carousel/create"  style="color: white;" > Δημιουργία Carousel </a></li>

                <li class="">
                    <a href="/admin/mails"  style="color: white;" > Mailing </a></li>
                <li class="">
                    <a href="/admin/images"   style="color: white;"> Εικόνες </a></li>
                <li class="">
                    <a href="/admin/rooms/translations"   style="color: white;"> Μεταφράσεις Δωματίων </a></li>
                <li class="">
                    <a href="/admin/locales"  style="color: white;" > Γλώσσες </a></li>

                <li class="">
                    <a href="/admin/cardWidgets"  style="color: white;" > Widget Δωματίων </a></li>
                <li class="">
                    <a href="/admin/taxes"  style="color: white;" > Ρυθμίσεις Φόρων </a></li>
                <h4 style="text-align: center; padding-block: .2rem; margin-block: .2rem; background-color: rgba(157,157,157,0.41);"
                >Hotel Master</h4>
                <li class="">
                    <a href="/admin/bookings"  style="color: white;">Κρατήσεις</a></li>

                <li class="">
                    <a href="/admin/hotel/rooms"  style="color: white;">Δωμάτια</a></li>
                <li class="">
                    <a href="/admin/hotel/rates"  style="color: white;">Κόστος Δωματίων</a></li>
            </ul>

            <div class="" style="display: block; position: absolute; bottom: 0; width: 100%; box-sizing: border-box;">
                <div class="general_info">
                    <h4 class="font-semibold"  style="color: white; text-align: center; max-width: 250px;">{{ Auth::user()->username }}</h4>

                </div>
                <a href="/admin/logout"  style="color: white; width: 100%; box-sizing: border-box;max-width: 250px; text-align: center; border:1px solid white;"> Αποσύνδεση </a>
                <img src="" alt="" class="">
                <div class="">

                </div>
            </div>
        </nav>
    </aside>
</div>
