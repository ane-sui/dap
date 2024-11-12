<x-app-layout>
    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <section class="">
                        <div class="max-w-2xl px-4 py-8 mx-auto lg:py-16">
                            <h2 class="mb-4 text-xl font-bold text-gray-900">Reply</h2>
                            <form action="{{route('reply.store')}}" method="post">
                                @csrf
                                <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                                    <div class="sm:col-span-2">
                                        <label for="subject" class="block mb-2 text-sm font-medium">Reply To</label>
                                        <input type="text" name="email" value="{{old('email', $extension->user->email)}}" id="subject" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-teal-600 block w-full p-2.5  dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Email" required="">
                                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                    </div>
<input type="text" name="extension_id" hidden value="{{$extension->id}}">
<input type="text" name="subject" hidden value="{{$extension->subject}}">
<input type="text" name="from" hidden value="{{$extension->user->name}}">

                                    <div class="sm:col-span-2">
                                        <label for="conntent" class="block mb-2 text-sm font-medium">Contents</label>
                                        <textarea id="content" name="content" rows="8" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-teal-600 focus:border-primary-600 block w-full p-2.5  dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Message....."></textarea>
                                        <x-input-error :messages="$errors->get('content')" class="mt-2" />
                                    </div>

                                </div>
                                <button type="submit" class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-teal-700 rounded-lg focus:ring-4 focus:ring-teal-200 dark:focus:ring-primary-900 hover:bg-teal-800">
                                    Send Reply
                                </button>

                            </form>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
