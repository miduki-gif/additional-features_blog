@extends('original_blog.layout')
@section('title', 'ブログ投稿')
@section('content')
    <div>
        <h2 class="text-3xl font-medium mb-3 pl-6">ブログ投稿フォーム</h2>
        <form method="POST" action="{{ route('store') }}" onSubmit="return checkSubmit()">
         @csrf 
            <div class="form-group mt-6 pl-6 mr-4">
                <label for="title">
                    タイトル
                </label>
                <input
                    id="title"
                    name="title"
                    class="block p-2.5 w-full text-black bg-gray-50 rounded-md border  dark:border-gray-600"
                    value="{{ old('title') }}"
                    type="text"
                >
                @if ($errors->has('title'))
                    <div class="text-danger">
                        {{ $errors->first('title') }}
                    </div>
                @endif
            </div>
            <div class="form-group mt-6 pl-6 mr-4">
                <label for="content">
                    本文
                </label>
                <textarea
                    id="content"
                    name="content"
                    class="block p-2.5 w-full text-black bg-gray-50 rounded-md border  dark:border-gray-600"
                    rows="4"
                >{{ old('content') }}</textarea>
                @if ($errors->has('content'))
                    <div class="text-danger">
                        {{ $errors->first('content') }}
                    </div>
                @endif
            </div>
            <div class="mt-8 flex  justify-center gap-x-5" >
                <a class="shadow-lg px-2 py-1  bg-slate-600 text-lg text-white font-semibold rounded  hover:bg-slate-800 hover:shadow-sm hover:translate-y-0.5 transform transition" href="{{ route('OriginalBlogs') }}">
                    キャンセル
                </a>
                <button type="submit" class="shadow-lg px-2 py-1  bg-blue-600 text-lg text-white font-semibold rounded  hover:bg-blue-800 hover:shadow-sm hover:translate-y-0.5 transform transition">
                    投稿する
                </button>
            </div>
        </form>
    </div>
<script>
function checkSubmit(){
if(window.confirm('送信してよろしいですか？')){
    return true;
} else {
    return false;
}
}
</script>
@endsection