<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\PostRepository;


class SearchController extends Controller
{

    private $post_repository;

    public function __construct(PostRepository $post_repository)
    {
        $this->post_repository = $post_repository;
    }

    public function search(Request $req)
    {
        $word = $req->input('search');
        $results = $this->post_repository->postSearch($word);

        return view('posts.search', ['results' => $results]);
    }
}
