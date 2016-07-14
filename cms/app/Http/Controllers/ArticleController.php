<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\ArticleModel;
use DB;
use App\Http\Requests\ArticleRequest;
use File;
use App\CategoriesArticleModel;
use App\ListTagArticleModel;
use App\ArticleTagModel;
use Input;

class ArticleController extends Controller
{
       public function index()
    { 
      $article_temp = ArticleModel::all();
      return view('admin.article.article_list',compact('article_temp'));
    }
    public function create()
    {   $cate_temp = CategoriesArticleModel::all();
        $tag_temp = ListTagArticleModel::all();
        return view('admin.article.article_add',compact('cate_temp','tag_temp'));
    }
    public function store(ArticleRequest $request)
    {   $file_name = $request->file('txtimage')->getClientOriginalName();
        $article_temp = new ArticleModel;
        $article_temp->title = $request->txttitle;
        $article_temp->alias = changeTitle($request->txttitle);
        $article_temp->description = $request->txtdescription;
        $article_temp->content = $request->txtcontent;
        $article_temp->auth = $request->txtauth;
        $article_temp->image = $file_name;
        $article_temp->category_id = $request->txtcategory_id;
        $article_temp->ishot = $request->txtishot;
        $article_temp->published = $request->txtpublished;
        $request->file('txtimage')->move('public/image_upload/article/',$file_name);
        $article_temp->save();
        $article_temp1 = $article_temp->id;
        if(Input::has('txttag')){
            foreach(Input::get('txttag') as $value) {
                $newtag = new ArticleTagModel;
                $tag_list =  ListTagArticleModel::findOrFail($value);
                $newtag->article_id = $article_temp1;
                $newtag->tag_id = $value;
                $newtag->text_tag = $tag_list->name;
                $newtag->tag_alias = $tag_list->alias;
                $newtag ->save();
            }
        }
        return redirect()->route('admin.article.index')->with(['flash_message'=>'Thêm thành công']);
    }
    public function show($id)
    {
      echo "404";
    }
    public function edit($id)
    {
    $cate_temp = CategoriesArticleModel::all();
    $tag_temp = ListTagArticleModel::all();
    $article_temp =  ArticleModel::findOrFail($id);
    $tag_article =  ArticleTagModel::where('article_id',$id)->get();
    return view('admin.article.article_edit',compact('article_temp','cate_temp','tag_temp','tag_article'));
    }
    public function update($id,Request $request)
    {
        $article_temp =  ArticleModel::findOrFail($id);
        $article_temp->title = $request->txttitle;
        $article_temp->alias = changeTitle($request->txttitle);
        $article_temp->description = $request->txtdescription;
        $article_temp->content = $request->txtcontent;
        $article_temp->category_id = $request->txtcategory_id;
        $article_temp->auth = $request->txtauth;
        $article_temp->ishot = $request->txtishot;
        $article_temp->published = $request->txtpublished;
        if(!empty($request->file('txtimage'))){
        $file_named = $request->file('txtimage')->getClientOriginalName();
        $request->file('txtimage')->move('public/image_upload/article/', $file_named);
  		File::delete(public_path().'/image_upload/article/'.$request->txtimage1);
        $article_temp->image= $file_named;
        }else {
          $article_temp->image = $request->txtimage1;
        }
        $article_temp->save();

        if(Input::has('txttag')){
            foreach(Input::get('txttag') as $value) {
                $newtag = new ArticleTagModel;
                $tag_list =  ListTagArticleModel::findOrFail($value);
                $newtag->article_id = $article_temp->id;
                $newtag->tag_id = $value;
                $newtag->text_tag = $tag_list->name;
                $newtag->tag_alias = $tag_list->alias;
                $newtag ->save();
            }
        }
        
        foreach(Input::get('txthastag') as $value) {
        if(!Input::has('txthastag')){
            $tag = ArticleTagModel::where('article_id',$id)->where('tag_id',$value);
            $tag ->delete();
        }
        }

       return redirect()->route('admin.article.index')->with(['flash_message'=>'Sửa thành công']);
    }
    public function destroy($id)
    {   
    $article_temp =  ArticleModel::findOrFail($id);
    $article_temp1= ArticleModel::where('image',$article_temp->image)->count();

    if($article_temp1 > 1){
        $article_temp->delete();
    }else{
        File::delete(public_path().'/image_upload/article/'.$article_temp->image);
        $article_temp->delete();
    }
    return redirect()->route('admin.article.index')->with(['flash_message'=>'Xóa thành công']);
	}
}
