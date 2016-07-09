@extends("admin.headerfooter.masterpage")
@section("title")
Thêm Nhóm Sản Phẩm
@stop
@section("content_admin") 
                    <div class="col-lg-12">
                        <h1 class="page-header">Thêm Nhóm Sản Phẩm
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:120px">
                        <form action="{{ route('admin.categoryproduct.store') }}" method="POST">
                        <input type="hidden"  name="_token" value="{!! csrf_token() !!}"  />
                            <div class="form-group">
                                <label>Thuộc nhóm sản phẩm</label>
                                <select class="form-control" name="parent_category">
                                    <option value="0">thuộc nhóm sản phẩm</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Tên nhóm sản phẩm</label>
                                <input class="form-control" name="txtname"  placeholder="Tên nhóm sản phẩm" />
                            </div>
                            <div class="form-group">
                                <label>Sắp xếp</label>
                                <input class="form-control" name="txtorder" placeholder="Sắp xếp" />
                            </div>
                            <div class="form-group">
                                <label>Xuất bản </label>
                                <input type="checkbox" name="txtpublished" value="yes" >
                            </div> 
                            <button type="submit" class="btn btn-danger">Thêm nhóm sản phẩm</button>
                            <button type="reset" class="btn btn-danger">Load Lại</button>
                        <form>
                    </div>
     @stop              

   