<x-app-layout>
    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                        <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                            <div class="p-6 text-gray-900">

                                @if (session('success'))
                                    <div id="success-message" class="p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg" role="alert">
                                        {{ session('success') }}
                                    </div>
                                @endif

                                <div class="flex flex-col">
                                    <div class="overflow-x-auto">
                                        <div class="inline-block min-w-full align-middle">
                                            <div class="overflow-hidden">
                                                <x-primary-button class="bg-teal-700"><a href="{{ route('farms.create') }}">Add Farm</a></x-primary-button>
                                                <table class="min-w-full mt-4 rounded-xl">
                                                    <thead>
                                                        <tr class="bg-gray-50">
                                                            <th scope="col" class="p-5 text-sm font-semibold leading-6 text-left text-gray-900 capitalize">Name</th>
                                                            <th scope="col" class="p-5 text-sm font-semibold leading-6 text-left text-gray-900 capitalize">Location</th>
                                                            <th scope="col" class="p-5 text-sm font-semibold leading-6 text-left text-gray-900 capitalize rounded-t-xl">Size</th>
                                                            <th scope="col" class="p-5 text-sm font-semibold leading-6 text-left text-gray-900 capitalize rounded-t-xl">Land Type</th>
                                                            <th scope="col" class="p-5 text-sm font-semibold leading-6 text-left text-gray-900 capitalize rounded-t-xl">Actions</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody class="divide-y divide-gray-300 ">
                                                        @foreach ($farms as $farm)
                                                        <tr class="transition-all duration-500 bg-white hover:bg-gray-50">
                                                            <td class="p-2 text-sm font-medium leading-6 text-gray-900 whitespace-nowrap">{{ $farm->name }}</td>
                                                            <td class="p-2 text-sm font-medium leading-6 text-gray-900 whitespace-nowrap">{{ $farm->location }}</td>
                                                            <td class="p-2 text-sm font-medium leading-6 text-gray-900 whitespace-nowrap">{{ $farm->size }}</td>
                                                            <td class="p-2 text-sm font-medium leading-6 text-gray-900 whitespace-nowrap">{{ $farm->land_type }}</td>
                                                            <td class="p-2 ">
                                                                <div class="flex items-center gap-1 ">
                                                                    <a href="{{ route('farms.show', $farm) }}" class="flex p-2 text-teal-600 transition-all duration-500 rounded-full group item-center hover:p-4">View</a>
                                                                    <a href="{{ route('crops.index') }}" class="flex p-2 text-teal-600 transition-all duration-500 rounded-full group item-center hover:p-4">Crops</a>

                                                                    <div class="flex p-2 transition-all duration-500 rounded-full group item-center hover:p-4">
                                                                        <form action="{{ route('farms.destroy', $farm) }}" method="POST" class="inline-block">
                                                                            @csrf
                                                                            @method('DELETE')
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
                                                    {{ $farms->links() }}
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

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const successMessage = document.getElementById('success-message');
            if (successMessage) {
                setTimeout(() => {
                    successMessage.style.transition = 'opacity 0.5s ease';
                    successMessage.style.opacity = 0;
                    setTimeout(() => {
                        successMessage.remove();
                    }, 500);
                }, 2000);
            }
        });
    </script>
</x-app-layout>
