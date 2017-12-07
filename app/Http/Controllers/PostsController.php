<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class PostsController extends Controller
{
    public function __construct()
    {
       $this->middleware('auth')->except(['index','show']);

    }

    public function index()
    {
        $posts=Post::latest()
            ->filter(\request(['month','year']))
            ->get();


//        $archives=Post::archives();
//        $posts=Post::latest();
//        if($month=\request('month')){
//            $posts->whereMonth('created_at',Carbon::parse($month)->month);
//        }
//
//        if($year=\request('year')){
//            $posts->whereYear('created_at',Carbon::parse($year)->year);
//        }
//        $posts=$posts->get();
//        $archives=Post::selectRaw('year(created_at) year,monthname(created_at) month,count(*) published')->groupBy('year','month')->orderByRaw('min(created_at) desc')->get();
        //archives 档案
        return view('posts.index',compact('posts'));
    }

    public function show(Post $post)
    {
//        $post=Post::find($id);
        return view('posts.show',compact('post'));
    }

    public function create()
    {
        return view('posts.create');

    }

    public function store(Request $request)
    {

//        dd(new Post(\request(['title','body'])));

//        Post::create(request()->only('title','body'));
//         $res=Post::create(request(['title','body']));
//         $res=Post::create([
//             'title'=>$request->title,
//             'body'=>$request->body,
//             'user_id'=>auth()->id(),
//         ]);

         auth()->user()->publish(new Post(\request(['title','body'])));
//         $res=Post::create($request->only('title','body'));
        return redirect('/');
//        if($res){
//            return redirect('/');
//        }else{
//            return redirect()->back()->withInput()->withErrors('发布失败');
//        }

//        $post=new Post();
//        $post->title=$request->title;
//        $post->body=$request->body;
//        if($post->save()){
//            return redirect()->back();
//        }else{
//            return redirect()->withInput()->withErrors('发表失败');
//        }
//
//        dd(request(['title','body']));

    }

}
