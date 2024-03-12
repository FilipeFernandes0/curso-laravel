<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use Spatie\YamlFrontMatter\YamlFrontMatter;
use Illuminate\Support\Facades\File;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//para coseguirmos ir buscar esta variavel post precisamos de uma maneira
//de ler os ficheiros para aqui
Route::get('/',  [PostController::class,'index'])->name('home');
    




    // $posts = array_map(function ($file){
    //     $document = YamlFrontMatter::parseFile($file);


    //     return  new Post(
    //         $document->title,
    //         $document->excerpt,
    //         $document->date,
    //         $document->body(),
    //         $document->slug,

    //     );

    // }, $files);

    // foreach ($files as $file) {
    //     $document = YamlFrontMatter::parseFile($file);

    //     $posts[] = new Post(
    //         $document->title,
    //         $document->excerpt,
    //         $document->date,
    //         $document->body(),
    //         $document->slug,

    //     );
    // }




    // YamlFrontMatter::parseFile(
    //     resource_path('posts/my-fourth-post.html')
    // );






Route::get('posts/{post:slug}', [PostController::class,'show']);

// function (Post $post)  //estamos a usar o route model binding
    //onde o wildcard tem de ser igual ao nome que vem a seguir
    //ao model neste caso é $post
    //find a post by its slug and pass it to a view called "post"

    // $post = Post::findOrFail($slug);

    // return view('post', [

    //     'post' => $post,

    // ]);


    //     if( ! file_exists($path = __DIR__ ."/../resources/posts/{$slug}.html")) {
    //         // abort(404);
    //         return redirect("/");
    //     }

    //    $post =  cache()->remember("posts.{$slug}", 1200, fn() => file_get_contents($path));
    //     //usa se o cache para quando atualizarmos este link ele permanecer no cache


    //     return view('post', ['post' => $post]);



//->where('post', '[A-z_\-]+'); //constraint para usar so letras e o traco

// Route::get('categories/{category:slug}', function (Category $category) {
//     return view('posts', [
//         'posts' => $category -> posts,
//         'currentCategory' => $category,
//         'categories' => Category::all()


//     ]);
// });


Route::get('authors/{author:username}', function (User $author) {
    return view('posts.index', [
        'posts' => $author -> posts,

    ]);
});


Route::get('register', [RegisterController::class,'create']);
Route::post('register', [RegisterController::class,'store']);