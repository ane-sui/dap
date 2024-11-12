<x-app-layout>
    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <section class="">
                        <div class="max-w-2xl px-4 py-8 mx-auto lg:py-16">
                            <h2 class="mb-4 text-xl font-bold text-gray-900">Message:</h2>
                            <form action="" method="POST">
                                    <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                                        <div class="w-full">
                                            <label for="name" class="block mb-2 text-sm font-medium">Subject</label>
                                            <input type="text" name="name" id="name" value="{{$reply->subject}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5  dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Type product name" required="">
                                        </div>
                                        <div class="sm:col-span-2">
                                            <label for="">Message</label>
                                            <textarea type="price" name="price" id="price" value="" class="bg-gray-50 border text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5  dark:focus:ring-primary-500 dark:focus:border-primary-500" >            {{$reply->content}}
                                            </textarea>
                                        </div>
                                    </div>
                            </form>
                        </div>
                    </section>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
