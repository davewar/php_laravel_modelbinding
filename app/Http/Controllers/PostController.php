<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    //

    public function index(){

        // dd(auth()->user()->posts);

        // $posts = Post::get();  //all
        // $posts = Post::paginate(20);  // first 20
        //  $posts = Post::with(['user', 'likes'])->paginate(20);
           $posts = Post::latest()->paginate(20);  // first 20

        return view('posts.index', [
            'posts' => $posts
        ]);

    }

    public function store(Request $request){

            $this->validate($request, [
            'body' => 'required'
        ]);

        // Post::create([
        //         'user_id'=> auth()->user()->id,
        //     'body'=> $request->body
        // ])

        //  $request ->  user()->posts()->create([
        //      'body'=> $request->body
        //  ]);


        // dd($request ->user()->posts());

         $request->user()->posts()->create($request->only('body'));

         return back();

        // dd('ok');


    }



    public function destroy(Post $post)
        //delete defined in policys
    {
        $this->authorize('delete', $post);

        $post->delete();

        return back();
    }







}
