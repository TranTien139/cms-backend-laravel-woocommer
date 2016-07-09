@extends("admin.headerfooter.masterpage")
@section("title")
Thêm nhóm slider
@stop
@section("content_admin") 
  <div class="col-lg-12">
          <div id="menu_wrapper">
            <input type="button" id="add_box_menu" class="button" value="Thêm"/><br/>
            <div class="add_menu">
            {!! Form::open(['route'=>'admin.menu.store','method'=>'post','file'=>true]); !!}
              <table border="0">
                <tr>
                    <td>Tiêu Đề</td>
                    <td><input id="" name="txttitle"  /></td>
                </tr>
                <tr>
                    <td>Slug</td>
                    <td><input id="" name="txtalias"  /></td>
                </tr>
                <tr>
                    <td>Sắp Xếp</td>
                    <td><input id="" name="txtorder"/></td>
                </tr>
                <tr>
                    <td>Parent</td>
                    <td>
                        <select name="txtparent_id">
                            <option value="0">-TOP-</option>
                           <?php  menu_parent($menu_temp) ?>
                        </select>
                        <button name="" type="submit" class="button" >Lưu</button>
                    </td>
                </tr>
            </table>
            {!! Form::close(); !!}
            </div>
            <hr/>
            <ul>

            <?php $menu_temp1 = DB::table('menus')->orderBy('order','ASC')->where('parent_id',0)->get(); ?>
            @foreach($menu_temp1 as $item)
                <li>
                    <a href="">{!! $item->title !!}</a>
                    <div>
                     {{ Form::open(array('route'=>array('admin.menu.update',$item->id),'method'=>'PUT','files'=> true)) }}
                        <table border="0">
                            <tr>
                                <td>Tiêu Đề</td>
                                <td><input id="" name="txttitle" value="{!! $item->title !!}" /></td>
                            </tr>
                            <tr>
                                <td>Slug</td>
                                <td><input id="" name="txtalias" value="{!! $item->alias !!}" /></td>
                            </tr>
                            <tr>
                                <td>Sắp Xếp</td>
                                <td><input id="" name="txtorder" value="{!! $item->order !!}" /></td>
                            </tr>
                            <tr>
                                <td>Parent</td>
                                <td>
                                    <select name="txtparent_id">
                                        <option value="0">-TOP-</option>
                                        <?php  menu_parent($menu_temp,0,"",$item->parent_id) ?>
                                    </select>
                                    <button type="submit" class="button">Lưu</button>
                                   <!--  <a href="#">Xóa</a> -->
                                </td>
                            </tr>
                        </table>
                         {{ Form::close() }} 
                    </div>
                     
                </li>
                 <?php $menu_temp2 = DB::table('menus')->orderBy('order','ASC')->where('parent_id',$item->id)->get(); ?>
                   @foreach($menu_temp2 as $item2)
                   <ul>
                    <li>
                    <a href="">{!! $item2->title !!}</a>
                    <div>
                    {{ Form::open(array('route'=>array('admin.menu.update',$item2->id),'method'=>'PUT','files'=> true)) }}
                        <table border="0">
                            <tr>
                                <td>Tiêu Đề</td>
                                <td><input id="" name="txttitle" value="{!! $item2->title !!}" /></td>
                            </tr>
                            <tr>
                                <td>Slug</td>
                                <td><input id="" name="txtalias" value="{!! $item2->alias !!}" /></td>
                            </tr>
                            <tr>
                                <td>Sắp Xếp</td>
                                <td><input id="" name="txtorder" value="{!! $item2->order !!}" /></td>
                            </tr>
                            <tr>
                                <td>Parent</td>
                                <td>
                                    <select name="txtparent_id">
                                        <option value="0">-TOP-</option>
                                        <?php  menu_parent($menu_temp,0,"",$item2->parent_id) ?>
                                    </select>
                                    <button type="submit" class="button">Lưu</button>
                                  <!--   <a href="{!! route('admin.menu.destroy',[$item2->id]) !!}">Xóa</a> -->
                                </td>
                            </tr>
                        </table>
                         {{ Form::close() }} 
                    </div>
                </li>

                <?php $menu_temp3 = DB::table('menus')->orderBy('order','ASC')->where('parent_id',$item2->id)->get(); ?>
                   @foreach($menu_temp3 as $item3)
                   <ul>
                    <li>
                    <a href="">{!! $item3->title !!}</a>
                    <div>
                    {{ Form::open(array('route'=>array('admin.menu.update',$item3->id),'method'=>'PUT','files'=> true)) }}
                        <table border="0">
                            <tr>
                                <td>Tiêu Đề</td>
                                <td><input id="" name="txttitle" value="{!! $item3->title !!}" /></td>
                            </tr>
                            <tr>
                                <td>Slug</td>
                                <td><input id="" name="txtalias" value="{!! $item3->alias !!}" /></td>
                            </tr>
                            <tr>
                                <td>Sắp Xếp</td>
                                <td><input id="" name="txtorder" value="{!! $item3->order !!}" /></td>
                            </tr>
                            <tr>
                                <td>Parent</td>
                                <td>
                                    <select name="txtparent_id">
                                        <option value="0">-TOP-</option>
                                        <?php  menu_parent($menu_temp,0,"",$item3->parent_id) ?>
                                    </select>
                                    <button type="submit" class="button">Lưu</button>
                                   <!--  <a href="">Xóa</a> -->
                                </td>
                            </tr>
                        </table>
                         {{ Form::close() }} 
                    </div>
                </li>
                
                </ul>
                   @endforeach()

                </ul>
                   @endforeach()
                @endforeach()
            </ul>
        </div>
    </div>
            
@stop
