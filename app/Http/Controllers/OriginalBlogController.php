<?php

namespace App\Http\Controllers;

use App\Models\OriginalBlog;
use App\Http\Requests\OriginalBlogRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OriginalBlogController extends Controller
{
     //①（M）Blog　Modelを呼び出す
    //②(C) ControllerからBladeに渡す
    //③（V）Bladeで表示する　
     /**
     * ブログ一覧を表示する
     * 
     *  @return view
     */

     public function showList()
     {
        $original_blogs = OriginalBlog::all();

        return view( 'original_blog.list',['original_blogs' => $original_blogs ]);
     }

     public function showDetail($id)
     {
         $original_blog_id = OriginalBlog::find($id);

         if(is_null($original_blog_id)){
            Session()->flash('err_msg','データがありません。');
            return redirect(route('OriginalBlogs'));
     }
     return view( 'original_blog.detail',[ 'original_blog_content' => $original_blog_id ]);
     }

       /**
     * ブログ投稿画面を表示する
     *  @return view
     */
      public function showCreate()
     {
      return view( 'original_blog.form' );
     }

      /**
     * ブログ登録する
     *  @return view
     */
    public function exeStore(OriginalBlogRequest $request)
    {
        $inputs_create = $request ->all();

        DB::beginTransaction();

       try{
            //ブログ登録
            OriginalBlog::create($inputs_create);
           DB::commit();
       }catch(\Throwable $e){
           DB::rollBack();
           abort(500);
       }
      
       Session()->flash('err_msg','ブログを登録しました');
       return redirect(route('OriginalBlogs'));
    }

     public function showEdit($id)
     {
      $original_blog_id = OriginalBlog::find($id);

      if(is_null($original_blog_id)){
         Session()->flash('err_msg','データがありません。');
         return redirect(route('OriginalBlogs'));
      }
         return view( 'original_blog.edit',[ 'original_blog_edit' => $original_blog_id ]);
     }

     public function exeUpdate(OriginalBlogRequest $request)
     {
           //ブログのデータを受け取る
        $inputs = $request->all();
        DB::beginTransaction();

        try{
             //ブログ更新
            $blog_Update= OriginalBlog::find($inputs ['id']);
            $blog_Update->fill([
                'title' => $inputs ['title'],
                'content' => $inputs ['content']
            ]);
            $blog_Update->save();
            DB::commit();
        }catch(\Throwable $e){
            DB::rollBack();
            abort(500);
        }
       
        Session()->flash('err_msg','ブログを更新しました');
        return redirect(route('OriginalBlogs'));
     }
        /**
         * ブログ削除する
         *  @param  int $id
         *  @return view
         */
      public function exeDelete($id)
      {
        if(empty($id))
        {
            Session()->flash('err_msg','データがありません。');
            return redirect(route('OriginalBlogs'));
        }
         //ブログ削除
        try{
            OriginalBlog::destroy($id);
        }catch(\Throwable $e){
            abort(500);
        }
        Session()->flash('err_msg','削除しました。');
        return redirect(route('OriginalBlogs'));
      }
   }