@extends('original_blog.layout')
@section('title', 'ブログ編集')
@section('content')
<div>
        <h2 class="text-3xl font-medium mb-3 pl-6">ブログ編集フォーム</h2>
        <form method="POST" action="{{ route('update') }}" onSubmit="return checkSubmit()">
         @csrf
         <input type="hidden" name="id" value="{{ $original_blog_edit->id }}" >
            <div class="form-group mt-8 pl-6">
                <label for="title">
                    タイトル
                </label>
                <input
                    id="title"
                    name="title"
                    class="form-control"
                    value="{{ $original_blog_edit->title }}"
                    type="text">
                @if ($errors->has('title'))
                    <div class="text-danger">
                        {{ $errors->first('title') }}
                    </div>
                @endif
            </div>
            <div class="form-group mt-8 pl-6 mr-4">
                <label for="content">
                    本文
                </label>
                <textarea
                    id="content"
                    name="content"
                    class="block p-2.5 w-full text-black bg-gray-50 rounded-md border  dark:border-gray-600"
                    rows="4"
                >{{ $original_blog_edit->content }}</textarea>
                @if ($errors->has('content'))
                    <div class="text-danger">
                        {{ $errors->first('content') }}
                    </div>
                @endif
            </div>
            <div class="mt-10 flex  justify-center gap-x-5">
                <a class="shadow-lg px-2 py-1  bg-slate-600 text-lg text-white font-semibold rounded  hover:bg-slate-800 hover:shadow-sm hover:translate-y-0.5 transform transition" href="{{ route('OriginalBlogs') }}">
                    キャンセル
                </a>
                <button type="submit" class="shadow-lg px-2 py-1  bg-blue-600 text-lg text-white font-semibold rounded  hover:bg-blue-800 hover:shadow-sm hover:translate-y-0.5 transform transition">
                    更新する
                </button>
        </form>
    </div>
</div>
<script>
function checkSubmit(){
if(window.confirm('更新してよろしいですか？')){
    return true;
} else {
    return false;
}
}
</script>
@endsection