<?php

namespace App\Repositories;

use App\Post;
use Illuminate\Support\Facades\DB;

class PostRepository 
{

    public function insertPost($request)
    {
        //postsテーブルに登録
        $posts = new Post();
        $posts->title = $request->title;
        $posts->content = $request->content;
        $posts->save();
        
        //中間テーブル（post_category'）にpost_id,category_id登録
        $post_id = $posts->post_id;
        foreach($request->category as $cate_id){
            $post_cate = DB::table('post_category')->insert(
                ['post_id' => $post_id, 'cate_id' => $cate_id]
            );
        }
    }

    //検索フォームよりPOSTされた値でクエリを発行
    public function postWithWord($word){
        $lists  = DB::table('posts')
                ->whereRaw('title like ? || content like ?', '%'.$word.'%', '%'.$word.'%')
                ->get();
        return $lists;       
    }

}

?>