<x-app-layout>
    @foreach ($irrigations as $irrigation )
        <p class="text-white">{{$irrigation->time}}</p>
        <p class="text-white">{{$irrigation->quantity}}</p>
    @endforeach
</x-app-layout>
