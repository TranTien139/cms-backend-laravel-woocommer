@extends("admin.headerfooter.masterpage")
@section("title")
Sửa Liên Hệ
@stop
@section("content_admin")
<div class="col-sm-12" style="padding:15px; border-bottom:1px solid #999;">
<b>Bài báo</b><br>
<div class="row">

<?php
$namedir = public_path().'/image_upload/article/*.*';
$files = glob($namedir);

for ($i=0; $i<count($files); $i++) {
	$segments = explode('/', trim(parse_url($files[$i], PHP_URL_PATH), '/'));
	$numSegments = count($segments); 
	$currentSegment = $segments[$numSegments - 1];
    $image = $currentSegment;
    echo '<div class="col-sm-1">';
    echo $image;
    echo '<img src="../public/image_upload/article/'.$image.'" alt="Random image" class="img-responsive" />';
    echo '</div>';
}

?>

</div>
</div>

<div class="col-sm-12" style="padding:15px; border-bottom:1px solid #999;">
<b>Logo</b><br>
<div class="row">

<?php
$namedir = public_path().'/image_upload/logo/*.*';
$files = glob($namedir);

for ($i=0; $i<count($files); $i++) {
	$segments = explode('/', trim(parse_url($files[$i], PHP_URL_PATH), '/'));
	$numSegments = count($segments); 
	$currentSegment = $segments[$numSegments - 1];
    $image = $currentSegment;
    echo '<div class="col-sm-1">';
    echo $image;
    echo '<img src="../public/image_upload/article/'.$image.'" alt="Random image" class="img-responsive" />';
    echo '</div>';
}

?>

</div>
</div>


<div class="col-sm-12" style="padding:15px; border-bottom:1px solid #999;">
<b>Sản phẩm</b><br>
<div class="row">

<?php
$namedir = public_path().'/image_upload/product/*.*';
$files = glob($namedir);

for ($i=0; $i<count($files); $i++) {
	$segments = explode('/', trim(parse_url($files[$i], PHP_URL_PATH), '/'));
	$numSegments = count($segments); 
	$currentSegment = $segments[$numSegments - 1];
    $image = $currentSegment;
    echo '<div class="col-sm-1">';
    echo $image;
    echo '<img src="../public/image_upload/article/'.$image.'" alt="Random image" class="img-responsive" />';
    echo '</div>';
}

?>

</div>
</div>


<div class="col-sm-12" style="padding:15px; border-bottom:1px solid #999;">
<b>Sản phẩm / Sản phẩm chi tiết</b><br>
<div class="row">

<?php
$namedir = public_path().'/image_upload/product/product_detail/*.*';
$files = glob($namedir);

for ($i=0; $i<count($files); $i++) {
	$segments = explode('/', trim(parse_url($files[$i], PHP_URL_PATH), '/'));
	$numSegments = count($segments); 
	$currentSegment = $segments[$numSegments - 1];
    $image = $currentSegment;
    echo '<div class="col-sm-1">';
    echo $image;
    echo '<img src="../public/image_upload/article/'.$image.'" alt="Random image" class="img-responsive" />';
    echo '</div>';
}

?>

</div>
</div>


<div class="col-sm-12" style="padding:15px; border-bottom:1px solid #999;">
<b>Ảnh slider</b><br>
<div class="row">

<?php
$namedir = public_path().'/image_upload/slider/*.*';
$files = glob($namedir);

for ($i=0; $i<count($files); $i++) {
	$segments = explode('/', trim(parse_url($files[$i], PHP_URL_PATH), '/'));
	$numSegments = count($segments); 
	$currentSegment = $segments[$numSegments - 1];
    $image = $currentSegment;
    echo '<div class="col-sm-1">';
    echo $image;
    echo '<img src="../public/image_upload/article/'.$image.'" alt="Random image" class="img-responsive" />';
    echo '</div>';
}

?>

</div>
</div>
@stop