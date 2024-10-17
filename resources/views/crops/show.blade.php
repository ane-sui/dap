<x-app-layout>
    <form action="{{route('crops.update',$crop)}}" method="POST">
        @csrf
        @method('PUT')
        <input type="text" name="name"  value="{{$crop->name}}">
        <input type="text" name="seed_type" value="{{$crop->seed_type}}">
        <input type="number" name="quantity" value="{{$crop->quantity}}">
        <input type="date" name="planting" value="{{$crop->planting}}">
        <button>Save</button>
    </form>
</x-app-layout>
