<x-guest-layout>

    <section style="background-image:url({{ asset('images/leaves.jpg') }})" >
        <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
            <div class="w-screen bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 ">
                <div class="p-6 space-y-5 md:space-y-6 sm:p-8">
                    <form  method="POST" action="{{ route('register') }}" class="space-y-4 md:space-y-6" action="#">
                        @csrf
                        <div>
                            <label for="name" class="block mb-1 text-sm font-medium text-gray-900 ">Full Name</label>
                            <input type="name" name="name" id="name" class="bg-gray-50 border border-teal-300 text-gray-900 text-sm rounded-lg focus:ring-teal-600 focus:border-teal-600 block w-full p-2.5 dark:border-teal-600 dark:placeholder-gray-400  dark:focus:ring-teal-500 dark:focus:border-teal-500" placeholder="James Bond" value="{{old('name')}}" pattern="[a-zA-Z ]+"  required="">
                            <x-input-error :messages="$errors->get('name')" class="mt-1" />
                        </div>

                        <div>
                            <label for="email" class="block mb-1 text-sm font-medium text-gray-900 ">Your email</label>
                            <input type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-teal-600 focus:border-primary-600 block w-full p-2.5 dark:border-teal-600 dark:placeholder-gray-400  dark:focus:ring-teal-500 dark:focus:border-teal-500" placeholder="name@company.com" required="" value="{{old('email')}}">
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />

                        </div>

                        <div>
                            <label for="password" class="block mb-1 text-sm font-medium text-gray-900 ">Password</label>
                            <input type="password" name="password" id="password" placeholder="••••••" class="bg-gray-50 border border-teal-300 text-gray-900 text-sm rounded-lg focus:ring-teal-600 focus:border-teal-600 block w-full p-2.5  dark:border-teal-600 dark:placeholder-gray-400 dark:focus:ring-teal-500 dark:focus:border-teal-500" required >
                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                        </div>
                        <div>
                            <label for="password_confirmation" class="block mb-1 text-sm font-medium text-gray-900 ">Confirm password</label>
                            <input type="password" name="password_confirmation" id="password_confirmation" placeholder="••••••••" class="bg-gray-50 border border-teal-300 text-gray-900 text-sm rounded-lg focus:ring-teal-600 focus:border-teal-600 block w-full p-2.5  dark:border-teal-600 dark:placeholder-gray-400  dark:focus:ring-teal-500 dark:focus:border-teal-500" required="" value="{{old('')}}">
                            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                        </div>
                        <button type="submit" class="w-full text-white bg-teal-600 hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Create an account</button>
                        <p class="text-sm font-light text-gray-500 dark:text-gray-400">
                            Already have an account? <a href="{{route('login')}}" class="font-medium text-teal-600 hover:underline dark:text-teal-500">Login here</a>
                        </p>
                    </form>
                </div>
            </div>
        </div>
      </section>
        <script>
            const nameInput = document.getElementById('name');
            nameInput.addEventListener('input', (event) => {
                const inputValue = event.target.value;
                const filteredValue = inputValue.replace(/[^a-zA-Z ]/g, '');
                event.target.value = filteredValue;
            });
        </script>
</x-guest-layout>



