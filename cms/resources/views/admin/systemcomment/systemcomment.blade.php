@extends("admin.headerfooter.masterpage")
@section("title")
Hệ thống bình luận 
@stop
@section("content_admin") 

<?php 
session_start();
?>

  <div class="col-lg-12">
  <h1 class="page-header">Hệ thống bình luận </h1>
  </div>
  <!-- /.col-lg-12 -->
  <div class="row">
    <div class="col-sm-7">
    <div class="col-sm-12" style="padding-bottom:120px">
<div id="commentcontainer">
<?php $result3 = DB::table('systemcommment')->where('reply_id',0)->get(); ?>
@foreach( $result3 as $row3 ) 
  <div id="maincomm">
  <img src="{!! $row3->images !!}">
  <p id="name">{!! $row3->name !!}</p>
  <b class="nicetime"><?php echo nicetime($row3->created_at) ?></b>
  <p>{!! $row3->content !!}</p>
  <p id="comm"><a href="javascript: reply_comment('{!! $row3->id !!}','{!! $row3->name !!}');">trả lời</a></p>
  @if( $row3->count_reply !=0 )
  <?php  $result4 = DB::table('systemcommment')->where('reply_id',$row3->id)->get(); ?>
      @foreach( $result4 as $row4 ) 
        <div id="subcomm">
        <img src="{!! $row4->images !!}">
        <p id="name">{!! $row4->name !!}</p>
        <b class="nicetime"><?php echo nicetime($row4->created_at) ?></b>
        <p>{!! $row4->content !!}</p>
        <div class="clearfix"></div>
        </div>
      @endforeach
    @endif
  <div class="clearfix"></div>
  </div>
@endforeach

</div>
<div id="cmt_with">Viết vình luận</div>
<form  id="postcomment"> 
<input type="hidden" name="_token" value="{!! csrf_token() !!}">
<input type="hidden" name="reply_comment" id="reply_comment" value="0">
<table width="332" border="0" align="center">
   <tr>
    <td colspan="2">
    Họ Tên:<br>
    <input name="commentid" type="hidden" value="">
    <input name="name" id="name_comment" type="text"><br>
    Nội Dung:<br>
    <textarea name="content" id="content_comment" style="width: 316px;"></textarea>
  </td>
   </tr>
  <tr>
  <tr>
    <td> <img src="{!! asset('public/admin/img/generatecaptcha.php?rand=') !!}<?php echo rand(); ?>" id='captchaimg' > </td>
    <td> <a href='javascript: refreshCaptcha();'><img src="{!! asset('public/admin/img/refresh.png') !!}"></a> </td>
  </tr>
  <tr>
    <td colspan="2">Nhập mã captcha :
      <input id="6_letters_code" name="6_letters_code" type="text"></td>
    </tr>
  <tr>
    <td colspan="2"><input type="submit" value="Submit" name='submit'></td>
    </tr>
</table>

</form>
    </div>
    </div> 
    </div>
            
@stop
