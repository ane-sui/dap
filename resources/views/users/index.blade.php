<x-app-layout>

<section class="p-3 sm:p-5">
    <div class="max-w-screen-xl px-4 mx-auto lg:px-12">
        <!-- Start coding here -->
        <div class="relative overflow-hidden bg-white shadow-md sm:rounded-lg">
            <div class="flex flex-col items-center justify-between p-4 space-y-3 md:flex-row md:space-y-0 md:space-x-4">
                <div class="w-full md:w-1/2">
                    <form class="flex items-center">
                        <label for="simple-search" class="sr-only">Search</label>
                        <div class="relative w-full">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                <svg aria-hidden="true" class="w-5 h-5 text-white dark:text-gray-400" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
                                </svg>
                            </div>
                            <input type="text" id="simple-search" class="block w-full p-2 pl-10 text-sm border border-gray-300 rounded-lg bg-gray-50 focus:ring-primary-500 focus:border-primary-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Search" required="">
                        </div>
                    </form>
                </div>

            </div>
            <div class="overflow-x-auto">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-900 uppercase bg-gray-50">
                        <tr>
                            <th scope="col" class="px-4 py-3">Farmer Name</th>
                            <th scope="col" class="px-4 py-3">Email</th>
                            <th scope="col" class="px-4 py-3">Farm Name </th>
                            <th scope="col" class="px-4 py-3">Expertise</th>
                            <th scope="col" class="px-4 py-3">Price</th>
                            <th scope="col" class="px-4 py-3">
                                <span class="">Actions</span>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user )
                        <tr class="border-b dark:border-gray-700">
                            <th scope="row" class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap ">{{$user->name}}</th>
                            <td class="px-4 py-3">{{$user->email}}</td>
                            <td class="px-4 py-3">{{$user->email}}</td>
                            <td class="px-4 py-3">{{$user->email}}</td>
                            <td class="px-4 py-3">$2999</td>
                            <td class="flex items-center justify-start px-4 py-3"><a class="text-color-green" href="">View</a>  | Delete</td>
                        </tr>

                    </tbody>
                    @endforeach
                </table>
            </div>
            {{$users->links()}}
        </div>
    </div>
    </section>
</x-app-layout>
