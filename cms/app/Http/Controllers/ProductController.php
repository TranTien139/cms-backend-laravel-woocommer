<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\ProductModel;
use App\Http\Requests\ProductRequest;
use App\CategoryProductModel;
use App\ImageDetailProductModel;
use Input;
use File;

class ProductController extends Controller
{
        public function index()
    { 
      $product_temp = ProductModel::all();
      return view('admin.product.product_list',compact('product_temp'));
    }
    public function create()
    {   
        $category_temp = CategoryProductModel::select('id','name','parent_id')->get()->toArray();
        return view('admin.product.product_add',compact('category_temp'));
    }
    public function store(ProductRequest $request)
     {  
        
        $product = new ProductModel;
        $file_name = $request->file('txtimage')->getClientOriginalName();     
        $product->name = $request->txtname;
        $product->alias = changeTitle($request->txtname);
        $product->description = $request->txtdescription;
        $product->price = $request->txtprice;
        $product->price_saleoff = $request->txtprice_saleoff;
        $product->content = $request->txtcontent;
        $product->image =  $file_name;
        $product->category_id = $request->txtcategory;
        $product->status = $request->txtstatus;
        $product->ishot = $request->txtishot;
        $product->isnew = $request->txtisnew;
        $product->isbestseller = $request->txtbestseller;
        $product->published = $request->txtpublished;
        $product->save();
        $product_id1 = $product->id;
        if(Input::hasFile('txtimage_detail')){
            foreach(Input::file('txtimage_detail') as $file){
                $product_img = new ImageDetailProductModel();
                if(isset($file)){
                $product_img->imagedetail = $file->getClientOriginalName();
                $file->move('public/image_upload/product/product_detail/', $file->getClientOriginalName());
                $product_img->product_id=$product->id;
                $product_img->save();
                 }
            }
    }
    $request->file('txtimage')->move('public/image_upload/product/', $file_name);
    return redirect()->route('admin.product.index')->with(['flash_message'=>'Thêm Thành Công']);
    }
    public function show($id)
    {
      echo "404";
    }
    public function edit($id)
    {
    $product_temp =  ProductModel::findOrFail($id);
    $category = CategoryProductModel::select('id','name','parent_id')->get()->toArray();
    $img_detail = ImageDetailProductModel::select('id','imagedetail','product_id')->where('product_id',$id)->get();
    return view('admin.product.product_edit',compact('product_temp','category','img_detail'));
    }
    public function update($id,Request $request)
    {
        $product =   ProductModel::findOrFail($id);
        $product->name = $request->txtname;
        $product->alias = changeTitle($request->txtname);
        $product->description = $request->txtdescription;
        $product->price = $request->txtprice;
        $product->price_saleoff = $request->txtprice_saleoff;
        $product->content = $request->txtcontent;
        $product->category_id = $request->txtcategory;
        $product->status = $request->txtstatus;
        $product->ishot = $request->txtishot;
        $product->isnew = $request->txtisnew;
        $product->isbestseller = $request->txtbestseller;
        $product->published = $request->txtpublished;
        if(!empty($request->file('txtimage'))){
        $file_name = $request->file('txtimage')->getClientOriginalName();
        $request->file('txtimage')->move('public/image_upload/product/', $file_name);
        $product->image = $file_name;
        File::delete(public_path().'/image_upload/product/'.$request->txtimage1);
        }else {
          $product->image = $request->txtimage1;
        }
        $product_id1 = $product->id;
        if(Input::hasFile('txtimage_detail')){
            foreach(Input::file('txtimage_detail') as $file){
                $product_img = new ImageDetailProductModel();
                if(isset($file)){
                $product_img->imagedetail = $file->getClientOriginalName();
                $file->move('public/image_upload/product/product_detail/', $file->getClientOriginalName());
                $product_img->product_id=$product_id1;
                $product_img->save();
                 }
            }
    }
    $product->save();
    return redirect()->route('admin.product.index')->with(['flash_message'=>'Sửa Thành Công']);
    }
    public function destroy($id)
    {   
    $product =  ProductModel::findOrFail($id);
    $id_productdetail = $product->id;
    $imagedetail = ImageDetailProductModel::where('product_id',$id_productdetail)->get();
    foreach ($imagedetail as $key) {
    File::delete(public_path().'/image_upload/product/product_detail/'.$key->imagedetail);
    $key->delete();
    }
    File::delete(public_path().'/image_upload/product/'.$product->image);
    $product->delete();
    return redirect()->route('admin.product.index')->with(['flash_message'=>'Xóa Thành Công']);
	}
}
