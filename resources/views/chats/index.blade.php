<x-app-layout>
    @foreach ($chats as $chat )
        <p>{{$chat->name}} : Chat  </p>
        <p> <a href="mailto:{{$chat->email}}">Contact</a></p>
    @endforeach
</x-app-layout>
