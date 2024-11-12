<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>DAP</title>
        @vite('resources/css/app.css')

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    </head>
    <body class="antialiased">
            @if (Route::has('login'))
                <div class="z-10 p-6 text-right sm:fixed sm:top-0 sm:right-0">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="font-semibold text-green-700 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="font-semibold text-green-700 hover:text-gray-900 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 font-semibold text-green-700 hover:text-gray-900 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
                        @endif
                    @endauth
                </div>
            @endif


            <div class="flex flex-wrap">
                <div class="w-full mb-10 sm:w-8/12">
                  <div class="container h-full mx-auto sm:p-10">
                    <nav class="flex items-center justify-between px-4">
                      {{-- <div class="text-4xl font-bold">
                        Chiredzi Rural District Council<span class="text-green-700">.</span>
                      </div> --}}
                      <div>
                        <img src="https://image.flaticon.com/icons/svg/497/497348.svg" alt="" class="w-8">
                      </div>
                    </nav>
                    <header class="container items-center h-full px-4 mt-10 lg:flex lg:mt-0">
                      <div class="w-full">
                        <h1 class="text-4xl font-bold lg:text-6xl">Grow smarter,<span class="text-green-700"> farm better!</span> </h1>
                        <div class="w-20 h-1 my-4 bg-green-700"></div>
                        <p class="mb-10 text-xl">Revolutionize your farming practices with our comprehensive digital agriculture platform. Access real-time weather data, market trends, expert advice, and tools to optimize your yields and reduce costs in the Chiredzi region.</p>

                        <a href="{{route('register')}}" type="button" class="text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                        Get Started
                    <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                    </svg>
                    </a>

                      </div>
                    </header>
                  </div>
                </div>
                <img src="https://images.unsplash.com/photo-1605000797499-95a51c5269ae?q=80&w=1471&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="Leafs" class="object-cover w-full h-48 sm:h-screen sm:w-4/12">
              </div>













            </div>
        </div>
    </body>
</html>
