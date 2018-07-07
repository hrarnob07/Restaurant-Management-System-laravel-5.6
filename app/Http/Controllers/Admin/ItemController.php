<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Item;
use App\Category;
use DB;

class ItemController extends Controller
{
    public function index()
    {
        $datas=Item::all();
        
        return view('item.all_item',['datas'=>$datas]);
    }

    public function create()
    {
        $datas=Category::all();
        return view('item.add_item',['datas'=>$datas]);
    }

    
    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'category_id' => 'required',
            'image' => 'required|mimes:jpeg,jpg,bmp,png',
        ]);
       
        $data =array();
    	$data['name']=$request->input('name');
        $data['description']=$request->input('description');
        $data['price']=$request->input('price');
        $data['category_id']=$request->input('category_id');
        $image =$request->file('image');
    	
    	if($image)
    	{
    		$image_name=str_random(20);
    		$exe=strtolower(
    		$image->getClientOriginalExtension());
    		$image_full_name=$image_name.'.'.$exe;
    		$image_upload='item/';
    		$image_url=$image_upload.$image_full_name;
    		$success=$image->move($image_upload,$image_full_name);
    		if($success)
    		{
    			$data['image']=$image_url;
    			DB::table('items')->insert($data);
    			return redirect('admin/item_show');
    		}
    	}
        
                $data['image']="";

    			DB::table('items')->insert($data);
    			return redirect('admin/item_show');
    }

    
    public function show($id)
    {
        //
    }

   
    public function edit($id)
    {
        $data=Item::find($id);
        $categorys=Category::all();
        return view('item.edit_item',['data'=>$data,'categorys'=>$categorys]);
    }

    
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'category_id' => 'required',
            'image' => 'required|mimes:jpeg,jpg,bmp,png',
        ]);
       
        $data =array();
    	$data['name']=$request->input('name');
        $data['description']=$request->input('description');
        $data['price']=$request->input('price');
        $data['category_id']=$request->input('category_id');
        $image =$request->file('image');
    	
    	if($image)
    	{
    		$image_name=str_random(20);
    		$exe=strtolower(
    		$image->getClientOriginalExtension());
    		$image_full_name=$image_name.'.'.$exe;
    		$image_upload='item/';
    		$image_url=$image_upload.$image_full_name;
    		$success=$image->move($image_upload,$image_full_name);
    		if($success)
    		{
    			$data['image']=$image_url;
    			DB::table('items')->insert($data);
    			return redirect('admin/item_show');
    		}
    	}
        
                $data['image']="";

    			DB::table('items')->insert($data);
    			return redirect('admin/item_show');
    }

   
    public function destroy($id)
    {
       Item::find($id)->delete();
       return redirect('admin/item_show');
    }
}
