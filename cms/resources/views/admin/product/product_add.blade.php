@extends("admin.headerfooter.masterpage")
@section("title")
Thêm Sản Phẩm
@stop
@section("content_admin") 
                <div class="col-lg-12">
                    <h1 class="page-header">    Thêm Sản Phẩm
                        </h1>
                    </div>
                    <div class="row">
                        <div class="col-sm-7">
                        <div class="col-sm-12" style="padding-bottom:120px">
                       <form action="{{ route('admin.product.store') }}"  method="POST" enctype="multipart/form-data" >
                    <!-- /.col-lg-12 -->
                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                            <div class="form-group">
                                <label>tên sản phẩm</label>
                                <input class="form-control" name="txtname" placeholder="tên sản phẩm" />
                            </div>
                            <div class="form-group">
                                <label>giá sản phẩm</label>
                                <input class="form-control" name="txtprice" placeholder="nhập giá sản phẩm" />
                            </div>
                             <div class="form-group">
                                <label>phần trăm giảm giá</label>
                                <input class="form-control" name="txtprice_saleoff" placeholder="giá sản phẩm giảm giá" />
                            </div>

                             <div class="form-group">
                                <label>mô tả sản phẩm</label>
                                <textarea style="width:100%; height:200px;" id="txtdescription" name="txtdescription"></textarea>
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
                                <label>thông tin sản phẩm</label>
                                <textarea style="width:100%; height:200px;" id="txtcontent" name="txtcontent"></textarea>
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
                                <img src="" id="image_product" class="image_product" height="200" width="auto" alt="Ảnh Sản Phẩm ..">
                            </div>

                             <div class="form-group">
                                <label>thuộc nhóm sản phẩm</label>
                                <select class="form-control" name="txtcategory">
                                    <option value=" ">không thuộc nhóm nào</option>
                                    <?php cate_parent($category_temp) ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Tình Trạng</label>
                                <select class="form-control" name="txtorder">
                                    <option value="istore">còn hàng</option>
                                    <option value="emptystore">hết hàng</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>sản phẩm nổi bật</label>
                                <input type="checkbox" name="txtishot" value="yes" >
                            </div>
                            <div class="form-group">
                                <label>sản phẩm mới</label>
                                <input type="checkbox" name="txtisnew" value="yes" >
                            </div>
                            <div class="form-group">
                                <label>sản phẩm bán chạy</label>
                                <input type="checkbox" name="txtbestseller" value="yes" >
                            </div>
                             <div class="form-group">
                                <label>xuất bản</label>
                                <input type="checkbox" name="txtpublished" value="yes" >
                            </div>
                            <div class="form-group">
                                <label>ảnh chi tiết sản phẩm</label>
                                <button class="btn btn-primary" id="button_add_input">Thêm hình ảnh</button>
                                <div id="wrap_field_input"></div>
                        </div>
                            <button type="submit" class="btn btn-danger">Thêm sản phẩm</button>
                            <button type="reset" class="btn btn-danger">Load lại</button>
                          </form>  
                          </div>
                        </div>
                        <div class="col-sm-5">
                            hello
                        </div>
                        </div>             
                @stop


