@extends("admin.headerfooter.masterpage")
@section("title")
Sửa loại sản phẩm
@stop
@section("content_admin") 

                    <div class="col-lg-12">
                        <h1 class="page-header">Sửa loại sản phẩm
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                        <div class="col-lg-7" style="padding-bottom:120px">
                    {{ Form::open(array('route'=>array('admin.categoryproduct.update',$cateproduct_temp['id']),'method'=>'PUT')) }}
                            <div class="form-group">
                                <label>Thuộc nhóm sản phẩm</label>
                                <select class="form-control" name="parent_category">
                                    <option value="0"> Thuộc nhóm sản phẩm</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Tên nhóm sản phẩm</label>
                                <input class="form-control" name="txtname" value="{{ old('txtname',isset($cateproduct_temp)?$cateproduct_temp['name']:null) }}" placeholder="Nhập tên nhóm sản phẩm" />
                            </div>
                            <div class="form-group">
                                <label>Sắp xếp</label>
                                <input class="form-control" name="txtorder" value="{{ old('txtorder',isset($cateproduct_temp)?$cateproduct_temp['order']:null) }}" placeholder="Nhập sắp xếp nhám sản phẩm" />
                            </div>
                            <div class="form-group">
                                <label>Xuất bản </label>
                                @if($cateproduct_temp['published'] == "yes")
                                <input type="checkbox" name="txtpublished" checked value="yes" >
                                @else
                                <input type="checkbox" name="txtpublished" value="yes" >
                                @endif
                            </div>
                            <button type="submit" class="btn btn-danger">Lưu Sửa</button>
                            <button type="reset" class="btn btn-danger">Load Lại</button>
                      {{ Form::close() }}
                    </div>
@stop