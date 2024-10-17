<x-app-layout>
    {{-- <form action="{{route('crops.store')}}" method="post">
        @csrf
        <input type="text" name="name" placeholder="Crop Name">
        <input type="text" name="seed_type" placeholder="Seed Type">
        <input type="number" name="quantity" placeholder="Quantity">
        <input type="text" name="planting" placeholder="Crop Name">
        <button>Save</button>
    </form> --}}
    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">





    <section class="">
        <div class="max-w-2xl px-4 py-8 mx-auto lg:py-16">
            <h2 class="mb-4 text-xl font-bold text-gray-900">Crop Details</h2>
            <form action="{{route('crops.store')}}" method="post">
                @csrf
                <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                    <div class="">
                        <label for="name" class="block mb-2 text-sm font-medium">Crop Name</label>
                        <input type="text" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5  dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Type product name" required="">
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>

                    <div class="w-full">
                        <label for="seed_type" class="block mb-2 text-sm font-medium">Seed Type</label>
                        <input type="text" name="seed_type" id="brand" class="bg-gray-50 border text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5  dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Product brand" required="">
                        <x-input-error :messages="$errors->get('seed_type')" class="mt-2" />

                    </div>
                    <div class="w-full">
                        <label for="price" class="block mb-2 text-sm font-medium ">Quantity</label>
                        <input type="number" name="quantity" id="quantity" class="bg-gray-50 border text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5   dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Seed Quantity " required="">
                        <x-input-error :messages="$errors->get('quantity')" class="mt-2" />

                    </div>
                    <div>
                        <label for="planting" class="block mb-2 text-sm font-medium ">Date Of Planting</label>
                        <input type="date" name="planting" id="planting" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5  dark:focus:ring-primary-500 dark:focus:border-primary-500" required="">
                    </div>
                </div>
                <button type="submit" class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-teal-700 rounded-lg focus:ring-4 focus:ring-teal-200 dark:focus:ring-primary-900 hover:bg-teal-800">
                    Save
                </button>
            </form>
        </div>
      </section>
    </div>
</div>

</div>
</div>






</x-app-layout>
