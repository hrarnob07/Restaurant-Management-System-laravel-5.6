<?php

namespace App\Http\Controllers\Admin;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Slider;


class SliderController extends Controller
{
    
    public function index()
    {
        $datas =Slider::all();
        return view('admin.show_silder',['datas'=>$datas]);
    }

   
    public function create()
    {
        return view('admin.add_slider');
    }

   
    public function store(Request $request)
    {
        
        $this->validate($request,[
            'title' => 'required',
            'sub_title' => 'required',
            'image' => 'required|mimes:jpeg,jpg,bmp,png',
        ]);
       
        $data =array();
    	$data['title']=$request->input('title');
        $data['sub_title']=$request->input('sub_title');
        $image =$request->file('image');
    	
    	if($image)
    	{
    		$image_name=str_random(20);
    		$exe=strtolower(
    			$image->getClientOriginalExtension());
    		$image_full_name=$image_name.'.'.$exe;
    		$image_upload='slider/';
    		$image_url=$image_upload.$image_full_name;
    		$success=$image->move($image_upload,$image_full_name);
    		if($success)
    		{
    			$data['image']=$image_url;
    			DB::table('sliders')->insert($data);
    			return redirect()->route('show_slider.index');
    		}
    	}
        
                $data['image']="";

    			DB::table('sliders')->insert($data);
    			return redirect()->route('show_slider.index');
        
        
        
        
        
        
        
                /*$image = $request->file('image');
        $slug = str_slug($request->title);
        if (isset($image))
        {
            $currentDate = Carbon::now()->toDateString();
            $imagename = $slug .'-'. $currentDate .'-'. uniqid() .'.'. $image->getClientOriginalExtension();
            if (!file_exists('uploads/slider'))
            {
                mkdir('uploads/slider', 0777 , true);
            }
            $image->move('uploads/slider',$imagename);
        }else {
            $imagename = 'dafault.png';
        }

        $slider = new Slider();
        $slider->title = $request->title;
        $slider->sub_title = $request->sub_title;
        $slider->image = $imagename;
        $slider->save();
        return redirect()->route('show_slider.index');*/
    
    }

   
    public function show($id)
    {
        //
    }

    
    public function edit($id)
    {
       $data=Slider::find($id);
       return view('admin.edit_slider',['data'=>$data]);
    }

   
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'title' => 'required',
            'sub_title' => 'required',
            'image' => 'mimes:jpeg,jpg,bmp,png',
        ]);
       
        $data =array();
    	$data['title']=$request->input('title');
        $data['sub_title']=$request->input('sub_title');
        $image =$request->file('image');
        $sliders=Slider::find($id);
    	
    	if($image)
    	{
    		$image_name=str_random(20);
    		$exe=strtolower(
    			$image->getClientOriginalExtension());
    		$image_full_name=$image_name.'.'.$exe;
    		$image_upload='slider/';
    		$image_url=$image_upload.$image_full_name;
    		$success=$image->move($image_upload,$image_full_name);
    		if($success)
    		{
    			$data['image']=$image_url;
                DB::table('sliders')
                ->where('id',$id)
                ->update($data);
    			return redirect()->route('show_slider.index');
    		}
    	}
        
                $data['image']=$sliders->image;

                DB::table('sliders')
                ->where('id',$id)
                ->update($data);
    			return redirect()->route('show_slider.index');
        
    }

   
    public function destroy($id)
    {
        return $id;
       
        $slider = Slider::find($id);
        if (file_exists('uploads/slider/'.$slider->image))
        {
            unlink('uploads/slider/'.$slider->image);
        }
        $slider->delete();
        return redirect()->back();
    }
}
