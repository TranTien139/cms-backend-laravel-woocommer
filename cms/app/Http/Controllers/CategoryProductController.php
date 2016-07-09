<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\CategoryProductRequest;
use App\CategoryProductModel;
use App\ProductModel;
class CategoryProductController extends Controller
{
      public function index()
    { 
      $cateproduct_temp = CategoryProductModel::all();
      return view('admin.product.cateproduct_list',compact('cateproduct_temp'));
    }
    public function create()
    {   
       return view('admin.product.cateproduct_add');
    }
    public function store(CategoryProductRequest $request)
     { 
        $product = new CategoryProductModel;
        $product->name = $request->txtname;
        $product->alias = changeTitle($request->txtname);
        $product->order = $request->txtorder;
        $product->published = $request->txtpublished;
        $product->save();
    	return redirect()->route('admin.categoryproduct.index')->with(['flash_message'=>'Thêm Thành Công']);
    }
    public function show($id)
    {
      echo "404";
    }
    public function edit($id)
    {
    $cateproduct_temp = CategoryProductModel::findOrFail($id);
    return view('admin.product.cateproduct_edit',compact('cateproduct_temp'));
    }
    public function update($id,Request $request)
    {
        $product =   CategoryProductModel::findOrFail($id);
        $product->name = $request->txtname;
        $product->alias = changeTitle($request->txtname);
        $product->order = $request->txtorder;
        $product->published = $request->txtpublished;
        $product->save();
    	return redirect()->route('admin.categoryproduct.index')->with(['flash_message'=>'Sửa Thành Công']);
    }
    public function destroy($id)
    {   
    $parent  = CategoryProductModel::where('parent_id',$id)->count();
    $product = ProductModel::where('category_id',$id)->count();
    if($parent ==0 && $product==0) 
    {
    $cate1 =  CategoryProductModel::findOrFail($id);
    $cate1->delete();
    return redirect()->route('admin.categoryproduct.index')->with(['flash_message'=>'Xóa thành công']);
    } else{
        echo "<script type='text/javascript'>
         alert('Bạn không thể xóa mục sản phẩm này vì mục này có mục con');
        </script>";
    #return redirect()->back();
    }
	}
}
