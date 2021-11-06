<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Blog</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <h1>Blog Name</h1>
        <div class='posts'>
            <a href='/posts/create'>Create</a>
             @foreach($posts as $post) 
              <div class='post'>
                  <a href='/posts/{{$post ->id}}/edit'>Edit</a>
                  <form action='/posts/{{$post ->id}}' id='form_{{$post ->id}}' method='post' style='display:inline'>
                      @csrf
                      @method('DELETE')
                      <button type='button' onclick='return deletePost();'>delete</button>
                　</form>
                  <h2 class='title'>
                      <a href="posts/{{$post ->id}}">{{$post->title}}</a>
                  </h2>
                  <p class='body'>{{$post->body}}</p>
                
              </div>
             @endforeach
        </div>
        <div class='paginate'>
               {{ $posts->links() }}
        </div>
        
        <script>
            function deletePost() {
                'use strict';
                if (window.confirm("削除すると復元できません。\n 本当に削除しますか？")){
                    document.getElemetById('from_delete').submit();
                }
            }
        </script>
    </body>
</html>
