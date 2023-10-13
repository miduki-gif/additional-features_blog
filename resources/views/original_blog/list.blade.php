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
@section('title', 'ブログ一覧')
@section('content')
<!-- 
①route作成（編集ボタン）
②Controllerを作る
③編集フォーム（View）を作る
④データ更新機能（Model）を作る
-->
<!--
    ①rpute作成（削除ボタン）
    ②Controller作成
    ③削除機能づくり
-->
        <div>
            <h2 class="text-3xl font-medium mb-5 pl-6">ブログ記事一覧</h2>
            @if (Session('err_msg'))
            <p class="text-danger">
                {{ Session('err_msg') }}
            </p>
            @endif
            
            <table class="w-full">
                <tr class="bg-slate-300">
                    <th>記事番号</th>
                    <th>タイトル</th>
                    <th>日付</th>
                    <th></th>
                    <th></th>
                </tr>
                @foreach ($original_blogs as $original_blog)
                <tr class="[&:nth-child(odd)]:bg-slate-300 [&:nth-child(even)]:bg-white">
                    <td class="flex justify-center">{{ $original_blog->id }}</td>
                    <td><a href="/blog/{{ $original_blog->id }}" class="flex justify-center underline">{{ $original_blog->title }}</a></td>
                    <td class="flex justify-center">{{ $original_blog->updated_at }}</td>
                    <td><button type="button" class="shadow-lg px-2 py-1  bg-blue-600 text-lg text-white font-semibold rounded  hover:bg-blue-800 hover:shadow-sm hover:translate-y-0.5 transform transition" onclick="location. href='/blog/edit/{{ $original_blog->id }}'"> 編集</button></td>
                    <form method="POST" action="{{ route('delete',$original_blog ->id) }}" onSubmit="return checkDelete()">
                        @csrf
                    <td><button type="submit" class="shadow-lg px-2 py-1  bg-blue-600 text-lg text-white font-semibold rounded  hover:bg-blue-800 hover:shadow-sm hover:translate-y-0.5 transform transition" onclick=>削除</button></td>
                    </form>
                </tr>
                @endforeach
            </table>
        </div>
        <script>
        function checkDelete(){
            if(window.confirm('削除してよろしいですか？')){
                return true;
            } else {
                 return false;
            }
        }
        </script>
        @endsection