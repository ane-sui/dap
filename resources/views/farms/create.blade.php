<x-app-layout>

<section class="bg-white ">
    <div class="max-w-2xl px-4 py-8 mx-auto lg:py-16">
        <h2 class="mb-4 text-xl font-bold text-center text-gray-900">Farm Details</h2>
        <form action="{{ route('farms.store') }}" method="POST">
            @csrf
            <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                <div class="w-full">
                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 ">Farm Name</label>
                    <input type="text" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-teal-600 focus:border-teal-600 block w-full p-2.5   dark:placeholder-gray-400  dark:focus:ring-teal-500 dark:focus:border-teal-500" placeholder="Type Farm Name" required="">
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />

                </div>
                <div class="w-full">
                    <label for="location" class="block mb-2 text-sm font-medium text-gray-900 ">Location</label>
                    <input type="text" name="location" id="location" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-teal-600 focus:border-teal-600 block w-full p-2.5   dark:placeholder-gray-400  dark:focus:ring-teal-500 dark:focus:border-teal-500" placeholder="Farm Location" required="">
                    <x-input-error :messages="$errors->get('location')" class="mt-2" />

                </div>
                <div class="w-full">
                    <label for="size" class="block mb-2 text-sm font-medium text-gray-900 ">Size</label>

                    <input type="number" name="size" id="size" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-teal-600 focus:border-teal-600 block w-full p-2.5   dark:placeholder-gray-400  dark:focus:ring-teal-500 dark:focus:border-teal-500" placeholder="18 ha" required="">
                    <x-input-error :messages="$errors->get('size')" class="mt-2" />

                </div>
                <div>
                    <label for="water_sources" class="block mb-2 text-sm font-medium text-gray-900">Water Sources</label>
                    <select id="water_sources" name="water_sources" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-teal-600 focus:border-teal-600 block w-full p-2.5   dark:placeholder-gray-400  dark:focus:ring-teal-500 dark:focus:border-teal-500">
                        <option value="">Select Water Source</option>
                        <option value="Well">Well</option>
                        <option value="River">River</option>
                        <option value="Lake">Lake</option>
                        <option value="Dam">Dam</option>
                        <option value="Borehole">Borehole</option>
                        <option value="Rainwater Harvesting">Rainwater Harvesting</option>
                        <option value="Irrigation Canal">Irrigation Canal</option>
                        <option value="Other">Other</option>
                    </select>
                    <x-input-error :messages="$errors->get('water_sources')" class="mt-2" />

                </div>
                <div>
                    <label for="land_type" class="block mb-2 text-sm font-medium text-gray-900">Soil Type</label>
                    <select id="land_type" name="land_type" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-teal-600 focus:border-teal-600 block w-full p-2.5   dark:placeholder-gray-400  dark:focus:ring-teal-500 dark:focus:border-teal-500">
                        <option value="Sandy Soil">Sandy Soil</option>
                        <option value="Clay Soil">Clay Soil</option>
                        <option value="Silty Soil">Silty Soil</option>
                        <option value="Loam Soil">Loam Soil</option>
                        <option value="Peat Soil">Peat Soil</option>
                        <option value="Chalky Soil">Chalky Soil</option>
                    </select>
                    <x-input-error :messages="$errors->get('soil_type')" class="mt-2" />

                </div>
                <div>
                    <label for="farming_practices" class="block mb-2 text-sm font-medium text-gray-900">Farming Practices</label>
                    <select id="farming_practices" name="farming_practices" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-teal-600 focus:border-teal-600 block w-full p-2.5   dark:placeholder-gray-400  dark:focus:ring-teal-500 dark:focus:border-teal-500">
                        <option value="Arable Farming">Arable Farming</option>
                        <option value="Livestock Farming">Livestock Farming</option>
                        <option value="Mixed Farming">Mixed Farming</option>
                        <option value="Subsistence Farming">Subsistence Farming</option>
                        <option value="Commercial Farming">Commercial Farming</option>
                        <option value="Intensive Farming">Intensive Farming</option>
                        <option value="Extensive Farming">Extensive Farming</option>
                        <option value="Nomadic Herding">Nomadic Herding</option>
                        <option value="Organic Farming">Organic Farming</option>
                        <option value="Hydroponics">Hydroponics</option>
                    </select>
                    <x-input-error :messages="$errors->get('farming_practices')" class="mt-2" />

                </div>
                <div>
                    <label for="establishment_date" class="block mb-2 text-sm font-medium text-gray-900 ">Establishment Date</label>
                    <input type="date" name="establishment_date" id="establishment_date" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-teal-600 focus:border-teal-600 block w-full p-2.5   dark:placeholder-gray-400  dark:focus:ring-teal-500 dark:focus:border-teal-500"max="<?php echo date('Y-m-d'); ?>" xplaceholder="20-10-2022" required="">
                    <x-input-error :messages="$errors->get('establishment_date')" class="mt-2" />

                </div>
                <div>
                    <label for="ownership" class="block mb-2 text-sm font-medium text-gray-900 ">Ownership</label>
                    <select id="ownership" name="ownership" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-teal-600 focus:border-teal-600 block w-full p-2.5   dark:placeholder-gray-400  dark:focus:ring-teal-500 dark:focus:border-teal-500">
                        <option value="Sole Proprietorship">Sole Proprietorship</option>
                        <option value="Family Farm">Family Farm</option>
                        <option value="General Partnership">General Partnership</option>
                        <option value="Limited Partnership">Limited Partnership</option>
                        <option value="Cooperative">Cooperative</option>
                        <option value="Ownership">Ownership</option>
                        <option value="Leasehold">Leasehold</option>
                        <option value="Sharecropping">Sharecropping</option>
                        <option value="Communal Land">Communal Land</option>
                    </select>
                    <x-input-error :messages="$errors->get('ownership')" class="mt-2" />

                </div>
                <div>
                    <label for="employees" class="block mb-2 text-sm font-medium text-gray-900 ">Employees</label>
                    <select id="employees" name="employees" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-teal-600 focus:border-teal-600 block w-full p-2.5   dark:placeholder-gray-400  dark:focus:ring-teal-500 dark:focus:border-teal-500">
                        <option value="10">10</option>
                        <option value="20">20</option>
                        <option value="50">50</option>
                        <option value="100">100</option>
                    </select>
                    <x-input-error :messages="$errors->get('employees')" class="mt-2" />

                </div>
            </div>
            <button type="submit" class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-teal-700 rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-primary-800">
                Add Farm
            </button>
        </form>
    </div>
  </section>
</x-app-layout>
