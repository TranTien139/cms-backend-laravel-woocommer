@extends("admin.headerfooter.masterpage")
@section("title")
Danh Sách Sản Phẩm
@stop
@section("content_admin") 
        <div class="box">
            <div class="box-header">
              <h3 class="box-title">Danh Sách Sản Phẩm</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="tableuser" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>hành động</th>
                    <th>id</th>
                    <th>tên sản phẩm</th>
                    <th>giá</th>
                    <th>phần trăm giảm giá (%)</th>
                    <th>loại sản phẩm</th>
                    <th>ảnh</th>
                    <th>xuất bản</th>
                </tr>
                </thead>
                <tbody>
                @foreach($product_temp as $tv)
                <tr>
                  <td style="display:flex">
                  {!! Form::open(array('route' =>array('admin.product.destroy',$tv->id),'method'=>'DELETE')) !!}
                  <button  type="submit" class="but_delete" onclick="return confirmdelete('bạn có chắc chắn xóa không')">Xóa</button>
                  {!! Form::close() !!}
                  <a href="{{ route('admin.product.edit',$tv->id) }}">Sửa</a>
                  </td>
                  <td>{!! $tv->id !!}</td>
                  <td>{!! $tv->name !!}</td>
                  <td>{!! $tv->price !!}</td>
                  <td>{!! $tv->price_saleoff !!}</td>
                    <?php 
                      $data = DB::table('categories_products')->where('id',$tv->category_id)->get(); ?>
                    <td>
                    @foreach($data as $item)
                      {{ $item->name }}
                    @endforeach
                    </td>
                  
                    <td><img  width="60px" height="50px" src="{!! asset('public/image_upload/product/'.$tv->image) !!}"></td>
                    <td>{{ $tv->published }}</td>
                </tr>
                 @endforeach
                </tbody>
                <tfoot>
                <tr>
                    <th>hành động</th>
                    <th>id</th>
                    <th>tên sản phẩm</th>
                    <th>giá</th>
                    <th>phần trăm giảm giá (%)</th>
                    <th>loại sản phẩm</th>
                    <th>ảnh</th>
                    <th>xuất bản</th>
                </tr>
                </tfoot>
              </table>
            </div>
             </div>
            <!-- /.box-body -->
                @stop
