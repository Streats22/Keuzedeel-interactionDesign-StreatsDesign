<html>

</html><!DOCTYPE html>
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
    <div class="bg-gray-100 font-sans w-full m-0">
        <div class="bg-white shadow">
            <div class=" mx-auto px-4">
                <div class="flex items-center justify-between py-4">
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" class="logo">
                            <style type="text/css">
                                .st0{fill:#BED8E6;}
                                .st1{fill:#007DA4;}
                                .st2{fill:#007467;}
                                .st3{fill:#FFFFFF;}
                                .logo{
                                    height:85px; }

                            </style>
                            <path class="st0" d="m71.3 55.3-3.4 26.9c-0.1 0.9-0.9 1.5-1.8 1.4-22.4-2.8-38.3-23.4-35.5-45.8l3-23.3c0.2-1.2 1.3-2.1 2.5-1.9l2.3 0.3c20.8 2.5 35.6 21.5 32.9 42.4z"/>
                            <path class="st1" d="m71.3 48.4 4.9 28.4c0.2 1-0.5 1.9-1.4 2l-19 3.3c-10.8 1.9-21-5.3-22.9-16.1l-7.7-44.8c-0.3-1.7 0.8-3.3 2.5-3.6 20.6-3.5 40.1 10.3 43.6 30.8z"/>
                            <path class="st2" d="m76.6 56.6 5 21.1c0.3 1.3-0.5 2.6-1.8 3-24.4 5.7-48.8-9.4-54.6-33.8l-4.8-20.1c-0.3-1.3 0.5-2.5 1.8-2.8l1.2-0.3c23.7-5.6 47.6 9.1 53.2 32.9z"/>

                            <path class="st3" d="m28.6 63.1c0.2 3.4 1.5 6.3 5.2 6.5 3.6 0.1 4.9-2.1 5.1-5 0.1-3.3-1.4-5.3-6.5-7.9-6.8-3.5-9.4-6.5-9.2-12.5 0.2-6.5 4.5-10.7 11.8-10.5 9.1 0.3 11.1 6.5 11 11.8l-7-0.3c-0.1-2.3-0.6-5.7-4.3-5.9-2.9-0.1-4.2 1.7-4.3 4.4-0.1 2.9 1.1 4.3 5.8 6.7 7.1 3.6 10.2 7 10 13.7-0.2 6.3-4.3 11.4-12.8 11.1-9.3-0.3-11.9-6.4-11.9-12.4l7.1 0.3z"/>
                            <path class="st3" d="m52.2 37.7c0.1-1.6 1.4-2.8 2.9-2.7l7.7 0.3c10.4 0.4 14.2 7.2 13.7 19.8-0.5 13.6-4.6 20.8-15.7 20.4l-7.4-0.3c-1.4-0.1-2.5-1.2-2.5-2.7l1.3-34.8zm6.1 31.8 2.6 0.1c5.6 0.2 7.7-4 8.1-14.8 0.3-9.3-1.2-13.4-7-13.6l-2.6-0.1-1.1 28.4z"/>

                        </svg>
                    </div>

                    <div class="hidden sm:flex sm:items-center">
                        <a href="/" class="text-gray-800 text-sm font-semibold hover:text-purple-600 mr-4">Home</a>
                        <a href="webdesign" class="text-gray-800 text-sm font-semibold hover:text-purple-600 mr-4">Webdesign</a>
                        <a href="design" class="text-gray-800 text-sm font-semibold hover:text-purple-600 mr-4">Design</a>
                        <a href="logo" class="text-gray-800 text-sm font-semibold hover:text-purple-600 mr-4">Logos</a>
                        <a href="contact" class="text-gray-800 text-sm font-semibold hover:text-purple-600 mr-4">Contact</a>
                        <a href="about" class="text-gray-800 text-sm font-semibold hover:text-purple-600">About</a>
                    </div>

                    <div class="hidden sm:flex sm:items-center">
                        <a href="login" class="text-gray-800 text-sm font-semibold hover:text-purple-600 mr-4">Login</a>
                        <a href="register" class="text-gray-800 text-sm font-semibold border px-4 py-2 rounded-lg hover:huisstijl-text hover:border-purple-600">Register</a>
                    </div>

                    <div class="sm:hidden cursor-pointer">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-purple-600" viewBox="0 0 24 24">
                            <path fill="currentColor" d="M12.9499909,17 C12.7183558,18.1411202 11.709479,19 10.5,19 C9.29052104,19 8.28164422,18.1411202 8.05000906,17 L3.5,17 C3.22385763,17 3,16.7761424 3,16.5 C3,16.2238576 3.22385763,16 3.5,16 L8.05000906,16 C8.28164422,14.8588798 9.29052104,14 10.5,14 C11.709479,14 12.7183558,14.8588798 12.9499909,16 L20.5,16 C20.7761424,16 21,16.2238576 21,16.5 C21,16.7761424 20.7761424,17 20.5,17 L12.9499909,17 Z M18.9499909,12 C18.7183558,13.1411202 17.709479,14 16.5,14 C15.290521,14 14.2816442,13.1411202 14.0500091,12 L3.5,12 C3.22385763,12 3,11.7761424 3,11.5 C3,11.2238576 3.22385763,11 3.5,11 L14.0500091,11 C14.2816442,9.85887984 15.290521,9 16.5,9 C17.709479,9 18.7183558,9.85887984 18.9499909,11 L20.5,11 C20.7761424,11 21,11.2238576 21,11.5 C21,11.7761424 20.7761424,12 20.5,12 L18.9499909,12 Z M9.94999094,7 C9.71835578,8.14112016 8.70947896,9 7.5,9 C6.29052104,9 5.28164422,8.14112016 5.05000906,7 L3.5,7 C3.22385763,7 3,6.77614237 3,6.5 C3,6.22385763 3.22385763,6 3.5,6 L5.05000906,6 C5.28164422,4.85887984 6.29052104,4 7.5,4 C8.70947896,4 9.71835578,4.85887984 9.94999094,6 L20.5,6 C20.7761424,6 21,6.22385763 21,6.5 C21,6.77614237 20.7761424,7 20.5,7 L9.94999094,7 Z M7.5,8 C8.32842712,8 9,7.32842712 9,6.5 C9,5.67157288 8.32842712,5 7.5,5 C6.67157288,5 6,5.67157288 6,6.5 C6,7.32842712 6.67157288,8 7.5,8 Z M16.5,13 C17.3284271,13 18,12.3284271 18,11.5 C18,10.6715729 17.3284271,10 16.5,10 C15.6715729,10 15,10.6715729 15,11.5 C15,12.3284271 15.6715729,13 16.5,13 Z M10.5,18 C11.3284271,18 12,17.3284271 12,16.5 C12,15.6715729 11.3284271,15 10.5,15 C9.67157288,15 9,15.6715729 9,16.5 C9,17.3284271 9.67157288,18 10.5,18 Z"/>
                        </svg>
                    </div>
                </div>

                <div class=" sm:hidden bg-white border-t-2 py-2">
                    <div class="flex flex-col">
                        <a href="/" class="text-gray-800 text-sm font-semibold hover:text-purple-600 mb-1">Home</a>
                        <a href="webdesign" class="text-gray-800 text-sm font-semibold hover:text-purple-600 mb-1">Webdesign</a>
                        <a href="design" class="text-gray-800 text-sm font-semibold hover:text-purple-600 mb-1">Design</a>
                        <a href="logo" class="text-gray-800 text-sm font-semibold hover:text-purple-600 mb-1">Logos</a>
                        <a href="contact" class="text-gray-800 text-sm font-semibold hover:text-purple-600 mb-1">contact</a>
                        <a href="about" class="text-gray-800 text-sm font-semibold hover:text-purple-600 mb-1">About</a>
                        <div class="flex justify-between items-center border-t-2 pt-2">
                            <a href="login" class="text-gray-800 text-sm font-semibold hover:text-purple-600 mr-4">Login</a>
                            <a href="register" class="text-gray-800 text-sm font-semibold border px-4 py-1 rounded-lg hover:text-purple-600 hover:border-purple-600">Register</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</head>
<body>
<main class="container mx-auto">
    {{ $slot }}
</main>
</body>
</html>
