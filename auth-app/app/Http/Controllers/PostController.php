<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Post;
use App\Models\User;

class PostController extends Controller
{
    public function index() : View {
        $posts = Post::with('user')->get();
        return view("posts.posts", ['posts' => $posts]);
    }

    public function post($id) : View {
         $post = Post::with('user')->findOrFail($id);

        return view('posts.post')->with("post", $post);
    }

    public function edit($id) {
        $post = Post::with('user', 'comments')->findOrFail($id);

        return view("posts.edit")->with('post', $post);
    }

    public function addPost() {
        return view("posts.add-post");
    }

    public function create(PostRequest $postRequest) {
        $title = $postRequest['title'];
        $body = $postRequest['body'];
        $user_id = $postRequest['user_id'];
 
        $post = Post::create([
            "title" => $title,
            'body' => $body,
            'user_id' => $user_id
        ]);

        if($post) {
            return redirect('/posts');
        }
        
    }

    public function update(PostRequest $postRequest, $id) {
        $post = Post::findOrFail($id);
        $post->update($postRequest->all());

        return redirect('/posts');
    }

    public function destroy($id) {
        $post = Post::findOrFail($id);

        $post->delete();
        return redirect("/posts");
    }
}
