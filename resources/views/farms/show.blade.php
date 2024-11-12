<x-app-layout>

<section class="bg-white ">

            <div class="max-w-2xl px-4 py-8 mx-auto lg:py-16">
                <div class="flex justify-end">
                    <form action="{{route('crops.create', $farm)}}" method="get">
                            @csrf
                            <input type="text" hidden name="farm_id" value="{{$farm->id}}">
                            <button type="submit" class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-teal-700 rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-primary-800">
                                Add Crops
                            </button>
                    </form>
                </div>

                <h2 class="mb-4 text-xl font-bold text-gray-900 ">Add Farm</h2>
                <form action="{{ route('farms.update',$farm) }}" method="POST">
                    @csrf
                    @method('Put')
                    <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                        <div class="w-full">
                            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 ">Farm Name</label>
                            <input type="text" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5  dark:placeholder-gray-400  dark:focus:ring-primary-500 dark:focus:border-primary-500" value="{{$farm->name}}"  required="">
                        </div>
                        <div class="w-full">
                            <label for="location" class="block mb-2 text-sm font-medium text-gray-900 ">Location</label>
                            <input type="text" name="location" id="location" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5   dark:placeholder-gray-400  dark:focus:ring-primary-500 dark:focus:border-primary-500" value="{{$farm->location}}"  required="">
                        </div>
                        <div class="w-full">
                            <label for="size" class="block mb-2 text-sm font-medium text-gray-900 ">Size</label>
                            <input type="text" name="size" id="size" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5  dark:border-gray-600 dark:placeholder-gray-400  dark:focus:ring-primary-500 dark:focus:border-primary-500"  value="{{$farm->size}}"required="">
                        </div>
                        <div>
                            <label for="water_sources" class="block mb-2 text-sm font-medium text-gray-900 ">Water Sources</label>
                            <select id="water_sources" name="water_sources" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:border-gray-600 dark:placeholder-gray-400  dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                <option selected="">{{$farm->water_sources}}</option>
                                <option value="dam">Dam</option>
                                <option value="irrigation">Irrigation</option>
                            </select>
                        </div>
                        <div>
                            <label for="land_type" class="block mb-2 text-sm font-medium text-gray-900 ">Land Type</label>
                            <input type="text" name="land_type" value="{{$farm->land_type}}"id="land_type" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5  dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-primary-500 dark:focus:border-primary-500"  required="">
                        </div>
                        <div>
                            <label for="farming_practices" class="block mb-2 text-sm font-medium text-gray-900 ">Farming Practices</label>
                            <input type="text" name="farming_practices" id="farming_practices" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5  dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-primary-500 dark:focus:border-primary-500"  required="" value="{{$farm->farming_practices}}">
                        </div>
                        <div>
                            <label for="item-weight" class="block mb-2 text-sm font-medium text-gray-900 ">Establishment Date</label>
                            <input type="date" name="establishment_date" id="establishment_date" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5  dark:border-gray-600 dark:placeholder-gray-400  dark:focus:ring-primary-500 dark:focus:border-primary-500"  required="" value="{{$farm->establishment_date}}">
                        </div>
                        <div>
                            <label for="item-weight" class="block mb-2 text-sm font-medium text-gray-900 ">Ownership</label>
                            <input type="text" name="ownership" id="ownership" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5  dark:border-gray-600 dark:placeholder-gray-400  dark:focus:ring-primary-500 dark:focus:border-primary-500" required="" value="{{$farm->ownership}}">
                        </div>
                        <div>
                            <label for="water_sources" class="block mb-2 text-sm font-medium text-gray-900 ">Employees</label>
                            <select id="employees" name="employees" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5  dark:border-gray-600 dark:placeholder-gray-400  dark:focus:ring-primary-500 dark:focus:border-primary-500">

                                <option value="">{{$farm->employees}}</option>
                                <option value="10">10</option>
                                <option value="20">20</option>
                                <option value="50">50</option>
                                <option value="100">100</option>
                            </select>
                        </div>
                    </div>
                    <button type="submit" class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-teal-700 rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-primary-800">
                        Update Farm Details
                    </button>
                </form>
            </div>
          </section>














{{--
    <section class="bg-white dark:bg-gray-900">
        <div class="max-w-2xl px-4 py-8 mx-auto lg:py-16">
            <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Add Farm</h2>
            <form action="{{ route('farms.update',$farm) }}" method="POST">
                @csrf
                @method('Put')
                <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                    <div class="w-full">
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Farm Name</label>
                        <input type="text" name="name" value="{{$farm->name}}" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Type Farm Name" required="">
                    </div>
                    <div class="w-full">
                        <label for="location" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Location</label>
                        <input type="text" name="location" id="location"   class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Farm Location" required="">
                    </div>
                    <div class="w-full">
                        <label for="size" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Size</label>
                        <input type="text" name="size"   id="size" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="18 ha" required="">
                    </div>
                    <div>
                        <label for="water_sources" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Water Sources</label>
                        <select id="water_sources" name="water_sources" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            <option selected>{{$farm->name}}"</option>
                            <option value="TV">TV/Monitors</option>
                            <option value="PC">PC</option>
                            <option value="GA">Gaming/Console</option>
                            <option value="PH">Phones</option>
                        </select>
                    </div>
                    <div>
                        <label for="item-weight" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Land Type</label>
                        <input type="text" name="land_type"  value="{{$farm->land_type}}"id="water_sources" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Clay" required="">
                    </div>
                    <div>
                        <label for="farming_practices" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Farming Practices</label>
                        <input type="text" name="farming_practices"  value="{{$farm->farming_practices}}" id="farming_practices" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-teal-600 focus:border-teal-600 block w-full p-2.5  dark:focus:ring-teal-500 dark:focus:border-teal-500" placeholder="Crop Husbandry" required="">
                    </div>
                    <div>
                        <label for="item-weight" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Establishment Date</label>
                        <input type="date" name="establishment_date" value="{{$farm->establishment_date}}"  id="establishment_date" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Clay" required="">
                    </div>
                    <div>
                        <label for="item-weight" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Ownership</label>
                        <input type="text" name="ownership" value="{{$farm->ownership}}"  id="ownership" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Clay" required="">
                    </div>
                    <div>
                        <label for="water_sources" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Employees</label>
                        <select id="employees" name="employees" value="{{$farm->employees}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            <option selected>{{$farm->employees}}</option>
                            <option value="10">10</option>
                            <option value="20">20</option>
                        </select>
                    </div>
                </div>
                <button type="submit" class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-teal-700 rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-primary-800">
                    Update Farm Details
                </button>
            </form> --}}


        </div>
      </section>
</x-app-layout>
