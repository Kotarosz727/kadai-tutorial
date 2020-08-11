<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;
use App\Repositories\PostRepository;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{

    private $post_repository;

    public function __construct(PostRepository $post_repository)
    {
        $this->post_repository = $post_repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $req)
    {
        //検索フォームよりPOSTされた場合
        if($req->has('search')){
            $word = $req->input('search');
            $lists = $this->post_repository->postWithWord($word);
        } else {
            $lists = Post::all();
        }
        
        return view('posts.index', ['lists' =>$lists]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(!Auth::check()){
            return redirect('/login')->with('error', 'ログインしてください。');
        }
        $categories = Category::all();
        return view('posts.create', ['categories'=>$categories]);   
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->post_repository->insertPost($request);

        return redirect('/posts')->with('status', '記事を投稿しました。');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('posts.detail', ['post' => post::findOrFail($id)]);
    }
   
}
