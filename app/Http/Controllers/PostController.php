<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();

        return view('dashboard.posts.index' , compact('posts'));
    }

    public function create()
    {
        $user = User::findOrfail(Auth::id());
        if ($user->cannot('create', Post::class)) {
            abort(403);
        }
        return view('dashboard.posts.create');
        
    }

    public function store(Request $request)
    {
        $user = User::findOrfail(Auth::id());
        if ($user->cannot('create', Post::class)) {
            abort(403);
        }
        $validator = Validator::make($request->all() , 
        [
            'name' => 'required|string',
            'desc' => 'required|string',
        ]);
        if ($validator->fails()) {
            return back()->withInput()->withErrors($validator->errors());
        }

        Post::create($request->only('name' , 'desc'));
        return redirect(route('post.index'))->with('success' , "Post Added Successfully");
    }


    public function delete(Post $post)
    {
        $user = User::findOrfail(Auth::id());
        if ($user->cannot('delete', Post::class)) {
            abort(403);
        }
        $post->delete();
        return redirect(route('post.index'))->with('success', "Post Deleted Successfully");
    }


    public function show(Post $post)
    {


        return view('dashboard.posts.show' , compact('post'));
    }
}
