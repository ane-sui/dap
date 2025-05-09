<x-app-layout>
    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <section class="">
                        <div class="max-w-2xl px-4 py-8 mx-auto lg:py-16">
                            <h2 class="mb-4 text-xl font-bold text-gray-900">Grant Details</h2>
                            <form action="{{route('governments.update',$government)}}" method="POST">
                                @csrf
                                @method('put')
                                <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                                    <div class="sm:col-span-2">
                                        <label for="name" class="block mb-2 text-sm font-medium">Product Name</label>
                                        <input type="text" name="name" id="name" value="{{$government->subject}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5  dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Type product name" required="">
                                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                                    </div>

                                    <div class="sm:col-span-2">
                                        <label for="description" class="block mb-2 text-sm font-medium">Description</label>
                                        <textarea id="description" name="description" rows="30" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-teal-600 focus:border-primary-600 block w-full p-2.5  dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Your description here">{{$government->description}}"</textarea>
                                        <x-input-error :messages="$errors->get('description')" class="mt-2" />
                                    </div>
                                </div>
                                @role('government')
                                    <button type="submit" class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-teal-700 rounded-lg focus:ring-4 focus:ring-teal-200 dark:focus:ring-primary-900 hover:bg-teal-800">
                                        Update
                                    </button>
                                @endrole
                                @role('user')
                                    <a href="mailto:{{$government->user->email}}" class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-teal-700 rounded-lg focus:ring-4 focus:ring-teal-200 dark:focus:ring-primary-900 hover:bg-teal-800">
                                        Apply
                                    </a>
                                @endrole
                            </form>
                        </div>
                    </section>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
