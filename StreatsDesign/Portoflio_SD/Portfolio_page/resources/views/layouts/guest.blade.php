<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
        <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
        <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    </head>
    <body>
     <nav x-data="{show:false}" class="flex items-center justify-between flex-wrap bg-white p-6">
        <div class="flex items-center flex-shrink-0 text-white mr-6">
            <x-application-logo class="block h-12 w-auto fill-current text-gray-600" />
        </div>
        <div class="block md:hidden">
            <button @click="show=!show" class="flex items-center px-3 py-2 border rounded text-black border-gray-200 hover:text-white hover:border-white">
                <svg class="fill-current h-3 w-3" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><title>Menu</title><path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"/></svg>
            </button>
        </div>
        <div @click.away="show = false" :class="{ 'block': show, 'hidden': !show }" class="w-full block flex-grow md:flex md:justify-end md:w-auto">
            <div>
                <a href="/" class="block md:inline-block text-sm px-4 py-2 leading-none rounded text-black border-white hover:border-transparent hover:text-teal-500 hover:bg-white mt-4 md:mt-0">Home</a>
                <a href="About" class="block md:inline-block text-sm px-4 py-2 leading-none rounded text-black border-white hover:border-transparent hover:text-teal-500 hover:bg-white mt-4 md:mt-0">About</a>
                <a href="Contact" class="block md:inline-block text-sm px-4 py-2 leading-none rounded text-black border-white hover:border-transparent hover:text-teal-500 hover:bg-white mt-4 md:mt-0">Contact</a>
                <a href="Logo" class="block md:inline-block text-sm px-4 py-2 leading-none rounded text-black border-white hover:border-transparent hover:text-teal-500 hover:bg-white mt-4 md:mt-0">Logo</a>
                <a href="Design" class="block md:inline-block text-sm px-4 py-2 leading-none rounded text-black border-white hover:border-transparent hover:text-teal-500 hover:bg-white mt-4 md:mt-0">Design</a>
                <a href="Web" class="block md:inline-block text-sm px-4 py-2 leading-none rounded text-black border-white hover:border-transparent hover:text-teal-500 hover:bg-white mt-4 md:mt-0">Webdesign</a>
                <a href="login" class="block md:inline-block text-sm px-4 py-2 leading-none rounded text-black border-white hover:border-transparent hover:text-teal-500 hover:bg-white mt-4 md:mt-0">Login</a>
            </div>
        </div>
    </nav>


        <div class="font-sans text-gray-900 antialiased">
            {{ $slot }}
        </div>
     <footer>
         <section>
             <div class="w-full huisstijl-blauw 50% text-white lg:table content-center sm:text-center lg:text-left decoration-0">
                 <div class="p-2 lg:w-1/3 py-4 px-2 lg:inline-block ">

                     <ol class="lg:w-full py-8 px-20 p-20">
                         <h1 class="text-lg underline text-white">Social Media</h1>
                         <li>
                             <a class="hover:text-black" href="https://www.facebook.com/Streatsdesign/">Facebook
                             </a>

                         </li>
                         <li>
                             <a class="hover:text-black" href="https://twitter.com/streatsdesign">Twitter
                             </a>

                         </li>
                         <li>
                             <a class="hover:text-black" href="https://www.instagram.com/streatsdesign/">Instagram
                             </a>

                         </li>
                     </ol>

                 </div>

                 <div class="p-2 lg:w-1/3 py-4 px-2 lg:inline-block ">
                     <ol class=" py-8 px-20 p-20">
                         <h1 class="text-lg underline text-white">About</h1>
                         <li>
                             <a class="hover:text-black" href="Over_ons.html">Company
                             </a>
                         </li>
                         <li>
                             <a class="hover:text-black" href="Portfolio.html">Wat bieden wij?
                             </a>
                         </li>
                         <li>
                             <a class="hover:text-black" href="Over_ons.html">KVK
                             </a>
                         </li>
                     </ol>
                 </div>
                 <div class="p-2 lg:w-1/3 py-4 px-2 lg:inline-block">
                     <ol class=" py-8 px-20 p-20">
                         <h1 class="text-lg underline text-white">StreatsDesign</h1>
                         <li>
                             <a class="hover:text-black" href="Portfolio.html">Portfolio
                             </a>
                         </li>
                         <li>
                             <a class="hover:text-black" href="Pricing.html">Prijs
                             </a>
                         </li>
                         <li>
                             <a class="hover:text-black" href="mailto:info@streatsdesign.com">Heeft u vragen? Mail nu!
                             </a>
                         </li>
                     </ol>
                 </div>
                 <div class="h-2 "></div>
                 <h1 class="w-full text-center p-1 italic  text-white">Copyright by StreatsDesign</h1>
             </div>
         </section>

     </footer>
    </body>
</html>
