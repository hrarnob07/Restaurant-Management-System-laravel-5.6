<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
class CategoryController extends Controller
{
   
    public function index()
    {
        $datas=Category::all();
        
        return view('category.show_category',['datas'=>$datas]);
    }

   
    public function create()
    {
       return view('category.add_category');
    }

   
    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required'           
        ]);

        $category =new Category;
        $category->name=$request->input('name');
        $category->slug=str_slug( $category->name);
       
        $category->save();

        return Redirect('admin/category_show');

       


    }

   
    public function show($id)
    {
        //
    }

   
    public function edit($id)
    {
        $data= Category::find($id);
        return view('category.edit_category',['data'=>$data]);
    }

  
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'name' => 'required'           
        ]);

        $category = Category::find($id);
        $category->name=$request->input('name');
        $category->slug=str_slug( $category->name);
       
        $category->save();

        return Redirect('admin/category_show');
    }

  
    public function destroy($id)
    {
        Category::find($id)->delete();
        return Redirect('admin/category_show');
    }
}
