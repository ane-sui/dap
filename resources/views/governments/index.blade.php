<x-app-layout>
    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                        <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                            <div class="p-6 text-gray-900">
                                <div class="flex flex-col">
                                    <div class="overflow-x-auto ">
                                    <div class="inline-block min-w-full align-middle">
                                        <div class="overflow-hidden ">
                                            <x-primary-button><a href="{{route('governments.create')}}">Create Grant</a></x-primary-button>
                                            <table class="min-w-full mt-4 rounded-xl">
                                                <thead>
                                                    <tr class="bg-gray-50">
                                                        <th scope="col" class="p-5 text-sm font-semibold leading-6 text-left text-gray-900 capitalize">Date </th>
                                                        <th scope="col" class="p-5 text-sm font-semibold leading-6 text-left text-gray-900 capitalize">Subject</th>
                                                        <th scope="col" class="p-5 text-sm font-semibold leading-6 text-left text-gray-900 capitalize rounded-t-xl"> Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="divide-y divide-gray-300 ">
                                                    @foreach ($governments  as $gov)
                                                    <tr class="transition-all duration-500 bg-white hover:bg-gray-50">
                                                        <td class="p-2 text-sm font-medium leading-6 text-gray-900 whitespace-nowrap ">{{$gov->created_at->format('D m Y')}}</td>
                                                        <td class="p-2 text-sm font-medium leading-6 text-gray-900 whitespace-nowrap ">{{$gov->subject}}</td>

                                                        <td class="p-2 ">
                                                            <div class="flex items-center gap-1 ">
                                                                <a href="{{route('governments.show',$gov)}}"  class="flex p-2 text-teal-600 transition-all duration-500 rounded-full group item-center hover:p-4">View</a>
                                                                <div class="flex p-2 transition-all duration-500 rounded-full group item-center hover:p-4">
                                                                    <form action="{{route('governments.destroy',$gov)}}" method="POST" class="inline-block">
                                                                        @csrf
                                                                        @method('Delete')
                                                                        <button type="submit" class="text-red-700">Delete</button>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                            <div class="mt-4">
                                                {{ $governments->links() }}
                                            </div>

                                        </div>
                                    </div>
                                    </div>
                                    </div>

                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
