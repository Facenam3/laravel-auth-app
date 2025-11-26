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
                            <div>
                                <h2 class="font-bold text-xl mt-5 capitalize">comments</h2>
                                  @if($comments)
                                        @foreach ($comments as $comment)
                                            <div class="mt-5 bg-slate-100 rounded-md p-2">
                                                <div class="flex justify-between p-2">
                                                    <p class="text-gray-800 text-md w-4/5">{{ $comment->comment }}</p>
                                                    <div class="actions w-1/8">
                                                        <form action="{{ route("comment.delete", ['id' => $comment->id]) }}" method="POST">
                                                            @csrf
                                                            @method("DELETE")
                                                            <input type="hidden" name="post_id" value="{{ $post->id }}">
                                                            <input type="submit" value="Delete" class=" text-red-600 hover:text-red-800">
                                                        </form>
                                                    </div>
                                                </div>                                                
                                                <div class="flex justify-between p-2">
                                                    <h3 class="text-sm text-gray-400">{{ $comment->user->name }}</h3>
                                                    <p class="text-sm text-gray-400">{{ $comment->created_at }}</p>
                                                </div>                                                                                 
                                            </div>
                                        @endforeach
                                    @endif
                                <form action="{{ route("comments.create") }}" method="POST">
                                    @csrf
                                    <div class="mt-4 flex flex-col">
                                        <input type="hidden" name="user_id" value={{ Auth::user()->id }}>
                                        <input type="hidden" name="post_id" value={{ $post->id }}>
                                        <textarea name="comment" id="comment" rows="3" class="w-full outline-none border-gray-300 bg-slate-100 rounded-md focus:border-purple-600"></textarea>
                                        <input type="submit" value="Add Comment" class="mt-3 px-2 py-1 bg-purple-600 text-gray-50 hover:bg-purple-800 hover:text-gray-100 w-1/6 rounded mx-auto">
                                    </div>
                                </form>
                            </div>                            
                        </div>
                    </div>
            </div>
        @endif        
    </main>
</x-app-layout>