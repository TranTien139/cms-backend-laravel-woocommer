@extends("admin.headerfooter.masterpage")
@section("title")
Sửa Sản Phẩm
@stop
@section("content_admin") 
                    <div class="col-lg-12">
                        <h1 class="page-header">Sửa Sản Phẩm
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="row">
                        <div class="col-sm-7">
                        <div class="col-sm-12" style="padding-bottom:120px">
                         {{ Form::open(array('route'=>array('admin.product.update',$product_temp['id']),'method'=>'PUT','files'=> true)) }}
                      
                            <div class="form-group">
                                <label>tên sản phẩm</label>
                                <input class="form-control" name="txtname" value="{!! old('txtname',isset($product_temp)?$product_temp['name']:null) !!}" placeholder="tên sản phẩm" />
                            </div>
							
                            <div class="form-group">
                                <label>giá sản phẩm</label>
                                <input class="form-control" name="txtprice" value="{!! old('txtprice',isset($product_temp)?$product_temp['price']:null) !!}"  placeholder="giá sản phẩm" />
                            </div>
                             <div class="form-group">
                                <label>phần trăm giảm giá (đơn vị %)</label>
                                <input class="form-control" name="txtprice_saleoff" value="{!! old('txtprice_saleoff',isset($product_temp)?$product_temp['price_saleoff']:null) !!}"  placeholder="giá sản phẩm giảm giá" />
                            </div>

                             <div class="form-group">
                                <label>mô tả sản phẩm</label>
                                <textarea style="width:100%; height:200px;" id="txtdescription" name="txtdescription">{!! old('txtdescription',isset($product_temp)?$product_temp['description']:null) !!}</textarea>
                                <script type="text/javascript"> $(function() {  var editor = CKEDITOR.replace('txtdescription', { 
                                filebrowserBrowseUrl : '{{ asset("public/admin/ckfinder/ckfinder.html")}}',
                                filebrowserImageBrowseUrl : '{{ asset("public/admin/ckfinder/ckfinder.html?Type=Images")}}',
                                filebrowserFlashBrowseUrl : '{{ asset("public/admin/ckfinder/ckfinder.html?Type=Flash") }}', 
                                filebrowserUploadUrl : '{{ asset("public/admin/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files")}}',
                                filebrowserImageUploadUrl : '{{ asset("public/admin/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images")}}',
                                filebrowserFlashUploadUrl : '{{ asset("public/admin/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash")}}',
                                filebrowserWindowWidth : '900', filebrowserWindowHeight : '480' });
                                CKFinder.setupCKEditor( editor, '{{ asset("public/admin/ckfinder/") }}' ); }); </script>
                            </div>
            
                            <div class="form-group">
                                <label>thông tin</label>
                                <textarea style="width:100%; height:200px;" id="txtcontent" name="txtcontent">{!! old('txtcontent',isset($product_temp)?$product_temp['content']:null) !!}</textarea>
                                <script type="text/javascript"> $(function() {  var editor = CKEDITOR.replace('txtcontent', { 
                                filebrowserBrowseUrl : '{{ asset("public/admin/ckfinder/ckfinder.html")}}',
                                filebrowserImageBrowseUrl : '{{ asset("public/admin/ckfinder/ckfinder.html?Type=Images")}}',
                                filebrowserFlashBrowseUrl : '{{ asset("public/admin/ckfinder/ckfinder.html?Type=Flash") }}', 
                                filebrowserUploadUrl : '{{ asset("public/admin/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files")}}',
                                filebrowserImageUploadUrl : '{{ asset("public/admin/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images")}}',
                                filebrowserFlashUploadUrl : '{{ asset("public/admin/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash")}}',
                                filebrowserWindowWidth : '900', filebrowserWindowHeight : '480' });
                                CKFinder.setupCKEditor( editor, '{{ asset("public/admin/ckfinder/") }}' ); }); </script>
                            </div>

                              <div class="form-group">
                                <label>Ảnh Đại Diện</label>
                                <input type="file" name="txtimage" value="" id="previewFileProduct"><br>
                                <input type="hidden" name="txtimage1" value="{!! $product_temp['image'] !!}">
                                <img src="{!! asset('public/image_upload/product/'.$product_temp['image']) !!}" id="image_product" class="image_product" height="200" width="auto" alt="Ảnh Đại Diện ..">
                            </div>
        
                             <div class="form-group">
                                <label>thuộc nhóm sản phẩm</label>
                                <select class="form-control" name="txtcategory">
                                    <option value=" ">không thuộc nhóm nào</option>
                                    <?php cate_parent($category,0,"",$product_temp['category_id']) ?>
                                </select>
                            </div>

                             <div class="form-group">
                                <label>thuộc nhóm sản phẩm</label>
                                <select class="form-control" name="txtcategory">
                                    @if($product_temp['status'] == "isstore")
                                    <option value="isstore" selected="selected">còn hàng</option>
                                    <option value="emptystore">hết hàng</option>
                                    @else
                                    <option value="isstore">còn hàng</option>
                                    <option value="emptystore" selected="selected">hết hàng</option>
                                    @endif
                                </select>
                            </div>

                            <div class="form-group">
                                <label>sản phẩm nổi bật</label>
                                @if($product_temp['ishot'] == "yes")
                                <input type="checkbox" name="txtishot" checked value="yes" >
                                @else
                                <input type="checkbox" name="txtishot" value="yes" >
                                @endif
                            </div>
                            <div class="form-group">
                                <label>sản phẩm mới</label>
                                 @if($product_temp['isnew'] == "yes")
                                <input type="checkbox" name="txtisnew" checked value="yes" >
                                @else
                                <input type="checkbox" name="txtisnew" value="yes" >
                                @endif
                            </div>
                            <div class="form-group">
                                <label>sản phẩm bán chạy</label>
                                  @if($product_temp['isbestseller'] == "yes")
                                <input type="checkbox" name="txtbestseller" checked value="yes" >
                                @else
                                <input type="checkbox" name="txtbestseller" value="yes" >
                                @endif
                            </div>
                             <div class="form-group">
                                <label>Xuất bản</label>
                               @if($product_temp['published'] == "yes")
                                <input type="checkbox" name="txtpublished" checked value="yes" >
                                @else
                                <input type="checkbox" name="txtpublished" value="yes" >
                                @endif
                            </div>
                            <div class="form-group">
                                <label>ảnh chi tiết sản phẩm</label>
                        </div> 
                            <div class="">
                    @foreach($img_detail as $value)
                    <div class="form-group">
                        <img class="img-responsive" alt = "no img" width="200px" src="{!! asset('public/image_upload/product/product_detail/'.$value->imagedetail)  !!}">
                        <a href="{!! url('admin/deleteproductdetail',[$value->id]) !!}">xóa ảnh chi tiết</a>
                    </div>  
                    @endforeach  
                                        
                       <div class="form-group">
                                <label>thêm ảnh chi tiết sản phẩm</label>
                                <button class="btn btn-primary" id="button_add_input">Thêm hình ảnh</button>
                                <div id="wrap_field_input"></div>
                        </div>
                        </div>
                            <button type="submit" class="btn btn-danger">Lưu sửa</button>
                            <button type="reset" class="btn btn-danger">Load lại</button>
                           

                     {{ Form::close() }}
                     </div>
                     </div>
                     <div class="col-sm-5">
                         hello
                     </div>
                      </div>
                 
 @stop