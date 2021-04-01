<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

class PostsController extends Controller
{
    public function PostList(){

        if(!Cache::has('posts')){
            $posts=Http::get("https://jsonplaceholder.typicode.com/posts");
            $posts=$posts->json();
            Cache::put('posts', $posts, 1440);
            return view('postList',['posts'=>$posts]);
        }

        $posts=Cache::get('posts');
        return view('postList',['posts'=>$posts]);
    }

    public function Post($id){
        if(!Cache::has('posts')){
            $posts=Http::get("https://jsonplaceholder.typicode.com/posts");
            $posts=$posts->json();
            if(count($posts)<$id){
                abort(404);
            }
            else {
                $post=$posts[$id-1];
                Cache::put('posts', $posts, 1440);
                return view('post',['post'=>$post]);
            }

        }

        $posts=Cache::get('posts');
        if(count($posts)<$id){
            abort(404);
        }
        else {
            $post=$posts[$id-1];
            return view('post',['post'=>$post]);
        }
    }

}
