<main class="pb-3 antialiased bg-white">
    <div class="flex justify-between max-w-screen-xl mx-auto ">
        <article class="w-full max-w-2xl mx-auto format format-sm sm:format-base lg:format-lg format-blue dark:format-invert">
            <section class="not-format">
                <div class="flex items-center justify-between mb-6">
                    <h2 class="mt-3 text-lg font-bold lg:text-2xl">Discussion</h2>
                </div>
                @foreach ($blog->comments  as $comment)
                <article class="p-3 text-base bg-white border rounded-lg">
                    <footer class="flex items-center justify-between mb-2">
                        <div class="flex items-center">
                            <p class="inline-flex items-center mr-3 text-sm font-semibold text-gray-900">
                                {{$comment->name}}
                            </p>
                            <p class="text-sm "><time>{{$comment->created_at->format('D-M-Y H:m')}} </time></p>
                        </div>
                    </footer>
                    <p>
                        {{$comment->comment}}
                    </p>

                    @if( auth()->user()->id !== $comment->id)
                        <div class="flex justify-end gap-1 ">
                                <div class="flex p-2 transition-all duration-500 rounded-full text-end group item-center hover:p-4">
                                <form action="{{route('comments.destroy',$comment)}}" method="POST" class="inline-block">
                                    @csrf
                                    @method('Delete')
                                    <button type="submit" class="inline-flex items-center py-2.5 px-4 text-xs font-medium text-center text-white bg-teal-700 rounded-lg focus:ring-4 focus:ring-teal-200 dark:focus:ring-teal-900 hover:bg-primary-800">Delete</button>
                                </form>
                            </div>
                        </div>
                    @endif
                </article>
            </section>
        </article>
    </div>
</main>












@endforeach
