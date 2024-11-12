<x-app-layout>
<div class="py-12">

    <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
                <div class="flex flex-col">
                    <div class="overflow-x-auto ">
                    <div class="inline-block min-w-full align-middle">
                        <div class="overflow-hidden ">
                            <table class="min-w-full mt-4 rounded-xl">
                                <thead>
                                    <tr class="bg-gray-50">
                                        <th scope="col" class="p-2 text-sm font-semibold leading-6 text-left text-gray-900 capitalize rounded-t-xl">Name </th>
                                        <th scope="col" class="p-2 text-sm font-semibold leading-6 text-left text-gray-900 capitalize ">Seed Type</th>
                                        <th scope="col" class="p-2 text-sm font-semibold leading-6 text-left text-gray-900 capitalize ">Planting Date</th>
                                        {{-- <th scope="col" class="p-5 text-sm font-semibold leading-6 text-left text-gray-900 capitalize rounded-t-xl"> Actions</th> --}}
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-300 ">
                                    @foreach ($crops  as $crop)
                                    <tr class="transition-all duration-500 bg-white hover:bg-gray-50">
                                        <td class="p-2 text-sm font-medium leading-6 text-gray-900 whitespace-nowrap ">{{$crop->name}}</td>
                                        <td class="p-2 text-sm font-medium leading-6 text-gray-900 whitespace-nowrap">{{$crop->seed_type}}  </td>
                                        <td class="p-2 text-sm font-medium leading-6 text-gray-900 whitespace-nowrap">{{$crop->planting}}  </td>
                                        {{-- <td class="p-2 ">
                                            <div class="flex items-center gap-1">
                                                <a href="{{route('crops.show',$crop)}}"  class="flex p-2 underline transition-all duration-500 rounded-full group item-center">
                                                    View                                                    </a>
                                                <div class="flex p-2 transition-all duration-500 rounded-full group item-center">
                                                    <form action="{{route('crops.destroy',$crop)}}" method="POST" class="inline-block">
                                                        @csrf
                                                        @method('Delete')
                                                        <button type="submit">Delete</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </td> --}}
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>

                        </div>
                    </div>
                    </div>
                    </div>

                </div>
        </div>
    </div>
</div>

</x-app-layout>
