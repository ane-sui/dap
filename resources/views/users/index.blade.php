<x-app-layout>

            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden shadow-sm bg-gray-70 sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="flex flex-col">
                        <div class="overflow-x-auto ">
                        <div class="inline-block min-w-full align-middle">
                        <div class="flex justify-end">
                            <a href="{{route('users.create')}}" class="flex justify-end ml-2 ">
                                <x-primary-button>User</x-primary-button>
                            </a>

                            <a href="{{route('gov.create')}}" class="flex justify-end ml-2 ">
                                <x-primary-button>government</x-primary-button>
                            </a>

                            <a href="{{route('ext.create')}}" class="flex justify-end ml-2 ">
                                <x-primary-button>extension worker</x-primary-button>
                            </a>

                            <a href="{{route('buy.create')}}" class="flex justify-end ml-2 ">
                                <x-primary-button>Buyer</x-primary-button>
                            </a>

                            <a href="{{route('sell.create')}}" class="flex justify-end ml-2 ">
                                <x-primary-button>seller</x-primary-button>
                            </a>
                            <a href="{{route('bank.create')}}" class="flex justify-end ml-2 ">
                                <x-primary-button>Bank</x-primary-button>
                            </a>

                            <a href="{{route('stake.create')}}" class="flex justify-end ml-2 ">
                                <x-primary-button>Stakeholder</x-primary-button>
                            </a>

                        </div>

                            <div class="overflow-hidden rounded ">
                                <table class="min-w-full p-2 mt-4 rounded-xl">
                                    <thead>
                                        <tr class="">
                                            <th scope="col" class="p-2 text-sm font-semibold leading-6 text-left capitalize ">Name </th>
                                            <th scope="col" class="p-2 text-sm font-semibold leading-6 text-left capitalize">Email</th>
                                            <th scope="col" class="p-2 text-sm font-semibold leading-6 text-left capitalize "> Actions </th>
                                        </tr>
                                    </thead>
                                    <tbody class="">
                                        @foreach ($users as $user )
                                        <tr class="transition-all duration-500 hover:bg-teal-300">
                                            <td class="p-2 text-sm font-medium leading-6 whitespace-nowrap ">{{$user->name}}</td>
                                            <td class="p-2 text-sm font-medium leading-6 whitespace-nowrap">{{$user->email}}  </td>
                                            <td class="p-2 ">
                                                <div class="flex items-center gap-1">
                                                    {{-- <a href="{{route('users.edit',$user)}}"  class="flex p-2 text-green-700 transition-all duration-500 rounded-full group item-center">Edit</a> --}}
                                                    <div class="flex p-2 text-red-400 transition-all duration-500 rounded-full group item-center">
                                                        <form action="{{route('users.destroy',$user)}}" method="post" onsubmit=" return confirm ('Are you sure')" class="inline-block">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit">
                                                                Delete
                                                            </button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div class="mt-4">
                                    {{ $users->links() }}
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
