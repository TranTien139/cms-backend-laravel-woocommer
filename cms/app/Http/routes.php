<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::group(['middleware' => ['web']], function () {
    Route::group(['prefix'=>'admin'],function(){
		Route::get('/',['as'=>'getlogin','uses'=>'UserController@getlogin']);
		Route::get('/logout',['as'=>'getlogout','uses'=>'UserController@getlogout']);
		Route::post('/',['as'=>'postlogin','uses'=>'UserController@postlogin']);
		Route::resource('user','UserController');
		Route::get('profile',['as'=>'getprofile','uses'=>'UserController@getprofile']);
		Route::post('getchangepassword',['as'=>'changepassword','uses'=>'UserController@changepassword']);
    	Route::get('plugin',function(){return view('admin.general.plugin'); });
        Route::get('sitemap', function () { return view('admin.sitemap.sitemap');});
        Route::get('managephoto', function () { return view('admin.managephoto.photo');});
    	Route::get('systemcomment',['as'=>'getcomment','uses'=>'CommentController@getcomment']);
        Route::post('systemcomment',['as'=>'postcomment','uses'=>'CommentController@postcomment'] );
        Route::resource('groupslider','GroupFlexSliderController');
    	Route::resource('slider','FlexSliderController');
    	Route::resource('article','ArticleController');
        Route::resource('htmlblock','HtmlBlockController');
        Route::resource('contact','ContactController');
        Route::resource('changelogo','LogoController');
        Route::resource('menu','MenuController');
        Route::resource('category_article','CategoriesArticleController');
        Route::resource('tag_article','ListTagArticleControler');
        Route::resource('categoryproduct','CategoryProductController');
        Route::resource('product','ProductController');
        Route::get('countvisit',function(){return view('admin.countvisit.countvisit'); });
        Route::get('deletesliderbox/{id}',function(){
            $id = Request::segment(3);
            $value = DB::table('flexsliders')->where("id",$id);
            $value1 = $value->first();
            File::delete(public_path().'/image_upload/slider/slider_box/'.$value1->img_box1);
            $value->img_box1="";
            $value->box1="";
            $value->save();
            return redirect()->back();
            });

        Route::get('deleteproductdetail/{id}',function(){
            $id = Request::segment(3);
            $value = DB::table('imageproductdetail')->where("id",$id);
            $value1 = $value->first();
            File::delete(public_path().'/image_upload/product/product_detail/'.$value1->imagedetail);
            $value->delete();
            return redirect()->back();
            });

        Route::get('deletetag_article/{id}/{id1}',function(){
            $id = Request::segment(3);
            $id1 = Request::segment(4);
            $value = DB::table('articles_tags')->where("article_id",$id1)->where('tag_id',$id);
            $value->delete();
            return redirect()->back();
            });
        
        Route::get('password/reset/{token}',['as'=>'getReset','uses'=>'Auth\PasswordController@getReset']);
        Route::post('password/reset',['as'=>'postReset','uses'=>'Auth\PasswordController@postReset']);
        Route::get('password/email',['as'=>'getEmail','uses'=>'Auth\PasswordController@getEmail']);
        Route::post('password/email',['as'=>'postEmail','uses'=>'Auth\PasswordController@postEmail']);
        Route::post('changelanguage',['as'=>'postLaguage','uses'=>'Languages\LanguageController@postLaguage']);
    });
});

Route::group(['middleware' => ['web']], function () {
Route::get('/', function () {
    return view('themes.index');
});
});
