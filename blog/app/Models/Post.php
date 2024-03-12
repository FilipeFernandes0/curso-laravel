<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    // protected $fillable = ['title','excerpt','body']; //basicamente isto protege do mass assignment so este parametro e que
    //pode ser preenchido e o title
    //exemplo se eu nao tivesse fillable ou mete-se ai id era possivel
    //mudar o id 
    // protected $guarded = ['id']; // basicamente este é ao contrario
    //todos os campos que forem metidos aqui estao protegidos^
    //basicamente se queres estar protegido de mass assignemtn nao facas
    //mass assignemnt

    protected $with = ['category', 'author'];
    //devido a este width nao duplica as queries e posso remover das routes

    public function category(){
        return $this->belongsTo(Category::class);
        //isto é uma relacao eloquente onde 
        //um post pertence a uma categoria
    }
    public function author(){
        return $this->belongsTo(User::class,"user_id");
    }


    public function scopeFilter($query, array $filters)
    {

        $query->when($filters['search'] ?? false, fn($query, $search) =>
            $query->where(fn($query) =>
                $query->where('title','like','%'. $search .'%'),
                $query->orwhere('body','like','%'. $search .'%')


        )
            
            );

            //isto e sintaxe do sql estamos a dizer que queremos encontrar uma palavra como
            //a que metemos no search e precisa do %
        
        
        $query->when($filters['category'] ?? false, fn($query, $category) =>

            $query->whereHas('category',fn($query)=>
                $query->where('slug',$category))            

        // $query->when($filters['category'] ?? false, fn($query, $category) =>
        //     $query
        //         ->whereExists(fn($query) =>
        //         $query-> from('categories')
        //             ->whereColumn('categories.id','posts.category_id')
        //             ->where('categories.slug', $category))
            

    );
    $query->when($filters['author'] ?? false, fn($query, $author) =>
            $query->whereHas('author',fn($query)=>
                $query->where('username',$author)
            
            
            )
            );
                
        }
    }





