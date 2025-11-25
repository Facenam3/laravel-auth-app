<x-app-layout>
    <main class="p-5 container mx-auto">
        <div class="p-5 w-3/4 mx-auto">
            <h2 class="text-xl text-gray-100 font-bold mb-3">Add Post</h2>
            <form class="p-5 bg-gray-100 rounded-xl shadow-md border-stone-200 text-center" action="{{ route("posts.create") }}" method="POST">
                @csrf
                @if(Auth::user())
                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                @endif
                <div class="mb-4 flex flex-col">
                    <label class="mb-2 text-md text-stone-600 text-left" for="title">Post Title</label>
                    <input class="px-3 py-2 rounded-md outline-none border-purple-600" type="text" name="title" id="title">
                </div>
                <div class="mb-4 flex flex-col">
                    <label class="mb-2 text-md text-stone-600 text-left" for="body">Post Body</label>
                    <textarea class="px-3 py-2 rounded-md outline-none border-purple-600" name="body" id="body" rows="4"></textarea>
                </div>
                <input class="bg-purple-600 text-gray-50 px-3 py-2 rounded-md hover:bg-purple-800 hover:text-gray-100" type="submit" value="Submit">
            </form>
        </div>        
    </main>
</x-app-layout>