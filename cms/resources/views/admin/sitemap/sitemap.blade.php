@extends("admin.headerfooter.masterpage")
@section("title")
Sơ đồ trang web
@stop
@section("content_admin") 
                    <div class="col-lg-12">
                        <h1 class="page-header">Sơ đồ trang web
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:120px">
                        <?php $data = App\MenuModel::select('id','title','alias','parent_id')->orderBy('order','ASC')->get()->toArray(); ?>
                        <ul>
                            @foreach($data as $values)
                                @if($values['parent_id'] == 0)
                                    <li><a href="{!! url($values['alias']) !!}">{!! $values['title'] !!}</a>
                                        <?php submenu($data,$values['id']); ?>
                                    </li>
                                @endif
                            @endforeach
                        </ul>
                    </div>
     @stop              

   