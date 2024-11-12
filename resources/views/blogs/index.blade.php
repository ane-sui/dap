<x-app-layout>
    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                        <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                                <div class="flex flex-col">
                                    <div class="overflow-x-auto ">
                                    <div class="inline-block min-w-full align-middle">
                                        <div class="overflow-hidden ">
                                            <section class="bg-white ">
                                                <div class="max-w-screen-xl px-4 py-8 mx-auto lg:py-16 lg:px-6">
                                             @role('extension')
                                                    <x-primary-button class="flex justify-end mb-3 bg-teal-700"><a class="" href="{{route('blogs.create')}}">Write</a></x-primary-button>
                                            @endrole
                                                    <div class="grid gap-8 lg:grid-cols-2">
                                                        @foreach ($blogs  as $blog)
                                                        <article class="p-6 bg-white border border-gray-200 rounded-lg shadow-md dark:border-teal -700">
                                                            <div class="flex items-center justify-between mb-5 text-gray-500">
                                                                <span class="bg-primary-100 text-teal-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded dark:bg-teal-200 dark:text-teal-800">
                                                                    <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M2 5a2 2 0 012-2h8a2 2 0 012 2v10a2 2 0 002 2H4a2 2 0 01-2-2V5zm3 1h6v4H5V6zm6 6H5v2h6v-2z" clip-rule="evenodd"></path><path d="M15 7h1a2 2 0 012 2v5.5a1.5 1.5 0 01-3 0V7z"></path></svg>
                                                                    Article
                                                                </span>
                                                                <span class="text-sm">{{$blog->created_at->format(' d M Y')}}</span>
                                                            </div>

                                                            <h2 class="mb-2 text-2xl font-bold tracking-tight"><a href="#">{{$blog->subject}}</a></h2>
                                                            <p class="mb-5 font-light ">{{Str::limit($blog->content, 200, '...')}}.</p>
                                                            <div class="flex items-center justify-between">
                                                                <div class="flex items-center space-x-4">
                                                                        {{$blog->user->name}}
                                                                    </span>
                                                                </div>


                                                                <a href="{{route('blogs.show',$blog)}}" class="inline-flex items-center font-medium text-primary-600 dark:text-primary-500 hover:underline">
                                                                    Read more
                                                                    <svg class="w-4 h-4 " fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                                                </a>


                                                                @if( auth()->user()->id == $blog->user->id)
                                                                <div class="flex items-center gap-1 ">
                                                                    <a href="{{route('blogs.edit',$blog)}}"  class="flex p-2 text-teal-600 transition-all duration-500 rounded-full group item-center hover:p-4">Edit</a>
                                                                    <div class="flex p-2 transition-all duration-500 rounded-full group item-center hover:p-4">
                                                                        <form action="{{route('blogs.destroy',$blog)}}" method="POST" class="inline-block">
                                                                            @csrf
                                                                            @method('Delete')
                                                                            <button type="submit" class="text-red-700">Delete</button>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                                @endif
                                                            </div>
                                                        </article>
                                                        @endforeach
                                                    </div>
                                                </div>
                                              </section>
                                            <div class="mt-4">
                                                {{ $blogs->links() }}
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
