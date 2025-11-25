<x-app-layout>
    <main class="container mx-auto p-5">
        <div class="flex justify-between items-center p-3">
            <h1 class="text-gray-50 text-3xl mt-5">Posts</h1>
            <a href="{{  route('posts.add-post') }}" class="bg-purple-600 px-3 py-2 text-center rounded-md text-gray-50 shadow-md hover:bg-purple-800 hover:text-gray-100">Add Post</a>
        </div> 
        @if($post) 
            <div class="mt-10 p-5 w-4/5 mx-auto">
                    <div class="bg-white shadow-md rounded-lg overflow-hidden">
                        <div class="p-4">
                            @if(Auth::user()->id === $post->user_id) 
                                <div class="flex justify-between">
                                    <h2 class="font-bold text-xl mb-2">{{ $post->title }}</h2>
                                    <div class="actions flex">
                                        <a href="{{ route("posts.edit",['id' => $post->id ]) }}" class="text-blue-700 hover:text-blue-900 hover:border-b-2 border-blue-700">Edit</a>
                                        <form action="{{ route("posts.delete", ["id" => $post->id]) }}" method="POST">
                                            @csrf
                                            @method("DELETE")
                                            <input type="submit" class="text-red-700 hover:text-red-900 hover:border-b-2 border-red-700 ml-3" value="Delete">
                                        </form>
                                    </div>                                    
                                </div>                                
                            @else
                                <h2 class="font-bold text-xl mb-2">{{ $post->title }}</h2>
                            @endif
                            
                            
                            <img src="https://images.unsplash.com/photo-1763827657709-b1bbc3c4945b?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="">
                            <p class="text-gray-600 text-sm my-4">{{ $post->body  }}</p>
                            <div class="flex justify-between items-center text-gray-500 text-sm">
                                <span>{{ $post->user->name }}</span>
                                <span>{{  $post->created_at  }}</span>
                            </div>
                            <h2 class="font-bold text-xl mt-5">comments</h2>
                        </div>
                    </div>
            </div>
        @endif        
    </main>
</x-app-layout>