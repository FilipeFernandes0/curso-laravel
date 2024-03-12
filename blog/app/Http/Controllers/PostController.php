<?php

namespace App\Http\Controllers;
use App\Models\Post;
use Illuminate\Http\Request;
use App\Models\Category;


class PostController extends Controller
{
    
   public function index(){
       

       
        return view('posts.index', [
            'posts' => Post::latest()->filter(request(['search', 'category', 'author']))->paginate(2)->withQueryString(),
        ]);
   }

   public function show(Post $post){
        return view('post.show', [

            'post' => $post,

        ]);


   }

  

}
