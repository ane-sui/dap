<x-app-layout>
    <form action="{{route('irrigations.store')}}" method="post">
        @csrf
        <label for="time">Time</label>
        <select name="time" id="">
            <option value="morning">Morning</option>
            <option value="afternoon">Afternoon</option>
            <option value="evening">Evening</option>
        </select>
        <button>Save</button>
    </form>
</x-app-layout>
