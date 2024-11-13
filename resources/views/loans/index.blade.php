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

                                            @role('bank')
                                            <x-primary-button class="bg-teal-700"><a href="{{route('loans.create')}}">Create Loan Advert</a></x-primary-button>
                                            @endrole
                                            <table class="min-w-full mt-4 rounded-xl">

                                            @include('sessions.success')
                                                <thead>
                                                    <tr class="bg-gray-50">
                                                        <th scope="col" class="p-5 text-sm font-semibold leading-6 text-left text-gray-900 capitalize">Date </th>
                                                        <th scope="col" class="p-5 text-sm font-semibold leading-6 text-left text-gray-900 capitalize">Subject</th>
                                                        <th scope="col" class="p-5 text-sm font-semibold leading-6 text-left text-gray-900 capitalize rounded-t-xl"> Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="divide-y divide-gray-300 ">
                                                    @foreach ($loans  as $loan)
                                                    <tr class="bg-white hover:bg-gray-50">
                                                        <td class="p-2 text-sm font-medium leading-6 text-gray-900 whitespace-nowrap ">{{$loan->created_at->format('d-M-Y')}}</td>
                                                        <td class="p-2 text-sm font-medium leading-6 text-gray-900 whitespace-nowrap ">{{$loan->subject}}</td>

                                                        <td class="p-2 ">
                                                            <div class="flex items-center gap-1 ">
                                                                <a href="{{route('loans.show',$loan)}}"  class="flex p-2 text-teal-600 rounded-full group item-center">View</a>
                                                                @role('bank')
                                                                <div class="flex p-2 rounded-full group item-center">
                                                                    <form action="{{route('loans.destroy',$loan)}}" method="POST" class="inline-block">
                                                                        @csrf
                                                                        @method('Delete')
                                                                        <button type="submit" class="text-red-700">Delete</button>
                                                                    </form>
                                                                </div>
                                                                @endrole
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                            <div class="mt-4">
                                                {{ $loans->links() }}
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
