<x-layout>

    @include('posts._header')

    <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">
        @if($posts->count())

            <x-posts-grid :posts="$posts"/>

            {{$posts->links()}}
       
        @else
            <p class="text-center">No Posts yet. Come back later</p>
        @endif    
</main>


    {{-- @foreach($posts as $post) --}}
{{-- como se faz um for  --}}
{{-- @dd($loop)  --}}
{{-- para debug podemos usar assim o dd --}}
    {{-- <article>

        <h1>
            <a href="/posts/{{$post ->slug}}">
                {{$post -> title}}    --}}
                {{-- variaveis --}}
            {{-- </a> --}}
        
        {{-- </h1> --}}

        {{-- <p>
            By <a href="/authors/{{$post->author->username}}">{{$post->author->name}}</a> <a href="/categories/{{$post->category->slug}}">{{$post->category->name}}</a> --}}
            {{-- basicamente temos um problema chamado n+1 
                que aumenta sempre que acedemos ao site isto pode causar 
                lentidao e ficar pesado  --}}
        {{-- </p> --}}


        {{-- <div>
            {{$post -> excerpt}}
        </div>


    </article>
@endforeach  --}}







</x-layout>






































{{-- @extends('layout') --}}

{{-- para extender do layout --}}


{{-- @section('content') --}}

{{-- esta e a secao content --}}


{{-- @foreach($posts as $post) --}}
{{-- como se faz um for  --}}
{{-- @dd($loop)  --}}
{{-- para debug podemos usar assim o dd --}}

{{-- <article>

    <h1>
        <a href="/posts/{{$post -> slug}}">
            {{$post -> title}}   
            variaveis
        </a>
    
    </h1>

    <div>
       {{$post -> excerpt}}
    </div>


</article>
@endforeach



@endsection --}}

{{-- outra maneira de organizar esta e por componentes e passa-se
    a variavel content no layout e agora usa se tags html --}}

