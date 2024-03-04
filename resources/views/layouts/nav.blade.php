<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title></title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1" />


    <!-- component -->
    <link rel="stylesheet" href="https://demos.creative-tim.com/notus-js/assets/styles/tailwind.css">
    <link rel="stylesheet"
        href="https://demos.creative-tim.com/notus-js/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css">
    <script>
        tailwind.config = {
            theme: {
                fontFamily: {
                    Saira: ["Saira Condensed", "sans-serif"],
                },
                extend: {
                    colors: {
                        whitec: "#ffffff ",
                        bkeuciel: "#809fff",
                        bleu: "#bfcfff",
                        bleuc: "#001247",
                        bleucc: "#000066",
                        beige: "#DED3A6",
                        verblanc: "#E7EAEF",
                    },
                },
            },
        };
    </script>
    <style>
        @layer components {
            .sidebar {
                transition: all .4s ease-in-out;
            }
        }

        .text-shadow {
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.363);
        }
    </style>
    </style>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.css" rel="stylesheet" />
    
</head>
<body class="bg-gray-100 font-[sans-serif]">

    <nav class=" bg-white border-gray-200 shadow rounded ">
        <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4 shadow-b-2xl">
            <div>
                <a href="{{ route('home') }}">
                    <img src="{{ asset('image/logosite.png') }}" class="w-24 h-15 cursor-pointer"/>
                </a> 
            </div>
            <!-- search  -->
            <div class="flex md:order-1">
                <button data-collapse-toggle="navbar-search" type="button"
                    class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                    aria-controls="navbar-search" aria-expanded="false">
                    <span class="sr-only">Open main menu</span>
                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 17 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M1 1h15M1 7h15M1 13h15" />
                    </svg>
                </button>
            </div>
            <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-search">
                <div class="relative mt-3 md:hidden">
                    <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                        </svg>
                    </div>
                    <input type="text" id="search-navbar"
                        class="block w-full p-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400  "
                        placeholder="Search...">
                </div>
                <ul
                    class="flex flex-col p-4 md:p-0 mt-4 font-medium border   md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0">
                    @guest
                    <li>
                        <a href="#" type="button"
                            class="text-bleuc font-bold  hover:bg-bleu hover:text-bleuc font-serif  focus:outline-none   rounded-full text-sm px-6 py-2.5 text-center">Home</a>

                    </li>    
                    @endguest
                    
                   
                    {{-- @user
                    <li>
                        <a href="#" type="button"
                            class="text-bleuc font-bold  hover:bg-bleu hover:text-bleuc font-serif  focus:outline-none   rounded-full text-sm px-6 py-2.5 text-center">Profile</a>

                    </li>
                    @enduser --}}
                    {{-- @company
                    <li>
                        <a href="#" type="button"
                            class="text-bleuc font-bold  hover:bg-bleu hover:text-bleuc font-serif  focus:outline-none   rounded-full text-sm px-6 py-2.5 text-center">Profile</a>

                    </li>
                    <li>
                        <a href="#" type="button"
                            class="text-bleuc font-bold  hover:bg-bleu hover:text-bleuc font-serif  focus:outline-none   rounded-full text-sm px-6 py-2.5 text-center">My Jobs</a>

                    </li>
                    @endcompany --}}
                    {{-- @admin
                    <li>
                        <a href="#" type="button"
                            class="text-bleuc font-bold  hover:bg-bleu hover:text-bleuc font-serif  focus:outline-none   rounded-full text-sm px-6 py-2.5 text-center">All Jobseekers</a>

                    </li>
                    <li>
                        <a href="#" type="button"
                            class="text-bleuc font-bold  hover:bg-bleu hover:text-bleuc font-serif  focus:outline-none   rounded-full text-sm px-6 py-2.5 text-center">All companies</a>

                    </li>
                    <li>
                        <a href="#" type="button"
                            class="text-bleuc font-bold  hover:bg-bleu hover:text-bleuc font-serif  focus:outline-none   rounded-full text-sm px-6 py-2.5 text-center">All jobs</a>

                    </li>

                    @endadmin --}}
                    {{-- @user
                    <li>
                        <a href="#" type="button"
                            class="text-bleuc font-bold  hover:bg-bleu hover:text-bleuc font-serif  focus:outline-none   rounded-full text-sm px-6 py-2.5 text-center">Jobs</a>

                    </li>
                    <li>
                        <a href="#" type="button"
                            class="text-bleuc font-bold  hover:bg-bleu hover:text-bleuc font-serif  focus:outline-none   rounded-full text-sm px-6 py-2.5 text-center">Companies</a>

                    </li>
                    @enduser --}}
                   @guest
                   <li>
                    @if (Route::has('register'))
                   <a href="{{ route('register') }}" type="button"
                       class="text-bleuc md:bg-bleu font-serif hover:text-white hover:bg-bleuc  focus:outline-none  font-bold rounded-full text-sm px-5 py-2 text-center">Sign
                       Up</a> @endif
               </li>
               <li>
                   <a href="{{ route('login') }}"
        type="button"
        class="text-bleuc font-bold md:bg-bleu  hover:bg-bleuc hover:text-white font-serif  focus:outline-none   rounded-full text-sm px-6 py-2 text-center">
    Log
    In</a>

    </li>
@endguest

@auth
    <li>
        <form method="POST" action="{{ route('logout') }}"
            class="text-bleuc md:bg-bleu font-serif hover:text-white hover:bg-bleu focus:outline-none  font-bold rounded-full text-sm px-5 text-center">
            @csrf

            <x-dropdown-link :href="route('logout')"
                onclick="event.preventDefault();
                                                    this.closest('form').submit();">
                {{ __('Log Out') }}
            </x-dropdown-link>
        </form>
    </li>

@endauth

</ul>
</div>
</div>
</nav>
<section>
    @yield('content')
</section>
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.js"></script>

</body>
<html