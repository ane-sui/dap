<x-app-layout>
    <div class="py-2">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
                        <div class="w-screen rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 ">
                            <div class="p-6 space-y-5 md:space-y-6 sm:p-8">
                                <form  method="POST" action="{{ route('gov.store') }}" class="space-y-4 md:space-y-6" action="Post">
                                    @csrf
                                    <div>
                                        <label for="name" class="block mb-1 text-sm font-medium text-gray-900 dark:text-gray-700">Government Name</label>
                                        <input type="name" name="name" id="name" class="p-2.5 block w-full text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-primary-600 focus:border-primary-600  dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Rose Moyo" value="{{old('name')}}" required="">
                                        <x-input-error :messages="$errors->get('name')" class="mt-1" />
                                    </div>
                                    <div>
                                        <label for="email" class="block mb-1 text-sm font-medium text-gray-900 dark:text-gray-700">Email</label>
                                        <input type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5  dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="name@company.com" required="" value="{{old('email')}}">
                                        <x-input-error :messages="$errors->get('email')" class="mt-2" />

                                    </div>
                                    <div>
                                        <label for="password" class="block mb-1 text-sm font-medium text-gray-900 dark:text-gray-700">Password</label>
                                        <input type="password" name="password" id="password" placeholder="••••••••" class=" border border-gray-300  text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5  dark:border-gray-600 dark:placeholder-gray-400  dark:focus:ring-blue-500 dark:focus:border-blue-500" required >
                                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                    </div>
                                    <div>
                                        <label for="password_confirmation" class="block mb-1 text-sm font-medium dark:text-gray-700">Confirm password</label>
                                        <input type="password" name="password_confirmation" id="password_confirmation" placeholder="••••••••" class="border border-gray-300 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5  dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500" required="" value="{{old('')}}">
                                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                                    </div>
                                    <button type="submit" class="w-full text-white bg-lime-600 hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Create User</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
