<!-- 
①共通テンプレートlayout.blade.phpを作る
②共通ヘッダーを作る
③共通フッターを作る
④共通テンプレを継承したリストを作る
-->

<!--
    ①リンクを作る
    ②routeを作る
    ③（CM）Conttollerを作る
    ④（V）詳細画面を作る
-->
@extends('original_blog.layout')
@section('title', 'ブログ詳細')
@section('content')
<div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h2>{{ $original_blog_content->title }}</h2>
            <span>作成日：{{ $original_blog_content->created_at }}</span>
            <span>更新日：{{ $original_blog_content->updated_at }}</span>
            <p>{{ $original_blog_content->content }}</p>

        </div>
        </div>
        @endsection