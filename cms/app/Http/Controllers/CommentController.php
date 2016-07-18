<?php

namespace App\Http\Controllers;

use Request;

use App\Http\Requests;
use App\CommentModel;
use Session;

class CommentController extends Controller
{
   public function postcomment(){
    if (Request::ajax()) {
    	session_start();
       $ses = $_SESSION['6_letters_code'];
       $code_captcha = Request::get("code_captcha");
       if($ses == $code_captcha && (strlen(Request::get("name_comment"))!=0) && (strlen(Request::get("content_comment")) != 0) ){
       		$com = new CommentModel;
       		$com->name = Request::get("name_comment");
       		$com->content = Request::get("content_comment");
       		$com->images = "http://www.gravatar.com/avatar.php";
       		$id_rep = Request::get("reply_comment");
       		$com->reply_id = $id_rep;
       		if($id_rep !=0){
       			$post = CommentModel::findOrFail($id_rep);
       			$post ->count_reply = $post ->count_reply +1;
       			$post->save();
       		}
       		$com->save();
       		echo "oke";
       }else{
       		echo "error";
       }  
    }
  }

  public function getcomment(){
  	return view('admin.systemcomment.systemcomment');
  }

}
