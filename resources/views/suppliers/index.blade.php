<x-app-layout>
    <div class="py-12">

    <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
                <div class="flex flex-col">
                    <div class="overflow-x-auto ">
                    <div class="inline-block min-w-full align-middle">
                        <div class="overflow-hidden ">
                            @role('supplier')
                                <x-primary-button class="bg-teal-700"><a href="{{route('suppliers.create')}}">Add Products</a></x-primary-button>
                            @endrole
                            @include('sessions.success')
                            <table class="min-w-full mt-4 rounded-xl">
                                <thead>
                                    <tr class="p-2 bg-gray-50">
                                        <th scope="col" class="text-sm font-semibold leading-6 text-left text-gray-900 capitalize rounded-t-xl">Product Name </th>
                                        <th scope="col" class="text-sm font-semibold leading-6 text-left text-gray-900 capitalize ">Price</th>
                                        <th scope="col" class="text-sm font-semibold leading-6 text-left text-gray-900 capitalize rounded-t-xl"> Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-300 ">
                                    @foreach ($suppliers  as $supplier)
                                    <tr class="transition-all duration-500 bg-white hover:bg-gray-50">
                                        <td class="p-2 text-sm font-medium leading-6 text-gray-900 whitespace-nowrap ">{{$supplier->name}}</td>

                                        <td class="p-2 text-sm font-medium leading-6 text-gray-900 whitespace-nowrap">${{$supplier->price}} </td>
                                        <td>
                                        <div class="flex items-center gap-1">
                                                <a href="{{route('suppliers.show',$supplier)}}"  class="flex p-2 text-green-700 transition-all duration-500 rounded-full group item-center">
                                                    View                                                    </a>
                                                @role('supplier')
                                                    <div class="flex p-2 transition-all duration-500 rounded-full group item-center">
                                                    <form action="{{route('suppliers.destroy',$supplier)}}" method="POST" class="inline-block">
                                                        @csrf
                                                        @method('Delete')
                                                        <button type="submit">Delete</button>
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
                                {{ $suppliers->links() }}
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
