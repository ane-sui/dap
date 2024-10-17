<x-app-layout>

@foreach ($farms as $farm )
<p class="text-gray-900"></p>{{$farm->name}}
@endforeach

</x-app-layout>
