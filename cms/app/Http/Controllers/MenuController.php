<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\MenuModel;

class MenuController extends Controller
{
     public function index()
    { 
      $menu_temp = MenuModel::all();
      return view('admin.menu.menu',compact('menu_temp'));
    }

    public function create()
    {     
        
    }
    public function store(Request $request)
    {  
        $menu_temp = new MenuModel;
        $menu_temp->title = $request->txttitle;
        $menu_temp->alias = $request->txtalias;
        $menu_temp->parent_id = $request->txtparent_id;
        $menu_temp->order = $request->txtorder;
        $menu_temp->save();
        return redirect()->route('admin.menu.index')->with(['flash_message'=>'Thêm thành công']);
    }
    public function show($id)
    {
      echo "404";
    }
    public function edit($id)
    {
    	
    }
    public function update($id,Request $request)
    {
        $menu_temp =  MenuModel::findOrFail($id);
        $menu_temp->title = $request->txttitle;
        $menu_temp->alias = $request->txtalias;
        $id_parent  = $request->txtparent_id;
        $menu_temp->parent_id = $id_parent;
        $menu_temp->order = $request->txtorder;

        if($id_parent == $menu_temp->id){
            return redirect()->back();
        }else{

        if($id_parent != 0){
        $menu_parent =  MenuModel::findOrFail($id_parent);
        if($menu_parent->parent_id == $menu_temp->id){
            return redirect()->back();
        }else{
            $id_parent_after = $menu_parent->parent_id;
            if($id_parent_after != 0){
            $menu_parent_after =  MenuModel::findOrFail($id_parent_after);

            if($menu_parent_after->parent_id != 0 || $menu_parent_after->parent_id == $menu_temp->id || $menu_parent_after->parent_id == $menu_parent->id){
            return redirect()->back();
        }
        else{
            $menu_temp->save();
            return redirect()->route('admin.menu.index')->with(['flash_message'=>'Sửa thành công']);
        }
    }else{
        $menu_temp->save();
        return redirect()->route('admin.menu.index')->with(['flash_message'=>'Sửa thành công']);
    }
        }
        }else{
            $menu_temp->save();
            return redirect()->route('admin.menu.index')->with(['flash_message'=>'Sửa thành công']);
        }
    }
}
    public function destroy($id)
    {   
    $menu_temp =  MenuModel::findOrFail($id);
    $menu_temp->delete();
    return redirect()->route('admin.menu.index')->with(['flash_message'=>'Xóa thành công']);;
	}
}
