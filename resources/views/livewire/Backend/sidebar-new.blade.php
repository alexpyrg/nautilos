<!-- Sidebar -->
<div id="sidebar" class="fixed z-50 top-0 left-0 h-lvh bg-blueGray-800 text-white w-64 min-w-64 transform -translate-x-full transition-transform duration-300 lg:translate-x-0 lg:relative">
    <div class="p-4 flex flex-col justify-between items-center border-b border-blueGray-700">
        <button id="close-sidebar" class="lg:hidden text-white focus:outline-none float-right block absolute right-4">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>
        <h1 class="text-2xl font-bold md:mt-4 sm:mt-8">Flexibuild Rental </h1>
        <h5 class="text-center"> (Cretan-Villa.com) | Build v241124.4b </h5>

    </div>
    <nav class="mt-6">
        <!-- Home -->
        <a href="/admin/" class="flex items-center py-2.5 px-4 hover:bg-blueGray-400">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-6 w-6 mr-3">
                <path stroke-linecap="round" stroke-linejoin="round" d="m2.25 12 8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
            </svg>

            Αρχική
        </a>

        <!-- Pages -->
        <div class="mt-2">
            <button class="flex items-center justify-between w-full py-2.5 px-4 hover:bg-blueGray-400 focus:outline-none" onclick="toggleDropdown('pages-dropdown')">
                  <span class="flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-6 w-6 mr-3">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 7.5h1.5m-1.5 3h1.5m-7.5 3h7.5m-7.5 3h7.5m3-9h3.375c.621 0 1.125.504 1.125 1.125V18a2.25 2.25 0 0 1-2.25 2.25M16.5 7.5V18a2.25 2.25 0 0 0 2.25 2.25M16.5 7.5V4.875c0-.621-.504-1.125-1.125-1.125H4.125C3.504 3.75 3 4.254 3 4.875V18a2.25 2.25 0 0 0 2.25 2.25h13.5M6 7.5h3v3H6v-3Z" />
                </svg>
                Σελίδες
                  </span>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 transform transition duration-200" id="settings-icon" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                </svg>
            </button>
            <div id="pages-dropdown" class="hidden ml-6">
                <a href="/admin/pages/create" class="block py-2 px-4 hover:bg-blueGray-400">Δημιουργία σελίδας</a>
                <a href="/admin/pages" class="block py-2 px-4 hover:bg-blueGray-400">Λίστα Σελίδων</a>

{{--                <a href="/admin/sitemap" class="block py-2 px-4 hover:bg-blueGray-400">Sitemap</a>--}}
            </div>
        </div>
        <!-- Mailing -->
        <div class="mt-2">
            <button class="flex items-center justify-between w-full py-2.5 px-4 hover:bg-blueGray-400 focus:outline-none" onclick="toggleDropdown('mailing-dropdown')">
                    <span class="flex items-center">
  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-6 w-6 mr-3">
  <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 12a4.5 4.5 0 1 1-9 0 4.5 4.5 0 0 1 9 0Zm0 0c0 1.657 1.007 3 2.25 3S21 13.657 21 12a9 9 0 1 0-2.636 6.364M16.5 12V8.25" />
</svg>


                        Mailing
                    </span>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 transform transition duration-200" id="settings-icon" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                </svg>
            </button>
            <div id="mailing-dropdown" class="hidden ml-6">
{{--                <a href="/admin/email/create" class="block py-2 px-4 hover:bg-blueGray-400">Νέο E-mail template</a>--}}
{{--                <a href="/admin/campaign/create" class="block py-2 px-4 hover:bg-blueGray-400">Νέα Καμπάνια</a>--}}
{{--                <a href="/admin/campaigns" class="block py-2 px-4 hover:bg-blueGray-400">Λίστα Καμπανιών</a>--}}
                <a href="/admin/mails" class="block py-2 px-4 hover:bg-blueGray-400">Λίστα Email</a>
            </div>
        </div>
        <!-- Translations -->
        <div class="mt-2">
            <button class="flex items-center justify-between w-full py-2.5 px-4 hover:bg-blueGray-400 focus:outline-none" onclick="toggleDropdown('translations-dropdown')">
                    <span class="flex items-center">
 <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-6 w-6 mr-3">
  <path stroke-linecap="round" stroke-linejoin="round" d="m10.5 21 5.25-11.25L21 21m-9-3h7.5M3 5.621a48.474 48.474 0 0 1 6-.371m0 0c1.12 0 2.233.038 3.334.114M9 5.25V3m3.334 2.364C11.176 10.658 7.69 15.08 3 17.502m9.334-12.138c.896.061 1.785.147 2.666.257m-4.589 8.495a18.023 18.023 0 0 1-3.827-5.802" />
</svg>


                        Μεταφράσεις
                    </span>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 transform transition duration-200" id="settings-icon" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                </svg>
            </button>
            <div id="translations-dropdown" class="hidden ml-6">
                <a href="/admin/locales" class="block py-2 px-4 hover:bg-blueGray-400">Λίστα Γλωσσών</a>
                <a href="/admin/hcpages" class="block py-2 px-4 hover:bg-blueGray-400">Λίστα Μεταφράσεων</a>

            </div>
        </div>
        <!-- Carousels -->
        <div>
            <button class="flex items-center justify-between w-full py-2.5 px-4 hover:bg-blueGray-400 focus:outline-none" onclick="toggleDropdown('profile-dropdown')">
                    <span class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-6 w-6 mr-3">
  <path stroke-linecap="round" stroke-linejoin="round" d="M6 6.878V6a2.25 2.25 0 0 1 2.25-2.25h7.5A2.25 2.25 0 0 1 18 6v.878m-12 0c.235-.083.487-.128.75-.128h10.5c.263 0 .515.045.75.128m-12 0A2.25 2.25 0 0 0 4.5 9v.878m13.5-3A2.25 2.25 0 0 1 19.5 9v.878m0 0a2.246 2.246 0 0 0-.75-.128H5.25c-.263 0-.515.045-.75.128m15 0A2.25 2.25 0 0 1 21 12v6a2.25 2.25 0 0 1-2.25 2.25H5.25A2.25 2.25 0 0 1 3 18v-6c0-.98.626-1.813 1.5-2.122" />
</svg>



                        Carousels
                    </span>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 transform transition duration-200" id="profile-icon" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                </svg>
            </button>
            <div id="profile-dropdown" class="hidden ml-6">
                <a href="/admin/carousel/create" class="block py-2 px-4 hover:bg-blueGray-400">Δημιουργία Carousel</a>
                <a href="/admin/carousels" class="block py-2 px-4 hover:bg-blueGray-400">Λίστα Carousel</a>
            </div>
        </div>
        <!-- Widgets -->
        <div>
            <button class="flex items-center justify-between w-full py-2.5 px-4 hover:bg-blueGray-400 focus:outline-none" onclick="toggleDropdown('widget-dropdown')">
                    <span class="flex items-center">


    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-6 w-6 mr-3">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9.75 3.104v5.714a2.25 2.25 0 0 1-.659 1.591L5 14.5M9.75 3.104c-.251.023-.501.05-.75.082m.75-.082a24.301 24.301 0 0 1 4.5 0m0 0v5.714c0 .597.237 1.17.659 1.591L19.8 15.3M14.25 3.104c.251.023.501.05.75.082M19.8 15.3l-1.57.393A9.065 9.065 0 0 1 12 15a9.065 9.065 0 0 0-6.23-.693L5 14.5m14.8.8 1.402 1.402c1.232 1.232.65 3.318-1.067 3.611A48.309 48.309 0 0 1 12 21c-2.773 0-5.491-.235-8.135-.687-1.718-.293-2.3-2.379-1.067-3.61L5 14.5" />
                </svg>

                        Widgets
                    </span>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 transform transition duration-200" id="profile-icon" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                </svg>


            </button>
            <div id="widget-dropdown" class="hidden ml-6">
                <a href="/admin/cardWidgets" class="block py-2 px-4 hover:bg-blueGray-400">Widget δωματίων</a>
{{--                <a href="/admin/carousels" class="block py-2 px-4 hover:bg-blueGray-400">Λίστα Carousel</a>--}}
            </div>
        </div>
        <!-- Settings with dropdown -->
        <div class="mt-2">
            <button class="flex items-center justify-between w-full py-2.5 px-4 hover:bg-blueGray-400 focus:outline-none" onclick="toggleDropdown('settings-dropdown')">
                    <span class="flex items-center">
                      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"  class="h-6 w-6 mr-3">
  <path stroke-linecap="round" stroke-linejoin="round" d="M10.343 3.94c.09-.542.56-.94 1.11-.94h1.093c.55 0 1.02.398 1.11.94l.149.894c.07.424.384.764.78.93.398.164.855.142 1.205-.108l.737-.527a1.125 1.125 0 0 1 1.45.12l.773.774c.39.389.44 1.002.12 1.45l-.527.737c-.25.35-.272.806-.107 1.204.165.397.505.71.93.78l.893.15c.543.09.94.559.94 1.109v1.094c0 .55-.397 1.02-.94 1.11l-.894.149c-.424.07-.764.383-.929.78-.165.398-.143.854.107 1.204l.527.738c.32.447.269 1.06-.12 1.45l-.774.773a1.125 1.125 0 0 1-1.449.12l-.738-.527c-.35-.25-.806-.272-1.203-.107-.398.165-.71.505-.781.929l-.149.894c-.09.542-.56.94-1.11.94h-1.094c-.55 0-1.019-.398-1.11-.94l-.148-.894c-.071-.424-.384-.764-.781-.93-.398-.164-.854-.142-1.204.108l-.738.527c-.447.32-1.06.269-1.45-.12l-.773-.774a1.125 1.125 0 0 1-.12-1.45l.527-.737c.25-.35.272-.806.108-1.204-.165-.397-.506-.71-.93-.78l-.894-.15c-.542-.09-.94-.56-.94-1.109v-1.094c0-.55.398-1.02.94-1.11l.894-.149c.424-.07.765-.383.93-.78.165-.398.143-.854-.108-1.204l-.526-.738a1.125 1.125 0 0 1 .12-1.45l.773-.773a1.125 1.125 0 0 1 1.45-.12l.737.527c.35.25.807.272 1.204.107.397-.165.71-.505.78-.929l.15-.894Z" />
  <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
</svg>

                        Ρυθμίσεις
                    </span>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 transform transition duration-200" id="settings-icon" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                </svg>
            </button>
            <div id="settings-dropdown" class="hidden ml-6">
                <a href="/admin/user-settings" class="block py-2 px-4 hover:bg-blueGray-400">Ρυθμίσεις Λογαριασμού</a>
                <a href="#/admin/settings" class="block py-2 px-4 hover:bg-blueGray-400">Ρυθμίσεις Σελίδας</a>
            </div>
        </div>
        <!-- Management and Rental stuff fron down here -->
        <div class="mt-2">
            <button class="flex items-center justify-between w-full py-2.5 px-4 hover:bg-blueGray-400 focus:outline-none" onclick="toggleDropdown('management-dropdown')">
                    <span class="flex items-center">
 <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-6 w-6 mr-3">
  <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5" />
</svg>


                        Διαχείριση Μονάδας
                    </span>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 transform transition duration-200" id="settings-icon" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                </svg>
            </button>
            <div id="management-dropdown" class="hidden ml-6">
{{--                <a href="/admin/general-overview" class="block py-2 px-4 hover:bg-blueGray-400">Ημερολόγιο</a>--}}
                <a href="/admin/bookings" class="block py-2 px-4 hover:bg-blueGray-400">Κρατήσεις</a>
                <a href="/admin/trip-prices" class="block py-2 px-4 hover:bg-blueGray-400">Κόστος Ταξιδιών</a>
                <a href="/admin/taxes" class="block py-2 px-4 hover:bg-blueGray-400">Φόροι</a>
                <a href="/admin/trips" class="block py-2 px-4 hover:bg-blueGray-400">Ταξίδια</a>
{{--                <a href="/admin/rentals" class="block py-2 px-4 hover:bg-blueGray-400">Rentals</a>--}}
{{--                <a href="/admin/availabilities" class="block py-2 px-4 hover:bg-blueGray-400">Clients</a>--}}

            </div>
        </div>
        <div class="mt-2">
            <button class="flex items-center justify-between w-full py-2.5 px-4 hover:bg-blueGray-400 focus:outline-none" onclick="toggleDropdown('avail-dropdown')">
                    <span class="flex items-center">
 <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
  <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 2.994v2.25m10.5-2.25v2.25m-14.252 13.5V7.491a2.25 2.25 0 0 1 2.25-2.25h13.5a2.25 2.25 0 0 1 2.25 2.25v11.251m-18 0a2.25 2.25 0 0 0 2.25 2.25h13.5a2.25 2.25 0 0 0 2.25-2.25m-18 0v-7.5a2.25 2.25 0 0 1 2.25-2.25h13.5a2.25 2.25 0 0 1 2.25 2.25v7.5m-6.75-6h2.25m-9 2.25h4.5m.002-2.25h.005v.006H12v-.006Zm-.001 4.5h.006v.006h-.006v-.005Zm-2.25.001h.005v.006H9.75v-.006Zm-2.25 0h.005v.005h-.006v-.005Zm6.75-2.247h.005v.005h-.005v-.005Zm0 2.247h.006v.006h-.006v-.006Zm2.25-2.248h.006V15H16.5v-.005Z" />
</svg>

    &nbsp;
                        Διαθεσιμότητες
                    </span>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 transform transition duration-200" id="settings-icon" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                </svg>
            </button>
            <div id="avail-dropdown" class="hidden ml-6">
                <a href="/admin/seasons" class="block py-2 px-4 hover:bg-blueGray-400">Διαχείριση διαθεσιμότητας</a>
            </div>
        </div>

        <!-- Logout -->
        <a href="/logout" class="flex items-center py-2.5 px-4 hover:bg-blueGray-400 mt-2">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M17 16l4-4m0 0l-4-4m4 4H7" />
            </svg>
            Logout
        </a>
    </nav>
</div>
