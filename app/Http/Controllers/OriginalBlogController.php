<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OriginalBlog;

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

     public function showList(){
        $original_blogs = OriginalBlog::all();

        return view('original_blog.list',['original_blogs' => $original_blogs ]);
     }
}
